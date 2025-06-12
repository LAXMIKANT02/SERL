<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Mail;

Route::middleware(['auth'])->group(function () {
    // SOS Emergency reporting route
    Route::post('/sos', [EmergencyController::class, 'store'])->name('sos.store');

    // Contact management routes
    Route::resource('contacts', ContactController::class); 
    Route::resource('contacts', ContactController::class);

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Test email route (for testing email functionality)
Route::get('/test-email', function () {
    try {
        $emergency = new \App\Models\Emergency([
            'type' => 'Fire',
            'latitude' => '40.7128',
            'longitude' => '74.0060',
            'message' => 'Urgent! Fire in building',
        ]);

        // Send email using a dynamic user
        Mail::to(auth()->user()->email)->send(new \App\Mail\EmergencyAlertMail($emergency));
        return 'Email sent successfully';
    } catch (\Exception $e) {
        return 'Error sending email: ' . $e->getMessage();
    }
});

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route with authentication
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';
