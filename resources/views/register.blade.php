<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap');

        * { font-family: 'DM Sans', sans-serif; }
        h1, h2, h3, .font-display { font-family: 'Syne', sans-serif; }

        .bg-mesh {
            background-color: #0a0a0f;
            background-image:
                radial-gradient(ellipse 80% 60% at 80% 10%, rgba(99, 58, 232, 0.25) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 20% 80%, rgba(20, 184, 166, 0.15) 0%, transparent 55%),
                radial-gradient(ellipse 40% 40% at 50% 40%, rgba(236, 72, 153, 0.08) 0%, transparent 50%);
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
        .fade-up:nth-child(7) { animation-delay: 0.7s; }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.1), transparent);
        }

        label { color: rgba(203, 213, 225, 0.8); }

        .password-strength {
            height: 3px;
            border-radius: 99px;
            transition: all 0.3s ease;
            background: rgba(255,255,255,0.08);
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            border-radius: 99px;
            transition: all 0.4s ease;
            width: 0%;
        }
    </style>
</head>
<body class="bg-mesh min-h-screen flex items-center justify-center p-4 py-10">

    <div class="noise"></div>

    <!-- Decorative orbs -->
    <div class="fixed top-[-10%] left-[-5%] w-96 h-96 rounded-full opacity-20 blur-3xl pointer-events-none"
         style="background: radial-gradient(circle, #6d28d9, transparent)"></div>
    <div class="fixed bottom-[-10%] right-[-5%] w-80 h-80 rounded-full opacity-15 blur-3xl pointer-events-none"
         style="background: radial-gradient(circle, #0d9488, transparent)"></div>

    <div class="w-full max-w-md">

        <!-- Logo / Brand -->
        <div class="text-center mb-8 fade-up">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl mb-4 float-label"
                 style="background: linear-gradient(135deg, #6d28d9, #4f46e5); box-shadow: 0 8px 32px rgba(99, 58, 232, 0.4);">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <h1 class="font-display text-2xl font-700 text-white tracking-tight">Buat Akun</h1>
            <p class="text-sm mt-1" style="color: rgba(148, 163, 184, 0.7);">Daftar dan mulai sekarang</p>
        </div>

        <!-- Card -->
        <div class="card-glass rounded-3xl p-8 fade-up">

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Nama -->
                <div class="fade-up">
                    <label class="block text-xs font-500 mb-2 tracking-wide uppercase" for="name">
                        Nama Lengkap
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="John Doe"
                        required
                        autofocus
                        class="input-field w-full px-4 py-3 rounded-xl text-sm"
                    >
                    @error('name')
                        <p class="mt-1.5 text-xs" style="color: #f87171;">{{ $message }}</p>
                    @enderror
                </div>

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
                        class="input-field w-full px-4 py-3 rounded-xl text-sm"
                    >
                    @error('email')
                        <p class="mt-1.5 text-xs" style="color: #f87171;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="fade-up">
                    <label class="block text-xs font-500 mb-2 tracking-wide uppercase" for="password">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Min. 8 karakter"
                        required
                        oninput="checkStrength(this.value)"
                        class="input-field w-full px-4 py-3 rounded-xl text-sm"
                    >
                    <!-- Password strength indicator -->
                    <div class="mt-2 space-y-1">
                        <div class="flex gap-1">
                            <div class="password-strength flex-1"><div id="bar1" class="strength-bar"></div></div>
                            <div class="password-strength flex-1"><div id="bar2" class="strength-bar"></div></div>
                            <div class="password-strength flex-1"><div id="bar3" class="strength-bar"></div></div>
                            <div class="password-strength flex-1"><div id="bar4" class="strength-bar"></div></div>
                        </div>
                        <p id="strength-text" class="text-xs" style="color: rgba(100, 116, 139, 0.7);">Masukkan password</p>
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-xs" style="color: #f87171;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="fade-up">
                    <label class="block text-xs font-500 mb-2 tracking-wide uppercase" for="password_confirmation">
                        Konfirmasi Password
                    </label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        required
                        class="input-field w-full px-4 py-3 rounded-xl text-sm"
                    >
                    @error('password_confirmation')
                        <p class="mt-1.5 text-xs" style="color: #f87171;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="fade-up pt-1">
                    <button type="submit" class="btn-primary w-full py-3 rounded-xl text-sm font-600 text-white tracking-wide relative z-10">
                        Buat Akun
                    </button>
                </div>

            </form>

            <!-- Divider -->
            <div class="flex items-center gap-3 my-6 fade-up">
                <div class="divider-line"></div>
                <span class="text-xs" style="color: rgba(100, 116, 139, 0.7);">atau</span>
                <div class="divider-line"></div>
            </div>

            <!-- Login Link -->
            <div class="text-center fade-up">
                <p class="text-sm" style="color: rgba(148, 163, 184, 0.6);">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                       class="font-500 transition-colors ml-1"
                       style="color: rgba(139, 92, 246, 0.9);"
                       onmouseover="this.style.color='rgba(167, 139, 250, 1)'"
                       onmouseout="this.style.color='rgba(139, 92, 246, 0.9)'">
                        Masuk sekarang
                    </a>
                </p>
            </div>

        </div>
    </div>

    <script>
        function checkStrength(val) {
            const bars = ['bar1', 'bar2', 'bar3', 'bar4'];
            const text = document.getElementById('strength-text');

            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const colors = ['#ef4444', '#f97316', '#eab308', '#22c55e'];
            const labels = ['Lemah', 'Cukup', 'Kuat', 'Sangat Kuat'];
            const textColors = ['#fca5a5', '#fdba74', '#fde047', '#86efac'];

            bars.forEach((id, i) => {
                const bar = document.getElementById(id);
                if (i < score) {
                    bar.style.width = '100%';
                    bar.style.background = colors[score - 1];
                } else {
                    bar.style.width = '0%';
                }
            });

            if (val.length === 0) {
                text.textContent = 'Masukkan password';
                text.style.color = 'rgba(100, 116, 139, 0.7)';
            } else {
                text.textContent = labels[score - 1] || 'Lemah';
                text.style.color = textColors[score - 1] || '#fca5a5';
            }
        }
    </script>

</body>
</html>