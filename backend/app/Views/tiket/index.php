<!-- app/Views/alat_medis/index.php -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-medkit"></i> <?= $title; ?></h3>
        </div>
        <div class="card-body">
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session('success'); ?>
                </div>
                <script>
                    setTimeout(function() {
                        $('.alert').alert('close');
                    }, 4000);
                </script>
            <?php endif; ?>

            <a href="<?= base_url('Tiket/tambah'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Tiket</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelabuhan Asal</th>
                        <th>Pelabuhan Tujuan</th>
                        <th>Data Penumpang</th>
                        <th>Harga Tiket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tiket as $index => $row) : ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $row['Pelabuhan_asal'] ?></td>
                            <td><?= $row['Pelabuhan_tujuan'] ?></td>
                            <td><?= $row['Data_penumpang'] ?></td>
                            <td><?= $row['Harga_tiket'] ?></td>
                            <td>
                                <a class="btn btn-info btn-sm" href="<?= base_url('Tiket/edit/' . $row['Id']); ?>">
                                    <i class="fas fa-pencil-alt"></i> Selesai
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?= base_url('Tiket/delete/' . $row['Id']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Tidak
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
