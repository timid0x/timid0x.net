<?php
### TIMID0x - 2023-08-07T09:33:26.000-05:00

namespace App\Http\Controllers;

use App\Models\Cover;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
  public function index()
  {
    $covers = Cover::where('is_active', true)
      ->wheredate('start_at', '<=', now())
      ->where(function ($query) {
        $query
          ->whereNull('end_at')
          ->orWhereDate('end_at', '>=', now());
      })    
      ->get();
    
      $lastProducts = Product::orderBy('created_at', 'desc')
      ->take(12)
      ->get();

    return view('shop.store', compact('covers', 'lastProducts'));
  }
}
