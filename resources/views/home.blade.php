<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThaiTravel — Jelajahi Keindahan Thailand</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- ========== NAVBAR ========== -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="/" class="logo">
                <i class="fa-solid fa-umbrella-beach"></i> Thai<span>Travel</span>
            </a>
            <ul class="nav-menu" id="navMenu">
                <li><a href="/" class="active">Beranda</a></li>
                <li><a href="#paket">Paket Wisata</a></li>
                <li><a href="#tentang">Tentang</a></li>
                <li><a href="#testimoni">Testimoni</a></li>
                <li><a href="#kontak">Kontak</a></li>
@auth

    @if(Auth::user()->role == 'customer')

        <li>
            <a href="{{ route('dashboard.customer') }}"
               class="btn-nav">
                Dashboard
            </a>
        </li>

    @elseif(Auth::user()->role == 'mitra')

        <li>
            <a href="{{ route('dashboard.mitra') }}"
               class="btn-nav">
                Dashboard
            </a>
        </li>

    @elseif(Auth::user()->role == 'admin')

        <li>
            <a href="{{ route('dashboard.admin') }}"
               class="btn-nav">
                Dashboard
            </a>
        </li>


    @endif

@else

    <li>
        <a href="{{ route('login') }}"
           class="btn-nav">
            Login
        </a>
    </li>

    <li>
        <a href="{{ route('register') }}"
           class="btn-nav-register">
            Registrasi
        </a>
    </li>

@endauth
            </ul>
            <div class="hamburger" id="hamburger">
                <span></span><span></span><span></span>
            </div>
        </div>
    </nav>

    <!-- ========== HERO SECTION ========== -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
    Jelajahi Keindahan
    <span>Thailand</span>
</h1>

<p>
    Temukan destinasi terbaik mulai dari Bangkok,
    Phuket, Pattaya, Chiang Mai hingga Koh Samui
    dengan paket wisata terpercaya dan harga terbaik.
</p>
            <div class="hero-buttons">
                <a href="#paket" class="btn btn-primary">Jelajahi Paket <i class="fa-solid fa-arrow-right"></i></a>
                <a href="#tentang" class="btn btn-outline">Pelajari Lebih</a>
            </div>
           <div class="hero-stats">

    <div class="stat">
        <h3>{{ $totalPaket }}+</h3>
        <p>Paket Wisata</p>
    </div>

    <div class="stat">
        <h3>{{ $totalCustomer }}+</h3>
        <p>Customer</p>
    </div>

    <div class="stat">
        <h3>24/7</h3>
        <p>Dukungan</p>
    </div>

</div>
        </div>
        <div class="hero-wave">
            <svg viewBox="0 0 1440 120"><path fill="#ffffff" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path></svg>
        </div>
    </section>

    <!-- ========== PAKET SECTION ========== -->
     
<section class="paket-section" id="paket">

    <div class="container">

        <div class="section-title">

            <h2>
                Destinasi <span>Pilihan Thailand</span>
            </h2>

            <p>
                Temukan pengalaman wisata terbaik mulai dari Bangkok,
                Phuket, Pattaya, Chiang Mai hingga Koh Samui dengan
                harga terbaik.
            </p>

        </div>
<div class="search-box">

    <input
        type="text"
        id="searchPaket"
        placeholder="Cari paket wisata..."
    >
    <div>

<div class="section-title">
    <h2>Paket <span>Populer</span></h2>
</div>

@php
$popular = $paket->first();
@endphp

@if($popular)

<div class="popular-banner">

    <div>

        <h3>
            {{ $popular->nama_paket }}
        </h3>

        <p>
            Paket wisata unggulan dengan destinasi terbaik Thailand.
        </p>

    </div>

    <a href="{{ route('detail',$popular->id) }}">
        Lihat Detail
    </a>

</div>

@endif
</div>
        @if($paket->count() > 0)

            <div class="card-container">

                @foreach($paket as $item)

                <div class="card">

                    <div class="card-img">

                        <img
                            src="{{ $item->foto
                                ? asset('storage/'.$item->foto)
                                : asset('storage/pakets/default.jpg') }}"
                            alt="{{ $item->nama_paket }}"
                        >

                        @if($item->kuota <= 5)

                            <span
                                class="badge"
                                style="
                                    background:#ef4444;
                                    color:white;
                                "
                            >
                                Sisa {{ $item->kuota }} Kursi
                            </span>

  @elseif($loop->iteration == 1)

<span class="badge">
    ⭐ Best Seller
</span>

@elseif($loop->iteration == 2)

<span
    class="badge"
    style="background:#22c55e;"
>
    🔥 Populer
</span>

@elseif($loop->iteration == 3)

<span
    class="badge"
    style="background:#8b5cf6;"
>
    ✨ Favorit
</span>
                        @else

                            <span
                                class="badge"
                                style="
                                    background:#0ea5e9;
                                    color:white;
                                "
                            >
                                Tersedia
                            </span>

                        @endif

                    </div>

                    <div class="card-body">

                        <h3>
                            {{ $item->nama_paket }}
                        </h3>

                        <p
                            style="
                                color:#64748b;
                                font-size:14px;
                                margin-top:5px;
                            "
                        >
                            Mitra :
                            {{ $item->mitra->nama ?? 'ThaiTravel Official' }}
                        </p>

                        <p class="desc">

                            {{ Str::limit($item->deskripsi, 100) }}

                        </p>

                        <div class="card-info">

                            <span>
                                <i class="fa-solid fa-clock"></i>
                                5 Hari
                            </span>

                            @if($item->kuota <= 5)

                                <span
                                    style="
                                        color:#ef4444;
                                        font-weight:600;
                                    "
                                >
                                    <i class="fa-solid fa-user-group"></i>
                                    Sisa {{ $item->kuota }}
                                </span>

                            @else

                                <span>
                                    <i class="fa-solid fa-user-group"></i>
                                    Kuota {{ $item->kuota }}
                                </span>

                            @endif

                        </div>

                        <div class="card-footer">

                            <h4>

                                Rp
                                {{ number_format($item->harga,0,',','.') }}

                            </h4>

                            @if($item->kuota <= 0)

                                <button
                                    class="btn-card"
                                    style="
                                        background:#9ca3af;
                                        cursor:not-allowed;
                                    "
                                    disabled
                                >
                                    Paket Penuh
                                </button>

                            @else

                                <a
                                    href="{{ route('detail',$item->id) }}"
                                    class="btn-card"
                                >
                                    Lihat Detail
                                </a>

                            @endif

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        @else

            <div class="empty-state">

                <i class="fa-solid fa-suitcase-rolling"></i>

                <p>
                    Belum ada paket tersedia saat ini.
                    Silakan cek kembali nanti.
                </p>

            </div>

        @endif

    </div>
</section>

<section class="about-section" id="tentang">

    <div class="container">

        <div class="section-title">
            <h2>Tentang <span>ThaiTravel</span></h2>
            <p>
                Solusi perjalanan wisata Thailand yang aman, terpercaya,
                dan profesional untuk pengalaman liburan terbaik Anda.
            </p>
        </div>

        <div class="about-grid">

            <div class="about-image">
                <img
                    src="{{ asset('storage/pakets/bangkok hig.png') }}"
                    alt="ThaiTravel">
            </div>

            <div class="about-text">

                <h2>
                    Jelajahi Thailand Dengan Mudah
                </h2>

                <p>
                    ThaiTravel menyediakan berbagai paket wisata pilihan
                    ke destinasi populer Thailand seperti Bangkok,
                    Phuket, Pattaya, Chiang Mai, dan Koh Samui.
                    Kami bekerja sama dengan mitra terpercaya untuk
                    memberikan pengalaman perjalanan yang aman,
                    nyaman, dan berkesan.
                </p>

                <div class="feature-list">

                    <div class="feature-item">
                        <i class="fa-solid fa-shield-halved"></i>
                        <div>
                            <h4>Keamanan Terjamin</h4>
                            <p>Mitra dan transaksi telah terverifikasi.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <i class="fa-solid fa-money-bill-wave"></i>
                        <div>
                            <h4>Harga Transparan</h4>
                            <p>Tidak ada biaya tersembunyi.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <i class="fa-solid fa-headset"></i>
                        <div>
                            <h4>Dukungan 24/7</h4>
                            <p>Tim support siap membantu kapan saja.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <i class="fa-solid fa-plane-departure"></i>
                        <div>
                            <h4>Paket Lengkap</h4>
                            <p>Hotel, transportasi dan destinasi wisata.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="stats-about">

            <div class="stats-card">
                <h3>{{ $totalPaket }}</h3>
                <p>Paket Wisata</p>
            </div>

            <div class="stats-card">
                <h3>{{ $totalCustomer }}</h3>
                <p>Customer</p>
            </div>

            <div class="stats-card">
                <h3>{{ \App\Models\User::where('role','mitra')->count() }}</h3>
                <p>Mitra Travel</p>
            </div>

            <div class="stats-card">
                <h3>24/7</h3>
                <p>Support</p>
            </div>

        </div>

    </div>

</section>
    <!-- ========== TESTIMONI ========== -->
    <section class="testimoni-section" id="testimoni">
        <div class="container">
            <div class="section-title">
                <h2>Apa Kata <span>Mereka?</span></h2>
                <p>Cerita nyata dari pelanggan yang telah berangkat bersama kami.</p>
            </div>
            <div class="testimoni-grid">
                <div class="testimoni-card">
                    <div class="stars">★★★★★</div>
                    <p>"Perjalanan ke Phuket sangat luar biasa. Pemandu ramah, hotel nyaman, dan harganya terjangkau."</p>
                    <div class="user">
                        <img src="https://i.pravatar.cc/50?img=1" alt="User">
                        <div>
                            <h5>Rina Andriani</h5>
                            <span>Phuket Paradise</span>
                        </div>
                    </div>
                </div>
                <div class="testimoni-card">
                    <div class="stars">★★★★★</div>
                    <p>"Bangkok Highlight benar-benar highlight! Kuil-kuilnya indah, makanan enak. ThaiTravel recommended!"</p>
                    <div class="user">
                        <img src="https://i.pravatar.cc/50?img=2" alt="User">
                        <div>
                            <h5>Budi Santoso</h5>
                            <span>Bangkok Highlight</span>
                        </div>
                    </div>
                </div>
                <div class="testimoni-card">
                    <div class="stars">★★★★★</div>
                    <p>"Pelayanan cepat dan profesional. Adminnya sabar jelasin detail paket. Pasti pesan lagi."</p>
                    <div class="user">
                        <img src="https://i.pravatar.cc/50?img=3" alt="User">
                        <div>
                            <h5>Dewi Lestari</h5>
                            <span>Chiang Mai Adventure</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== FOOTER ========== -->
    <footer class="footer" id="kontak">
        <div class="container footer-grid">
            <div class="footer-col">
                <h3><i class="fa-solid fa-umbrella-beach"></i> ThaiTravel</h3>
                <p>Jelajahi Thailand dengan cara terbaik bersama kami. Pengalaman, keamanan, dan kepuasan Anda adalah prioritas.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Link Cepat</h4>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="#paket">Paket</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Kontak</h4>
                <ul>
                    <li><i class="fa-solid fa-location-dot"></i> Jl. Pattaya No. 88, Bangkok</li>
                    <li><i class="fa-solid fa-phone"></i> +62 812 3277 8113</li>
                    <li><i class="fa-solid fa-envelope"></i> info@thaitravel.id</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 ThaiTravel. All rights reserved. | Dibuat dengan <i class="fa-solid fa-heart"></i> untuk pecinta Thailand.</p>
        </div>
    </footer>

   <script>

const searchInput =
document.getElementById('searchPaket');

searchInput.addEventListener('keyup', function(){

    let value =
    this.value.toLowerCase();

    let cards =
    document.querySelectorAll('.card');

    cards.forEach(card => {

        let title =
        card.querySelector('h3')
        .innerText
        .toLowerCase();

        if(title.includes(value))
        {
            card.style.display = 'block';
        }
        else
        {
            card.style.display = 'none';
        }

    });

});

</script>
</body>
</html>