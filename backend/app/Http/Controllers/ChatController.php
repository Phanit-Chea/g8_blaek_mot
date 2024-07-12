<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Requests\ChatRequest;
use App\Http\Resources\ChatResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all chats
        $chats = Chat::all();

        // Group chats by `from_user`
        $groupedChats = $chats->groupBy('from_user');

        // Transform each group using `ChatResource`
        $groupedChats = $groupedChats->map(function ($group) {
            return ChatResource::collection($group);
        });

        return response(['success' => true, 'data' => $groupedChats], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChatRequest $request, int $to_user)

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

            $chat = Chat::create([
                'from_user' => $from_user,
                'to_user' => $to_user,
                'description' => $request->input('description'),
                'image' => $imagePath,
                'video' => $request->input('video'),
            ]);

            return response()->json(new ChatResource($chat), 201);
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



    public function getUsersChatWithMe()
    {
        try {
            // Get the currently authenticated user's ID
            $authUserId = Auth::id();

            // Fetch chat records where the user is the receiver
            $chats = Chat::where('to_user', $authUserId)
                ->orderBy('created_at', 'asc') // Order by created_at ascending (earliest first)
                ->get();

            if ($chats->isEmpty()) {
                return response(['error' => 'No chat records found for the user.'], 404);
            }

            // Extract unique sender IDs who have chatted with the authenticated user
            $uniqueSenderIds = $chats->pluck('from_user')->unique();

            // Prepare an array to store grouped sender messages
            $senderMessages = [];

            foreach ($uniqueSenderIds as $senderId) {
                // Filter chats sent by this sender to the authenticated user
                $senderChats = $chats->where('from_user', $senderId);

                // Count the number of messages sent by this sender
                $messageCount = $senderChats->count();

                // Fetch user details for the sender
                $senderUser = User::find($senderId);

                // Add sender messages to the response array
                $senderMessages[] = [
                    'sender' => $senderUser,
                    'message_count' => $messageCount,
                    'messages' => $senderChats->map(function ($chat) {
                        return [
                            'message' => $chat->message,
                            'description' => $chat->description,
                            'image' => $chat->image,
                            'video' => $chat->video,
                            'created_at' => $chat->created_at,
                        ];
                    })->toArray(),
                ];
            }

            return response(['success' => true, 'sender_messages' => $senderMessages], 200);
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            \Log::error('Error fetching users who chatted with me: ' . $e->getMessage());
            return response(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }
// get user exception user account
    public function getUsers()
    {
        try {
            $currentUserId = Auth::user()->id();
    
            // Users who have chatted with the current user
            $usersWithChats = User::whereHas('chat', function ($query) use ($currentUserId) {
                $query->where('to_user', $currentUserId)
                      ->orWhere('from_user', $currentUserId);
            })
            ->where('id', '!=', $currentUserId)
            ->orderBy('name')
            ->get();
    
            // Debugging: Check usersWithChats result
            \Log::info('Users with chats: ' . $usersWithChats);
    
            // Users who haven't chatted with the current user
            $usersWithoutChats = User::whereDoesntHave('chats', function ($query) use ($currentUserId) {
                $query->where('to_user', $currentUserId)
                      ->orWhere('from_user', $currentUserId);
            })
            ->where('id', '!=', $currentUserId)
            ->orderBy('name')
            ->get();
    
            // Debugging: Check usersWithoutChats result
            \Log::info('Users without chats: ' . $usersWithoutChats);
    
            // Merge both collections
            $users = $usersWithChats->merge($usersWithoutChats);
    
            return response()->json($users);
        } catch (\Exception $e) {
            // Log the exception for debugging purposes
            \Log::error('Error fetching users who chatted with me: ' . $e->getMessage());
            return response(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
        }
    }

    public function userListWithChats(Request $request)
    {
        $authenticatedUserId = $request->user()->id;

        // Subquery to get the latest chat timestamp for each user who chatted with the authenticated user
        $latestChatSubquery = Chat::selectRaw('MAX(created_at) as latest_chat_time')
            ->where('to_user', $authenticatedUserId)
            ->groupBy('from_user');

        // Fetch users, left join with the latest chat subquery to get the latest chat time
        $users = User::leftJoinSub($latestChatSubquery, 'latest_chats', function ($join) {
                $join->on('users.id', '=', 'latest_chats.from_user');
            })
            ->orderByDesc('latest_chats.latest_chat_time')
            ->select('users.*', 'latest_chats.latest_chat_time')
            ->get();

        // Check if users array is empty or if latest_chat_time is null for all users
        if ($users->isEmpty() || $users->every(function ($user) {
            return $user->latest_chat_time === null;
        })) {
            return response()->json(['error' => 'No chats found for the authenticated user'], 404);
        }

        return response()->json(['message' => 'Users list with chats retrieved successfully', 'users' => $users], 200);
    }
}


