<h2 class="mb-4">Data Booking</h2>

<a href="<?= base_url('index.php/booking/tambah'); ?>"
class="btn btn-success mb-3">
+ Booking Baru
</a>

<table class="table table-bordered">

<thead class="table-dark">

<tr>
    <th>No</th>
    <th>Pelanggan</th>
    <th>Lapangan</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Total Harga</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

</thead>

<tbody>

<?php $no=1; foreach($booking as $row): ?>

<tr>

    <td><?= $no++; ?></td>

    <td><?= $row->nama; ?></td>

    <td><?= $row->nama_lapangan; ?></td>

    <td><?= $row->tanggal_booking; ?></td>

    <td><?= $row->jam_mulai; ?> - <?= $row->jam_selesai; ?></td>

    <td>
    Rp <?= number_format($row->total_harga); ?>
    </td>

    <td>

    <?php if($row->status_booking=='Menunggu'): ?>

    <span class="badge bg-warning text-dark">
    Menunggu
    </span>

    <?php elseif($row->status_booking=='Dikonfirmasi'): ?>

    <span class="badge bg-primary">
    Dikonfirmasi
    </span>

    <?php elseif($row->status_booking=='Selesai'): ?>

    <span class="badge bg-success">
    Selesai
    </span>

    <?php elseif($row->status_booking=='Dibatalkan'): ?>

    <span class="badge bg-danger">
    Dibatalkan
    </span>

    <?php endif; ?>

    </td>

    <!-- AKSI -->

    <td>

    <a href="<?= base_url('index.php/booking/edit/'.$row->id_booking) ?>"
    class="btn btn-warning btn-sm">
    Edit
    </a>

    <a href="<?= base_url('index.php/booking/hapus/'.$row->id_booking) ?>"
    class="btn btn-danger btn-sm btn-hapus">
    Hapus
    </a>

    </td>

</tr>

<?php endforeach; ?>

</tbody>

</table>