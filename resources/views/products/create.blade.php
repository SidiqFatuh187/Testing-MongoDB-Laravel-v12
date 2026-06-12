<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk — Stockify</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f8f7ff;
            min-height: 100vh;
            color: #1e1b4b;
            display: flex;
        }

        /* ─── SIDEBAR ─── */
        .sidebar {
            width: 252px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #ede9fe;
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
            padding: 1.5rem 1rem;
            z-index: 20;
            box-shadow: 4px 0 24px rgba(124, 58, 237, 0.05);
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.5rem 0.75rem;
            margin-bottom: 2.25rem;
        }

        .logo-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 14px rgba(124, 58, 237, 0.4);
            flex-shrink: 0;
        }

        .logo-icon svg { width: 18px; height: 18px; }

        .logo-label {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            color: #1e1b4b;
            letter-spacing: -0.02em;
        }

        .nav-section-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #c4b5fd;
            padding: 0 0.75rem;
            margin: 1rem 0 0.4rem;
            font-weight: 600;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.65rem 0.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }

        .nav-item svg { width: 18px; height: 18px; flex-shrink: 0; }
        .nav-item:hover { background: #f5f3ff; color: #7c3aed; }

        .nav-item.active {
            background: linear-gradient(135deg, #ede9fe, #f5f3ff);
            color: #7c3aed;
            border: 1px solid #ddd6fe;
            font-weight: 600;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid #f1f5f9;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.65rem 0.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
            color: #f87171;
            transition: all 0.2s ease;
            width: 100%;
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
        }

        .logout-btn svg { width: 18px; height: 18px; flex-shrink: 0; }
        .logout-btn:hover { background: #fff5f5; color: #ef4444; }

        /* ─── MAIN ─── */
        .main {
            margin-left: 252px;
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ─── TOPBAR ─── */
        .topbar {
            padding: 1.75rem 2.5rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ede9fe;
            background: #ffffff;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar-left {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
            color: #94a3b8;
            font-weight: 500;
        }

        .breadcrumb a {
            color: #a78bfa;
            text-decoration: none;
            transition: color 0.15s;
        }

        .breadcrumb a:hover { color: #7c3aed; }
        .breadcrumb svg { width: 11px; height: 11px; color: #c4b5fd; }

        .topbar-left h1 {
            font-family: 'Syne', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: #1e1b4b;
            letter-spacing: -0.03em;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-cancel {
            padding: 0.6rem 1.2rem;
            border-radius: 11px;
            font-size: 0.825rem;
            font-weight: 600;
            cursor: pointer;
            border: 1.5px solid #e2e8f0;
            background: #ffffff;
            color: #64748b;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-cancel:hover { background: #f8f7ff; border-color: #c4b5fd; color: #7c3aed; }
        .btn-cancel svg { width: 14px; height: 14px; }

        .btn-primary {
            padding: 0.6rem 1.4rem;
            border-radius: 11px;
            font-size: 0.825rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            color: white;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'DM Sans', sans-serif;
            box-shadow: 0 4px 14px rgba(124, 58, 237, 0.3);
        }

        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(124, 58, 237, 0.4); }
        .btn-primary:active { transform: translateY(0); }
        .btn-primary svg { width: 14px; height: 14px; }

        /* ─── CONTENT AREA ─── */
        .content-area {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 0;
        }

        /* ─── FORM PANEL (left) ─── */
        .form-panel {
            padding: 2rem 2.5rem;
            border-right: 1px solid #ede9fe;
            overflow-y: auto;
        }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: 0.8rem;
            font-weight: 700;
            color: #c4b5fd;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #ede9fe;
        }

        /* ─── FORM FIELDS ─── */
        .form-block {
            margin-bottom: 2rem;
        }

        .form-grid-2 {
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
            font-weight: 600;
            color: #475569;
            letter-spacing: 0.02em;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .form-label .req { color: #f87171; }

        .form-input {
            background: #ffffff;
            border: 1.5px solid #e2e8f0;
            color: #1e1b4b;
            padding: 0.7rem 1rem;
            border-radius: 12px;
            font-size: 0.875rem;
            outline: none;
            transition: all 0.2s ease;
            width: 100%;
            font-family: 'DM Sans', sans-serif;
        }

        .form-input:focus {
            border-color: #c4b5fd;
            background: #faf7ff;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.07);
        }

        .form-input::placeholder { color: #d1c7fb; }

        .form-input.is-error {
            border-color: #fca5a5;
            background: #fff5f5;
        }

        /* Input with prefix/suffix */
        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-prefix {
            position: absolute;
            left: 1rem;
            font-size: 0.8rem;
            color: #94a3b8;
            pointer-events: none;
            font-weight: 600;
        }

        .input-suffix {
            position: absolute;
            right: 1rem;
            font-size: 0.8rem;
            color: #94a3b8;
            pointer-events: none;
            font-weight: 500;
        }

        .form-input.has-prefix { padding-left: 2.75rem; }
        .form-input.has-suffix { padding-right: 3rem; }

        /* Textarea */
        .form-textarea {
            background: #ffffff;
            border: 1.5px solid #e2e8f0;
            color: #1e1b4b;
            padding: 0.7rem 1rem;
            border-radius: 12px;
            font-size: 0.875rem;
            outline: none;
            transition: all 0.2s ease;
            width: 100%;
            font-family: 'DM Sans', sans-serif;
            resize: vertical;
            min-height: 90px;
        }

        .form-textarea:focus {
            border-color: #c4b5fd;
            background: #faf7ff;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.07);
        }

        .form-textarea::placeholder { color: #d1c7fb; }

        /* Error */
        .form-error {
            font-size: 0.72rem;
            color: #ef4444;
            display: flex;
            align-items: center;
            gap: 4px;
            font-weight: 500;
        }

        .form-error svg { width: 12px; height: 12px; flex-shrink: 0; }

        /* Hint text */
        .form-hint {
            font-size: 0.72rem;
            color: #94a3b8;
        }

        /* ─── CATEGORY PILLS ─── */
        .category-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 8px;
        }

        .pill {
            padding: 0.3rem 0.85rem;
            border-radius: 99px;
            font-size: 0.72rem;
            font-weight: 600;
            background: #f8f7ff;
            border: 1.5px solid #e2e8f0;
            color: #94a3b8;
            cursor: pointer;
            transition: all 0.15s ease;
            user-select: none;
        }

        .pill:hover {
            background: #f5f3ff;
            border-color: #c4b5fd;
            color: #7c3aed;
        }

        .pill.selected {
            background: #ede9fe;
            border-color: #a78bfa;
            color: #7c3aed;
        }

        /* ─── STOCK SLIDER VISUAL ─── */
        .stock-track {
            height: 6px;
            background: #ede9fe;
            border-radius: 99px;
            margin-top: 10px;
            overflow: hidden;
        }

        .stock-fill {
            height: 100%;
            border-radius: 99px;
            background: linear-gradient(90deg, #7c3aed, #a78bfa);
            width: 0%;
            transition: width 0.3s ease;
        }

        /* ─── SIDE PANEL (right) ─── */
        .side-panel {
            padding: 2rem 1.75rem;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        /* Preview card */
        .preview-card {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            border-radius: 16px;
            padding: 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
            min-height: 168px;
        }

        .preview-card::before {
            content: '';
            position: absolute;
            top: -30px; right: -30px;
            width: 120px; height: 120px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }

        .preview-card::after {
            content: '';
            position: absolute;
            bottom: -20px; left: -20px;
            width: 80px; height: 80px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }

        .preview-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(255,255,255,0.55);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .preview-name {
            font-family: 'Syne', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.35rem;
            min-height: 1.5rem;
            word-break: break-word;
        }

        .preview-name.empty { color: rgba(255,255,255,0.3); font-weight: 400; font-size: 0.875rem; }

        .preview-cat {
            display: inline-flex;
            align-items: center;
            padding: 0.15rem 0.6rem;
            background: rgba(255,255,255,0.15);
            border-radius: 99px;
            font-size: 0.68rem;
            font-weight: 600;
            color: rgba(255,255,255,0.85);
            margin-bottom: 1.25rem;
        }

        .preview-cat.empty { color: rgba(255,255,255,0.3); background: rgba(255,255,255,0.08); }

        .preview-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            position: relative;
            z-index: 1;
        }

        .preview-price {
            font-family: 'Syne', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: white;
        }

        .preview-price.empty { color: rgba(255,255,255,0.3); font-size: 0.875rem; font-weight: 400; font-family: 'DM Sans', sans-serif; }

        .preview-stock-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 8px;
            font-size: 0.72rem;
            font-weight: 700;
            background: rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.9);
        }

        .preview-stock-badge.empty { color: rgba(255,255,255,0.3); }

        /* Info panels */
        .info-panel {
            border: 1.5px solid #ede9fe;
            border-radius: 14px;
            overflow: hidden;
        }

        .info-panel-head {
            padding: 0.75rem 1rem;
            background: #faf9ff;
            border-bottom: 1px solid #ede9fe;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-panel-head span {
            font-size: 0.75rem;
            font-weight: 700;
            color: #1e1b4b;
        }

        .info-panel-head svg {
            width: 14px; height: 14px;
            color: #a78bfa;
            flex-shrink: 0;
        }

        .info-panel-body {
            padding: 0.85rem 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 0.775rem;
            color: #64748b;
            line-height: 1.4;
        }

        .info-row svg {
            width: 13px; height: 13px;
            color: #a78bfa;
            flex-shrink: 0;
            margin-top: 1px;
        }

        /* Stock indicator */
        .stock-indicator {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .stock-indicator-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stock-label-text { font-size: 0.72rem; font-weight: 600; color: #475569; }
        .stock-value-text { font-size: 0.72rem; font-weight: 700; color: #7c3aed; }

        /* ─── ANIMATIONS ─── */
        .fade-up {
            opacity: 0;
            transform: translateY(12px);
            animation: fadeUp 0.4s ease forwards;
        }

        @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }

        .fade-up:nth-child(1) { animation-delay: 0.03s; }
        .fade-up:nth-child(2) { animation-delay: 0.07s; }
        .fade-up:nth-child(3) { animation-delay: 0.12s; }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 1100px) {
            .content-area { grid-template-columns: 1fr; }
            .side-panel { border-top: 1px solid #ede9fe; }
        }

        @media (max-width: 860px) {
            .sidebar {
                width: 68px;
                padding: 1.25rem 0.5rem;
                overflow: hidden;
            }
            .logo-label, .nav-item span, .nav-section-label, .logout-text { display: none; }
            .sidebar-logo { justify-content: center; padding: 0.5rem 0; }
            .nav-item { justify-content: center; padding: 0.65rem; }
            .main { margin-left: 68px; }
            .topbar { padding: 1.25rem 1.5rem; }
            .form-panel { padding: 1.5rem; }
        }

        @media (max-width: 560px) {
            .form-grid-2 { grid-template-columns: 1fr; }
            .topbar-actions .btn-cancel { display: none; }
        }
    </style>
</head>
<body>

    <!-- ══════════════ SIDEBAR ══════════════ -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                </svg>
            </div>
            <span class="logo-label">Stockify</span>
        </div>

        <span class="nav-section-label">Menu Utama</span>

        <a href="{{ route('dashboard') }}" class="nav-item">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('products.index') }}" class="nav-item active">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            <span>Produk</span>
        </a>

        <span class="nav-section-label">Pengaturan</span>

        <a href="#" class="nav-item">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Pengaturan</span>
        </a>

        <div class="sidebar-bottom">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="logout-text">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- ══════════════ MAIN ══════════════ -->
    <main class="main">

        <!-- Sticky Topbar -->
        <div class="topbar fade-up">
            <div class="topbar-left">
                <div class="breadcrumb">
                    <a href="{{ route('products.index') }}">Produk</a>
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <span>Tambah Baru</span>
                </div>
                <h1>Tambah Produk</h1>
            </div>
            <div class="topbar-actions">
                <a href="{{ route('products.index') }}" class="btn-cancel">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Batal
                </a>
                <button type="submit" form="product-form" class="btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Produk
                </button>
            </div>
        </div>

        <!-- Content: Form + Side Panel -->
        <form id="product-form" method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="content-area">

                <!-- ─── FORM PANEL ─── -->
                <div class="form-panel fade-up">

                    <!-- Section: Info Dasar -->
                    <div class="form-block">
                        <p class="section-title">Info Dasar</p>

                        <div class="form-group" style="margin-bottom: 1.25rem;">
                            <label class="form-label" for="nama">
                                Nama Produk <span class="req">*</span>
                            </label>
                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                class="form-input {{ $errors->has('nama') ? 'is-error' : '' }}"
                                placeholder="Contoh: Sepatu Lari Pro X"
                                value="{{ old('nama') }}"
                                autofocus
                                oninput="updatePreview()"
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

                        <div class="form-group">
                            <label class="form-label" for="kategori">
                                Kategori <span class="req">*</span>
                            </label>
                            <input
                                type="text"
                                id="kategori"
                                name="kategori"
                                class="form-input {{ $errors->has('kategori') ? 'is-error' : '' }}"
                                placeholder="Pilih atau ketik kategori..."
                                value="{{ old('kategori') }}"
                                oninput="syncPills(); updatePreview();"
                            >
                            <div class="category-pills">
                                @foreach (['Elektronik', 'Fashion', 'Makanan', 'Minuman', 'Olahraga', 'Furnitur', 'Kesehatan', 'Lainnya'] as $cat)
                                    <span class="pill {{ old('kategori') === $cat ? 'selected' : '' }}"
                                          onclick="setKategori('{{ $cat }}')">{{ $cat }}</span>
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
                    </div>

                    <!-- Section: Harga & Stok -->
                    <div class="form-block">
                        <p class="section-title">Harga & Stok</p>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label class="form-label" for="harga">
                                    Harga Jual <span class="req">*</span>
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
                                        oninput="updatePreview()"
                                    >
                                </div>
                                <span class="form-hint">Gunakan angka tanpa titik atau koma</span>
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
                                <label class="form-label" for="stok">
                                    Jumlah Stok <span class="req">*</span>
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
                                        oninput="updatePreview(); updateStockBar();"
                                    >
                                    <span class="input-suffix">pcs</span>
                                </div>
                                <span class="form-hint">Stok ≤ 10 akan ditandai rendah</span>
                                @error('stok')
                                    <span class="form-error">
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $message }}
                                    </span>
                                @enderror

                                <!-- Stock bar -->
                                <div class="stock-indicator" id="stockIndicator" style="display:none;">
                                    <div class="stock-indicator-head">
                                        <span class="stock-label-text">Level stok</span>
                                        <span class="stock-value-text" id="stockLevelText">—</span>
                                    </div>
                                    <div class="stock-track">
                                        <div class="stock-fill" id="stockFill"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Deskripsi (opsional) -->
                    <div class="form-block">
                        <p class="section-title">Deskripsi <span style="font-weight:400;color:#c4b5fd;text-transform:none;letter-spacing:0;font-family:'DM Sans',sans-serif;font-size:0.7rem;"> — opsional</span></p>
                        <div class="form-group">
                            <label class="form-label" for="deskripsi">Deskripsi Produk</label>
                            <textarea
                                id="deskripsi"
                                name="deskripsi"
                                class="form-textarea"
                                placeholder="Tuliskan detail produk seperti bahan, ukuran, warna, dll..."
                            >{{ old('deskripsi') }}</textarea>
                            <span class="form-hint">Deskripsi membantu pembeli memahami produkmu lebih baik</span>
                        </div>
                    </div>

                </div>

                <!-- ─── SIDE PANEL ─── -->
                <div class="side-panel fade-up">

                    <!-- Live Preview Card -->
                    <div>
                        <p style="font-size:0.7rem;font-weight:700;color:#c4b5fd;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:0.75rem;">Pratinjau Produk</p>
                        <div class="preview-card">
                            <p class="preview-label">Produk Baru</p>
                            <p class="preview-name empty" id="previewName">Nama produk…</p>
                            <div>
                                <span class="preview-cat empty" id="previewCat">Tanpa kategori</span>
                            </div>
                            <div class="preview-row">
                                <span class="preview-price empty" id="previewPrice">Rp —</span>
                                <span class="preview-stock-badge empty" id="previewStock">0 pcs</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tips panel -->
                    <div class="info-panel">
                        <div class="info-panel-head">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Tips Pengisian</span>
                        </div>
                        <div class="info-panel-body">
                            <div class="info-row">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Gunakan nama produk yang spesifik agar mudah dicari.
                            </div>
                            <div class="info-row">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Pilih kategori yang sesuai untuk mempermudah filter.
                            </div>
                            <div class="info-row">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Harga diisi dalam rupiah tanpa titik, contoh: 150000.
                            </div>
                            <div class="info-row">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Stok di bawah 10 akan tampil sebagai peringatan rendah.
                            </div>
                        </div>
                    </div>

                    <!-- Required fields note -->
                    <div style="padding: 0.85rem 1rem; background: #faf9ff; border: 1.5px solid #ede9fe; border-radius: 12px; display: flex; align-items: flex-start; gap: 8px;">
                        <svg style="width:14px;height:14px;color:#a78bfa;flex-shrink:0;margin-top:1px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span style="font-size:0.75rem;color:#64748b;line-height:1.5;">
                            Field bertanda <span style="color:#f87171;font-weight:700;">*</span> wajib diisi sebelum menyimpan produk.
                        </span>
                    </div>

                </div>
            </div>
        </form>

    </main>

    <script>
        function formatRupiah(num) {
            if (!num || isNaN(num)) return null;
            return 'Rp ' + parseInt(num).toLocaleString('id-ID');
        }

        function updatePreview() {
            const nama   = document.getElementById('nama').value.trim();
            const kat    = document.getElementById('kategori').value.trim();
            const harga  = document.getElementById('harga').value;
            const stok   = document.getElementById('stok').value;

            const pName  = document.getElementById('previewName');
            const pCat   = document.getElementById('previewCat');
            const pPrice = document.getElementById('previewPrice');
            const pStock = document.getElementById('previewStock');

            pName.textContent = nama || 'Nama produk…';
            pName.className   = 'preview-name' + (nama ? '' : ' empty');

            pCat.textContent  = kat || 'Tanpa kategori';
            pCat.className    = 'preview-cat' + (kat ? '' : ' empty');

            const priceFormatted = formatRupiah(harga);
            pPrice.textContent   = priceFormatted || 'Rp —';
            pPrice.className     = 'preview-price' + (priceFormatted ? '' : ' empty');

            pStock.textContent   = stok ? stok + ' pcs' : '0 pcs';
            pStock.className     = 'preview-stock-badge' + (stok ? '' : ' empty');
        }

        function updateStockBar() {
            const stok = parseInt(document.getElementById('stok').value) || 0;
            const ind  = document.getElementById('stockIndicator');
            const fill = document.getElementById('stockFill');
            const txt  = document.getElementById('stockLevelText');

            if (stok > 0) {
                ind.style.display = 'flex';
                const pct = Math.min(stok, 100);
                fill.style.width = pct + '%';
                if (stok === 0)        { txt.textContent = 'Habis'; txt.style.color = '#dc2626'; fill.style.background = '#fca5a5'; }
                else if (stok <= 10)   { txt.textContent = 'Rendah'; txt.style.color = '#ca8a04'; fill.style.background = 'linear-gradient(90deg,#f59e0b,#fbbf24)'; }
                else                   { txt.textContent = 'Aman'; txt.style.color = '#16a34a'; fill.style.background = 'linear-gradient(90deg,#7c3aed,#a78bfa)'; }
            } else {
                ind.style.display = 'none';
            }
        }

        function setKategori(val) {
            const input = document.getElementById('kategori');
            input.value = val;
            syncPills();
            updatePreview();
            input.focus();
        }

        function syncPills() {
            const val = document.getElementById('kategori').value.trim();
            document.querySelectorAll('.pill').forEach(p => {
                p.classList.toggle('selected', p.textContent.trim() === val);
            });
        }

        // Init on page load for old() values
        updatePreview();
        updateStockBar();
        syncPills();
    </script>
</body>
</html>