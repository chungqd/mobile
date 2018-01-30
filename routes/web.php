<?php

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

use Illuminate\Support\Facades\Route;
//use Symfony\Component\Routing\Route;

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

// login
Route::get('signin', ['as' => 'signin', 'uses' => 'HomeController@getLogin']);
Route::post('signin', ['as' => 'signin', 'uses' => 'HomeController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);

// register
Route::get('register', ['as' => 'register', 'uses' => 'HomeController@getRegister']);
Route::post('register', ['as' => 'register', 'uses' => 'HomeController@postRegister']);

Route::get('active/{id}/{authenKey}', 'HomeController@active');

// xac minh email mua hang
Route::get('xacminh/{id}', 'HomeController@xacminh');

//tin tuc
Route::get('tintuc', ['as' => 'tintuc', 'uses' => 'HomeController@news']);
Route::get('detailNews/{id}/{TenKhongDau}.html', 'HomeController@detailNews');

Route::get('detail/{id}', ['as' => 'detail', 'uses' => 'HomeController@detailProduct']);

// compare products
Route::get('compare', ['as' => 'compare', 'uses' => 'HomeController@getIdCompare']);
Route::get('compareprd/{idProduct}/{idCompare}', ['as' => 'compareprd', 'uses' => 'HomeController@compareProducts']);


Route::get('brand/{id}', ['as' => 'brand', 'uses' => 'HomeController@brandProduct']);

Route::get('price/{id}', ['as' => 'price', 'uses' => 'HomeController@price']);

Route::get('search', ['as' => 'search', 'uses' => 'HomeController@search']);

// Cart
Route::get('addcart/{id}', ['as' => 'addcart', 'uses' => 'HomeController@addCart']);
Route::post('addCartDetail/{id}', ['as' => 'addCartDetail', 'uses' => 'HomeController@addCartDetail']);

Route::get('gio-hang', ['as' => 'gio-hang', 'uses' => 'HomeController@gioHang']);

Route::get('xoa-san-pham/{id}', ['as' => 'xoa-san-pham', 'uses' => 'HomeController@delSp']);
Route::get('destroyCart', function(){
    Cart::destroy();
    return redirect()->route('gio-hang');
})->name('destroyCart');

Route::post('capnhap/{id}', ['as' => 'capnhap', 'uses' => 'HomeController@updateSp']);

Route::get('order', ['as' => 'order', 'uses' => 'HomeController@getOrder']);
Route::post('order', ['as' => 'order', 'uses' => 'HomeController@postOrder']);
// end cart

// ADMIN
Route::get('admin/login', "UserController@getLogin")->name('login');
    Route::post('admin/login', "UserController@postLogin");
Route::group(['prefix' => 'admin','middleware' => 'checklogin'], function() {

    
    Route::get('logout', "UserController@logout");
	Route::get('home', function(){
        return view('admin.home');
    });

    // Thong ke, bao cao
    Route::group(['prefix' => 'statistical'], function() {
        Route::get('products', ['as' => 'statistical.products', 'uses' => 'ReportController@statisProduct']);
        Route::post('products', ['as' => 'postStatisticalProduct', 'uses' => 'ReportController@postStatisticalProduct']);

        Route::get('profit', ['as' => 'statistical.profit', 'uses' => 'ReportController@statisProfit']);
        Route::post('profit', ['as' => 'statistical.postProfit', 'uses' => 'ReportController@postStatisProfit']);
    });

    // Phieu nhap
    Route::group(['prefix' => 'phieunhap'], function() {
        Route::get('list', 'PhieuNhapController@index')->name('ds_phieunhap');
        // add
        Route::get('add', 'PhieuNhapController@getAdd');
        Route::post('add', 'PhieuNhapController@postAdd');
        // edit
        Route::get('edit/{id}', 'PhieuNhapController@getEdit');
        Route::post('edit/{id}', 'PhieuNhapController@postEdit');
        // delete
        Route::get('delete/{id}', 'PhieuNhapController@delete');
        Route::get('search/{keyword}', 'PhieuNhapController@search');
    });
    // end phieu nhap
    
    // chi tiet phieu nhap
    Route::group(['prefix' => 'ctphieunhap'], function() {
        Route::get('list', 'CTPhieuNhapController@index')->name('ds_phieunhap');
        // add
        Route::get('add', 'CTPhieuNhapController@getAdd');
        Route::post('add', 'CTPhieuNhapController@postAdd');

        Route::get('getTenPhieu', 'CTPhieuNhapController@getTenPhieu');
        Route::get('getTenSP', 'CTPhieuNhapController@getTenSP');
        // edit
        Route::get('edit/{idphieu}/{idproduct}', 'CTPhieuNhapController@getEdit');
        Route::post('edit/{idphieu}/{idproduct}', 'CTPhieuNhapController@postEdit');
        // delete
        Route::get('delete/{idphieu}/{idproduct}', 'CTPhieuNhapController@delete');
        Route::get('search/{keyword}', 'CTPhieuNhapController@search');
    });

    // User
    Route::group(['prefix' => 'user'], function() {
        Route::get('list', 'UserController@index')->name('ds_user');
        // add
        Route::get('add', 'UserController@getAdd');
        Route::post('add', 'UserController@postAdd');
        // edit
        Route::get('edit/{id}', 'UserController@getEdit');
        Route::post('edit/{id}', 'UserController@postEdit');
        // delete
        Route::get('delete/{id}', 'UserController@delete');
        Route::get('search/{keyword}', 'UserController@search');
    });

    // Brand
    Route::group(['prefix' => 'brand'], function() {
        Route::get('list', 'BrandsController@index')->name('ds.brand');
        // add
        Route::get('add', 'BrandsController@getAdd');
        Route::post('add', 'BrandsController@postAdd');
        // edit
        Route::get('edit/{id}', 'BrandsController@getEdit');
        Route::post('edit/{id}', 'BrandsController@postEdit');
        // delete
        Route::get('delete/{id}', 'BrandsController@delete');
        Route::get('search/{keyword}', 'BrandsController@search');
    });

    // POST
    Route::group(['prefix' => 'post'], function () {
        Route::get('list', 'PostController@index')->name('ds.post');

        // add
        Route::get('add', 'PostController@getAdd');
        Route::post('add', 'PostController@postAdd');

        // edit
        Route::get('edit/{id}', 'PostController@getEdit');
        Route::post('edit/{id}', 'PostController@postEdit');

        // delete
        Route::get('delete/{id}', 'PostController@delete');
        Route::get('search/{keyword}', 'PostController@search');
    });

    //Order
    Route::group(['prefix' => 'order'], function () {
        Route::get('list', 'OrderController@index')->name('ds.order');

        // add
        Route::get('add', 'OrderController@getAdd');
        Route::post('add', 'OrderController@postAdd');

        // edit
        Route::get('edit/{id}', 'OrderController@getEdit');
        Route::post('edit/{id}', 'OrderController@postEdit');

        // delete
        Route::get('delete/{id}', 'OrderController@delete');
        Route::get('search/{keyword}', 'OrderController@search');

        // xem hoa don
        Route::get('detail/{id}', 'OrderController@detailOrder');
    });

    // PRODUCT
    Route::group(['prefix' => 'product'], function () {
        Route::get('list', 'ProductController@index')->name('ds.product');

        // add
        Route::get('add', 'ProductController@getAdd');
        Route::post('add', 'ProductController@postAdd');

        // edit
        Route::get('edit/{id}', 'ProductController@getEdit');
        Route::post('edit/{id}', 'ProductController@postEdit');

        // delete
        Route::get('delete/{id}', 'ProductController@delete');
        Route::get('search/{keyword}', 'ProductController@search');

        Route::get('delImg/{path}', ['as' => 'admin.product.getDelImg', 'uses' => 'ProductController@getDelImg']);
    });
});

// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
