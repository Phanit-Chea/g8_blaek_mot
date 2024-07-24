<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function getGroupsWithLatestMessages()
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Get all groups containing the current user and the count of users in each group
        $groups = DB::table('groups')
            ->join('group_users', 'groups.id', '=', 'group_users.group_id')
            ->where('group_users.user_id', $userId)
            ->select('groups.id', 'groups.name')
            ->groupBy('groups.id', 'groups.name') // Group by group ID and name
            ->get();

        // Log groups for debugging
        Log::info('Groups for user ' . $userId, ['groups' => $groups]);

        // Get the count of users in each group
        $groupsWithUserCount = DB::table('groups')
            ->join('group_users', 'groups.id', '=', 'group_users.group_id')
            ->select('groups.id', 'groups.name', DB::raw('COUNT(group_users.user_id) as user_count'))
            ->groupBy('groups.id', 'groups.name')
            ->get()
            ->keyBy('id'); // Key the collection by group ID

        // Get the latest message for each group where the current user is a member
        $groupsWithMessages = $groups->map(function ($group) use ($userId, $groupsWithUserCount) {
            // Get the latest message for the current group
            $latestMessage = DB::table('messages')
                ->join('users as from_user', 'messages.from_user_id', '=', 'from_user.id')
                ->where('messages.group_id', $group->id)
                ->orderBy('messages.created_at', 'desc')
                ->select(
                    'messages.id as message_id',
                    'messages.from_user_id',
                    'messages.description',
                    'messages.image',
                    'messages.video',
                    'messages.created_at as message_created_at',
                    'from_user.name as from_user_name',
                    'from_user.profile as from_user_profile'
                )
                ->first();

            // Log each group's latest message for debugging
            Log::info('Latest message for group ' . $group->id, ['latest_message' => $latestMessage]);

            // Get user count for the group
            $userCount = $groupsWithUserCount->get($group->id)->user_count ?? 0;

            return [
                'group' => [
                    'id' => $group->id,
                    'name' => $group->name,
                    'user_count' => $userCount, // Include the user count
                ],
                'latest_message' => $latestMessage ? [
                    'id' => $latestMessage->message_id,
                    'from_user' => [
                        'id' => $latestMessage->from_user_id,
                        'name' => $latestMessage->from_user_name,
                        'profile' => $latestMessage->from_user_profile,
                    ],
                    'description' => $latestMessage->description,
                    'image' => $latestMessage->image,
                    'video' => $latestMessage->video,
                    'created_at' => [
                        'datetime' => Carbon::parse($latestMessage->message_created_at)->format('Y-m-d H:i:s'),
                    ],
                ] : null,
            ];
        });

        // Sort groups by the latest message's created_at timestamp, handling groups with no messages
        $sortedGroupsWithMessages = $groupsWithMessages->sortByDesc(function ($groupWithMessage) {
            return $groupWithMessage['latest_message']['created_at']['datetime'] ?? '0000-00-00 00:00:00';
        })->values(); // Reindex the collection

        return response()->json(['success' => true, 'data' => $sortedGroupsWithMessages], 200);
    }
    public function getChatMessages(Request $request, $groupId)
    {
        // Fetch messages where the group_id is the specified group ID
        $messages = Message::where('group_id', $groupId)->with('user')->get();

        return response()->json($messages);
    
}
}