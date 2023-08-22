<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveStatusController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web,employee', 'verified' , ])->name('dashboard');

Route::middleware('auth:web,employee')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::resource('employees', EmployeeController::class);
Route::resources([
    'employees' => EmployeeController::class,
    'leaveTypes' => LeaveTypeController::class,
    'employees.leaveRequests' => LeaveRequestController::class,
    'leavStatus' => LeaveStatusController::class,
]);

Route::get('showAllRequest' , [LeaveRequestController::class , 'showAllRequest'])->name('showAllRequest');

Route::post('leaveRequests/{leaveRequest}/deny' , [LeaveRequestController::class , 'denyLeaveRequest'])->name('deny.leave')->middleware('auth');
Route::post('leaveRequests/{leaveRequest}/accept' , [LeaveRequestController::class , 'acceptLeaveRequest'])->name('accept.leave')->middleware('auth');