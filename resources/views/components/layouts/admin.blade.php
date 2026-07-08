<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel — ThaiTravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --gold: #d4a843;
            --gold-dark: #b8860b;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --bg: #f1f5f9;
            --card-bg: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
        }

        body {
            background: var(--bg);
            font-family: 'Poppins', sans-serif;
            margin: 0;
            color: var(--text-primary);
        }

        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--sidebar-bg);
            color: white;
            padding: 30px 20px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 20px rgba(0,0,0,0.2);
        }

        .sidebar .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--gold);
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar .menu {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 6px;
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar .menu i {
            width: 22px;
            font-size: 1.1rem;
            text-align: center;
        }

        .sidebar .menu:hover,
        .sidebar .menu.active {
            background: var(--sidebar-hover);
            color: var(--gold);
        }

        .content {
            margin-left: 280px;
            padding: 40px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
            transition: all 0.3s;
        }

        .card:hover {
            box-shadow: 0 12px 28px rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }

        .btn-gold {
            background: var(--gold);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-gold:hover {
            background: var(--gold-dark);
            box-shadow: 0 8px 20px rgba(184,134,11,0.25);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <i class="fa-solid fa-umbrella-beach"></i> ThaiAdmin
        </div>

        <a href="{{ route('admin.dashboard') }}" class="menu {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-pie"></i> Dashboard
        </a>
        <a href="{{ route('admin.verifikasi') }}" class="menu {{ request()->routeIs('admin.verifikasi') ? 'active' : '' }}">
            <i class="fa-solid fa-check-double"></i> Verifikasi
        </a>
        <a href="{{ route('admin.users.index') }}" class="menu {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="fa-solid fa-users"></i> Kelola User
        </a>
        <a href="{{ route('admin.pakets.index') }}" class="menu {{ request()->routeIs('admin.pakets.*') ? 'active' : '' }}">
            <i class="fa-solid fa-box"></i> Kelola Paket
        </a>

        <div class="mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="menu w-full text-left">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <div class="content">
        {{ $slot }}
    </div>
</body>
</html>