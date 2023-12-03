<?php

//LIVEWIRE COMPONENTS
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\FaqComponent;
use App\Http\Livewire\CommentsComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ProductDetailsComponent;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//ADMIN AND USER
// use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminProductsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;

//MESSENGER COMPONENT
use App\Http\Livewire\Messenger\MessagesComponent;

//CONTROLLER
use App\Models\Comment;
// use App\Http\Controllers\ProductDetailsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//LIVEWIRE COMPONENT
Route::get('/home', HomeComponent::class)->name('home')->middleware('disable_back')->middleware('auth');
Route::get('/shop', ShopComponent::class)->name('shop')->middleware('disable_back')->middleware('auth');
Route::get('/aboutus', AboutUsComponent::class)->name('aboutus')->middleware('disable_back')->middleware('auth');
Route::get('/product-details/{slug}', ProductDetailsComponent::class)->name('product.details')->middleware('disable_back')->middleware('auth');
Route::get('/cart', CartComponent::class)->name('shop.cart')->middleware('disable_back')->middleware('auth');
Route::get('/comments', CommentsComponent::class)->name('comments')->middleware('disable_back')->middleware('auth');
Route::get('/faq', FaqComponent::class)->name('faq')->middleware('disable_back')->middleware('auth');
Route::get('/blogs', BlogComponent::class)->name('blogs')->middleware('disable_back')->middleware('auth');
Route::get('/search', SearchComponent::class)->name('product.search')->middleware('disable_back')->middleware('auth');
Route::get('/contactus', ContactComponent::class)->name('contactus')->middleware('disable_back')->middleware('auth');
Route::get('/messenger', MessagesComponent::class)->name('messages')->middleware('disable_back')->middleware('auth');

//CONTROLLER
// Route::get('/product-details/{slug}', [ProductDetailsController::class, 'show'])->name('product.details')->middleware('disable_back')->middleware('auth');
// Route::post('/cart', [ProductDetailsController::class, 'addToCart'])->name('shop.cart')->middleware('disable_back')->middleware('auth');
// Route::get('/profile', function() {
//     return view('controller.ProfileController');
// });



Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/products', AdminProductsComponent::class)->name('admin.products');
    Route::get('/admin/add/category', AdminAddCategoryComponent::class)->name('admin.addcategory');
    // Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
