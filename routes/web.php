<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveBalanceController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveRequestAdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::middleware('admin')->prefix('admin')->group(function () {

        //Admin Routs-dashboard-
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.index'); // صفحة الإحصائيات
        Route::get('/admins', [AdminController::class, 'admins'])->name('admin.admins'); // قائمة الإداريين
        Route::resource('employees', EmployeeController::class);//admin/employee
        Route::resource('departments', DepartmentController::class);
        Route::resource('leave-types', LeaveTypeController::class);//admin/leaveType
         Route::resource('leave-balance', LeaveBalanceController::class);
          // Leave Requests
          Route::get('leave-requests', [LeaveRequestAdminController::class, 'index'])
          ->name('admin.leave-requests.index');
      Route::get('leave-requests/pending', [LeaveRequestAdminController::class, 'pending'])
          ->name('admin.leave-requests.pending'); // Pending requests
      Route::get('leave-requests/approved', [LeaveRequestAdminController::class, 'approved'])
          ->name('admin.leave-requests.approved'); // Approved requests
      Route::get('leave-requests/rejected', [LeaveRequestAdminController::class, 'rejected'])
          ->name('admin.leave-requests.rejected'); // Rejected requests

      Route::get('leave-requests/{id}/approve', [LeaveRequestAdminController::class, 'approve'])
          ->name('leave-requests.approve');
      Route::get('leave-requests/{id}/deny', [LeaveRequestAdminController::class, 'deny'])
          ->name('leave-requests.deny');
      Route::post('leave-requests/{id}/approve', [LeaveRequestAdminController::class, 'storeApproval'])
          ->name('leave-requests.approve.store');
      Route::post('leave-requests/{id}/deny', [LeaveRequestAdminController::class, 'storeDenial'])
          ->name('leave-requests.deny.store');
          Route::get('/reports', [ReportController::class, 'showReport'])
          ->name('reports.leave-requests');
          Route::post('/notifications/mark-as-read', [NotificationController::class, 'markAllAsRead'])
          ->name('notifications.markAllAsRead')
          ->middleware('auth');


    });


    //Admin employee-outside website-
    Route::resource('leave-requests', LeaveRequestController::class);// / Leave Request
    // routes/web.php
   Route::get('/leave-history', [LeaveRequestController::class, 'leaveHistory'])
   ->name('leave-history');
   Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

});

require __DIR__ . '/auth.php';
