<?php

    namespace App\Http\Controllers\Dashboard\Auth;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\CreateAdminRequest;
    use App\Services\Admin\AuthService;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Routing\Controllers\HasMiddleware;
    use Illuminate\Routing\Controllers\Middleware;

    class AuthController extends Controller implements HasMiddleware
    {
        /**
         * AuthService instance for handling authentication logic.
         *
         * @var AuthService
         */
        protected AuthService $authService;

        /*
         * Constructor to initialize the AuthService.
         *
         * @param AuthService $authService
         */
        public function __construct(AuthService $authService)
        {
            $this->authService = $authService;
        }

        /**
         * Define the middleware for the controller.
         *
         * @return array
         */
        public static function middleware(): array
        {
            return [
                new Middleware('guest', only: ['loginForm', 'login']),
                new Middleware('auth:admin', only: ['logout']),
            ];
        }

        /**
         * Show the login page.
         * @return View
         */
        public function loginForm(): View
        {
            return view('dashboard.auth.login');
        }

        /**
         * Handle the login request.
         *
         * @param CreateAdminRequest $request
         * @return RedirectResponse
         */
        public function login(CreateAdminRequest $request): RedirectResponse
        {
            $isLogin = $this->authService->login($request);

            return $isLogin ? redirect()->intended(route('dashboard.index')) : redirect()->back()
                ->withErrors(['email' => __('auth.not_credentials')]);
        }

        /**
         * Handle the logout request.
         *
         * @return RedirectResponse
         */
        public function logout(): RedirectResponse
        {
            $isLogout = $this->authService->logout();
            return $isLogout ? redirect()->route('dashboard.login.form') : redirect()->back()->withErrors(
                ['logout' => __('auth.logout_error')]
            );
        }
    }
