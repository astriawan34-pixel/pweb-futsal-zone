<h2 class="mb-4">Booking Baru</h2>

<form action="<?= base_url('index.php/booking/simpan'); ?>" method="post">

    <div class="mb-3">
        <label>Pelanggan</label>

        <select name="id_pelanggan" class="form-control">

            <?php foreach($pelanggan as $p): ?>

                <option value="<?= $p->id_pelanggan ?>">

                    <?= $p->nama ?>

                </option>

            <?php endforeach; ?>

        </select>
    </div>

    <div class="mb-3">
        <label>Lapangan</label>

        <select name="id_lapangan" class="form-control">

            <?php foreach($lapangan as $l): ?>

                <option value="<?= $l->id_lapangan ?>">

                    <?= $l->nama_lapangan ?>
                    -
                    Rp <?= number_format($l->harga_sewa) ?>

                </option>

            <?php endforeach; ?>

        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal Booking</label>

        <input type="date"
               name="tanggal_booking"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label>Jam Mulai</label>

        <input type="time"
               name="jam_mulai"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label>Jam Selesai</label>

        <input type="time"
               name="jam_selesai"
               class="form-control"
               required>
    </div>

    <button class="btn btn-success">
        Simpan Booking
    </button>

</form>