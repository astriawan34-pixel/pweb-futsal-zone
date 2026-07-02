<h3>Edit Pembayaran</h3>

<form action="<?= base_url('pembayaran/update') ?>" method="post">

    <input type="hidden"
           name="id_pembayaran"
           value="<?= $pembayaran->id_pembayaran ?>">

    <div class="mb-3">
        <label>Metode Pembayaran</label>
        <input type="text"
               name="metode_pembayaran"
               class="form-control"
               value="<?= $pembayaran->metode_pembayaran ?>">
    </div>

    <div class="mb-3">
        <label>Status Pembayaran</label>

        <select name="status_pembayaran"
                class="form-control">

            <option value="Belum Bayar"
            <?= ($pembayaran->status_pembayaran=='Belum Bayar')?'selected':'' ?>>
                Belum Bayar
            </option>

            <option value="Lunas"
            <?= ($pembayaran->status_pembayaran=='Lunas')?'selected':'' ?>>
                Lunas
            </option>

            <option value="Dibatalkan"
            <?= ($pembayaran->status_pembayaran=='Dibatalkan')?'selected':'' ?>>
                Dibatalkan
            </option>

        </select>
    </div>

    <button type="submit"
            class="btn btn-primary">
        Update
    </button>

</form>