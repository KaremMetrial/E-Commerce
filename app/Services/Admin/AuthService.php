<?php

    namespace App\Services\Admin;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class AuthService
    {
        public function login(Request $request): bool
        {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
                return true;
            }
            return false;
        }

        public function logout(): bool
        {
            try {
                auth()->guard('admin')->logout();
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
    }
