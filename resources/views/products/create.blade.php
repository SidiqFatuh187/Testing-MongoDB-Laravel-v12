<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap');

        * { font-family: 'DM Sans', sans-serif; box-sizing: border-box; }
        h1, h2, h3, .font-display { font-family: 'Syne', sans-serif; }

        body {
            background-color: #0a0a0f;
            background-image:
                radial-gradient(ellipse 70% 50% at 10% 0%, rgba(99, 58, 232, 0.2) 0%, transparent 60%),
                radial-gradient(ellipse 50% 40% at 90% 90%, rgba(20, 184, 166, 0.12) 0%, transparent 55%);
            min-height: 100vh;
            color: #f1f5f9;
        }

        .noise {
            position: fixed;
            inset: 0;
            opacity: 0.03;
            pointer-events: none;
            z-index: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: rgba(255, 255, 255, 0.03);
            border-right: 1px solid rgba(255, 255, 255, 0.07);
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
            padding: 1.5rem 1rem;
            z-index: 10;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.5rem 0.75rem;
            margin-bottom: 2rem;
        }

        .logo-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #6d28d9, #4f46e5);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 16px rgba(99, 58, 232, 0.4);
            flex-shrink: 0;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.65rem 0.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            color: rgba(148, 163, 184, 0.7);
            text-decoration: none;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }

        .nav-item:hover { background: rgba(255,255,255,0.06); color: #f1f5f9; }
        .nav-item.active { background: rgba(99,58,232,0.15); color: #a78bfa; border: 1px solid rgba(99,58,232,0.2); }
        .nav-item svg { width: 18px; height: 18px; flex-shrink: 0; }

        .nav-section-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(100, 116, 139, 0.5);
            padding: 0 0.75rem;
            margin: 1rem 0 0.5rem;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.65rem 0.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            color: rgba(248, 113, 113, 0.7);
            text-decoration: none;
            transition: all 0.2s ease;
            width: 100%;
            background: none;
            border: none;
            cursor: pointer;
            margin-top: auto;
        }

        .logout-btn:hover { background: rgba(239,68,68,0.08); color: #fca5a5; }
        .logout-btn svg { width: 18px; height: 18px; }

        .main {
            margin-left: 240px;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            color: rgba(100,116,139,0.6);
            margin-bottom: 0.35rem;
        }
        .breadcrumb a {
            color: rgba(167,139,250,0.7);
            text-decoration: none;
            transition: color 0.15s;
        }
        .breadcrumb a:hover { color: #a78bfa; }
        .breadcrumb svg { width: 12px; height: 12px; }

        /* Form card */
        .form-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 20px;
            overflow: hidden;
            max-width: 640px;
        }

        .form-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-header-icon {
            width: 34px; height: 34px;
            border-radius: 10px;
            background: rgba(99,58,232,0.15);
            border: 1px solid rgba(99,58,232,0.25);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .form-body {
            padding: 1.75rem 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        /* Row untuk 2 kolom */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .form-label {
            font-size: 0.78rem;
            font-weight: 500;
            color: rgba(148,163,184,0.8);
            letter-spacing: 0.02em;
        }

        .form-label span {
            color: rgba(248,113,113,0.7);
            margin-left: 2px;
        }

        .form-input {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: #f1f5f9;
            padding: 0.65rem 1rem;
            border-radius: 12px;
            font-size: 0.875rem;
            outline: none;
            transition: all 0.2s ease;
            width: 100%;
        }

        .form-input:focus {
            border-color: rgba(99,58,232,0.5);
            background: rgba(99,58,232,0.07);
            box-shadow: 0 0 0 3px rgba(99,58,232,0.08);
        }

        .form-input::placeholder { color: rgba(100,116,139,0.45); }

        /* Input prefix (Rp) */
        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-prefix {
            position: absolute;
            left: 1rem;
            font-size: 0.8rem;
            color: rgba(100,116,139,0.6);
            pointer-events: none;
            font-weight: 500;
        }

        .input-suffix {
            position: absolute;
            right: 1rem;
            font-size: 0.8rem;
            color: rgba(100,116,139,0.6);
            pointer-events: none;
        }

        .form-input.has-prefix { padding-left: 2.75rem; }
        .form-input.has-suffix { padding-right: 3rem; }

        /* Hint text */
        .form-hint {
            font-size: 0.72rem;
            color: rgba(100,116,139,0.5);
            margin-top: 2px;
        }

        /* Error */
        .form-error {
            font-size: 0.72rem;
            color: #fca5a5;
            margin-top: 2px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .form-error svg { width: 12px; height: 12px; flex-shrink: 0; }

        .form-input.is-error {
            border-color: rgba(239,68,68,0.4);
            background: rgba(239,68,68,0.05);
        }

        /* Divider */
        .form-divider {
            height: 1px;
            background: rgba(255,255,255,0.06);
            margin: 0.25rem 0;
        }

        /* Footer actions */
        .form-footer {
            padding: 1.25rem 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.07);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-cancel {
            padding: 0.6rem 1.25rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.05);
            color: rgba(148,163,184,0.8);
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-cancel:hover { background: rgba(255,255,255,0.09); color: #f1f5f9; }

        .btn-primary {
            padding: 0.6rem 1.4rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            border: none;
            background: linear-gradient(135deg, #6d28d9, #4f46e5);
            color: white;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 4px 16px rgba(99,58,232,0.4); }
        .btn-primary:active { transform: translateY(0); }

        /* Category pills */
        .category-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 6px;
        }

        .pill {
            padding: 0.25rem 0.75rem;
            border-radius: 99px;
            font-size: 0.72rem;
            font-weight: 500;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.09);
            color: rgba(148,163,184,0.6);
            cursor: pointer;
            transition: all 0.15s ease;
            user-select: none;
        }

        .pill:hover { background: rgba(99,58,232,0.1); border-color: rgba(99,58,232,0.2); color: #a78bfa; }
        .pill.selected { background: rgba(99,58,232,0.15); border-color: rgba(99,58,232,0.3); color: #a78bfa; }

        /* Animations */
        .fade-up {
            opacity: 0;
            transform: translateY(16px);
            animation: fadeUp 0.5s ease forwards;
        }
        @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
        .fade-up:nth-child(1) { animation-delay: 0.05s; }
        .fade-up:nth-child(2) { animation-delay: 0.1s; }
        .fade-up:nth-child(3) { animation-delay: 0.15s; }
    </style>
</head>
<body>
    <div class="noise"></div>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <span class="font-display font-700 text-white text-base">MyApp</span>
        </div>

        <span class="nav-section-label">Menu Utama</span>

        <a href="{{ route('dashboard') }}" class="nav-item">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>

        <a href="{{ route('products.index') }}" class="nav-item active">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            Produk
        </a>

        <form method="POST" action="{{ route('logout') }}" style="margin-top: auto;">
            @csrf
            <button type="submit" class="logout-btn">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Keluar
            </button>
        </form>
    </aside>

    <!-- Main -->
    <main class="main">

        <!-- Topbar -->
        <div class="topbar fade-up">
            <div>
                <div class="breadcrumb">
                    <a href="{{ route('products.index') }}">Produk</a>
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <span>Tambah Baru</span>
                </div>
                <h1 class="font-display text-xl font-700 text-white">Tambah Produk</h1>
                <p class="text-sm" style="color: rgba(148,163,184,0.6);">Isi detail produk yang ingin ditambahkan</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="form-card fade-up">
            <div class="form-header">
                <div class="form-header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#a78bfa" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-display font-600 text-white text-sm">Informasi Produk</h3>
                    <p style="font-size: 0.72rem; color: rgba(100,116,139,0.6); margin-top: 1px;">Semua field bertanda <span style="color: rgba(248,113,113,0.7);">*</span> wajib diisi</p>
                </div>
            </div>

            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                <div class="form-body">

                    <!-- Nama Produk -->
                    <div class="form-group">
                        <label class="form-label" for="nama">
                            Nama Produk <span>*</span>
                        </label>
                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            class="form-input {{ $errors->has('nama') ? 'is-error' : '' }}"
                            placeholder="Contoh: Sepatu Lari Pro X"
                            value="{{ old('nama') }}"
                            autofocus
                        >
                        @error('nama')
                            <span class="form-error">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="form-group">
                        <label class="form-label" for="kategori">
                            Kategori <span>*</span>
                        </label>
                        <input
                            type="text"
                            id="kategori"
                            name="kategori"
                            class="form-input {{ $errors->has('kategori') ? 'is-error' : '' }}"
                            placeholder="Contoh: Elektronik"
                            value="{{ old('kategori') }}"
                        >
                        <!-- Quick pick pills -->
                        <div class="category-pills">
                            @foreach (['Elektronik', 'Fashion', 'Makanan', 'Minuman', 'Olahraga', 'Furnitur', 'Kesehatan', 'Lainnya'] as $cat)
                                <span class="pill {{ old('kategori') === $cat ? 'selected' : '' }}" onclick="setKategori('{{ $cat }}')">
                                    {{ $cat }}
                                </span>
                            @endforeach
                        </div>
                        @error('kategori')
                            <span class="form-error">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-divider"></div>

                    <!-- Harga & Stok (2 kolom) -->
                    <div class="form-row">
                        <!-- Harga -->
                        <div class="form-group">
                            <label class="form-label" for="harga">
                                Harga <span>*</span>
                            </label>
                            <div class="input-wrapper">
                                <span class="input-prefix">Rp</span>
                                <input
                                    type="number"
                                    id="harga"
                                    name="harga"
                                    class="form-input has-prefix {{ $errors->has('harga') ? 'is-error' : '' }}"
                                    placeholder="0"
                                    value="{{ old('harga') }}"
                                    min="0"
                                    step="100"
                                >
                            </div>
                            @error('harga')
                                <span class="form-error">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Stok -->
                        <div class="form-group">
                            <label class="form-label" for="stok">
                                Stok <span>*</span>
                            </label>
                            <div class="input-wrapper">
                                <input
                                    type="number"
                                    id="stok"
                                    name="stok"
                                    class="form-input has-suffix {{ $errors->has('stok') ? 'is-error' : '' }}"
                                    placeholder="0"
                                    value="{{ old('stok') }}"
                                    min="0"
                                >
                                <span class="input-suffix">pcs</span>
                            </div>
                            @error('stok')
                                <span class="form-error">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>

                <!-- Footer actions -->
                <div class="form-footer">
                    <a href="{{ route('products.index') }}" class="btn-cancel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </a>
                    <button type="submit" class="btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>

    </main>

    <script>
        function setKategori(val) {
            const input = document.getElementById('kategori');
            input.value = val;

            // Update pill active state
            document.querySelectorAll('.pill').forEach(p => {
                p.classList.toggle('selected', p.textContent.trim() === val);
            });

            input.focus();
        }

        // Sync pills jika user ngetik manual
        document.getElementById('kategori').addEventListener('input', function () {
            const val = this.value.trim();
            document.querySelectorAll('.pill').forEach(p => {
                p.classList.toggle('selected', p.textContent.trim() === val);
            });
        });
    </script>
</body>
</html>