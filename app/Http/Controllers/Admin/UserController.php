<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => ['required', Rule::in(['admin', 'user'])],
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role' => ['required', Rule::in(['admin', 'user'])],
        ]);

        $user->update([
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
{
    $user = User::findOrFail($id);

    try {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    } catch (\Illuminate\Database\QueryException $e) {
        // Check if the error is a foreign key constraint violation
        if ($e->getCode() == '23000') {
            return redirect()->route('admin.users.index')->with('error', 'Cannot delete user because they have existing orders');
        }

        // Re-throw or handle other types of database exceptions
        return redirect()->route('admin.users.index')->with('error', 'An error occurred while deleting the user');
    }
}

}
