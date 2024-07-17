<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Requests\ChatRequest;
use App\Http\Resources\ChatResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chat = Chat::all();
        $chat = ChatResource::collection($chat);
        return response(['success' => true, 'data' => $chat], 200);
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
    
            $description = $request->input('description');
            $video = $request->input('video');
    
            if (is_null($description) && is_null($imagePath) && is_null($video)) {
                return response()->json(['error' => 'Cannot create chat without content'], 400);
            }
    
            $chat = Chat::create([
                'from_user' => $from_user,
                'to_user' => $to_user,
                'description' => $description,
                'image' => $imagePath,
                'video' => $video,
                'active' =>false,
                
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
    public function getUsersExceptMe(Request $request)
    {

        $currentUserId = $request->user()->id;

        $users = User::where('id', '!=', $currentUserId)->get();

        return response()->json($users);
    }


    public function getUsersFrom()
    {
        // Get the authenticated user
        $user = Auth::user();
        Log::info('Authenticated user:', ['user' => $user]);

        if (!$user) {
            Log::warning('Unauthorized access attempt');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userId = $user->id;
        Log::info('Authenticated user ID:', ['userId' => $userId]);


        $chats = Chat::where('to_user', $userId)
            ->orWhere('from_user', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
        Log::info('Retrieved chats:', ['chats' => $chats]);



        return response()->json([
            'message' => 'list of chats',
            'data' => ChatResource::collection($chats)
        ]);
    }

    public function getUserChatToMe()
    {
        $user = Auth::user();

        if (!$user) {
            Log::warning('Unauthorized access attempt');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userId = $user->id;

        // Get the latest chat entries where the current user is the recipient (to_user) and count messages
        $latestChats = Chat::select('from_user', 'to_user', 'description', 'image', 'video', 'created_at', DB::raw('COUNT(id) as message_count'))
            ->where('to_user', $userId)
            ->groupBy('from_user', 'to_user', 'description', 'image', 'video', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('from_user');

        // Get unique sender IDs
        $senderIds = $latestChats->pluck('from_user')->toArray();

        // Retrieve users who sent the latest chat to the current user
        $users = User::whereIn('id', $senderIds)
            ->select('id', 'name', 'email', 'address', 'profile', 'gender')
            ->get();

        // Map users with their latest chat details
        $usersWithChats = $users->map(function ($user) use ($latestChats) {
            // Get the latest chat details from the group
            $latestChat = $latestChats->firstWhere('from_user', $user->id);

            $latestChatDetails = [
                'from_user' => $latestChat->from_user,
                'to_user' => $latestChat->to_user,
                'description' => $latestChat->description,
                'image' => $latestChat->image,
                'video' => $latestChat->video,
                'message_count' => $latestChat->message_count,
                'created_at' => [
                    'date' => Carbon::parse($latestChat->created_at)->format('d-m-Y'),
                    'time' => Carbon::parse($latestChat->created_at)->format('H:i'),
                ],
            ];

            return [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'address' => $user->address,
                    'profile' => $user->profile,
                    'gender' => $user->gender,
                ],
                'latest_chat' => $latestChatDetails,
            ];
        });

        // Order users by the time of their latest chat to the current user
        $usersWithChats = $usersWithChats->sortByDesc(function ($userWithChat) {
            return Carbon::parse($userWithChat['latest_chat']['created_at']['date'] . ' ' . $userWithChat['latest_chat']['created_at']['time']);
        });

        return response()->json(['success' => true, 'data' => $usersWithChats->values()->all()], 200);
    }

    public function listChat()
    {
        $user = Auth::user();

        if (!$user) {
            Log::warning('Unauthorized access attempt');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userId = $user->id;

        // Get all chat entries involving the current user (either from_user or to_user)
        $allChats = Chat::where('from_user', $userId)
            ->orWhere('to_user', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        // Group chats by the other user (not the current user)
        $groupedChats = $allChats->groupBy(function ($chat) use ($userId) {
            return $chat->from_user == $userId ? $chat->to_user : $chat->from_user;
        });

        // Get users involved in chats with the current user
        $userIds = $groupedChats->keys()->toArray();
        $users = DB::table('users')
            ->join('chats', function ($join) use ($userId) {
                $join->on('users.id', '=', 'chats.from_user')
                    ->orOn('users.id', '=', 'chats.to_user');
            })
            ->select('users.id', 'users.name', 'users.email', 'users.address', 'users.profile', 'users.gender','address','phoneNumber','dateOfBirth',DB::raw('MAX(chats.created_at) as latest_chat_time'))
            ->whereIn('users.id', $userIds)
            ->groupBy('users.id', 'users.name', 'users.email', 'users.address', 'users.profile', 'users.gender','address','phoneNumber','dateOfBirth')
            ->orderByDesc('latest_chat_time')
            ->get();

        // Map users with their chat details
        $usersWithChats = $users->map(function ($user) use ($groupedChats, $userId) {
            // Chats involving this user
            $userChats = $groupedChats[$user->id] ?? collect();

            // Latest chat details
            $latestChat = $userChats->first();
            $latestChatDetails = $latestChat ? [
                'from_user' => $latestChat->from_user,
                'to_user' => $latestChat->to_user,
                'description' => $latestChat->description,
                'image' => $latestChat->image,
                'video' => $latestChat->video,
                'created_at' => [
                    'date' => Carbon::parse($latestChat->created_at)->format('d-m-Y'),
                    'time' => Carbon::parse($latestChat->created_at)->format('H:i'),
                ],
            ] : null;

            // Sort all chat details by created_at in ascending order
            $allChatDetails = $userChats->sortBy('created_at')->map(function ($chat) {
                return [
                    'from_user' => $chat->from_user,
                    'to_user' => $chat->to_user,
                    'description' => $chat->description,
                    'image' => $chat->image,
                    'video' => $chat->video,
                    'created_at' => [
                        'date' => Carbon::parse($chat->created_at)->format('d-m-Y'),
                        'time' => Carbon::parse($chat->created_at)->format('H:i'),
                    ],
                ];
            });

            return [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'address' => $user->address,
                    'profile' => $user->profile,
                    'gender' => $user->gender,
                    'address' => $user->address,
                    'phoneNumber' => $user->phoneNumber,
                    'dateOfBirth' => $user->dateOfBirth,
                ],
                'latest_chat' => $latestChatDetails,
                'all_chats' => $allChatDetails->values()->all(), // Convert to array for JSON response
            ];
        });

        return response()->json(['success' => true, 'data' => $usersWithChats->values()->all()], 200);
    }
}
