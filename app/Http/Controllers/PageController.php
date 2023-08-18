<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(){
        $posts = Post::where('featured', false)
                    ->with('user', 'categories')
                    ->get();
        $featured = Post::featured()->take(3)->get();
        // dd($featured);
        return view('front.index', [
            'posts' => $posts,
            'featured' => $featured
        ]);
    }

    public function posts(){
        $posts = Post::all();
        return view('back.posts.index', compact('posts'));    }
    
    public function showPost(Post $post){
        $post = $post->load('user','categories', 'comments', 'comments.replies');
        return view('front.posts.show', compact('post'));
    }

    public function showCategory(Category $category){
        $posts = $category->posts()->get();
        return view('front.categories.show', compact('category', 'posts'));
    }

    public function laporan()
    {
        $posts = Post::all(); // Replace this with your actual query to fetch posts

        $pdf = PDF::loadView('front.posts.pdf', compact('posts'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('laporan.pdf');    
    }

    public function addComment(Request $request)
    {
        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment
        ]);
        return back();
    }

    public function addReply(Request $request)
    {
        Reply::create([
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id,
            'reply' => $request->reply
        ]);
        return back();
    }

    public function addLike(Request $request)
    {
        $post = Post::find($request->post_id);
    
        // Check if the user has already liked the post
        $existingLike = Like::where([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
        ])->first();
    
        if ($existingLike) {
            // Unlike the post
            $existingLike->delete();
            $post->update([
                'likes' => $post->likes - 1
            ]);
        } else {
            // Like the post
            Like::create([
                'post_id' => $request->post_id,
                'user_id' => $request->user_id,
                'like' => 1
            ]);
            $post->update([
                'likes' => $post->likes + 1
            ]);
        }
    
        // Retrieve the updated liked status for the current user
        $userLiked = !!$post->likes()->where('user_id', auth()->user()->id)->count();
    
        return response()->json(['likes' => $post->likes, 'userLiked' => $userLiked]);
    }
    
    
}
