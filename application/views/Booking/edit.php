<h2 class="mb-4">Edit Booking</h2>

<form action="<?= base_url('index.php/booking/update'); ?>" method="post">

    <input type="hidden"
           name="id_booking"
           value="<?= $booking->id_booking; ?>">

    <div class="mb-3">
        <label>Pelanggan</label>

        <select name="id_pelanggan" class="form-control">

            <?php foreach($pelanggan as $p): ?>

                <option value="<?= $p->id_pelanggan ?>"
                    <?= ($p->id_pelanggan == $booking->id_pelanggan) ? 'selected' : ''; ?>>

                    <?= $p->nama ?>

                </option>

            <?php endforeach; ?>

        </select>
    </div>

    <div class="mb-3">
        <label>Lapangan</label>

        <select name="id_lapangan" class="form-control">

            <?php foreach($lapangan as $l): ?>

                <option value="<?= $l->id_lapangan ?>"
                    <?= ($l->id_lapangan == $booking->id_lapangan) ? 'selected' : ''; ?>>

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
               value="<?= $booking->tanggal_booking; ?>"
               required>
    </div>

    <div class="mb-3">
        <label>Jam Mulai</label>

        <input type="time"
               name="jam_mulai"
               class="form-control"
               value="<?= $booking->jam_mulai; ?>"
               required>
    </div>

    <div class="mb-3">
        <label>Jam Selesai</label>

        <input type="time"
               name="jam_selesai"
               class="form-control"
               value="<?= $booking->jam_selesai; ?>"
               required>
    </div>

    <div class="mb-3">
        <label>Status Booking</label>

        <select name="status_booking" class="form-control">

            <option value="Menunggu"
            <?= ($booking->status_booking=='Menunggu')?'selected':'' ?>>
                Menunggu
            </option>

            <option value="Dikonfirmasi"
            <?= ($booking->status_booking=='Dikonfirmasi')?'selected':'' ?>>
                Dikonfirmasi
            </option>

            <option value="Selesai"
            <?= ($booking->status_booking=='Selesai')?'selected':'' ?>>
                Selesai
            </option>

            <option value="Dibatalkan"
            <?= ($booking->status_booking=='Dibatalkan')?'selected':'' ?>>
                Dibatalkan
            </option>

        </select>
    </div>

    <button class="btn btn-primary">
        Update Booking
    </button>

</form>

