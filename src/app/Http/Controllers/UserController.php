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
        $goodsPosts = $user->goods->sortByDesc('created_at');
        $inProgressCount = $user->posts->where('status', 'in_progress')->count();
        $inCompletedCount = $user->posts->where('status', 'completed')->count();

        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
            'goodsPosts' => $goodsPosts,
            'inProgressCount' => $inProgressCount,
            'inCompletedCount' => $inCompletedCount,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();

        $followings = $user->followings->sortByDesc('created_at');

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();

        $followers = $user->followers->sortByDesc('created_at');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }

    public function edit(string $name)
    {
        return view('users.edit')
            ->with(['name' => $name]);
    }

    public function update(Request $request, string $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        $user->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('users.show', ['name' => $user->name]);
    }

    public function delete(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['User not found.']);
        }

        if ($user->id !== $request->user()->id) {
            return abort(403, 'Unauthorized action.');
        }

        $user->delete();

        return redirect('/');
    }
}
