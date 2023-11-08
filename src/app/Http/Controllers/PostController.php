<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        $user = Auth::user();

        $followingPosts = collect();

        if ($user) {
            $followingIds = $user->followings->pluck('id')->toArray();

            $followingIds[] = $user->id;

            $followingPosts = Post::withCount('goods')
                ->whereIn('user_id', $followingIds)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        $posts = Post::withCount('goods')
            ->orderBy('goods_count', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('index')
            ->with([
                'posts' => $posts,
                'followingPosts' => $followingPosts
            ]);
    }

    public function show(Post $post)
    {
        return view('posts.show')
            ->with(['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request, Post $post)
    {
        $post->fill($request->all());
        $post->user_id = $request->user()->id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 's3');
            $post->image = Storage::disk('s3')->url($path);
        }

        $post->save();

        return redirect()
            ->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->status = $request->status;
        $post->title = $request->title;
        $post->body = $request->body;

        if ($request->hasFile('image')) {
            if ($post->image) {
                $oldImagePath = parse_url($post->image, PHP_URL_PATH);
                $oldImagePath = ltrim($oldImagePath, '/');
                Storage::disk('s3')->delete($oldImagePath);
            }
            $path = $request->file('image')->store('images', 's3');
            $post->image = Storage::disk('s3')->url($path);
        }

        if ($request->filled('delete_image') && $post->image) {
            $oldImagePath = parse_url($post->image, PHP_URL_PATH);
            $oldImagePath = ltrim($oldImagePath, '/');
            Storage::disk('s3')->delete($oldImagePath);
            $post->image = null;
        }

        $post->save();

        return redirect()
            ->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts.index');
    }

    public function good(Request $request, Post $post)
    {
        $post->goods()->detach($request->user()->id);
        $post->goods()->attach($request->user()->id);

        return [
            'id' => $post->id,
            'countGoods' => $post->count_goods,
        ];
    }

    public function ungood(Request $request, Post $post)
    {
        $post->goods()->detach($request->user()->id);

        return [
            'id' => $post->id,
            'countGoods' => $post->count_goods,
        ];
    }
}
