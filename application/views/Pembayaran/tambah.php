<h2 class="mb-4">Pembayaran Baru</h2>

<form action="<?= base_url('index.php/pembayaran/simpan'); ?>" method="post">

    <div class="mb-3">

        <label>Booking</label>

        <select name="id_booking"
                class="form-control">

            <?php foreach($booking as $b): ?>

                <option value="<?= $b->id_booking ?>">

                    <?= $b->nama ?>
                    -
                    <?= $b->nama_lapangan ?>
                    -
                    Rp <?= number_format($b->total_harga) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">
        <label>Status Pembayaran</label>

        <select name="status_pembayaran" class="form-control">
            <option value="Belum Bayar">Belum Bayar</option>
            <option value="Lunas">Lunas</option>
            <option value="Dibatalkan">Dibatalkan</option>
        </select>
    </div>

    <div class="mb-3">

        <label>Metode Pembayaran</label>

        <select name="metode_pembayaran"
                class="form-control">

            <option value="Transfer">
                Transfer
            </option>

            <option value="Cash">
                Cash
            </option>

            <option value="QRIS">
                QRIS
            </option>

        </select>

    </div>

    <button class="btn btn-success">

        Simpan Pembayaran

    </button>

</form>