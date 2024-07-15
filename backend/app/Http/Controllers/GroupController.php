<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\GroupMembers;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'members' => 'required|array',
            'members.*' => 'exists:users,id',
        ]);

        $group = Group::create(['name' => $validated['name']]);

        foreach ($validated['members'] as $userId) {
            GroupMembers::create([
                'group_id' => $group->id,
                'user_id' => $userId,
            ]);
        }

        return response()->json($group->load('members'), 201);
    }
}
