<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{UserManagementController,SupplierController};
use App\Http\Controllers\test\Testcontroller;



    Route::get('/', function () {return redirect()->route('login');});

    Auth::routes();

    /************************************************************
     ***          Home Route Are Here                    ***
     ************************************************************/
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    /************************************************************
     ***          User Manegement Route Are Here              ***
     ************************************************************/
    Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/view', [UserManagementController::class, 'view'])->name('user_management.view');
    Route::post('/store', [UserManagementController::class, 'store'])->name('user_management.store');
    Route::get('/edit/{id}', [UserManagementController::class, 'edit'])->name('user_management.edit');
    Route::post('/update/{id}', [UserManagementController::class, 'update'])->name('user_management.update');
    Route::get('/delete/{id}', [UserManagementController::class, 'delete'])->name('user_management.delete');
    Route::get('/profile/{id}', [UserManagementController::class, 'AdminProfile'])->name('admin.profile');
    });


    /************************************************************
     ***          Suppliers Route Are Here                    ***
     ************************************************************/
    Route::prefix('supplier')->middleware('auth')->group(function () {
    Route::get('/view', [SupplierController::class, 'view'])->name('supplier.view');
    Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');
    });

