<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
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

        .btn-primary {
            padding: 0.6rem 1.25rem;
            border-radius: 12px;
            font-size: 0.85rem;
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

        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 4px 16px rgba(99,58,232,0.4); }

        .table-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 20px;
            overflow: hidden;
        }

        .table-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.07);
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
            color: rgba(100,116,139,0.6);
            background: rgba(0,0,0,0.2);
        }

        tbody tr { border-top: 1px solid rgba(255,255,255,0.05); transition: background 0.15s ease; }
        tbody tr:hover { background: rgba(255,255,255,0.03); }
        tbody td { padding: 1rem 1.5rem; font-size: 0.875rem; color: rgba(203,213,225,0.8); }

        .badge-kategori {
            display: inline-flex;
            padding: 0.2rem 0.75rem;
            border-radius: 99px;
            font-size: 0.7rem;
            font-weight: 500;
            background: rgba(99,58,232,0.12);
            color: #a78bfa;
            border: 1px solid rgba(99,58,232,0.2);
        }

        .btn-edit {
            padding: 0.3rem 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: rgba(20,184,166,0.12);
            color: #5eead4;
            border: 1px solid rgba(20,184,166,0.2);
            transition: all 0.15s ease;
        }

        .btn-edit:hover { background: rgba(20,184,166,0.2); }

        .btn-delete {
            padding: 0.3rem 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: rgba(239,68,68,0.12);
            color: #fca5a5;
            border: 1px solid rgba(239,68,68,0.2);
            transition: all 0.15s ease;
            cursor: pointer;
        }

        .btn-delete:hover { background: rgba(239,68,68,0.2); }

        .alert-success {
            padding: 0.85rem 1.25rem;
            border-radius: 12px;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            background: rgba(34,197,94,0.1);
            border: 1px solid rgba(34,197,94,0.2);
            color: #86efac;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: rgba(100,116,139,0.6);
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

        .search-input {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: #f1f5f9;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-size: 0.85rem;
            outline: none;
            transition: all 0.2s ease;
            width: 220px;
        }

        .search-input:focus {
            border-color: rgba(99,58,232,0.5);
            background: rgba(99,58,232,0.08);
        }

        .search-input::placeholder { color: rgba(100,116,139,0.5); }
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
                <h1 class="font-display text-xl font-700 text-white">Produk</h1>
                <p class="text-sm" style="color: rgba(148,163,184,0.6);">Kelola data produk kamu</p>
            </div>
            <a href="{{ route('products.create') }}" class="btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Produk
            </a>
        </div>

        <!-- Alert Success -->
        @if (session('success'))
            <div class="alert-success fade-up">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="table-card fade-up">
            <div class="table-header">
                <h3 class="font-display font-600 text-white text-base">
                    Daftar Produk
                    <span class="text-sm font-400 ml-2" style="color: rgba(148,163,184,0.5);">
                        ({{ $products->count() }} produk)
                    </span>
                </h3>
                <input type="text" class="search-input" placeholder="🔍 Cari produk..." onkeyup="searchTable(this.value)">
            </div>

            <table id="productTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product)
                        <tr>
                            <td style="color: rgba(100,116,139,0.6);">{{ $index + 1 }}</td>
                            <td class="text-white font-500">{{ $product->nama }}</td>
                            <td><span class="badge-kategori">{{ $product->kategori }}</span></td>
                            <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td>
                                <span style="color: {{ $product->stok > 10 ? '#86efac' : ($product->stok > 0 ? '#fde047' : '#fca5a5') }}">
                                    {{ $product->stok }} pcs
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('products.destroy', $product->id) }}" onsubmit="return confirm('Yakin hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto mb-3 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    <p class="text-sm">Belum ada produk. Tambahkan produk pertama kamu!</p>
                                    <a href="{{ route('products.create') }}" class="btn-primary mt-4 inline-flex">+ Tambah Produk</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>

    <script>
        function searchTable(value) {
            const rows = document.querySelectorAll('#productTable tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(value.toLowerCase()) ? '' : 'none';
            });
        }
    </script>
</body>
</html>