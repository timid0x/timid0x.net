<?php
### TIMID0x - 2023-08-07T09:33:26.000-05:00

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class SitemapXmlController extends Controller
{
  public function index()
  {

    $posts = Post::latest()->get();
    return response()->view('sitemap', compact('posts'))->header('Content-Type', 'text/xml');
  }
}
