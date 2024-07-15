<!-- Views/penyakit/index.php -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-book-medical"></i> <?= $title ?></h3>
        </div>
        <div class="card-body">
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>

            <a href="<?= base_url('Jadwal/tambah') ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Jadwal</a>

            <table  id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>hari</th>
                        <th>Tanggal</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Pelabuhan</th>
                        <th>kapal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jadwal as $index => $item) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $item['Hari'] ?></td>
                            <td><?= $item['Tanggal'] ?></td>
                            <td><?= $item['Bulan'] ?></td>
                            <td><?= $item['Tahun'] ?></td>
                            <td><?= $item['Pelabuhan'] ?></td>
                            <td><?= $item['Kapal'] ?></td>
                            <td>
                                <a href="<?= base_url('Jadwal/edit/' . $item['Id']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url('Jadwal/delete/' . $item['Id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
