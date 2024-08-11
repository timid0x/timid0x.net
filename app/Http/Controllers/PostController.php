<?php
### TIMID0x - 2023-08-08T10:15:31.000-05:00

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use Carbon\Carbon;


class PostController extends Controller
{
    //

    public function showPosts()
    {

        //$posts_last = Post::latest()->first();

        $posts = Post::where('visibility', 1)->orderBy('id', 'DESC')->paginate(10);
        //dd( $posts_all);
        return view("blog.list-post", compact('posts'));
    }


    public function showCreatePost(Post $post)
    {
        if (auth()->user()->id !== 1) {
            return redirect('/');
        }


        return view('blog.create-post', compact('post'));
    }


    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'featured_image' => 'required',
            'body' => 'required',
            'visibility' => 'boolean' //this is the checkbox

        ]);

        //dd($incomingFields);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $now = Carbon::now()->format('Y-m-d');
        $incomingFields['slug'] =  $now . '-' . Str::slug($incomingFields['title']);
        $incomingFields['featured_image'] = strip_tags($incomingFields['featured_image']);
        $incomingFields['visibility'] = $request->boolean('visibility');
        $incomingFields['body'] = $incomingFields['body'];

        if ($request->boolean('visibility')) {
            $incomingFields['visibility'] = 1;
        } else {
            $incomingFields['visibility'] = 0;
        }
        $incomingFields['user_id'] = auth()->id();

        //dd($request->boolean('visibility'));

        Post::create($incomingFields);
        return redirect('/');
    }

    public function editPost(Post $post)
    {
        //dd($post);
        if (auth()->user()->id !== 1) {
            return redirect('/');
        }
        return view('blog.edit-post', ['post' => $post]);
    }


    public function updatePost(Post $post, Request $request)
    {
        //dd($post);
        if (auth()->user()->id !== 1) {
            return redirect('/');
        }
        $incomingFields = $request->validate([
            'title' => 'required',
            'featured_image' => 'required',
            'body' => 'required',
            'visibility' => 'boolean' //this is the checkbox

        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['featured_image'] = strip_tags($incomingFields['featured_image']);
        $incomingFields['body'] = $incomingFields['body'];

        //dd($request->boolean('visibility'));

        if ($request->boolean('visibility')) {
            $incomingFields['visibility'] = 1;
        } else {
            $incomingFields['visibility'] = 0;
        }

        //$incomingFields['user_id'] = auth()->id();
        $post->update($incomingFields);
        return redirect('/');
    }

    public function showPost($slug)
    {
        //dd($slug);
        $post = Post::where('slug', $slug)->where('visibility', 1)->first();
        //dd($post);
        
        //request input //ignore this part
        if ($post) {
            return view("blog.show-post",  compact('post'));
        } else {
            return redirect('/');
        }
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $incomingFields = $request->validate([
            'search' => 'required'
        ]);
        //dd($request);

        $search = strip_tags($request->input('search'));

        //dd($search);


        // Search in the title and body columns from the posts table

        $posts = Post::query()
        ->where('body', 'LIKE', "%{$search}%")   
        ->where('visibility', '=', 1)
        ->get();


        // Return the search view with the resluts compacted
        return view('blog.search', compact('posts'));
    }
}
