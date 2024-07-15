<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-edit"></i> Edit Penyakit</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Penyakit/update/' . $Penyakit['Id']) ?>" method="post">
                <div class="form-group">
                    <label for="Hari">Kode Penyakit</label>
                    <input type="text" name="Hari" class="form-control" value="<?= $Penyakit['Hari']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Tanggal">Nama Penyakit</label>
                    <input type="text" name="Tanggal" class="form-control" value="<?= $Penyakit['Tanggal']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Bulan">Deskripsi</label>
                    <input name="Bulan" class="form-control" value="<?= $Penyakit['Bulan']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Tahun">Kode Penyakit</label>
                    <input type="text" name="Tahun" class="form-control" value="<?= $Penyakit['Tahun']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Pelabuhan">Nama Penyakit</label>
                    <input type="text" name="Pelabuhan" class="form-control" value="<?= $Penyakit['Pelabuhan']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Kapal">Deskripsi</label>
                    <input name="Kapal" class="form-control" value="<?= $Penyakit['Kapal']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
            </form>
        </div>
    </div>
</div>