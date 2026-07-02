<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        body{
            font-family:'Poppins',sans-serif;
            background:#f5f7fa;
        }

        .navbar{
            background:#198754;
        }

        .navbar-brand{
            color:#fff;
            font-weight:700;
        }

        .navbar-brand:hover{
            color:#fff;
        }

        .hero{
            background:linear-gradient(135deg,#198754,#28a745);
            color:white;
            padding:80px 0;
        }

        .hero h1{
            font-weight:700;
        }

        .card-lapangan{
            transition:.3s;
            border:none;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,.1);
        }

        .card-lapangan:hover{
            transform:translateY(-8px);
            box-shadow:0 15px 25px rgba(0,0,0,.15);
        }

        .harga{
            color:#198754;
            font-size:20px;
            font-weight:bold;
        }

        footer{
            background:#198754;
            color:white;
            padding:20px;
            margin-top:70px;
        }

    </style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a class="navbar-brand" href="#">
            ⚽ FUTSALZONE
        </a>

        <a href="<?= base_url('auth'); ?>" class="btn btn-light">
            Login Admin
        </a>

    </div>

</nav>

<!-- Hero -->

<section class="hero text-center">

    <div class="container">

        <h1>Sistem Informasi Penyewaan Lapangan Futsal</h1>

        <p class="mt-3">
            Temukan lapangan futsal yang tersedia dan hubungi admin
            untuk melakukan pemesanan.
        </p>

        <a href="#lapangan" class="btn btn-warning mt-3">
            Lihat Lapangan
        </a>

    </div>

</section>

<!-- Daftar Lapangan -->

<div class="container mt-5" id="lapangan">

    <h2 class="text-center mb-5">
        Daftar Lapangan
    </h2>

    <div class="row">

        <?php foreach($lapangan as $l): ?>

        <div class="col-md-4 mb-4">

            <div class="card card-lapangan h-100">

                <div class="card-body">

                    <h4 class="card-title">
                        ⚽ <?= $l->nama_lapangan; ?>
                    </h4>

                    <hr>

                    <p>
                        <strong>Jenis Lapangan</strong><br>
                        <?= $l->jenis_lapangan; ?>
                    </p>

                    <p class="harga">
                        Rp <?= number_format($l->harga_sewa); ?>/Jam
                    </p>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</div>

<!-- Kontak -->

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-body text-center">

            <h3>📞 Informasi Pemesanan</h3>

            <hr>

            <p>
                Untuk melakukan booking, silakan hubungi Admin.
            </p>

            <h5>
                WhatsApp :
                0812-3456-7890
            </h5>

            <p>
                Jam Operasional
                <br>
                08.00 - 22.00 WIB
            </p>

        </div>

    </div>

</div>

<!-- Footer -->

<footer class="text-center">

    © <?= date('Y'); ?> FUTSALZONE | Sistem Informasi Penyewaan Lapangan Futsal

</footer>

</body>
</html>