<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminAdvertisementController;

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

/* front end*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/news-detail/{id}', [PostController::class,'detail'])->name('news_detail');


/*Admin*/
Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin_home')->middleware('admin:admin');

Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');

Route::post('/admin/login-submit',[AdminLoginController::class,'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');

Route::get('/admin/forget-password',[AdminLoginController::class,'forget_password'])->name('admin_forget_password');

Route::post('/admin/forget-password-submit',[AdminLoginController::class,'forget_password_submit'])->name('admin_forget_password_submit');

Route::get('/admin/reset-password/{token}/{email}',[AdminLoginController::class,'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

Route::get('/admin/edit-profile',[AdminProfileController::class,'index'])->name('admin_profile')->middleware('admin:admin');

Route::post('/admin/edit-profile-submit', [AdminProfileController::class,'profile_submit'])->name('admin_profile_submit');


Route::get('/admin/home-advertisement', [AdminAdvertisementController::class, 'home_ad_show'])->name('admin_home_ad_show')->middleware('admin:admin');

Route::post('/admin/home-advertisement-update',[AdminAdvertisementController::class,'home_ad_update'])->name('admin_home_ad_update');

//top ad
Route::get('/admin/top-advertisement', [AdminAdvertisementController::class, 'top_ad_show'])->name('admin_top_ad_show')->middleware('admin:admin');
Route::post('/admin/top-advertisement-update', [AdminAdvertisementController::class,'top_ad_update'])->name('admin_top_ad_update');

Route::get('/admin/sidebar-advertisement-view',[AdminAdvertisementController::class,'sidebar_ad_show'])->name('admin_sidebar_ad_show')->middleware('admin:admin');

Route::get('/admin/sidebar-advertisement-create', [AdminAdvertisementController::class,'sidebar_ad_create'])->name('admin_sidebar_ad_create')->middleware('admin:admin');

Route::post('/admin/sidebar-advertisement-store',[AdminAdvertisementController::class,'sidebar_ad_store'])->name('admin_sidebar_ad_store');

Route::get('/admin/sidebar-advertisement-edit/{id}',[AdminAdvertisementController::class,'sidebar_ad_edit'])->name('admin_sidebar_ad_edit')->middleware('admin:admin');

Route::post('/admin/sidebar-advertisement-update/{id}',[AdminAdvertisementController::class,'sidebar_ad_update'])->name('admin_sidebar_ad_update');

Route::get('/admin/sidebar-advertisement-delete/{id}',[AdminAdvertisementController::class,'sidebar_ad_delete'])->name('admin_sidebar_ad_delete')->middleware('admin:admin');

//category
Route::get('/admin/category/show',[AdminCategoryController::class, 'show'])->name('admin_category_show')->middleware('admin:admin');

Route::get('/admin/category/create',[AdminCategoryController::class, 'create'])->name('admin_category_create')->middleware('admin:admin');
Route::post('/admin/category/store',[AdminCategoryController::class, 'store'])->name('admin_category_store');

Route::get('/admin/category/edit/{id}',[AdminCategoryController::class,'edit'])->name('admin_category_edit')->middleware('admin:admin');
Route::post('/admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin_category_update');

Route::get('/admin/category/delete/{id}',[AdminCategoryController::class, 'delete'])->name('admin_category_delete')->middleware('admin:admin');

//sub-category
Route::get('/admin/sub-category/show',[AdminSubCategoryController::class, 'show'])->name('admin_sub_category_show')->middleware('admin:admin');
Route::get('/admin/sub-category/create',[AdminSubCategoryController::class, 'create'])->name('admin_sub_category_create')->middleware('admin:admin');
Route::get('/admin/sub-category/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('admin_sub_category_edit')->middleware('admin:admin');
Route::get('/admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin_sub_category_delete')->middleware('admin:admin');

Route::post('/admin/sub-category/store', [AdminSubCategoryController::class, 'store'])->name('admin_sub_category_store');
Route::post('/admin/sub-category/update/{id}',[AdminSubCategoryController::class, 'update'])->name('admin_sub_category_update')->middleware('admin:admin');

//post

Route::get('/admin/post/show',[AdminPostController::class, 'show'])->name('admin_post_show')->middleware('admin:admin');

Route::get('/admin/post/create',[AdminPostController::class, 'create'])->name('admin_post_create')->middleware('admin:admin');
Route::post('/admin/post/store',[AdminPostController::class, 'store'])->name('admin_post_store');

Route::get('/admin/post/edit/{id}',[AdminPostController::class,'edit'])->name('admin_post_edit')->middleware('admin:admin');
Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');

Route::get('/admin/post/delete/{id}',[AdminPostController::class, 'delete'])->name('admin_post_delete')->middleware('admin:admin');

Route::get('/admin/post/tag/delete/{id}/{id1}',[AdminPostController::class,'delete_tag'])->name('admin_post_delete_tag')->middleware('admin:admin');

Route::get('/admin/setting',[AdminSettingController::class,'index'])->name('admin_setting')->middleware('admin:admin');

Route::post('/admin/setting/update',[AdminSettingController::class, 'update'])->name('admin_setting_update');

