<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return View('pages.admin.akun.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.akun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'name'      => 'required',
        'email'     => 'required|email|unique:users',
        'role'      => 'required|in:admin,guru,petugas,siswa',
        'password'  => 'required|min:6'
    ]);

    User::create([
        'name'      => $request->name,
        'email'     => $request->email,
        'role'      => $request->role,
        'password'  => Hash::make($request->password)
    ]);

    return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('pages.admin.akun.edit', compact('users'));
    }

    /**
     * Update data user.
     */
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
    ]);

    if ($request->filled('password') || $request->filled('password_confirmation')) {
        
        $request->validate([
            'old_password'  => 'required',
            'password'      => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors([
                'old_password' => 'Password lama tidak sesuai!'
            ])->withInput();
        }

        $user->password = Hash::make($request->password);
    }
    $user->name  = $request->name;
    $user->email = $request->email;
    $user->save();

    return redirect()
        ->route('users.index')
        ->with('success', 'User berhasil diperbarui!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User berhasil dihapus!');
    }

        public function resetPassword(User $user)
    {
        $user->update([
            'password' => Hash::make('password123') // DEFAULT BARU
        ]);

        return back()->with('success', 'Password berhasil direset ke: password123');
    }

        public function toggleStatus(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();

        return back()->with('success', 'Status akun berhasil diperbarui!');
    }
}
