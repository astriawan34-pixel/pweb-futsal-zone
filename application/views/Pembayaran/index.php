<h2 class="mb-4">Data Pembayaran</h2>

<a href="<?= base_url('index.php/pembayaran/tambah'); ?>"
   class="btn btn-success mb-3">
   + Pembayaran Baru
</a>

<table class="table table-bordered">

    <thead class="table-dark">

        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Lapangan</th>
            <th>Metode</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Tanggal Bayar</th>
            <th>Aksi</th>
        </tr>

    </thead>

    <tbody>

    <?php $no=1; foreach($pembayaran as $row): ?>

        <tr>

            <td><?= $no++; ?></td>

            <td><?= $row->nama; ?></td>

            <td><?= $row->nama_lapangan; ?></td>

            <td><?= $row->metode_pembayaran; ?></td>

            <td>
                Rp <?= number_format($row->jumlah_bayar); ?>
            </td>

            <td><?= $row->status_pembayaran; ?></td>

            <td><?= $row->tanggal_bayar; ?></td>

            <td>
                <a href="<?= base_url('pembayaran/edit/'.$row->id_pembayaran) ?>"
                class="btn btn-warning btn-sm">
                Edit
                </a>

                <a href="#"
                class="btn btn-danger btn-sm btn-hapus"
                data-url="<?= base_url('index.php/pembayaran/hapus/'.$row->id_pembayaran) ?>">
                Hapus
                </a>
            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

<script>
document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('.btn-hapus').forEach(function(button){

        button.addEventListener('click', function(){

            let url = this.getAttribute('data-url');

            Swal.fire({
                title: 'Yakin?',
                text: 'Data akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if(result.isConfirmed){
                    window.location.href = url;
                }

            });

        });

    });

});
</script>

