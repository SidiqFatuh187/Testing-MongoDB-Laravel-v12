<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        /* Sidebar */
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

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #f1f5f9;
        }

        .nav-item.active {
            background: rgba(99, 58, 232, 0.15);
            color: #a78bfa;
            border: 1px solid rgba(99, 58, 232, 0.2);
        }

        .nav-item svg { width: 18px; height: 18px; flex-shrink: 0; }

        .nav-section-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(100, 116, 139, 0.5);
            padding: 0 0.75rem;
            margin: 1rem 0 0.5rem;
        }

        /* Main Content */
        .main {
            margin-left: 240px;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        /* Topbar */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6d28d9, #0d9488);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
        }

        /* Cards */
        .card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 1.5rem;
            transition: all 0.2s ease;
        }

        .card:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.12);
            transform: translateY(-2px);
        }

        .stat-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1rem;
        }

        .stat-number {
            font-family: 'Syne', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: #f1f5f9;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.8rem;
            color: rgba(148, 163, 184, 0.6);
            margin-top: 0.25rem;
        }

        .stat-change {
            font-size: 0.75rem;
            margin-top: 0.75rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Table */
        .table-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            overflow: hidden;
        }

        .table-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        table { width: 100%; border-collapse: collapse; }
        thead th {
            padding: 0.75rem 1.5rem;
            text-align: left;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: rgba(100, 116, 139, 0.6);
            background: rgba(0,0,0,0.2);
        }

        tbody tr {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            transition: background 0.15s ease;
        }

        tbody tr:hover { background: rgba(255, 255, 255, 0.03); }

        tbody td {
            padding: 1rem 1.5rem;
            font-size: 0.875rem;
            color: rgba(203, 213, 225, 0.8);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.2rem 0.65rem;
            border-radius: 99px;
            font-size: 0.7rem;
            font-weight: 500;
        }

        .badge-green  { background: rgba(34, 197, 94, 0.12);  color: #86efac; border: 1px solid rgba(34, 197, 94, 0.2); }
        .badge-yellow { background: rgba(234, 179, 8, 0.12);  color: #fde047; border: 1px solid rgba(234, 179, 8, 0.2); }
        .badge-red    { background: rgba(239, 68, 68, 0.12);  color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.2); }

        /* Welcome banner */
        .welcome-banner {
            background: linear-gradient(135deg, rgba(99, 58, 232, 0.2), rgba(79, 70, 229, 0.1));
            border: 1px solid rgba(99, 58, 232, 0.25);
            border-radius: 20px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn-sm {
            padding: 0.5rem 1.25rem;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            border: none;
            background: linear-gradient(135deg, #6d28d9, #4f46e5);
            color: white;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-sm:hover { transform: translateY(-1px); box-shadow: 0 4px 16px rgba(99, 58, 232, 0.4); }

        .fade-up {
            opacity: 0;
            transform: translateY(16px);
            animation: fadeUp 0.5s ease forwards;
        }
        @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }
        .fade-up:nth-child(1) { animation-delay: 0.05s; }
        .fade-up:nth-child(2) { animation-delay: 0.1s; }
        .fade-up:nth-child(3) { animation-delay: 0.15s; }
        .fade-up:nth-child(4) { animation-delay: 0.2s; }
        .fade-up:nth-child(5) { animation-delay: 0.25s; }

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

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.08);
            color: #fca5a5;
        }

        .logout-btn svg { width: 18px; height: 18px; }
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

        <a href="#" class="nav-item active">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>

        <a href="#" class="nav-item">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Pengguna
        </a>

        <a href="{{ route('products.index') }}" class="nav-item">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            Laporan Produk
        </a>

        <span class="nav-section-label">Pengaturan</span>

        <a href="#" class="nav-item">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Pengaturan
        </a>

        <!-- Logout -->
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

    <!-- Main Content -->
    <main class="main">

        <!-- Topbar -->
        <div class="topbar fade-up">
            <div>
                <h1 class="font-display text-xl font-700 text-white">Dashboard</h1>
                <p class="text-sm" style="color: rgba(148,163,184,0.6);">{{ now()->translatedFormat('l, d F Y') }}</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-500 text-white">{{ Auth::user()->name }}</p>
                    <p class="text-xs" style="color: rgba(148,163,184,0.5);">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Welcome Banner -->
        <div class="welcome-banner fade-up">
            <div>
                <h2 class="font-display text-lg font-700 text-white mb-1">
                    Halo, {{ Auth::user()->name }}! 👋
                </h2>
                <p class="text-sm" style="color: rgba(148,163,184,0.7);">
                    Selamat datang di dashboard. Semua berjalan dengan baik.
                </p>
            </div>
            <a href="#" class="btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Data
            </a>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-4 gap-4 mb-6 fade-up">
            <div class="card">
                <div class="stat-icon" style="background: rgba(99, 58, 232, 0.15);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" style="color: #a78bfa;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="stat-number">1,240</div>
                <div class="stat-label">Total Pengguna</div>
                <div class="stat-change" style="color: #86efac;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +12% bulan ini
                </div>
            </div>

            <div class="card">
                <div class="stat-icon" style="background: rgba(20, 184, 166, 0.15);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" style="color: #5eead4;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
                <div class="stat-number">98.2%</div>
                <div class="stat-label">Uptime Server</div>
                <div class="stat-change" style="color: #86efac;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    Stabil
                </div>
            </div>

            <div class="card">
                <div class="stat-icon" style="background: rgba(236, 72, 153, 0.15);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" style="color: #f9a8d4;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <div class="stat-number">340</div>
                <div class="stat-label">Transaksi</div>
                <div class="stat-change" style="color: #fca5a5;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                    -3% minggu ini
                </div>
            </div>

            <div class="card">
                <div class="stat-icon" style="background: rgba(234, 179, 8, 0.15);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" style="color: #fde047;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="stat-number">Rp 24jt</div>
                <div class="stat-label">Pendapatan</div>
                <div class="stat-change" style="color: #86efac;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +8% bulan ini
                </div>
            </div>
        </div>

        <!-- Recent Activity Table -->
        <div class="table-card fade-up">
            <div class="table-header">
                <h3 class="font-display font-600 text-white text-base">Aktivitas Terbaru</h3>
                <a href="#" class="text-xs" style="color: rgba(139, 92, 246, 0.8);">Lihat semua →</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                        <th>Waktu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-white">Budi Santoso</td>
                        <td>Login</td>
                        <td>2 menit lalu</td>
                        <td><span class="badge badge-green">Berhasil</span></td>
                    </tr>
                    <tr>
                        <td class="text-white">Siti Rahayu</td>
                        <td>Daftar Akun</td>
                        <td>15 menit lalu</td>
                        <td><span class="badge badge-green">Berhasil</span></td>
                    </tr>
                    <tr>
                        <td class="text-white">Ahmad Fauzi</td>
                        <td>Tambah Data</td>
                        <td>1 jam lalu</td>
                        <td><span class="badge badge-yellow">Pending</span></td>
                    </tr>
                    <tr>
                        <td class="text-white">Dewi Lestari</td>
                        <td>Login</td>
                        <td>2 jam lalu</td>
                        <td><span class="badge badge-red">Gagal</span></td>
                    </tr>
                    <tr>
                        <td class="text-white">Rizky Pratama</td>
                        <td>Update Profil</td>
                        <td>3 jam lalu</td>
                        <td><span class="badge badge-green">Berhasil</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>