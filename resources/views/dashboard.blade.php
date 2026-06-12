<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Stockify</title>
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

        .logo-icon svg { width: 18px; height: 18px; color: white; }

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

        .nav-item:hover {
            background: #f5f3ff;
            color: #7c3aed;
        }

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
            text-decoration: none;
            transition: all 0.2s ease;
            width: 100%;
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
        }

        .logout-btn svg { width: 18px; height: 18px; flex-shrink: 0; }

        .logout-btn:hover {
            background: #fff5f5;
            color: #ef4444;
        }

        /* ─── MAIN ─── */
        .main {
            margin-left: 252px;
            padding: 2rem 2.5rem;
            flex: 1;
            min-height: 100vh;
        }

        /* ─── TOPBAR ─── */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .topbar-left h1 {
            font-family: 'Syne', sans-serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: #1e1b4b;
            letter-spacing: -0.03em;
            line-height: 1.2;
        }

        .topbar-left p {
            font-size: 0.825rem;
            color: #a78bfa;
            margin-top: 0.2rem;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .topbar-notif {
            width: 38px; height: 38px;
            border-radius: 10px;
            border: 1.5px solid #ede9fe;
            background: #fff;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }

        .topbar-notif svg { width: 18px; height: 18px; color: #a78bfa; }

        .topbar-notif:hover { border-color: #c4b5fd; background: #faf7ff; }

        .notif-dot {
            position: absolute;
            top: 7px; right: 8px;
            width: 7px; height: 7px;
            background: #7c3aed;
            border-radius: 50%;
            border: 1.5px solid #fff;
        }

        .avatar-wrap {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            background: #fff;
            border: 1.5px solid #ede9fe;
            border-radius: 12px;
            padding: 0.4rem 0.75rem 0.4rem 0.4rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .avatar-wrap:hover { border-color: #c4b5fd; background: #faf7ff; }

        .avatar {
            width: 32px; height: 32px;
            border-radius: 8px;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem;
            font-weight: 700;
            color: white;
            flex-shrink: 0;
        }

        .avatar-info p { font-size: 0.8rem; font-weight: 600; color: #1e1b4b; line-height: 1.3; }
        .avatar-info span { font-size: 0.7rem; color: #a78bfa; }

        /* ─── WELCOME BANNER ─── */
        .welcome-banner {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 60%, #5b21b6 100%);
            border-radius: 20px;
            padding: 1.75rem 2rem;
            margin-bottom: 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -40px; right: -40px;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            pointer-events: none;
        }

        .welcome-banner::after {
            content: '';
            position: absolute;
            bottom: -60px; left: 30%;
            width: 260px; height: 260px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
            pointer-events: none;
        }

        .welcome-banner h2 {
            font-family: 'Syne', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.3;
            position: relative;
            z-index: 1;
        }

        .welcome-banner p {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.65);
            margin-top: 0.3rem;
            position: relative;
            z-index: 1;
        }

        .btn-white {
            position: relative;
            z-index: 1;
            padding: 0.6rem 1.25rem;
            border-radius: 11px;
            font-size: 0.825rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            background: rgba(255,255,255,0.15);
            color: white;
            backdrop-filter: blur(8px);
            border: 1.5px solid rgba(255,255,255,0.25);
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'DM Sans', sans-serif;
            white-space: nowrap;
        }

        .btn-white:hover {
            background: rgba(255,255,255,0.25);
            border-color: rgba(255,255,255,0.4);
        }

        .btn-white svg { width: 15px; height: 15px; }

        /* Product thumbnail and action buttons for dashboard */
        .product-thumb {
            width: 40px; height: 40px; border-radius: 8px;
            display: inline-flex; align-items: center; justify-content: center;
            background: linear-gradient(135deg,#ede9fe,#f5f3ff); color: #4c1d95; font-weight:700;
            font-size: 0.9rem; margin-right: 0.6rem; flex-shrink:0;
        }

        .action-wrap { display:flex; gap:0.5rem; align-items:center; }
        .btn-edit { padding:0.35rem 0.65rem; border-radius:8px; font-weight:600; background:#f0fdf4; color:#16a34a; border:1px solid #bbf7d0; text-decoration:none; }
        .btn-delete { padding:0.35rem 0.65rem; border-radius:8px; font-weight:600; background:#fff5f5; color:#dc2626; border:1px solid #fecaca; cursor:pointer; }

        /* ─── STATS GRID ─── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
            margin-bottom: 1.75rem;
        }

        .stat-card {
            background: #ffffff;
            border: 1.5px solid #ede9fe;
            border-radius: 18px;
            padding: 1.4rem;
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            border-color: #c4b5fd;
            box-shadow: 0 8px 28px rgba(124, 58, 237, 0.1);
            transform: translateY(-2px);
        }

        .stat-icon {
            width: 42px; height: 42px;
            border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1rem;
        }

        .stat-icon svg { width: 20px; height: 20px; }

        .stat-number {
            font-family: 'Syne', sans-serif;
            font-size: 1.7rem;
            font-weight: 800;
            color: #1e1b4b;
            line-height: 1;
            letter-spacing: -0.03em;
        }

        .stat-label {
            font-size: 0.775rem;
            color: #94a3b8;
            margin-top: 0.3rem;
            font-weight: 500;
        }

        .stat-change {
            font-size: 0.72rem;
            margin-top: 0.75rem;
            display: flex;
            align-items: center;
            gap: 3px;
            font-weight: 500;
        }

        .stat-change svg { width: 12px; height: 12px; }
        .change-up { color: #22c55e; }
        .change-down { color: #f87171; }
        .change-neutral { color: #a78bfa; }

        /* ─── BOTTOM GRID ─── */
        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 1.25rem;
        }

        /* ─── TABLE CARD ─── */
        .table-card {
            background: #ffffff;
            border: 1.5px solid #ede9fe;
            border-radius: 18px;
            overflow: hidden;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header h3 {
            font-family: 'Syne', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            color: #1e1b4b;
        }

        .see-all {
            font-size: 0.775rem;
            color: #a78bfa;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .see-all:hover { color: #7c3aed; }

        table { width: 100%; border-collapse: collapse; }

        thead th {
            padding: 0.7rem 1.5rem;
            text-align: left;
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #c4b5fd;
            background: #faf9ff;
            font-weight: 600;
        }

        tbody tr {
            border-top: 1px solid #f8f7ff;
            transition: background 0.15s ease;
        }

        tbody tr:hover { background: #faf9ff; }

        tbody td {
            padding: 0.9rem 1.5rem;
            font-size: 0.85rem;
            color: #64748b;
        }

        tbody td.td-name {
            color: #1e1b4b;
            font-weight: 500;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.2rem 0.65rem;
            border-radius: 99px;
            font-size: 0.68rem;
            font-weight: 600;
        }

        .badge-green  { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
        .badge-yellow { background: #fefce8; color: #ca8a04; border: 1px solid #fef08a; }
        .badge-red    { background: #fff5f5; color: #dc2626; border: 1px solid #fecaca; }

        /* ─── SIDE PANEL ─── */
        .side-panel {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .mini-card {
            background: #ffffff;
            border: 1.5px solid #ede9fe;
            border-radius: 18px;
            padding: 1.25rem 1.4rem;
        }

        .mini-card h3 {
            font-family: 'Syne', sans-serif;
            font-size: 0.875rem;
            font-weight: 700;
            color: #1e1b4b;
            margin-bottom: 1rem;
        }

        /* Stock level mini list */
        .stock-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.55rem 0;
            border-bottom: 1px solid #f8f7ff;
        }

        .stock-item:last-child { border-bottom: none; }

        .stock-item-name {
            font-size: 0.8rem;
            font-weight: 500;
            color: #1e1b4b;
        }

        .stock-item-sub {
            font-size: 0.7rem;
            color: #94a3b8;
            margin-top: 1px;
        }

        .stock-bar-wrap {
            flex: 1;
            margin: 0 0.75rem;
            background: #f1f5f9;
            border-radius: 99px;
            height: 5px;
            overflow: hidden;
        }

        .stock-bar {
            height: 100%;
            border-radius: 99px;
        }

        .stock-qty {
            font-size: 0.75rem;
            font-weight: 600;
            color: #475569;
            white-space: nowrap;
        }

        /* Quick actions */
        .quick-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.65rem;
        }

        .quick-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.45rem;
            padding: 0.85rem 0.5rem;
            border-radius: 12px;
            border: 1.5px solid #ede9fe;
            background: #faf9ff;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }

        .quick-btn:hover {
            border-color: #c4b5fd;
            background: #f5f3ff;
            transform: translateY(-1px);
        }

        .quick-btn svg { width: 20px; height: 20px; color: #7c3aed; }
        .quick-btn span { font-size: 0.72rem; font-weight: 600; color: #4c1d95; text-align: center; }

        /* ─── ANIMATIONS ─── */
        .fade-up {
            opacity: 0;
            transform: translateY(14px);
            animation: fadeUp 0.45s ease forwards;
        }

        @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }

        .fade-up:nth-child(1) { animation-delay: 0.04s; }
        .fade-up:nth-child(2) { animation-delay: 0.09s; }
        .fade-up:nth-child(3) { animation-delay: 0.14s; }
        .fade-up:nth-child(4) { animation-delay: 0.19s; }
        .fade-up:nth-child(5) { animation-delay: 0.24s; }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .bottom-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 860px) {
            .sidebar {
                width: 68px;
                padding: 1.25rem 0.5rem;
                overflow: hidden;
            }
            .logo-label, .nav-item span, .nav-section-label, .sidebar-bottom .logout-text { display: none; }
            .sidebar-logo { justify-content: center; padding: 0.5rem 0; }
            .nav-item { justify-content: center; padding: 0.65rem; }
            .main { margin-left: 68px; padding: 1.5rem 1.25rem; }
            .topbar-left h1 { font-size: 1.25rem; }
            .avatar-info { display: none; }
        }

        @media (max-width: 640px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: 0.75rem; }
            .welcome-banner { flex-direction: column; align-items: flex-start; gap: 1rem; }
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

        <a href="#" class="nav-item active">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('products.index') }}" class="nav-item">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
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

        <!-- Topbar -->
        <div class="topbar fade-up">
            <div class="topbar-left">
                <h1>Dashboard</h1>
                <p>{{ now()->translatedFormat('l, d F Y') }}</p>
            </div>
            <div class="topbar-right">
                <div class="topbar-notif">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="notif-dot"></span>
                </div>
                <div class="avatar-wrap">
                    <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    <div class="avatar-info">
                        <p>{{ Auth::user()->name }}</p>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Welcome Banner -->
        <div class="welcome-banner fade-up">
            <div>
                <h2>Halo, {{ Auth::user()->name }}! 👋</h2>
                <p>Selamat datang di dashboard. Semua sistem berjalan normal.</p>
            </div>
            <a href="#" class="btn-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Data
            </a>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid fade-up">

            <!-- Total Produk -->
            <div class="stat-card">
                <div class="stat-icon" style="background: #f5f3ff;">
                    <svg style="color: #7c3aed;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10m0-10l8-4" />
                    </svg>
                </div>
                <div class="stat-number">{{ $totalProducts }}</div>
                <div class="stat-label">Total Produk</div>
                <div class="stat-change change-neutral">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                    </svg>
                    Inventori
                </div>
            </div>

            <!-- Total Nilai Stok -->
            <div class="stat-card">
                <div class="stat-icon" style="background: #f0fdf4;">
                    <svg style="color: #16a34a;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="stat-number">Rp {{ number_format($totalStockValue / 1000000, 1, ',', '.') }}jt</div>
                <div class="stat-label">Nilai Stok</div>
                <div class="stat-change change-up">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    Total aset
                </div>
            </div>

            <!-- Produk Habis -->
            <div class="stat-card">
                <div class="stat-icon" style="background: #fff7ed;">
                    <svg style="color: #ea580c;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="stat-number">{{ $productsOutOfStock }}</div>
                <div class="stat-label">Produk Habis</div>
                @php
                    $outOfStockClass = $productsOutOfStock > 0 ? 'change-down' : 'change-up';
                    $outOfStockText = $productsOutOfStock > 0 ? 'Perlu restock' : 'Semua ready';
                    $outOfStockIcon = $productsOutOfStock > 0 ? 'M19 14l-7 7m0 0l-7-7m7 7V3' : 'M5 10l7-7m0 0l7 7m-7-7v18';
                @endphp
                <div class="stat-change {{ $outOfStockClass }}">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $outOfStockIcon }}" />
                    </svg>
                    {{ $outOfStockText }}
                </div>
            </div>

            <!-- Kategori -->
            <div class="stat-card">
                <div class="stat-icon" style="background: #fefce8;">
                    <svg style="color: #ca8a04;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <div class="stat-number">{{ $uniqueCategories }}</div>
                <div class="stat-label">Kategori</div>
                <div class="stat-change change-neutral">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                    </svg>
                    Tipe produk
                </div>
            </div>

        </div>

        <!-- Bottom Grid: Table + Side Panel -->
        <div class="bottom-grid fade-up">

            <!-- Products Table -->
                <div class="table-card">
                    <div class="card-header">
                        <h3>Produk Terbaru</h3>
                        <a href="{{ route('products.index') }}" class="see-all">Lihat semua →</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td><div class="product-thumb">{{ strtoupper(substr($product->nama,0,1)) }}</div></td>
                                    <td class="td-name">{{ $product->nama }}</td>
                                    <td><span class="badge @if($product->stok > 10) badge-green @elseif($product->stok > 0) badge-yellow @else badge-red @endif">{{ $product->kategori }}</span></td>
                                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td>
                                        @if($product->stok > 10)
                                            {{ $product->stok }} pcs
                                        @elseif($product->stok > 0)
                                            {{ $product->stok }} pcs
                                        @else
                                            Habis
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-wrap">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">Edit</a>
                                            <button type="button" class="btn-delete" data-action="{{ route('products.destroy', $product->id) }}" data-name="{{ $product->nama }}">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align:center; padding:1.25rem; color:#94a3b8;">Belum ada produk. <a href="{{ route('products.create') }}" class="see-all">Tambah produk</a></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div style="padding:0.75rem 1rem; display:flex; justify-content:flex-end;">
                        {{ $products->links() }}
                    </div>
                </div>

            <!-- Side Panel -->
            <div class="side-panel">
                <!-- Low Stock Alert -->
                <div class="mini-card">
                    <h3>⚠ Stok Hampir Habis</h3>
                    @forelse($lowStockProducts as $p)
                        @php
                            $percent = $maxStock ? intval(($p->stok / $maxStock) * 100) : 0;
                            if ($percent < 5) $percent = 5;
                            if ($p->stok <= 5) { $barColor = '#f87171'; $qtyColor = '#ef4444'; }
                            elseif ($p->stok <= 15) { $barColor = '#fb923c'; $qtyColor = '#ea580c'; }
                            else { $barColor = '#facc15'; $qtyColor = '#ca8a04'; }
                        @endphp
                        <div class="stock-item">
                            <div>
                                <div class="stock-item-name">{{ $p->nama }}</div>
                                <div class="stock-item-sub">{{ $p->kategori }}</div>
                            </div>
                            <div class="stock-bar-wrap">
                                <div class="stock-bar" style="width: {{ $percent }}%; background: {{ $barColor }};"></div>
                            </div>
                            <div class="stock-qty" style="color: {{ $qtyColor }};">{{ $p->stok }} pcs</div>
                        </div>
                    @empty
                        <div style="color:#64748b; font-size:0.9rem;">Semua stok aman — tidak ada produk kritis.</div>
                    @endforelse
                </div>

            </div>
        </div>

    </main>

    @include('products._delete')

    <script>
        // attach delete handlers (use data-action / data-name)
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.getAttribute('data-action');
                const name = this.getAttribute('data-name');
                openDeleteModal(action, name);
            });
        });
    </script>

</body>
</html>