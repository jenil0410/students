<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\backend\addmissionController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\bedsController;
use App\Http\Controllers\backend\complainController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\backend\hostelController;
use App\Http\Controllers\backend\leaveController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\roleController;
use App\Http\Controllers\backend\roomsController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\backend\studentsControler;
use App\Http\Controllers\backend\studentsController;
use App\Http\Controllers\backend\wardenController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});    

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // courses
    Route::group(['prefix' => 'course'], function(){
        Route::get('/index',[CourseController::class, 'index'])->name('course.index');
        Route::get('/create',[CourseController::class, 'create'])->name('course.create');
        Route::post('/store',[CourseController::class, 'store'])->name('course.store');
        Route::get('/edit/{id}',[CourseController::class, 'edit'])->name('course.edit');
        Route::post('/update/{id}',[CourseController::class, 'update'])->name('course.update');
        Route::get('/delete/{id}',[CourseController::class, 'destroy'])->name('course.delete');
        Route::get('/data',[CourseController::class, 'data'])->name('course.data');

    });

    // addmission
    Route::group(['prefix' => 'Addmission'], function(){
        Route::get('/index',[addmissionController::class, 'index'])->name('addmission.index');
        Route::get('/create',[addmissionController::class, 'create'])->name('addmission.create');
        Route::get('/load',[addmissionController::class, 'load'])->name('addmission.load');
        Route::post('/store',[addmissionController::class, 'store'])->name('addmission.store');
        Route::post('/Reserve',[addmissionController::class, 'Reserve'])->name('addmission.Reserve');
        Route::post('/note',[addmissionController::class, 'note'])->name('addmission.note');
        Route::post('/fees',[addmissionController::class, 'fees'])->name('addmission.fees');
        Route::get('/edit/{id}',[addmissionController::class, 'edit'])->name('addmission.edit');
        Route::post('/update/{id}',[addmissionController::class, 'update'])->name('addmission.update');
        Route::get('/delete/{id}',[addmissionController::class, 'destroy'])->name('addmission.delete');
        Route::get('/data',[addmissionController::class, 'data'])->name('addmission.data');
        Route::post('/getrooms',[addmissionController::class, 'getRoom'])->name('addmission.rooms');
        Route::post('/getbeds',[addmissionController::class, 'getBeds'])->name('addmission.beds');


    });

    // warden
    Route::group(['prefix' => 'warden'], function(){
        Route::get('/index',[wardenController::class, 'index'])->name('warden.index');
        Route::get('/create',[wardenController::class, 'create'])->name('warden.create');
        Route::post('/store',[wardenController::class, 'store'])->name('warden.store');
        Route::get('/edit/{id}',[wardenController::class, 'edit'])->name('warden.edit');
        Route::post('/update/{id}',[wardenController::class, 'update'])->name('warden.update');
        Route::get('/delete/{id}',[wardenController::class, 'destroy'])->name('warden.delete');
        Route::get('/data',[wardenController::class, 'data'])->name('warden.data');

    });
    
    // hostel
    Route::group(['prefix' => 'Hostel'], function(){
        Route::get('/index',[hostelController::class, 'index'])->name('hostel.index');
        Route::get('/create',[hostelController::class, 'create'])->name('hostel.create');
        Route::post('/store',[hostelController::class, 'store'])->name('hostel.store');
        Route::get('/edit/{id}',[hostelController::class, 'edit'])->name('hostel.edit');
        Route::post('/update/{id}',[hostelController::class, 'update'])->name('hostel.update');
        Route::get('/delete/{id}',[hostelController::class, 'destroy'])->name('hostel.delete');
        Route::get('/data',[hostelController::class, 'data'])->name('hostel.data');

    });

    // rooms
    Route::group(['prefix' => 'Rooms'], function(){
        Route::get('/index',[roomsController::class, 'index'])->name('rooms.index');
        Route::get('/create',[roomsController::class, 'create'])->name('rooms.create');
        Route::post('/store',[roomsController::class, 'store'])->name('rooms.store');
        Route::get('/edit/{id}',[roomsController::class, 'edit'])->name('rooms.edit');
        Route::post('/update/{id}',[roomsController::class, 'update'])->name('rooms.update');
        Route::get('/delete/{id}',[roomsController::class, 'destroy'])->name('rooms.delete');
        Route::get('/data',[roomsController::class, 'data'])->name('rooms.data');

    });

    // beds
    Route::group(['prefix' => 'Beds'], function(){
        Route::get('/index',[bedsController::class, 'index'])->name('beds.index');
        Route::get('/create',[bedsController::class, 'create'])->name('beds.create');
        Route::post('/store',[bedsController::class, 'store'])->name('beds.store');
        Route::post('/getrooms',[bedsController::class, 'getRooms'])->name('beds.rooms');
        Route::get('/edit/{id}',[bedsController::class, 'edit'])->name('beds.edit');
        Route::post('/update/{id}',[bedsController::class, 'update'])->name('beds.update');
        Route::get('/delete/{id}',[bedsController::class, 'destroy'])->name('beds.delete');
        Route::get('/data',[bedsController::class, 'data'])->name('beds.data');
        Route::get('/available',[bedsController::class, 'Available'])->name('beds.available');
        Route::get('/available_beds',[bedsController::class, 'Avail_beds'])->name('beds.avail');

    });

    // students
    Route::group(['prefix' => 'Students'], function(){
        Route::get('/index',[studentsController::class, 'index'])->name('students.index');
        Route::get('/create',[studentsController::class, 'create'])->name('students.create');
        Route::post('/store',[studentsController::class, 'store'])->name('students.store');
        Route::get('/edit/{id}',[studentsController::class, 'edit'])->name('students.edit');
        Route::post('/update/{id}',[studentsController::class, 'update'])->name('students.update');
        Route::get('/delete/{id}',[studentsController::class, 'destroy'])->name('students.delete');
        Route::get('/data',[studentsController::class, 'data'])->name('students.data');

    });
    // Complains
    Route::group(['prefix' => 'Complains'], function(){
        Route::get('/index',[complainController::class, 'index'])->name('complain.index');
        Route::get('/create',[complainController::class, 'create'])->name('complain.create');
        Route::post('/store',[complainController::class, 'store'])->name('complain.store');
        // Route::post('/getrooms',[complainController::class, 'getRooms'])->name('complain.rooms');
        Route::get('/edit/{id}',[complainController::class, 'edit'])->name('complain.edit');
        Route::post('/update/{id}',[complainController::class, 'update'])->name('complain.update');
        Route::get('/delete/{id}',[complainController::class, 'destroy'])->name('complain.delete');
        Route::get('/data',[complainController::class, 'data'])->name('complain.data');

    });
    
    // leaves
    Route::group(['prefix' => 'leaves'], function(){
        Route::get('/index',[leaveController::class, 'index'])->name('leave.index');
        Route::get('/create',[leaveController::class, 'create'])->name('leave.create');
        Route::post('/store',[leaveController::class, 'store'])->name('leave.store');
        // Route::post('/getrooms',[leaveController::class, 'getRooms'])->name('leave.rooms');
        Route::get('/edit/{id}',[leaveController::class, 'edit'])->name('leave.edit');
        Route::post('/update/{id}',[leaveController::class, 'update'])->name('leave.update');
        Route::get('/delete/{id}',[leaveController::class, 'destroy'])->name('leave.delete');
        Route::get('/data',[leaveController::class, 'data'])->name('leave.data');

    });

    // admin
    Route::group(['prefix' => 'Admin'], function(){
        Route::get('/index',[AdminController::class, 'index'])->name('admin.index');
        Route::get('/create',[AdminController::class, 'create'])->name('admin.create');
        Route::post('/store',[AdminController::class, 'store'])->name('admin.store');
        // Route::post('/getrooms',[AdminController::class, 'getRooms'])->name('admin.rooms');
        Route::get('/edit/{id}',[AdminController::class, 'edit'])->name('admin.edit');
        Route::post('/update/{id}',[AdminController::class, 'update'])->name('admin.update');
        Route::get('/delete/{id}',[AdminController::class, 'destroy'])->name('admin.delete');
        Route::get('/data',[AdminController::class, 'data'])->name('admin.data');
    });

    // Settings
    Route::group(['prefix' => 'Settings'], function(){
        Route::get('/index',[SettingsController::class, 'index'])->name('setting.index');
        Route::post('/store',[SettingsController::class, 'store'])->name('setting.store');
    });
    
    // Roles
    Route::prefix('Roles')->group(function () {
        Route::get('', [roleController::class, 'index'])->name('roles.index');
        Route::get('/create', [roleController::class, 'create'])->name('roles.create');
        Route::post('/store', [roleController::class, 'store'])->name('roles.store');
        Route::get('/{id}', [roleController::class, 'show'])->name('roles.show');
        Route::get('/{role}/edit', [roleController::class, 'edit'])->name('roles.edit');
        Route::put('/{id}', [roleController::class, 'update'])->name('roles.update');
        Route::get('delete/{id}', [roleController::class, 'destroy'])->name('roles.destroy');
    });

    // Donation
    Route::group(['prefix' => 'Donation'], function(){
        Route::get('/index',[DonationController::class, 'index'])->name('donation.index');
        Route::get('/data',[DonationController::class, 'data'])->name('donation.data');
    });

    // Report
    Route::group(['prefix' => 'Report'], function(){
        Route::get('/index',[ReportController::class, 'index'])->name('report.index');
        Route::get('/allotedStuent',[ReportController::class, 'allotedStuent'])->name('report.allotedStuent');
        Route::get('/dueFees',[ReportController::class, 'dueFees'])->name('report.duefees');
        Route::get('/dueFeesview',[ReportController::class, 'duefeesView'])->name('report.duefeesview');
        Route::get('/bedRelease/{id}',[ReportController::class, 'bedRelease'])->name('beds.release');
    });

    // Activity
    Route::group(['prefix' => 'Activity_Log'], function(){
        route::get('/',[ActivityController::class, 'index'])->name('log.index');
        route::get('/index',[ActivityController::class, 'create'])->name('log.create');
    });

require __DIR__.'/auth.php';