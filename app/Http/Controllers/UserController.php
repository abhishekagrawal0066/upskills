<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function assignRole(Request $request, $userId)
    {
        // Assuming you have $userId passed from somewhere (e.g., route or request)
        $user = User::find($userId);

        if (!$user) {
            abort(404, 'User not found');
        }

        $role = Role::where('name', 'admin')->first(); // Get the admin role

        if (!$role) {
            abort(404, 'Role not found');
        }

        $user->role()->associate($role);
        $user->save();

        return redirect()->back()->with('success', 'Role assigned successfully');
    }
}