<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $postsQuery = Post::query();
        $usersQuery = User::query();

        if (empty($keyword)) {
            return view('search.index', ['posts' => collect(), 'users' => collect(), 'keyword' => '']);
        }

        $postsQuery->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('body', 'LIKE', "%{$keyword}%");

        $usersQuery->where('name', 'LIKE', "%{$keyword}%");

        $posts = $postsQuery->get();
        $users = $usersQuery->get();

        return view('search.index', compact('posts', 'users', 'keyword'));
    }
}
