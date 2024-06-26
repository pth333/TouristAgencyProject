<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Login and Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPassword'])->name('forget.password.get');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPassword'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPassword'])->name('password.update');

Route::get('/email/verify/{id}/{token}', [RegisteredUserController::class, 'verificationEmail'])->name('verify.email');
Route::get('/email/verification-notification', [RegisteredUserController::class, 'showFormResendEmail'])->name('resend.email');
Route::post('/email/verification-notification', [RegisteredUserController::class, 'resendEmail']);


Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    try {
        $socialiteUser = Socialite::driver('google')->user();
        // Log::info(json_encode($user));
        // dd($socialiteUser);
        $userData = [
            'name' => $socialiteUser->name,
            'email' => $socialiteUser->email,
            'token' => $socialiteUser->token
        ];
        // dd($userData);
        $user = User::updateOrCreate(
            ['email' => $socialiteUser->getEmail()],
            $userData
        );
        // dd($user);
        Auth::login($user);
        return redirect('dashboard')->with('ok', 'Bạn đã đăng nhập thành công');
    } catch (\Exception $e) {
        Log::error('Lỗi Google OAuth: ' . $e->getMessage());
        return redirect('/login')->with('no', 'Đăng nhập không thành công');
    }
});
