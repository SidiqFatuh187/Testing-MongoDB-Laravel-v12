<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk — Stockify</title>
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

        .btn-primary {
            padding: 0.6rem 1.25rem;
            border-radius: 11px;
            font-size: 0.825rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            color: white;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'DM Sans', sans-serif;
            box-shadow: 0 4px 14px rgba(124, 58, 237, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.4);
        }

        .btn-primary svg { width: 15px; height: 15px; }

        /* ─── ALERT ─── */
        .alert-success {
            padding: 0.85rem 1.25rem;
            border-radius: 12px;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #16a34a;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }

        .alert-success svg { width: 16px; height: 16px; flex-shrink: 0; }

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
            gap: 1rem;
        }

        .card-header-left h3 {
            font-family: 'Syne', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            color: #1e1b4b;
        }

        .card-header-left span {
            font-size: 0.775rem;
            color: #a78bfa;
            font-weight: 400;
            margin-left: 0.4rem;
        }

        .search-input {
            background: #faf9ff;
            border: 1.5px solid #ede9fe;
            color: #1e1b4b;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-size: 0.825rem;
            outline: none;
            transition: all 0.2s ease;
            width: 220px;
            font-family: 'DM Sans', sans-serif;
        }

        .search-input:focus {
            border-color: #c4b5fd;
            background: #f5f3ff;
        }

        .search-input::placeholder { color: #c4b5fd; }

        /* ─── TABLE ─── */
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
            padding: 0.95rem 1.5rem;
            font-size: 0.85rem;
            color: #64748b;
        }

        tbody td.td-name {
            color: #1e1b4b;
            font-weight: 600;
        }

        tbody td.td-num {
            color: #c4b5fd;
            font-size: 0.8rem;
        }

        /* ─── BADGES ─── */
        .badge-kategori {
            display: inline-flex;
            padding: 0.2rem 0.65rem;
            border-radius: 99px;
            font-size: 0.68rem;
            font-weight: 600;
            background: #f5f3ff;
            color: #7c3aed;
            border: 1px solid #ddd6fe;
        }

        .stock-high  { color: #16a34a; font-weight: 600; }
        .stock-low   { color: #ca8a04; font-weight: 600; }
        .stock-empty { color: #dc2626; font-weight: 600; }

        /* ─── ACTION BUTTONS ─── */
        .action-wrap {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-edit {
            padding: 0.3rem 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
            transition: all 0.15s ease;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-edit:hover { background: #dcfce7; border-color: #86efac; }
        .btn-edit svg { width: 13px; height: 13px; }

        .btn-delete {
            padding: 0.3rem 0.75rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #fff5f5;
            color: #dc2626;
            border: 1px solid #fecaca;
            transition: all 0.15s ease;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-delete:hover { background: #fee2e2; border-color: #fca5a5; }
        .btn-delete svg { width: 13px; height: 13px; }

        /* ─── EMPTY STATE ─── */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #c4b5fd;
        }

        .empty-state svg {
            width: 48px; height: 48px;
            margin: 0 auto 1rem;
            color: #ddd6fe;
        }

        .empty-state p {
            font-size: 0.875rem;
            color: #94a3b8;
            margin-bottom: 1.25rem;
        }

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

        /* ─── RESPONSIVE ─── */
        @media (max-width: 860px) {
            .sidebar {
                width: 68px;
                padding: 1.25rem 0.5rem;
                overflow: hidden;
            }
            .logo-label, .nav-item span, .nav-section-label, .logout-text { display: none; }
            .sidebar-logo { justify-content: center; padding: 0.5rem 0; }
            .nav-item { justify-content: center; padding: 0.65rem; }
            .main { margin-left: 68px; padding: 1.5rem 1.25rem; }
            .topbar-left h1 { font-size: 1.25rem; }
            .search-input { width: 160px; }
        }

        @media (max-width: 640px) {
            .card-header { flex-direction: column; align-items: flex-start; }
            .search-input { width: 100%; }
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

        <!-- Topbar -->
        <div class="topbar fade-up">
            <div class="topbar-left">
                <h1>Produk</h1>
                <p>Kelola semua data produk kamu</p>
            </div>
            <a href="{{ route('products.create') }}" class="btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Produk
            </a>
        </div>

        <!-- Alert Success -->
        @if (session('success'))
            <div class="alert-success fade-up">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="table-card fade-up">
            <div class="card-header">
                <div class="card-header-left">
                    <h3>
                        Daftar Produk
                        <span>({{ $products->count() }} produk)</span>
                    </h3>
                </div>
                <input
                    type="text"
                    class="search-input"
                    placeholder="🔍  Cari produk..."
                    onkeyup="searchTable(this.value)"
                >
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
                            <td class="td-num">{{ $index + 1 }}</td>
                            <td class="td-name">{{ $product->nama }}</td>
                            <td><span class="badge-kategori">{{ $product->kategori }}</span></td>
                            <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td>
                                @if ($product->stok > 10)
                                    <span class="stock-high">{{ $product->stok }} pcs</span>
                                @elseif ($product->stok > 0)
                                    <span class="stock-low">{{ $product->stok }} pcs</span>
                                @else
                                    <span class="stock-empty">Habis</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-wrap">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <button type="button" class="btn-delete" data-action="{{ route('products.destroy', $product->id) }}" data-name="{{ $product->nama }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    <p>Belum ada produk. Tambahkan produk pertama kamu!</p>
                                    <a href="{{ route('products.create') }}" class="btn-primary" style="display: inline-flex;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" style="width:15px;height:15px;">
                                        </svg>
                                       + Tambah Produk
                                    </a>
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

        // Delete button handler
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.getAttribute('data-action');
                const name = this.getAttribute('data-name');
                openDeleteModal(action, name);
            });
        });
    </script>
    @include('products._delete')
</body>
</html>