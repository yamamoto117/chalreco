<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();
        $posts = $user->posts->sortByDesc('created_at');
        $inProgressCount = $user->posts->where('status', 'in_progress')->count();
        $inCompletedCount = $user->posts->where('status', 'completed')->count();

        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
            'inProgressCount' => $inProgressCount,
            'inCompletedCount' => $inCompletedCount,
        ]);
    }
}
