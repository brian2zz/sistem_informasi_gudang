<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\customer_controller;
use App\Http\Controllers\filter_controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\kategori_produk_controller;
use App\Http\Controllers\laporan_controller;
use App\Http\Controllers\penerimaan_controller;
use App\Http\Controllers\permintaan_controller;
use App\Http\Controllers\produk_controller;
use App\Http\Controllers\produk_keluar_controller;
use App\Http\Controllers\produk_masuk_controller;
use App\Http\Controllers\RecordServiceCustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\sistem_customer_controller;
use App\Http\Controllers\supplier_controller;
use App\Http\Controllers\suratJalan_controller;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\warehouse_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard',[HomeController::class, 'home'])->name('dashboard');

	// produk
	Route::get('produk', [produk_controller::class,'produk'])->name('produk');
	Route::get('get-produk', [produk_controller::class,'get_produk'])->name('get_produk');
	Route::post('produk/tambah-produk', [produk_controller::class,'tambah_produk'])->name('tambah-produk');
	Route::post('produk/edit-produk', [produk_controller::class,'edit_produk'])->name('edit-produk');
	Route::get('detail-produk/{id}', [produk_controller::class,'detail_produk'])->name('detail-produk');
	Route::post('produk/import', [produk_controller::class,'importExcel'])->name('importExcel');
	Route::get('produk/delete-produk/{id}', [produk_controller::class,'delete_produk'])->name('delete-produk');

	//kategori produk
	Route::get('kategori', [kategori_produk_controller::class,'kategori_produk'])->name('kategori_produk');
	Route::get('get-kategori', [kategori_produk_controller::class,'get_kategori'])->name('get_produk');
	Route::post('kategori/tambah-kategori-produk', [kategori_produk_controller::class,'tambah_kategori_produk'])->name('tambah-kategori-produk');
	Route::post('kategori/edit-kategori-produk', [kategori_produk_controller::class,'edit_kategori_produk'])->name('edit-kategori-produk');
	Route::get('kategori/delete-kategori/{id}', [kategori_produk_controller::class,'delete_kategori_produk'])->name('delete-kategori-produk');

	//warehouse
	Route::get('warehouse', [warehouse_controller::class,'warehouse'])->name('warehouse');
	Route::post('warehouse/tambah-warehouse', [warehouse_controller::class,'tambah_warehouse'])->name('tambah-warehouse');
	Route::post('warehouse/edit-warehouse', [warehouse_controller::class,'edit_warehouse'])->name('edit-warehouse');
	Route::get('warehouse/delete-warehouse/{id}', [warehouse_controller::class,'delete_warehouse'])->name('delete-warehouse');

	//supplier
	Route::get('supplier', [supplier_controller::class,'supplier'])->name('supplier');
	Route::post('supplier/tambah-supplier', [supplier_controller::class,'tambah_supplier'])->name('tambah-supplier');
	Route::post('supplier/edit-supplier', [supplier_controller::class,'edit_supplier'])->name('edit-supplier');
	Route::get('supplier/delete-supplier/{id}', [supplier_controller::class,'delete_supplier'])->name('delete-supplier');

	//customer
	Route::get('customer', [customer_controller::class,'customer'])->name('customer');
	Route::post('customer/tambah-customer', [customer_controller::class,'tambah_customer'])->name('tambah-customer');
	Route::post('customer/edit-customer', [customer_controller::class,'edit_customer'])->name('edit-customer');
	Route::get('customer/delete-customer/{id}', [customer_controller::class,'delete_customer'])->name('delete-customer');

	//user
	Route::get('user', [user_controller::class,'user'])->name('user');
	Route::post('user/tambah-user', [user_controller::class,'tambah_user'])->name('tambah-user');
	Route::post('user/edit-user', [user_controller::class,'edit_user'])->name('edit-user');
	Route::get('user/delete-user/{id}', [user_controller::class,'delete_user'])->name('delete-user');


	//produk masuk
	Route::get('produk-masuk', [produk_masuk_controller::class,'produk_masuk'])->name('produk-masuk');
	Route::get('produk-masuk/tambah', [produk_masuk_controller::class,'add_produk_masuk'])->name('add-produk-masuk');
	Route::get('produk-masuk-edit/{id}', [produk_masuk_controller::class,'edit_produk_masuk'])->name('edit-produk-masuk');
	Route::get('produk-masuk/submit/{id}', [produk_masuk_controller::class,'submit_produk_masuk'])->name('submit-produk-masuk');
	Route::get('produk-masuk/delete/{id}', [produk_masuk_controller::class,'delete_produk_masuk'])->name('delete-produk-masuk');
	Route::post('produk-masuk/tambah/action', [produk_masuk_controller::class,'add_produk_masuk_action'])->name('add-produk-masuk-action');
	Route::post('produk-masuk-edit/{id}/action', [produk_masuk_controller::class,'edit_produk_masuk_action'])->name('edit-produk-masuk-action');

	//Produk keluar
	Route::get('produk-keluar', [produk_keluar_controller::class,'produk_keluar'])->name('produk-keluar');
	Route::get('produk-keluar/tambah', [produk_keluar_controller::class,'add_produk_keluar'])->name('add-produk-keluar');
	Route::post('produk-keluar/tambah/action', [produk_keluar_controller::class,'add_produk_keluar_action'])->name('add-produk-keluar-action');
	Route::get('produk-keluar-edit/{id}', [produk_keluar_controller::class,'edit_produk_keluar'])->name('edit-produk-edit');
	Route::post('produk-keluar-edit/{id}/action', [produk_keluar_controller::class,'edit_produk_keluar_action'])->name('edit-produk-keluar-action');
	Route::get('produk-keluar/delete/{id}', [produk_keluar_controller::class,'delete_produk_keluar'])->name('delete-produk-keluar');
	Route::get('produk-keluar/submit/{id}', [produk_keluar_controller::class,'submit_produk_keluar'])->name('submit-produk-keluar');

	//Laporan
	Route::get('laporan-produk-masuk',[laporan_controller::class,'laporan_masuk'])->name('laporan-produk-masuk');
	Route::get('laporan-produk-keluar',[laporan_controller::class,'laporan_keluar'])->name('laporan-produk-keluar');
	Route::get('laporan-permintaan',[laporan_controller::class,'laporan_permintaan'])->name('laporan-permintaan');

	//filter
	Route::post('laporan-produk-masuk/filter',[filter_controller::class,'filter_laporan_masuk'])->name('filter-laporan-masuk');
	Route::post('laporan-produk-keluar/filter',[filter_controller::class,'filter_laporan_keluar'])->name('filter-laporan-keluar');
	Route::post('/laporan-permintaan/filter',[filter_controller::class,'filter_laporan_permintaan'])->name('filter-laporan-permintaan');

	//permintaan
	Route::get('permintaan',[permintaan_controller::class,'permintaan'])->name('permintaan');
	Route::get('permintaan/tambah',[permintaan_controller::class,'add_permintaan'])->name('add_permintaan');
	Route::get('permintaan-edit/{id}',[permintaan_controller::class,'edit_permintaan'])->name('edit_permintaan');
	Route::post('permintaan-edit/{id}/action',[permintaan_controller::class,'edit_permintaan_action'])->name('edit_permintaan_action');
	Route::get('permintaan-delete/{id}',[permintaan_controller::class,'delete_permintaan'])->name('delete_permintaan');
	Route::post('permintaan/tambah/action',[permintaan_controller::class,'add_permintaan_action'])->name('add_permintaan_action');

	//surat jalan
	Route::get('surat-jalan',[suratJalan_controller::class,'surat_jalan'])->name('surat_jalan');
	Route::get('surat-jalan/tambah',[suratJalan_controller::class,'add_surat_jalan'])->name('add_surat_jalan');
	Route::post('surat-jalan/tambah/action',[suratJalan_controller::class,'add_surat_jalan_action'])->name('add_surat_jalan_action');
	Route::post('surat-jalan/tambah/store',[suratJalan_controller::class,'store'])->name('store');
	Route::get('surat-jalan-edit/{id}',[suratJalan_controller::class,'edit_surat_jalan'])->name('edit_surat_jalan');
	Route::post('surat-jalan-edit/{id}/action',[suratJalan_controller::class,'edit_surat_jalan_action'])->name('edit_surat_jalan_action');
	Route::get('surat-jalan-delete/{id}',[suratJalan_controller::class,'delete_surat_jalan'])->name('delete_surat_jalan');

	//sistem informasi customer
	route::get('sistem-customer/dashboard',[sistem_customer_controller::class,'dashboard_sistem_customer'])->name('dashboard_sistem_customer');
	route::get('sistem-customer/get-dashboard',[sistem_customer_controller::class,'get_dashboard_items'])->name('get_dashboard_items');
	route::get('sistem-customer/customer',[sistem_customer_controller::class,'customer_sistem_customer'])->name('customer_sistem_customer');
	route::post('sistem-customer/customer/tambah-customer',[sistem_customer_controller::class,'add_customer_sistem_customer'])->name('add_customer_sistem_customer');
	route::post('sistem-customer/customer/edit-customer/',[sistem_customer_controller::class,'edit_customer_sistem_customer'])->name('edit_customer_sistem_customer');
	route::get('sistem-customer/customer/delete-customer/{id}',[sistem_customer_controller::class,'delete_customer_sistem_customer'])->name('delete_customer_sistem_customer');
	
	route::get('detail-customer/{id}',[sistem_customer_controller::class,'detail_customer_sistem_customer'])->name('detail_customer_sistem_customer');
	route::post('detail-customer/{id}/tambah',[sistem_customer_controller::class,'add_detail_customer_sistem_customer'])->name('add_detail_customer_sistem_customer');
	route::post('detail-customer/{id}/edit',[sistem_customer_controller::class,'edit_detail_customer_sistem_customer'])->name('edit_detail_customer_sistem_customer');
	route::get('detail-customer/{id}/delete',[sistem_customer_controller::class,'delete_detail_customer_sistem_customer'])->name('delete_detail_customer_sistem_customer');
	
	route::get('sistem-customer/record-service',[RecordServiceCustomerController::class,'index'])->name('index_record_service');
	route::post('sistem-customer/record-service/tambah-record',[RecordServiceCustomerController::class,'store'])->name('add_customer_sistem_customer');
	route::get('sistem-customer/get-customers',[RecordServiceCustomerController::class,'get_customers'])->name('sistem_customer_get_customers');
	route::get('sistem-customer/get-record',[RecordServiceCustomerController::class,'get_index'])->name('get_index');
	route::get('sistem-customer/record-service/delete/{id}',[RecordServiceCustomerController::class,'destroy'])->name('delete_record');
	route::post('sistem-customer/record-service/update',[RecordServiceCustomerController::class,'update'])->name('update_record');
	route::post('sistem-customer/record-service/import',[RecordServiceCustomerController::class,'import'])->name('import_record');

	//comming soon
	Route::get('comming-soon', function () {
		return view('comming-soon');
	})->name('comming-soon');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

Route::get('/login/sistem-customer', function () {
    return view('session/login-sistem-customer');
})->name('login=sistem-customer');
