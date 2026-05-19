<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
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

        /* Badge ID produk */
        .product-id-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 0.25rem 0.75rem;
            border-radius: 99px;
            font-size: 0.72rem;
            font-weight: 500;
            background: rgba(20,184,166,0.1);
            color: #5eead4;
            border: 1px solid rgba(20,184,166,0.2);
        }

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
            justify-content: space-between;
        }

        .form-header-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-header-icon {
            width: 34px; height: 34px;
            border-radius: 10px;
            background: rgba(20,184,166,0.1);
            border: 1px solid rgba(20,184,166,0.2);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .form-body {
            padding: 1.75rem 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

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
            border-color: rgba(20,184,166,0.45);
            background: rgba(20,184,166,0.06);
            box-shadow: 0 0 0 3px rgba(20,184,166,0.07);
        }

        .form-input::placeholder { color: rgba(100,116,139,0.45); }

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

        .form-divider {
            height: 1px;
            background: rgba(255,255,255,0.06);
            margin: 0.25rem 0;
        }

        .form-footer {
            padding: 1.25rem 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.07);
            display: flex;
            align-items: center;
            justify-content: space-between;
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
            background: linear-gradient(135deg, #0d9488, #0891b2);
            color: white;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 4px 16px rgba(20,184,166,0.35); }
        .btn-primary:active { transform: translateY(0); }

        /* Tombol hapus di footer */
        .btn-danger {
            padding: 0.6rem 1.1rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            border: 1px solid rgba(239,68,68,0.2);
            background: rgba(239,68,68,0.08);
            color: #fca5a5;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-danger:hover { background: rgba(239,68,68,0.15); border-color: rgba(239,68,68,0.3); }

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

        .pill:hover { background: rgba(20,184,166,0.1); border-color: rgba(20,184,166,0.2); color: #5eead4; }
        .pill.selected { background: rgba(20,184,166,0.12); border-color: rgba(20,184,166,0.25); color: #5eead4; }

        /* Changed indicator */
        .changed-dot {
            display: none;
            width: 6px; height: 6px;
            border-radius: 99px;
            background: #fbbf24;
            margin-left: 4px;
        }

        .form-label.has-change .changed-dot { display: inline-block; }

        .footer-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="width:18px;height:18px;color:white">
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
                    <span>Edit</span>
                </div>
                <h1 class="font-display text-xl font-700 text-white">Edit Produk</h1>
                <p class="text-sm" style="color: rgba(148,163,184,0.6);">Perbarui informasi produk</p>
            </div>
            <span class="product-id-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                </svg>
                ID {{ $product->id }}
            </span>
        </div>

        <!-- Form Card -->
        <div class="form-card fade-up">
            <div class="form-header">
                <div class="form-header-left">
                    <div class="form-header-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="#5eead4" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-display font-600 text-white text-sm">{{ $product->nama }}</h3>
                        <p style="font-size: 0.72rem; color: rgba(100,116,139,0.6); margin-top: 1px;">Ubah field yang ingin diperbarui</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('products.update', $product->id) }}" id="editForm">
                @csrf
                @method('PUT')

                <div class="form-body">

                    <!-- Nama Produk -->
                    <div class="form-group">
                        <label class="form-label" for="nama" id="label-nama">
                            Nama Produk <span>*</span>
                            <span class="changed-dot"></span>
                        </label>
                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            class="form-input {{ $errors->has('nama') ? 'is-error' : '' }}"
                            placeholder="Nama produk"
                            value="{{ old('nama', $product->nama) }}"
                            data-original="{{ $product->nama }}"
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
                        <label class="form-label" for="kategori" id="label-kategori">
                            Kategori <span>*</span>
                            <span class="changed-dot"></span>
                        </label>
                        <input
                            type="text"
                            id="kategori"
                            name="kategori"
                            class="form-input {{ $errors->has('kategori') ? 'is-error' : '' }}"
                            placeholder="Kategori produk"
                            value="{{ old('kategori', $product->kategori) }}"
                            data-original="{{ $product->kategori }}"
                        >
                        <div class="category-pills">
                            @foreach (['Elektronik', 'Fashion', 'Makanan', 'Minuman', 'Olahraga', 'Furnitur', 'Kesehatan', 'Lainnya'] as $cat)
                                <span
                                    class="pill {{ old('kategori', $product->kategori) === $cat ? 'selected' : '' }}"
                                    onclick="setKategori('{{ $cat }}')"
                                >
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

                    <!-- Harga & Stok -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="harga" id="label-harga">
                                Harga <span>*</span>
                                <span class="changed-dot"></span>
                            </label>
                            <div class="input-wrapper">
                                <span class="input-prefix">Rp</span>
                                <input
                                    type="number"
                                    id="harga"
                                    name="harga"
                                    class="form-input has-prefix {{ $errors->has('harga') ? 'is-error' : '' }}"
                                    placeholder="0"
                                    value="{{ old('harga', $product->harga) }}"
                                    data-original="{{ $product->harga }}"
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

                        <div class="form-group">
                            <label class="form-label" for="stok" id="label-stok">
                                Stok <span>*</span>
                                <span class="changed-dot"></span>
                            </label>
                            <div class="input-wrapper">
                                <input
                                    type="number"
                                    id="stok"
                                    name="stok"
                                    class="form-input has-suffix {{ $errors->has('stok') ? 'is-error' : '' }}"
                                    placeholder="0"
                                    value="{{ old('stok', $product->stok) }}"
                                    data-original="{{ $product->stok }}"
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

            </form>{{-- tutup form edit di sini --}}

            {{-- Form hapus + tombol aksi, di luar form edit --}}
            <form method="POST" action="{{ route('products.destroy', $product->id) }}" id="deleteForm" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                @csrf
                @method('DELETE')
            </form>

            <div class="form-footer">
                {{-- Tombol hapus submit ke deleteForm --}}
                <button type="submit" form="deleteForm" class="btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus
                </button>

                {{-- Batal + Simpan --}}
                <div class="footer-actions">
                    <a href="{{ route('products.index') }}" class="btn-cancel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </a>
                    <button type="submit" form="editForm" class="btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </div>

        </div>{{-- tutup .form-card --}}

    </main>

    <script>
        // Category pill quick-pick
        function setKategori(val) {
            const input = document.getElementById('kategori');
            input.value = val;
            syncPills(val);
            checkChanged(input);
        }

        function syncPills(val) {
            document.querySelectorAll('.pill').forEach(p => {
                p.classList.toggle('selected', p.textContent.trim() === val);
            });
        }

        // Detect changed fields → tampilkan dot kuning
        function checkChanged(input) {
            const original = input.dataset.original;
            const label = document.getElementById('label-' + input.id);
            if (!label) return;
            if (String(input.value) !== String(original)) {
                label.classList.add('has-change');
            } else {
                label.classList.remove('has-change');
            }
        }

        // Pasang event listener di semua input yang punya data-original
        document.querySelectorAll('.form-input[data-original]').forEach(input => {
            input.addEventListener('input', () => {
                checkChanged(input);
                if (input.id === 'kategori') syncPills(input.value.trim());
            });
        });

        // Jalankan sekali saat load (jika ada old() dari validasi gagal)
        document.querySelectorAll('.form-input[data-original]').forEach(checkChanged);
    </script>
</body>
</html>