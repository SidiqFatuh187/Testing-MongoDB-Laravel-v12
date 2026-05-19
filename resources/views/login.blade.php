<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap');

        * { font-family: 'DM Sans', sans-serif; }
        h1, h2, h3, .font-display { font-family: 'Syne', sans-serif; }

        .bg-mesh {
            background-color: #0a0a0f;
            background-image:
                radial-gradient(ellipse 80% 60% at 20% 10%, rgba(99, 58, 232, 0.25) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 80% 80%, rgba(20, 184, 166, 0.15) 0%, transparent 55%),
                radial-gradient(ellipse 40% 40% at 60% 30%, rgba(236, 72, 153, 0.1) 0%, transparent 50%);
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }

        .input-field {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #f1f5f9;
            transition: all 0.2s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: rgba(99, 58, 232, 0.7);
            background: rgba(99, 58, 232, 0.08);
            box-shadow: 0 0 0 3px rgba(99, 58, 232, 0.15);
        }

        .input-field::placeholder { color: rgba(148, 163, 184, 0.5); }

        .btn-primary {
            background: linear-gradient(135deg, #6d28d9, #4f46e5);
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #7c3aed, #6366f1);
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 8px 25px rgba(99, 58, 232, 0.4); }
        .btn-primary:active { transform: translateY(0); }

        .noise {
            position: fixed;
            inset: 0;
            opacity: 0.03;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        }

        .float-label { animation: float 6s ease-in-out infinite; }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.6s ease forwards;
        }
        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-up:nth-child(1) { animation-delay: 0.1s; }
        .fade-up:nth-child(2) { animation-delay: 0.2s; }
        .fade-up:nth-child(3) { animation-delay: 0.3s; }
        .fade-up:nth-child(4) { animation-delay: 0.4s; }
        .fade-up:nth-child(5) { animation-delay: 0.5s; }
        .fade-up:nth-child(6) { animation-delay: 0.6s; }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.1), transparent);
        }

        label { color: rgba(203, 213, 225, 0.8); }

        @media (prefers-color-scheme: light) {
            .bg-mesh { background-color: #f8f7ff; }
        }
    </style>
</head>
<body class="bg-mesh min-h-screen flex items-center justify-center p-4">

    <div class="noise"></div>

    <!-- Decorative orb -->
    <div class="fixed top-[-10%] right-[-5%] w-96 h-96 rounded-full opacity-20 blur-3xl pointer-events-none"
         style="background: radial-gradient(circle, #6d28d9, transparent)"></div>
    <div class="fixed bottom-[-10%] left-[-5%] w-80 h-80 rounded-full opacity-15 blur-3xl pointer-events-none"
         style="background: radial-gradient(circle, #0d9488, transparent)"></div>

    <div class="w-full max-w-md">

        <!-- Logo / Brand -->
        <div class="text-center mb-8 fade-up">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl mb-4 float-label"
                 style="background: linear-gradient(135deg, #6d28d9, #4f46e5); box-shadow: 0 8px 32px rgba(99, 58, 232, 0.4);">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A8.966 8.966 0 0112 15c2.485 0 4.735.948 6.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h1 class="font-display text-2xl font-700 text-white tracking-tight">Selamat Datang</h1>
            <p class="text-sm mt-1" style="color: rgba(148, 163, 184, 0.7);">Masuk ke akun kamu</p>
        </div>

        <!-- Card -->
        <div class="card-glass rounded-3xl p-8 fade-up">

            <!-- Session Error -->
            @if (session('error'))
                <div class="mb-5 px-4 py-3 rounded-xl text-sm fade-up"
                     style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #fca5a5;">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div class="fade-up">
                    <label class="block text-xs font-500 mb-2 tracking-wide uppercase" for="email">
                        Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="kamu@email.com"
                        required
                        autofocus
                        class="input-field w-full px-4 py-3 rounded-xl text-sm"
                    >
                    @error('email')
                        <p class="mt-1.5 text-xs" style="color: #f87171;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="fade-up">
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-xs font-500 tracking-wide uppercase" for="password">
                            Password
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-xs transition-colors"
                               style="color: rgba(139, 92, 246, 0.8);"
                               onmouseover="this.style.color='rgba(167, 139, 250, 1)'"
                               onmouseout="this.style.color='rgba(139, 92, 246, 0.8)'">
                                Lupa password?
                            </a>
                        @endif
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        required
                        class="input-field w-full px-4 py-3 rounded-xl text-sm"
                    >
                    @error('password')
                        <p class="mt-1.5 text-xs" style="color: #f87171;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="fade-up flex items-center gap-3">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="w-4 h-4 rounded accent-violet-600 cursor-pointer"
                    >
                    <label for="remember" class="text-sm cursor-pointer" style="color: rgba(148, 163, 184, 0.8);">
                        Ingat saya
                    </label>
                </div>

                <!-- Submit -->
                <div class="fade-up pt-1">
                    <button type="submit" class="btn-primary w-full py-3 rounded-xl text-sm font-600 text-white tracking-wide relative z-10">
                        Masuk
                    </button>
                </div>

            </form>

            <!-- Divider -->
            @if (Route::has('register'))
                <div class="flex items-center gap-3 my-6 fade-up">
                    <div class="divider-line"></div>
                    <span class="text-xs" style="color: rgba(100, 116, 139, 0.7);">atau</span>
                    <div class="divider-line"></div>
                </div>

                <!-- Register Link -->
                <div class="text-center fade-up">
                    <p class="text-sm" style="color: rgba(148, 163, 184, 0.6);">
                        Belum punya akun?
                        <a href="{{ route('register') }}"
                           class="font-500 transition-colors ml-1"
                           style="color: rgba(139, 92, 246, 0.9);"
                           onmouseover="this.style.color='rgba(167, 139, 250, 1)'"
                           onmouseout="this.style.color='rgba(139, 92, 246, 0.9)'">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            @endif

        </div>

    </div>
</body>
</html>