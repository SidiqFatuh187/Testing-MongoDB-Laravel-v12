<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Stockify</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #ffffff;
        }

        /* ── LEFT PANEL ── */
        .panel-left {
            flex: 0 0 55%;
            background: linear-gradient(145deg, #7c3aed 0%, #6d28d9 40%, #5b21b6 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 3.5rem;
        }

        /* decorative circles */
        .panel-left::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 340px; height: 340px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            pointer-events: none;
        }
        .panel-left::after {
            content: '';
            position: absolute;
            bottom: -100px; left: -60px;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            pointer-events: none;
        }

        /* floating card shapes in bg */
        .deco-card {
            position: absolute;
            border-radius: 16px;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            backdrop-filter: blur(4px);
        }
        .deco-card-1 { width: 110px; height: 70px; top: 14%; left: 6%; transform: rotate(-8deg); }
        .deco-card-2 { width: 80px; height: 50px; top: 22%; left: 20%; transform: rotate(4deg); }
        .deco-card-3 { width: 90px; height: 56px; bottom: 28%; right: 8%; transform: rotate(6deg); }
        .deco-card-4 { width: 60px; height: 60px; top: 55%; left: 5%; border-radius: 50%; }

        /* brand logo in left panel */
        .brand-mark {
            position: absolute;
            top: 2rem; left: 2.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            z-index: 10;
        }
        .brand-mark-icon {
            width: 36px; height: 36px;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }
        .brand-mark span {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            color: #fff;
            letter-spacing: -0.02em;
        }

        /* illustration area */
        .illustration-wrap {
            position: relative;
            z-index: 5;
            width: 100%;
            max-width: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .illustration-wrap svg {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 24px 48px rgba(0,0,0,0.25));
        }

        /* left panel caption */
        .panel-caption {
            position: relative;
            z-index: 5;
            margin-top: 2.5rem;
            text-align: center;
            max-width: 380px;
        }
        .panel-caption h2 {
            font-family: 'Syne', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.3;
        }
        .panel-caption p {
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.65);
            line-height: 1.6;
        }

        /* ── RIGHT PANEL ── */
        .panel-right {
            flex: 0 0 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 3rem;
            background: #ffffff;
        }

        .form-wrap {
            width: 100%;
            max-width: 360px;
        }

        .form-heading {
            margin-bottom: 2rem;
        }
        .form-heading h1 {
            font-family: 'Syne', sans-serif;
            font-size: 2.2rem;
            font-weight: 800;
            color: #1e1b4b;
            line-height: 1.2;
            letter-spacing: -0.03em;
        }
        .form-heading h1 span {
            display: block;
            color: #7c3aed;
        }
        .form-heading p {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #94a3b8;
        }

        /* fields */
        .field-group { display: flex; flex-direction: column; gap: 1.1rem; }

        .field {
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
        }

        .field label {
            font-size: 0.78rem;
            font-weight: 500;
            color: #64748b;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .field input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.9rem;
            font-family: 'DM Sans', sans-serif;
            color: #1e293b;
            background: #f8fafc;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }
        .field input::placeholder { color: #b0bec5; }
        .field input:focus {
            border-color: #7c3aed;
            background: #faf7ff;
            box-shadow: 0 0 0 3.5px rgba(124, 58, 237, 0.1);
        }

        .field-error {
            font-size: 0.75rem;
            color: #ef4444;
            margin-top: 0.15rem;
        }

        /* row: remember + forgot */
        .row-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 0.25rem;
        }
        .remember-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            font-size: 0.875rem;
            color: #64748b;
            user-select: none;
        }
        .remember-label input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: #7c3aed;
            cursor: pointer;
            border-radius: 4px;
        }
        .forgot-link {
            font-size: 0.875rem;
            color: #7c3aed;
            text-decoration: none;
            transition: color 0.2s;
        }
        .forgot-link:hover { color: #6d28d9; }

        /* session error alert */
        .alert-error {
            padding: 0.75rem 1rem;
            border-radius: 10px;
            border: 1.5px solid #fecaca;
            background: #fff5f5;
            color: #dc2626;
            font-size: 0.85rem;
            margin-bottom: 1.25rem;
        }

        /* submit button */
        .btn-login {
            margin-top: 1.5rem;
            width: 100%;
            padding: 0.85rem;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            letter-spacing: 0.01em;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 6px 20px rgba(109, 40, 217, 0.35);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(109, 40, 217, 0.45);
        }
        .btn-login:active { transform: translateY(0); }

        /* register prompt */
        .register-prompt {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
            color: #94a3b8;
        }
        .register-prompt a {
            color: #7c3aed;
            font-weight: 600;
            text-decoration: none;
            margin-left: 0.25rem;
            transition: color 0.2s;
        }
        .register-prompt a:hover { color: #6d28d9; }

        /* app store badges */
        .store-badges {
            display: flex;
            gap: 0.65rem;
            margin-top: 2rem;
            justify-content: center;
        }
        .badge {
            display: flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.45rem 0.9rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            background: #0f0f0f;
            color: #fff;
            text-decoration: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .badge:hover { border-color: #7c3aed; box-shadow: 0 0 0 2px rgba(124,58,237,0.15); }
        .badge-text { display: flex; flex-direction: column; }
        .badge-text small { font-size: 0.6rem; color: #cbd5e1; line-height: 1; }
        .badge-text strong { font-size: 0.75rem; color: #fff; line-height: 1.4; }

        /* ── RESPONSIVE ── */
        @media (max-width: 860px) {
            body { flex-direction: column; }
            .panel-left {
                flex: none;
                padding: 2.5rem 2rem 2rem;
                min-height: 240px;
            }
            .illustration-wrap { max-width: 280px; }
            .panel-caption { display: none; }
            .panel-right {
                flex: none;
                padding: 2rem 1.5rem 3rem;
            }
            .brand-mark { top: 1.25rem; left: 1.5rem; }
        }

        @media (max-width: 480px) {
            .panel-left { min-height: 200px; padding: 2rem 1.25rem 1.5rem; }
            .form-heading h1 { font-size: 1.75rem; }
            .store-badges { flex-direction: column; align-items: center; }
        }
    </style>
</head>
<body>

    <!-- ══════════════ LEFT PANEL ══════════════ -->
    <div class="panel-left">
        <!-- Brand -->
        <div class="brand-mark">
            <div class="brand-mark-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg" stroke="white" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                </svg>
            </div>
            <span>Stockify</span>
        </div>

        <!-- Decorative floating cards -->
        <div class="deco-card deco-card-1"></div>
        <div class="deco-card deco-card-2"></div>
        <div class="deco-card deco-card-3"></div>
        <div class="deco-card deco-card-4"></div>

        <!-- SVG Illustration (isometric-style, inline for zero HTTP request) -->
        <div class="illustration-wrap">
            <svg viewBox="0 0 520 380" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="screen-grad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#ede9fe"/>
                        <stop offset="100%" stop-color="#c4b5fd"/>
                    </linearGradient>
                    <linearGradient id="panel-grad" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="rgba(255,255,255,0.18)"/>
                        <stop offset="100%" stop-color="rgba(255,255,255,0.06)"/>
                    </linearGradient>
                    <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                        <feDropShadow dx="0" dy="12" stdDeviation="18" flood-color="rgba(0,0,0,0.22)"/>
                    </filter>
                </defs>

                <!-- Main phone / screen card -->
                <rect x="160" y="60" width="200" height="270" rx="24" fill="url(#screen-grad)" filter="url(#shadow)"/>
                <rect x="174" y="80" width="172" height="230" rx="14" fill="white" opacity="0.95"/>

                <!-- Screen top bar -->
                <rect x="174" y="80" width="172" height="40" rx="14" fill="#7c3aed"/>
                <circle cx="260" cy="100" r="10" fill="rgba(255,255,255,0.2)"/>
                <path d="M255 100 l3-4 l4 7 l3-3 l2 4" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>

                <!-- Chart bars in screen -->
                <rect x="190" y="175" width="16" height="50" rx="4" fill="#ddd6fe"/>
                <rect x="212" y="155" width="16" height="70" rx="4" fill="#7c3aed"/>
                <rect x="234" y="165" width="16" height="60" rx="4" fill="#a78bfa"/>
                <rect x="256" y="145" width="16" height="80" rx="4" fill="#7c3aed"/>
                <rect x="278" y="170" width="16" height="55" rx="4" fill="#ddd6fe"/>
                <rect x="300" y="158" width="16" height="67" rx="4" fill="#a78bfa"/>

                <!-- Check mark circle -->
                <circle cx="260" cy="150" r="14" fill="#7c3aed" opacity="0.15"/>
                <circle cx="260" cy="150" r="10" fill="#7c3aed"/>
                <path d="M255 150 l3 3 l6-6" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>

                <!-- Floating UI cards (left) -->
                <g transform="translate(50, 110)" filter="url(#shadow)">
                    <rect width="100" height="62" rx="12" fill="url(#panel-grad)" stroke="rgba(255,255,255,0.25)" stroke-width="1"/>
                    <circle cx="18" cy="20" r="9" fill="rgba(255,255,255,0.2)"/>
                    <text x="32" y="16" font-family="'DM Sans',sans-serif" font-size="8" fill="rgba(255,255,255,0.85)" font-weight="600">Revenue</text>
                    <text x="32" y="27" font-family="'DM Sans',sans-serif" font-size="7" fill="rgba(255,255,255,0.55)">This month</text>
                    <text x="12" y="50" font-family="'Syne',sans-serif" font-size="14" fill="white" font-weight="700">$24,830</text>
                </g>

                <!-- Floating card top-right -->
                <g transform="translate(368, 80)" filter="url(#shadow)">
                    <rect width="90" height="56" rx="12" fill="url(#panel-grad)" stroke="rgba(255,255,255,0.25)" stroke-width="1"/>
                    <text x="10" y="18" font-family="'DM Sans',sans-serif" font-size="7.5" fill="rgba(255,255,255,0.8)" font-weight="500">Stock Items</text>
                    <text x="10" y="40" font-family="'Syne',sans-serif" font-size="18" fill="white" font-weight="700">1,249</text>
                </g>

                <!-- Floating card bottom-right -->
                <g transform="translate(378, 230)" filter="url(#shadow)">
                    <rect width="96" height="56" rx="12" fill="url(#panel-grad)" stroke="rgba(255,255,255,0.25)" stroke-width="1"/>
                    <text x="10" y="18" font-family="'DM Sans',sans-serif" font-size="7.5" fill="rgba(255,255,255,0.8)" font-weight="500">Low Stock</text>
                    <text x="10" y="38" font-family="'Syne',sans-serif" font-size="17" fill="#fbbf24" font-weight="700">⚠ 14</text>
                </g>

                <!-- person silhouette left -->
                <g transform="translate(78, 178)">
                    <!-- body -->
                    <ellipse cx="34" cy="85" rx="22" ry="10" fill="rgba(255,255,255,0.08)"/>
                    <rect x="18" y="42" width="32" height="40" rx="10" fill="#a78bfa"/>
                    <rect x="22" y="82" width="10" height="22" rx="5" fill="#8b5cf6"/>
                    <rect x="34" y="82" width="10" height="22" rx="5" fill="#8b5cf6"/>
                    <!-- head -->
                    <circle cx="34" cy="28" r="16" fill="#fde68a"/>
                    <!-- hair -->
                    <ellipse cx="34" cy="14" rx="16" ry="8" fill="#92400e"/>
                    <!-- pointing arm -->
                    <line x1="50" y1="58" x2="80" y2="50" stroke="#a78bfa" stroke-width="7" stroke-linecap="round"/>
                    <circle cx="80" cy="50" r="6" fill="#fde68a"/>
                    <!-- badge -->
                    <rect x="20" y="50" width="18" height="10" rx="3" fill="rgba(255,255,255,0.3)"/>
                    <line x1="26" y1="60" x2="26" y2="70" stroke="rgba(255,255,255,0.4)" stroke-width="1.5"/>
                </g>

                <!-- person silhouette right -->
                <g transform="translate(350, 175)">
                    <ellipse cx="34" cy="90" rx="22" ry="10" fill="rgba(255,255,255,0.08)"/>
                    <rect x="18" y="45" width="32" height="42" rx="10" fill="#60a5fa"/>
                    <rect x="22" y="85" width="10" height="24" rx="5" fill="#3b82f6"/>
                    <rect x="34" y="85" width="10" height="24" rx="5" fill="#3b82f6"/>
                    <circle cx="34" cy="30" r="16" fill="#fed7aa"/>
                    <ellipse cx="34" cy="17" rx="16" ry="8" fill="#1e293b"/>
                    <!-- arm reaching left -->
                    <line x1="18" y1="60" x2="-14" y2="52" stroke="#60a5fa" stroke-width="7" stroke-linecap="round"/>
                    <circle cx="-14" cy="52" r="6" fill="#fed7aa"/>
                </g>

                <!-- ground shadow -->
                <ellipse cx="260" cy="345" rx="120" ry="14" fill="rgba(0,0,0,0.12)"/>
            </svg>
        </div>

        <!-- Caption -->
        <div class="panel-caption">
            <h2>Kelola stok bisnis kamu dengan mudah</h2>
            <p>Pantau inventaris, analisis penjualan, dan buat keputusan lebih cepat bersama Stockify.</p>
        </div>
    </div>

    <!-- ══════════════ RIGHT PANEL ══════════════ -->
    <div class="panel-right">
        <div class="form-wrap">

            <div class="form-heading">
                <h1>Hello,<span>Welcome back!</span></h1>
                <p>Masuk untuk melanjutkan ke akun Stockify kamu.</p>
            </div>

            <!-- Session Error -->
            @if (session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field-group">

                    <!-- Email / Username field -->
                    <div class="field">
                        <label for="email">Username or email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="kamu@email.com"
                            required
                            autofocus
                        >
                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="field">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            required
                        >
                        @error('password')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <!-- Remember me + Forgot password -->
                <div class="row-options" style="margin-top: 1rem;">
                    <label class="remember-label">
                        <input type="checkbox" id="remember" name="remember">
                        Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                    @endif
                </div>

                <!-- Login button -->
                <button type="submit" class="btn-login">Login</button>

            </form>

            <!-- Register -->
            @if (Route::has('register'))
                <p class="register-prompt">
                    Don't have an account?
                    <a href="{{ route('register') }}">Click here</a>
                </p>
            @endif

        </div>
    </div>

</body>
</html>