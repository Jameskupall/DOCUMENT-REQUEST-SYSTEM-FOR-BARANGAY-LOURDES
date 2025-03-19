<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\RequestItemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::post('/notifications/read/{id}', function ($id) {
    $user = auth()->user();

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }

    $notification = $user->notifications()->find($id);

    if ($notification) {
        $notification->markAsRead();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Notification not found'], 404);
})->middleware('auth');

Route::post('/notifications/read-all', function () {
    $user = auth()->user();

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }

    $user->unreadNotifications->markAsRead();
    return response()->json(['success' => true]);
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('requests', RequestItemController::class);
    Route::get('/documents', function () {
        return view('documents');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminAuthController::class, 'index'])->name('admin.dashboard');
    Route::get('/documents-admin', [AdminAuthController::class, 'documentsAdmin'])->name('admin.documents');
    Route::post('/requests/{requestItem}/{status}', [RequestItemController::class, 'updateStatus'])->name('admin.requests.updateStatus');
    Route::get('/daily_transactions', [AdminAuthController::class, 'dailyTransactions'])->name('admin.daily_transactions');
    Route::get('/residents', [AdminAuthController::class, 'residents'])->name('admin.residents');
    Route::get('/admin/residents/{id}/edit', [AdminAuthController::class, 'editResident'])->name('admin.residents.edit');
    Route::delete('/admin/residents/{id}', [AdminAuthController::class, 'destroyResident'])->name('admin.residents.destroy');
    Route::put('/admin/residents/{id}', [AdminAuthController::class, 'updateResident'])->name('admin.residents.update');
});
