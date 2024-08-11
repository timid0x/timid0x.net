<?php
### TIMID0x - 2023-11-18T14:04:32.000-05:00

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MedalController;
use App\Http\Controllers\MedalTypeController;
use App\Http\Controllers\ChartJsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\SitemapXmlController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\CheckoutController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {

    $medals = [];
    if (auth()->check()) {
        // $medals = auth()->user()->usersMedals()->latest()->get();
        $medals = auth()->user()->name;       	
    }
    return view('home', ['medals' => $medals]);
});


//Language
Route::get('locale/{locale}', function($locale){   
    Session::put('locale', $locale);
    return Redirect::back();
    
});

Route::get('/register2', [UserController::class, 'showRegister2'])->name('user.getregister');
Route::post('/register2', [UserController::class, 'register2'])->name('user.postregister');
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/tl50data', [UserController::class, 'showLogin'])->name('tl50data');
Route::post('/tl50data', [UserController::class, 'login'])->middleware("throttle:10,5");

//Reset Recover Password
Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('forgot-password');
Route::get('/forgot-password/{token}', [UserController::class, 'forgotPasswordValidate']);
Route::post('/forgot-password', [UserController::class, 'resetPassword'])->middleware("throttle:10,5");
Route::put('/reset-password', [UserController::class, 'updatePassword'])->name('reset-password');
Route::get('/privacy', [UserController::class, 'showPrivacy'])->name('privacy');

//Countries related routes
Route::get('form', [CountryController::class, 'index']);

//Medal related routes
Route::get('/medal', [MedalController::class, 'showMedal'])->name('medal.show')->middleware('auth');
Route::get('/create-medal', [MedalController::class, 'showCreateMedal'])->name('medal.getcreate')->middleware('auth');
Route::post('/create-medal', [MedalController::class, 'createMedal'])->name('medal.postcreate')->middleware('auth');
// Route::get('/edit-medal/{medal}',[MedalController::class, 'showEditMedal']);
// Route::put('/edit-medal/{medal}',[MedalController::class, 'actualEditMedal']);
Route::delete('/delete-medal/{medal}', [MedalController::class, 'deleteMedal'])->name('medal.deletemedal')->middleware('auth');

//MedalTypes related routes
Route::get('/medaltype', [MedalTypeController::class, 'showMedalType'])->name('medaltype.show')->middleware('auth');
Route::get('/create-medaltype', [MedalTypeController::class, 'showCreateMedalType'])->name('medaltype.getcreate')->middleware('auth');
Route::post('/create-medaltype', [MedalTypeController::class, 'createMedalType'])->name('medaltype.postcreate')->middleware('auth');
// Route::get('/edit-medaltype/{medaltype}',[MedalTypeController::class, 'showEditMedalType']);
// Route::put('/edit-medaltype/{medaltype}',[MedalTypeController::class, 'actualEditMedalType']);
Route::delete('/delete-medaltype/{medaltype}', [MedalTypeController::class, 'deleteMedalType'])->name('medaltype.deletemedaltype')->middleware('auth');

//ChartJS DataTables - Main - Leaderboard  - related routes
Route::get('/main', [ChartJsController::class, 'showMain'])->name('main')->middleware('auth');
Route::get('/leaderboard', [ChartJsController::class, 'showLeaderboard'])->name('leaderboard')->middleware('auth');

//Blog
Route::get('/blog', [PostController::class, 'showPosts'])->name('show.posts');
Route::get('/blog/{slug}', [PostController::class, 'showPost'])->name('show.post');
Route::get('/create-post', [PostController::class, 'showCreatePost'])->name('post.getcreate')->middleware('auth');
Route::post('/create-post', [PostController::class, 'createPost'])->name('post.postcreate')->middleware('auth');
Route::get('/edit-post/{post}', [PostController::class, 'editPost'])->name('post.getedit')->middleware('auth');
Route::put('/edit-post/{post}', [PostController::class, 'updatePost'])->name('post.updatePost')->middleware('auth');
Route::get('/search', [PostController::class, 'search'])->name('post.search');

//Friendcodes
Route::get('/friendcode', [FriendController::class, 'showCodes'])->name('show.friendcodes');
Route::post('/friendcode', [FriendController::class, 'createCodes'])->name('create.friendcodes')->middleware("throttle:10,10");

//Shop
Route::get('/shop', [ShopController::class, 'index'])->name('show.shop');
//Sitemap
Route::get('/sitemap.xml', [SitemapXmlController::class, 'index']);

//Tienda
Route::get('families/{family}', [FamilyController::class, 'show'])->name('families.show');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('subcategories/{subcategory}', [SubcategoryController::class, 'show'])->name('subcategories.show');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

//Shipping
Route::get('shipping', [ShippingController::class, 'index'])->name('shipping.index');

//Carrito
Route::get('cart', [CartController::class, 'index'])->name('cart.index');

//Checkout
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('checkout/paid', [CheckoutController::class, 'paid'])->name('checkout.paid');
Route::get('gracias', function () {
    return view('gracias'); 
})->name('gracias');  

//OrderAdmin
Route::get('orders', [OrderController::class,'index'])->name('admin.orders.index');

//UsersAdmin
Route::get('users', [UserController::class,'admin'])->name('admin.users.show');

//ProductImages
Route::get('products/{productId}/upload', [ProductController::class,'index']);
Route::post('products/{productId}/upload', [ProductController::class,'store']);
Route::get('product-image/{productImageId}/delete', [ProductController::class,'destroy']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
