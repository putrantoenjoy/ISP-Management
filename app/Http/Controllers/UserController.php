<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = User::query();

        $currentUser = auth()->user();
        if (
            $currentUser->role === 'admin' &&
            $currentUser->name !== 'Administrator'
        ) {
            $query->where(function ($q) use ($currentUser) {
                $q->where('role', 'staff')
                ->orWhere('id', $currentUser->id);
            });
        }
        if ($request->sort && $request->direction) {
            $query->orderBy($request->sort, $request->direction);
        } else {
            $query->latest();
        }
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }
        $users = $query->paginate(10)->withQueryString();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // administrator tidak boleh dihapus
        if ($user->role === 'admin' && $user->id === auth()->user()->id) {
            abort(403, 'Tidak boleh dihapus');
        }
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus');
    }
}
