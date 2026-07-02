<h2 class="mb-4">
    Dashboard Admin
</h2>

<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card text-bg-success shadow">
            <div class="card-body text-center">
                <h2><?= $total_lapangan ?></h2>
                <h5>Total Lapangan</h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-primary shadow">
            <div class="card-body text-center">
                <h2><?= $total_booking ?></h2>
                <h5>Total Booking</h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-warning shadow">
            <div class="card-body text-center">
                <h2><?= $total_pelanggan ?></h2>
                <h5>Total Pelanggan</h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-danger shadow">
            <div class="card-body text-center">
                <h2>Rp <?= number_format($pendapatan) ?></h2>
                <h5>Total Pendapatan Hari Ini</h5>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-lg-8">

        <div class="card shadow">

            <div class="card-header bg-success text-white">
                Booking Terbaru
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                   <tbody>

                    <?php $no=1; foreach($booking_terbaru as $b): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $b->nama; ?></td>

                        <td><?= $b->nama_lapangan; ?></td>

                        <td><?= $b->tanggal_booking; ?></td>

                       <td>

                    <?php if($b->status_pembayaran == 'Lunas'): ?>

                        <span class="badge bg-success">
                            Lunas
                        </span>

                    <?php elseif($b->status_pembayaran == 'Dibatalkan'): ?>

                        <span class="badge bg-danger">
                            Dibatalkan
                        </span>

                    <?php else: ?>

                        <span class="badge bg-warning text-dark">
                            Belum Bayar
                        </span>

                    <?php endif; ?>

                    </td>

                    </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                Jadwal Hari Ini
            </div>

            <div class="card-body">

                <ul class="list-group">

                <?php foreach($jadwal_hari_ini as $j): ?>

                    <li class="list-group-item">
                        <b><?= $j->nama_lapangan ?></b>
                        <br>
                        <?= $j->jam_mulai ?> - <?= $j->jam_selesai ?>
                    </li>

                <?php endforeach; ?>

                </ul>

            </div>

        </div>

    </div>

</div>