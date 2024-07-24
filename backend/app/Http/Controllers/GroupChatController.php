<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class GroupChatController extends Controller
{
    public function createGroup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $profilePath = 'storage/images';
            $img->move(public_path($profilePath), $imageName);
            $imagePath = $profilePath . '/' . $imageName;
        }

        // Create the group
        $group = Group::create([
            'name' => $request->name,
            'image' => $imagePath
        ]);

        // Add the authenticated user to the group
        $userId = Auth::id(); // Get the authenticated user ID

        // Ensure userId is available and valid
        if ($userId) {
            GroupUser::create([
                'group_id' => $group->id,
                'user_id' => $userId
            ]);
        }

        return response()->json($group, 201);
    }
    public function addUsersToGroup(Request $request, int $group_id)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'required|exists:users,id',
        ]);

        $group = Group::findOrFail($group_id);

        // Get array of user IDs
        $userIds = $request->input('user_ids');

        // Attach users to the group
        $group->users()->attach($userIds);

        return response()->json(['message' => 'Users added to group'], 200);
    }

    public function sendMessage(Request $request, int $group_id)
    {
        $request->validate([
            'description' => 'nullable|string', // Allow description to be nullable
            'image' => 'nullable|file|mimes:jpg,jpeg,png,gif', // Validate as a file with specific mime types
            'video' => 'nullable|file|mimes:mp4,avi,mkv', // Validate as a file with specific mime types
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $profilePath = 'storage/images';
            $img->move(public_path($profilePath), $imageName);
            $imagePath = $profilePath . '/' . $imageName;
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $ext = $video->getClientOriginalExtension();
            $videoName = time() . '.' . $ext;
            $profilePath = 'storage/videos';
            $video->move(public_path($profilePath), $videoName);
            $videoPath = $profilePath . '/' . $videoName;
        }

        $user_id = Auth::id();

        $message = Message::create([
            'group_id' => $group_id,
            'from_user_id' => $user_id,
            'description' => $request->description,
            'image' => $imagePath,
            'video' => $videoPath,
        ]);

        return response()->json($message, 201);
    }
    public function getGroupsWithMessages(Request $request)
    {
        // Fetch groups with their messages
        $groups = Group::with('messages')->get();

        // Sort groups based on the most recent message's creation time
        $sortedGroups = $groups->sortByDesc(function ($group) {
            // Get the most recent message's creation time, or null if there are no messages
            return $group->messages->max('created_at') ?? now();
        });

        return response()->json($sortedGroups->values(), 200);
    }

    public function listUserGroups()
    {
        // Get the authenticated user
        $user = Auth::user();

        if (!$user) {
            Log::warning('Unauthorized access attempt');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userId = $user->id;

        // Fetch groups that the user is a member of
        $userGroups = DB::table('group_user')
            ->join('groups', 'group_user.group_id', '=', 'groups.id')
            ->where('group_user.user_id', $userId)
            ->select('groups.id', 'groups.name', 'groups.description', 'groups.created_at')
            ->get();

        // Optionally, you can format the data as needed
        $formattedGroups = $userGroups->map(function ($group) {
            return [
                'id' => $group->id,
                'name' => $group->name,
                'description' => $group->description,
                'created_at' => [
                    'date' => Carbon::parse($group->created_at)->format('d-m-Y'),
                    'time' => Carbon::parse($group->created_at)->format('H:i'),
                ],
            ];
        });

        return response()->json(['success' => true, 'data' => $formattedGroups], 200);
    }
}
