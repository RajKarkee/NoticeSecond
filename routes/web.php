<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoticeController;
use App\Http\Middleware\Valid;
use Illuminate\Support\Facades\Route;

    Route::redirect("/","notice");
    Route::redirect("/home","notice");

    Route::match(['GET','POST'],'login', [LoginController::class, 'login'])->name('login');

    Route::prefix('notice')->middleware('auth')->name('notice.')->group(function(){
        Route::get('', [NoticeController::class, 'index'])->name('index');
        Route::get('add', [NoticeController::class, 'add'])->name('add');
        Route::post('create', [NoticeController::class, 'create'])->name('create');
        Route::delete('delete/{id}', [NoticeController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [NoticeController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [NoticeController::class, 'update'])->name('update');

    });
