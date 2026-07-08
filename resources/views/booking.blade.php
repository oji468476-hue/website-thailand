<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Paket Wisata</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; color: #333; }
        .card { background: #f8f9fa; border: 1px solid #ddd; border-radius: 12px; padding: 24px; max-width: 680px; margin: 0 auto; }
        .card h1, .card h2, .card h3 { margin: 0 0 12px; }
        .card p { line-height: 1.6; }
        .field { margin-bottom: 16px; }
        .field label { display: block; margin-bottom: 8px; font-weight: bold; }
        .field input { width: 100%; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; }
        .button { display: inline-block; padding: 12px 20px; background: #007bff; color: #fff; text-decoration: none; border-radius: 8px; border: none; cursor: pointer; }
        .button:hover { background: #0056b3; }
        .back-link { display: inline-block; margin-top: 20px; color: #007bff; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Booking Paket Wisata</h1>
        <h2>{{ $paket->nama_paket }}</h2>
        <p>{{ $paket->deskripsi }}</p>
        <h3>Harga: Rp {{ $paket->harga }}</h3>

        <form method="POST" action="/booking/store">
            @csrf
            <input type="hidden" name="id_paket" value="{{ $paket->id }}">

            <div class="field">
                <label for="tanggal">Tanggal Keberangkatan</label>
                <input type="date" id="tanggal" name="tanggal" required>
            </div>

            <button type="submit" class="button">Pesan Sekarang</button>
        </form>

        <a class="back-link" href="/detail/{{ $paket->id }}">Kembali ke Detail Paket</a>
    </div>
</body>
</html>
