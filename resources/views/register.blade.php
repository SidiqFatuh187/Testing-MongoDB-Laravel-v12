<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Stockify</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #ffffff;
        }

        /* ── LEFT PANEL (form side) ── */
        .panel-left {
            flex: 0 0 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            background: #ffffff;
            overflow-y: auto;
        }

        .form-wrap {
            width: 100%;
            max-width: 380px;
            padding: 2rem 0;
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

        /* two-column row for name fields */
        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.85rem;
        }

        .field-group { display: flex; flex-direction: column; gap: 1.05rem; }

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

        .field input,
        .field select {
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
            appearance: none;
        }
        .field input::placeholder { color: #b0bec5; }
        .field input:focus,
        .field select:focus {
            border-color: #7c3aed;
            background: #faf7ff;
            box-shadow: 0 0 0 3.5px rgba(124, 58, 237, 0.1);
        }

        /* password wrapper for toggle icon */
        .password-wrap {
            position: relative;
        }
        .password-wrap input {
            padding-right: 2.75rem;
        }
        .toggle-pw {
            position: absolute;
            right: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            color: #94a3b8;
            transition: color 0.2s;
        }
        .toggle-pw:hover { color: #7c3aed; }

        .field-error {
            font-size: 0.75rem;
            color: #ef4444;
            margin-top: 0.15rem;
        }

        /* password strength bar */
        .strength-bar-wrap {
            display: flex;
            gap: 4px;
            margin-top: 0.5rem;
        }
        .strength-seg {
            flex: 1;
            height: 4px;
            border-radius: 2px;
            background: #e2e8f0;
            transition: background 0.3s;
        }
        .strength-label {
            font-size: 0.72rem;
            color: #94a3b8;
            margin-top: 0.2rem;
        }

        /* terms row */
        .terms-row {
            display: flex;
            align-items: flex-start;
            gap: 0.55rem;
            margin-top: 0.25rem;
        }
        .terms-row input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #7c3aed;
            cursor: pointer;
            flex-shrink: 0;
            margin-top: 2px;
        }
        .terms-row span {
            font-size: 0.83rem;
            color: #64748b;
            line-height: 1.5;
        }
        .terms-row a {
            color: #7c3aed;
            font-weight: 500;
            text-decoration: none;
        }
        .terms-row a:hover { color: #6d28d9; }

        /* submit button */
        .btn-register {
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
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(109, 40, 217, 0.45);
        }
        .btn-register:active { transform: translateY(0); }

        /* divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.25rem 0;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }
        .divider span {
            font-size: 0.78rem;
            color: #cbd5e1;
            white-space: nowrap;
        }

        /* login prompt */
        .login-prompt {
            text-align: center;
            font-size: 0.875rem;
            color: #94a3b8;
        }
        .login-prompt a {
            color: #7c3aed;
            font-weight: 600;
            text-decoration: none;
            margin-left: 0.25rem;
            transition: color 0.2s;
        }
        .login-prompt a:hover { color: #6d28d9; }

        /* progress steps */
        .progress-steps {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            margin-bottom: 1.75rem;
        }
        .step-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #e2e8f0;
            transition: background 0.3s, transform 0.3s;
        }
        .step-dot.active {
            background: #7c3aed;
            transform: scale(1.3);
        }
        .step-dot.done {
            background: #a78bfa;
        }
        .step-line {
            flex: 1;
            height: 2px;
            background: #e2e8f0;
            border-radius: 1px;
            max-width: 28px;
        }

        /* ── RIGHT PANEL (illustration side) ── */
        .panel-right {
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
        .panel-right::before {
            content: '';
            position: absolute;
            top: -80px; left: -80px;
            width: 340px; height: 340px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            pointer-events: none;
        }
        .panel-right::after {
            content: '';
            position: absolute;
            bottom: -100px; right: -60px;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            pointer-events: none;
        }

        .deco-card {
            position: absolute;
            border-radius: 16px;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            backdrop-filter: blur(4px);
        }
        .deco-card-1 { width: 110px; height: 70px; top: 12%; right: 6%; transform: rotate(8deg); }
        .deco-card-2 { width: 80px; height: 50px; top: 24%; right: 22%; transform: rotate(-4deg); }
        .deco-card-3 { width: 90px; height: 56px; bottom: 26%; left: 8%; transform: rotate(-6deg); }
        .deco-card-4 { width: 60px; height: 60px; top: 58%; right: 5%; border-radius: 50%; }

        /* brand mark */
        .brand-mark {
            position: absolute;
            top: 2rem; right: 2.5rem;
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

        /* benefit list inside caption */
        .benefit-list {
            margin-top: 1.25rem;
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            text-align: left;
        }
        .benefit-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.8);
        }
        .benefit-icon {
            width: 26px; height: 26px;
            border-radius: 8px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 860px) {
            body { flex-direction: column-reverse; }
            .panel-right {
                flex: none;
                padding: 2.5rem 2rem 2rem;
                min-height: 200px;
            }
            .illustration-wrap { max-width: 260px; }
            .panel-caption { display: none; }
            .panel-left {
                flex: none;
                padding: 2rem 1.5rem 3rem;
            }
            .brand-mark { top: 1.25rem; right: 1.5rem; }
            .field-row { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .panel-right { min-height: 180px; padding: 2rem 1.25rem 1.5rem; }
            .form-heading h1 { font-size: 1.75rem; }
            .field-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- ══════════════ LEFT PANEL (form) ══════════════ -->
    <div class="panel-left">
        <div class="form-wrap">

            <div class="form-heading">
                <h1>Buat akun,<span>mulai sekarang!</span></h1>
                <p>Daftar gratis dan kelola stok bisnis kamu dalam hitungan menit.</p>
            </div>

            <!-- Step indicator -->
            <div class="progress-steps">
                <div class="step-dot active"></div>
                <div class="step-line"></div>
                <div class="step-dot"></div>
                <div class="step-line"></div>
                <div class="step-dot"></div>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field-group">

                    <!-- Name row -->
                    <div class="field-row">
                        <div class="field">
                            <label for="first_name">Nama Depan</label>
                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                value="{{ old('first_name') }}"
                                placeholder="Budi"
                                required
                                autofocus
                            >
                            @error('first_name')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="last_name">Nama Belakang</label>
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                placeholder="Santoso"
                            >
                            @error('last_name')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="field">
                        <label for="username">Username</label>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="budi_santoso"
                            required
                        >
                        @error('username')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="field">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="kamu@email.com"
                            required
                        >
                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="field">
                        <label for="password">Password</label>
                        <div class="password-wrap">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Min. 8 karakter"
                                required
                                oninput="checkStrength(this.value)"
                            >
                            <button type="button" class="toggle-pw" onclick="togglePassword('password', this)" tabindex="-1" aria-label="Tampilkan password">
                                <svg id="eye-password" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                        <!-- Strength bar -->
                        <div class="strength-bar-wrap" id="strength-bar">
                            <div class="strength-seg" id="seg1"></div>
                            <div class="strength-seg" id="seg2"></div>
                            <div class="strength-seg" id="seg3"></div>
                            <div class="strength-seg" id="seg4"></div>
                        </div>
                        <span class="strength-label" id="strength-label">Masukkan password</span>
                        @error('password')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="field">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <div class="password-wrap">
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Ulangi password"
                                required
                            >
                            <button type="button" class="toggle-pw" onclick="togglePassword('password_confirmation', this)" tabindex="-1" aria-label="Tampilkan konfirmasi password">
                                <svg id="eye-password_confirmation" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <!-- Terms -->
                <div class="terms-row" style="margin-top: 1rem;">
                    <input type="checkbox" id="terms" name="terms" required>
                    <span>
                        Saya setuju dengan
                        <a href="#">Syarat &amp; Ketentuan</a>
                        dan
                        <a href="#">Kebijakan Privasi</a>
                        Stockify.
                    </span>
                </div>
                @error('terms')
                    <span class="field-error" style="margin-top:0.25rem; display:block;">{{ $message }}</span>
                @enderror

                <!-- Register button -->
                <button type="submit" class="btn-register">Buat Akun</button>

            </form>

            <div class="divider"><span>sudah punya akun?</span></div>

            @if (Route::has('login'))
                <p class="login-prompt">
                    Masuk ke akun kamu
                    <a href="{{ route('login') }}">Login di sini</a>
                </p>
            @endif

        </div>
    </div>

    <!-- ══════════════ RIGHT PANEL (illustration) ══════════════ -->
    <div class="panel-right">
        <!-- Brand -->
        <div class="brand-mark">
            <span>Stockify</span>
            <div class="brand-mark-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg" stroke="white" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                </svg>
            </div>
        </div>

        <!-- Decorative floating cards -->
        <div class="deco-card deco-card-1"></div>
        <div class="deco-card deco-card-2"></div>
        <div class="deco-card deco-card-3"></div>
        <div class="deco-card deco-card-4"></div>

        <!-- Illustration -->
        <div class="illustration-wrap">
            <svg viewBox="0 0 520 380" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="box-grad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#ede9fe"/>
                        <stop offset="100%" stop-color="#c4b5fd"/>
                    </linearGradient>
                    <linearGradient id="shelf-grad" x1="0" y1="0" x2="1" y2="0">
                        <stop offset="0%" stop-color="rgba(255,255,255,0.22)"/>
                        <stop offset="100%" stop-color="rgba(255,255,255,0.08)"/>
                    </linearGradient>
                    <linearGradient id="card-grad" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="rgba(255,255,255,0.18)"/>
                        <stop offset="100%" stop-color="rgba(255,255,255,0.06)"/>
                    </linearGradient>
                    <filter id="shadow2" x="-20%" y="-20%" width="140%" height="140%">
                        <feDropShadow dx="0" dy="10" stdDeviation="16" flood-color="rgba(0,0,0,0.22)"/>
                    </filter>
                </defs>

                <!-- Shelf / warehouse rack -->
                <!-- back wall -->
                <rect x="100" y="80" width="320" height="220" rx="18" fill="rgba(255,255,255,0.07)" stroke="rgba(255,255,255,0.15)" stroke-width="1.5"/>

                <!-- shelf boards -->
                <rect x="115" y="138" width="290" height="8" rx="4" fill="rgba(255,255,255,0.2)"/>
                <rect x="115" y="210" width="290" height="8" rx="4" fill="rgba(255,255,255,0.2)"/>
                <rect x="115" y="282" width="290" height="8" rx="4" fill="rgba(255,255,255,0.2)"/>

                <!-- vertical poles -->
                <rect x="115" y="80" width="8" height="222" rx="4" fill="rgba(255,255,255,0.18)"/>
                <rect x="397" y="80" width="8" height="222" rx="4" fill="rgba(255,255,255,0.18)"/>
                <rect x="255" y="80" width="6" height="222" rx="3" fill="rgba(255,255,255,0.1)"/>

                <!-- Row 1 boxes (top shelf) -->
                <!-- box 1 -->
                <rect x="128" y="98" width="50" height="38" rx="7" fill="#a78bfa" filter="url(#shadow2)"/>
                <rect x="128" y="98" width="50" height="12" rx="7" fill="#7c3aed"/>
                <rect x="137" y="104" width="32" height="3" rx="2" fill="rgba(255,255,255,0.4)"/>
                <!-- box 2 -->
                <rect x="185" y="102" width="44" height="34" rx="7" fill="#ddd6fe" filter="url(#shadow2)"/>
                <rect x="185" y="102" width="44" height="11" rx="7" fill="#c4b5fd"/>
                <!-- box 3 (taller) -->
                <rect x="240" y="94" width="38" height="42" rx="7" fill="#7c3aed" filter="url(#shadow2)"/>
                <rect x="249" y="100" width="22" height="3" rx="2" fill="rgba(255,255,255,0.3)"/>
                <!-- box 4 -->
                <rect x="287" y="105" width="46" height="31" rx="7" fill="#ede9fe" filter="url(#shadow2)"/>
                <rect x="287" y="105" width="46" height="11" rx="7" fill="#ddd6fe"/>
                <!-- box 5 -->
                <rect x="342" y="99" width="48" height="37" rx="7" fill="#8b5cf6" filter="url(#shadow2)"/>
                <rect x="342" y="99" width="48" height="12" rx="7" fill="#6d28d9"/>
                <rect x="351" y="105" width="30" height="3" rx="2" fill="rgba(255,255,255,0.35)"/>

                <!-- Row 2 boxes (mid shelf) -->
                <rect x="130" y="150" width="42" height="55" rx="7" fill="#c4b5fd" filter="url(#shadow2)"/>
                <rect x="180" y="155" width="60" height="50" rx="7" fill="#7c3aed" filter="url(#shadow2)"/>
                <rect x="188" y="162" width="44" height="3" rx="2" fill="rgba(255,255,255,0.3)"/>
                <rect x="188" y="168" width="30" height="3" rx="2" fill="rgba(255,255,255,0.2)"/>
                <!-- barcode lines on box -->
                <rect x="188" y="178" width="2" height="14" rx="1" fill="rgba(255,255,255,0.4)"/>
                <rect x="192" y="178" width="3" height="14" rx="1" fill="rgba(255,255,255,0.4)"/>
                <rect x="197" y="178" width="2" height="14" rx="1" fill="rgba(255,255,255,0.4)"/>
                <rect x="201" y="178" width="4" height="14" rx="1" fill="rgba(255,255,255,0.4)"/>
                <rect x="207" y="178" width="2" height="14" rx="1" fill="rgba(255,255,255,0.4)"/>
                <rect x="211" y="178" width="3" height="14" rx="1" fill="rgba(255,255,255,0.4)"/>
                <rect x="249" y="152" width="52" height="53" rx="7" fill="#ddd6fe" filter="url(#shadow2)"/>
                <rect x="310" y="157" width="46" height="48" rx="7" fill="#a78bfa" filter="url(#shadow2)"/>
                <rect x="362" y="154" width="36" height="51" rx="7" fill="#ede9fe" filter="url(#shadow2)"/>

                <!-- Row 3 boxes (lower shelf) -->
                <rect x="128" y="222" width="56" height="54" rx="7" fill="#7c3aed" filter="url(#shadow2)"/>
                <rect x="137" y="230" width="38" height="3" rx="2" fill="rgba(255,255,255,0.35)"/>
                <rect x="137" y="237" width="26" height="3" rx="2" fill="rgba(255,255,255,0.2)"/>
                <rect x="192" y="228" width="40" height="48" rx="7" fill="#c4b5fd" filter="url(#shadow2)"/>
                <rect x="240" y="225" width="70" height="51" rx="7" fill="#a78bfa" filter="url(#shadow2)"/>
                <rect x="318" y="230" width="44" height="46" rx="7" fill="#ddd6fe" filter="url(#shadow2)"/>
                <rect x="370" y="226" width="30" height="50" rx="7" fill="#8b5cf6" filter="url(#shadow2)"/>

                <!-- Floating stat card — top left -->
                <g transform="translate(28, 95)" filter="url(#shadow2)">
                    <rect width="108" height="62" rx="14" fill="url(#card-grad)" stroke="rgba(255,255,255,0.2)" stroke-width="1"/>
                    <text x="12" y="20" font-family="'DM Sans',sans-serif" font-size="8" fill="rgba(255,255,255,0.75)" font-weight="500">Total Produk</text>
                    <text x="12" y="42" font-family="'Syne',sans-serif" font-size="20" fill="white" font-weight="700">3,482</text>
                    <text x="12" y="54" font-family="'DM Sans',sans-serif" font-size="7" fill="rgba(255,255,255,0.5)">↑ 12% bulan ini</text>
                </g>

                <!-- Floating stat card — bottom right -->
                <g transform="translate(390, 300)" filter="url(#shadow2)">
                    <rect width="104" height="60" rx="14" fill="url(#card-grad)" stroke="rgba(255,255,255,0.2)" stroke-width="1"/>
                    <text x="12" y="20" font-family="'DM Sans',sans-serif" font-size="8" fill="rgba(255,255,255,0.75)" font-weight="500">Nilai Stok</text>
                    <text x="12" y="42" font-family="'Syne',sans-serif" font-size="15" fill="#fbbf24" font-weight="700">Rp 48 jt</text>
                    <text x="12" y="54" font-family="'DM Sans',sans-serif" font-size="7" fill="rgba(255,255,255,0.5)">Update terkini</text>
                </g>

                <!-- Scan icon indicator -->
                <g transform="translate(216, 315)">
                    <rect width="88" height="38" rx="10" fill="rgba(255,255,255,0.12)" stroke="rgba(255,255,255,0.25)" stroke-width="1"/>
                    <circle cx="19" cy="19" r="9" fill="#7c3aed"/>
                    <path d="M15 19 l3 3 l5-5" stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    <text x="33" y="15" font-family="'DM Sans',sans-serif" font-size="7.5" fill="rgba(255,255,255,0.85)" font-weight="500">Scan Barang</text>
                    <text x="33" y="26" font-family="'DM Sans',sans-serif" font-size="6.5" fill="rgba(255,255,255,0.5)">Realtime sync</text>
                </g>

                <!-- Ground shadow -->
                <ellipse cx="260" cy="352" rx="140" ry="12" fill="rgba(0,0,0,0.14)"/>
            </svg>
        </div>

        <!-- Caption + benefits -->
        <div class="panel-caption">
            <h2>Semua stok kamu, satu tempat yang rapi</h2>
            <p>Mulai gratis, tanpa kartu kredit. Upgrade kapan saja.</p>
            <div class="benefit-list">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                    </div>
                    Kelola ratusan SKU dengan mudah
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                    </div>
                    Notifikasi stok menipis otomatis
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                    </div>
                    Laporan penjualan & analitik real-time
                </div>
            </div>
        </div>
    </div>

    <script>
        // Password show/hide toggle
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            const svg = btn.querySelector('svg');
            if (isHidden) {
                // eye-off icon
                svg.innerHTML = `
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                    <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                    <line x1="1" y1="1" x2="23" y2="23"/>
                `;
            } else {
                svg.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                `;
            }
        }

        // Password strength meter
        function checkStrength(val) {
            const colors = { weak: '#ef4444', fair: '#f59e0b', good: '#10b981', strong: '#7c3aed' };
            const labels = { 0: 'Masukkan password', 1: 'Terlalu lemah', 2: 'Cukup kuat', 3: 'Kuat', 4: 'Sangat kuat' };
            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const colorMap = ['#e2e8f0', colors.weak, colors.fair, colors.good, colors.strong];
            const activeColor = val.length === 0 ? '#e2e8f0' : colorMap[score];

            for (let i = 1; i <= 4; i++) {
                const seg = document.getElementById('seg' + i);
                seg.style.background = i <= score && val.length > 0 ? activeColor : '#e2e8f0';
            }

            document.getElementById('strength-label').textContent = val.length === 0 ? labels[0] : labels[score];
            document.getElementById('strength-label').style.color = val.length === 0 ? '#94a3b8' : activeColor;
        }
    </script>

</body>
</html>