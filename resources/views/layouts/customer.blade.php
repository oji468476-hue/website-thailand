<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThaiTravel — Dashboard Customer</title>

    <!-- Tailwind + Font -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: #f4f7fb;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: linear-gradient(180deg, #1e3a8a 0%, #2563eb 100%);
            color: white;
            padding: 30px 20px;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .sidebar h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar .menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 8px;
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .sidebar .menu:hover {
            background: rgba(255,255,255,0.15);
            color: white;
            transform: translateX(4px);
        }

        .sidebar .menu.active {
            background: rgba(255,255,255,0.2);
            color: white;
            font-weight: 600;
        }

        .sidebar .logout-btn {
            background: none;
            border: none;
            color: rgba(255,255,255,0.85);
            cursor: pointer;
            width: 100%;
            text-align: left;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
        }

        .content {
            margin-left: 260px;
            padding: 30px;
            min-height: 100vh;
        }

        .card-custom {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .card-custom:hover {
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .gradient-header {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 25px;
            margin: -25px -25px 25px -25px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h1>
            <i class="fa-solid fa-umbrella-beach"></i> ThaiTravel
        </h1>

        <a href="/" class="menu">
            <i class="fa-solid fa-home"></i> Beranda
        </a>

        <a href="{{ route('customer.booking.history') }}" class="menu">
            <i class="fa-solid fa-list-check"></i> Booking Saya
        </a>

        <a href="{{ route('customer.pembayaran.create') }}" class="menu">
            <i class="fa-solid fa-credit-card"></i> Pembayaran
        </a>

        <a href="{{ route('customer.profil') }}"
            <i class="fa-solid fa-user-gear"></i> Profil
        </a>

        <div class="mt-10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="menu logout-btn">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        {{ $slot }}
    </div>

</body>
</html>