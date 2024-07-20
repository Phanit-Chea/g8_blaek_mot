<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Requests\ChatRequest;
use App\Http\Resources\ChatListResource;
use App\Http\Resources\ChatResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Psr\Log\NullLogger;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUser = Auth::user(); // Get the authenticated user

        // Fetch users excluding the current user
        $users = User::where('id', '!=', $currentUser->id)->get();

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function storeUser(ChatRequest $request, int $to_user)
    {
        $from_user = Auth::id();
        if ($from_user === null) {
            return response()->json(['error' => 'User is not authenticated'], 401);
        }

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $ext = $img->getClientOriginalExtension();
                $imageName = time() . '.' . $ext;
                $profilePath = 'storage/images';
                $img->move(public_path($profilePath), $imageName);
                $imagePath = $profilePath . '/' . $imageName;
            }

            $chatData = [
                'from_user' => $from_user,
                'to_user' => $to_user,
                'description' => $request->input('description'),
                'image' => $imagePath,
                'video' => $request->input('video'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $chat = Chat::create($chatData);

            $response = [
                'to_user' => $chat->to_user,
                'from_user' => $chat->from_user,
                'description' => $chat->description,
                'image' => $chat->image,
                'video' => $chat->video,
                'created_at' => $chat->created_at,
                'updated_at' => $chat->updated_at,
            ];

            return response()->json($response, 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    /**
     * Display the specified resource.
     */
    // ChatController.php
    // ChatController.php
    public function show($to_user)
    {
        $from_user = Auth::id();
        $chats = Chat::where(function ($query) use ($from_user, $to_user) {
            $query->where('from_user', $from_user)
                ->where('to_user', $to_user);
        })
            ->get();

        if ($chats->isNotEmpty()) {
            return response()->json($chats);
        } else {
            return response()->json(['error' => 'No chats found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $from_user = Auth::id();
        $validatedData = $request->validate([
            'description' => 'required|string',
        ]);

        $chat = Chat::where('from_user', $from_user)
            ->where('id', $id)
            ->first();

        $chat->update(['description' => $validatedData['description'],]);
        return new ChatResource($chat);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $from_user = Auth::id();
        try {
            $chat = Chat::where('from_user', $from_user)
                ->where('id', $id)
                ->first();

            if ($chat->delete()) {
                return response()->json(['message' => 'Chat deleted successfully'], 204);
            } else {
                return response()->json(['error' => 'Failed to delete chat'], 500);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Chat not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error deleting chat'], 500);
        }
    }
    // public function listChat()
    // {
    //     $user = Auth::user();

    //     if (!$user) {
    //         Log::warning('Unauthorized access attempt');
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     $userId = $user->id;

    //     // Get all chat entries involving the current user (either from_user or to_user)
    //     $allChats = Chat::where('from_user', $userId)
    //         ->orWhere('to_user', $userId)
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     // Group chats by the other user (not the current user)
    //     $groupedChats = $allChats->groupBy(function ($chat) use ($userId) {
    //         return $chat->from_user == $userId ? $chat->to_user : $chat->from_user;
    //     });

    //     // Get users involved in chats with the current user
    //     $userIds = $groupedChats->keys()->toArray();
    //     $users = DB::table('users')
    //         ->join('chats', function ($join) use ($userId) {
    //             $join->on('users.id', '=', 'chats.from_user')
    //                 ->orOn('users.id', '=', 'chats.to_user');
    //         })
    //         ->select('users.id', 'users.name', 'users.email', 'users.address', 'users.profile', 'users.gender', 'address', 'phoneNumber', 'dateOfBirth', DB::raw('MAX(chats.created_at) as latest_chat_time'))
    //         ->whereIn('users.id', $userIds)
    //         ->groupBy('users.id', 'users.name', 'users.email', 'users.address', 'users.profile', 'users.gender', 'address', 'phoneNumber', 'dateOfBirth')
    //         ->orderByDesc('latest_chat_time')
    //         ->get();

    //     // Map users with their chat details
    //     $usersWithChats = $users->map(function ($user) use ($groupedChats, $userId) {
    //         // Chats involving this user
    //         $userChats = $groupedChats[$user->id] ?? collect();

    //         // Latest chat details
    //         $latestChat = $userChats->first();
    //         $latestChatDetails = $latestChat ? [
    //             'id' => $latestChat->id,
    //             'from_user' => $latestChat->from_user,
    //             'to_user' => $latestChat->to_user,
    //             'description' => $latestChat->description,
    //             'image' => $latestChat->image,
    //             'video' => $latestChat->video,
    //             'active' => $latestChat->active,
    //             'created_at' => [
    //                 'date' => Carbon::parse($latestChat->created_at)->format('d-m-Y'),
    //                 'time' => Carbon::parse($latestChat->created_at)->format('H:i'),
    //             ],
    //         ] : null;

    //         // Sort all chat details by created_at in ascending order
    //         $allChatDetails = $userChats->sortBy('created_at')->map(function ($chat) {
    //             return [
    //                 'id' => $chat->id,
    //                 'from_user' => $chat->from_user,
    //                 'to_user' => $chat->to_user,
    //                 'description' => $chat->description,
    //                 'image' => $chat->image,
    //                 'video' => $chat->video,
    //                 'created_at' => [
    //                     'date' => Carbon::parse($chat->created_at)->format('d-m-Y'),
    //                     'time' => Carbon::parse($chat->created_at)->format('H:i'),
    //                 ],
    //             ];
    //         });

    //         return [
    //             'user' => [
    //                 'id' => $user->id,
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'address' => $user->address,
    //                 'profile' => $user->profile,
    //                 'gender' => $user->gender,
    //                 'address' => $user->address,
    //                 'phoneNumber' => $user->phoneNumber,
    //                 'dateOfBirth' => $user->dateOfBirth,
    //             ],
    //             'latest_chat' => $latestChatDetails,
    //             'all_chats' => $allChatDetails->values()->all(), // Convert to array for JSON response
    //         ];
    //     });

    //     return response()->json(['success' => true, 'data' => $usersWithChats->values()->all()], 200);
    // }
    public function updateActive($id, Request $request)
    {
        $chat = Chat::findOrFail($id);
        $chat->active = $request->input('active');
        $chat->save();

        return response()->json(['message' => 'Chat status updated successfully.']);
    }


    public function getChatsWithUser($userId)
    {
        $authUser = Auth::user();

        $chats = Chat::where(function ($query) use ($authUser, $userId) {
            $query->where('from_user', $authUser->id)
                ->where('to_user', $userId);
        })->orWhere(function ($query) use ($authUser, $userId) {
            $query->where('from_user', $userId)
                ->where('to_user', $authUser->id);
        })->orderBy('created_at', 'asc')->get();

        $authUser = ChatListResource::collection($chats);
        return response()->json(['allChats' => $authUser], 200);
        // return $authUser;

    }

    public function getUsersWithChats()
    {
        $authUser = Auth::user();
        $userId = $authUser->id;

        // Get all users except the authenticated user
        $allUsers = User::where('id', '!=', $userId)->get();

        // Get the latest chat messages involving the authenticated user
        $latestChats = Chat::select('chats.*')
            ->join(
                DB::raw('(SELECT MAX(id) as id FROM chats WHERE from_user = ? OR to_user = ? GROUP BY IF(from_user = ?, to_user, from_user)) as latest'),
                function ($join) use ($userId) {
                    $join->on('chats.id', '=', 'latest.id');
                }
            )
            ->setBindings([$userId, $userId, $userId])
            ->orderBy('chats.id', 'desc')
            ->get();

        // Collect user IDs from chats
        $chattedUserIds = $latestChats->pluck('from_user', 'to_user')->unique();

        // Separate users with chats from those without
        $usersWithChats = $allUsers->filter(function ($user) use ($chattedUserIds) {
            return $chattedUserIds->contains($user->id);
        });

        $usersWithoutChats = $allUsers->filter(function ($user) use ($chattedUserIds) {
            return !$chattedUserIds->contains($user->id);
        });

        // Merge users with chats first, then users without chats
        $sortedUsers = $usersWithChats->merge($usersWithoutChats);

        // Attach the latest chat message to each user
        $sortedUsers->each(function ($user) use ($latestChats, $userId) {
            $latestChat = $latestChats->firstWhere(function ($chat) use ($user) {
                return $chat->from_user == $user->id || $chat->to_user == $user->id;
            });
            if ($latestChat) {
                $user->latest_chat = new ChatListResource($latestChat);
            } else {
                $user->latest_chat = null;
            }
        });

        return response()->json([
            'users' => $sortedUsers,
            'currentUserId' => $userId,
        ]);
    }

    public function countUnreadMessages()
    {
        // Get the authenticated user's ID
        $userId = Auth::user()->id;

        // Query to count the active chats grouped by from_user excluding the current user's ID
        $chatCounts = DB::table('chats')
            ->select('from_user', DB::raw('count(*) as total_chats'))
            ->where('active', 0)
            ->where('from_user', '!=', $userId)
            ->groupBy('from_user')
            ->get();

        return response()->json($chatCounts);
    }


}
