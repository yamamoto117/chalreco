<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $user = User::where('name', $name)->first();
        return view('users.edit', compact('user', 'name'));
    }

    public function update(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        $user->name = $request->name;
        $user->bio = $request->bio;

        if ($request->input('delete_header_image') === 'true') {
            $oldHeaderImagePath = parse_url($user->header_image, PHP_URL_PATH);
            $oldHeaderImagePath = ltrim($oldHeaderImagePath, '/');
            Storage::disk('s3')->delete($oldHeaderImagePath);
            $user->header_image = null;
        }

        if ($request->hasFile('header_image')) {
            if ($user->header_image) {
                $oldHeaderImagePath = parse_url($user->header_image, PHP_URL_PATH);
                $oldHeaderImagePath = ltrim($oldHeaderImagePath, '/');
                Storage::disk('s3')->delete($oldHeaderImagePath);
            }
            $headerPath = $request->file('header_image')->store('header_images', 's3');
            $user->header_image = Storage::disk('s3')->url($headerPath);
        }

        if ($request->input('delete_profile_image') === 'true') {
            $oldImagePath = parse_url($user->profile_image, PHP_URL_PATH);
            $oldImagePath = ltrim($oldImagePath, '/');
            Storage::disk('s3')->delete($oldImagePath);
            $user->profile_image = null;
        }

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                $oldImagePath = parse_url($user->profile_image, PHP_URL_PATH);
                $oldImagePath = ltrim($oldImagePath, '/');
                Storage::disk('s3')->delete($oldImagePath);
            }
            $path = $request->file('profile_image')->store('profile_images', 's3');
            $user->profile_image = Storage::disk('s3')->url($path);
        }

        $user->save();

        return redirect()
            ->route('users.show', ['name' => $user->name]);
    }

    public function destroy(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['User not found.']);
        }

        if ($user->id !== $request->user()->id) {
            return abort(403, 'Unauthorized action.');
        }

        if ($user->header_image) {
            $headerImagePath = parse_url($user->header_image, PHP_URL_PATH);
            $headerImagePath = ltrim($headerImagePath, '/');
            Storage::disk('s3')->delete($headerImagePath);
        }

        if ($user->profile_image) {
            $profileImagePath = parse_url($user->profile_image, PHP_URL_PATH);
            $profileImagePath = ltrim($profileImagePath, '/');
            Storage::disk('s3')->delete($profileImagePath);
        }

        foreach ($user->posts as $post) {
            if ($post->image) {
                $postImagePath = parse_url($post->image, PHP_URL_PATH);
                $postImagePath = ltrim($postImagePath, '/');
                Storage::disk('s3')->delete($postImagePath);
            }
        }

        $user->delete();

        return redirect('/');
    }
}
