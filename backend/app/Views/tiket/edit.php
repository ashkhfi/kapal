<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edit Gejala</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Tiket/update/' . $gejala['Id']); ?>" method="post">
                <div class="form-group">
                    <label for="Pelabuhan_asal">Pelabuhan Asal</label>
                    <input type="text" name="Pelabuhan_asal" class="form-control" value="<?= $gejala['Pelabuhan_asal']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Pelabuhan_tujuan">Pelabuhan Tujuan</label>
                    <input type="text" name="Pelabuhan_tujuan" class="form-control" value="<?= $gejala['Pelabuhan_tujuan']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Data_penumpang">Data Penumpang</label>
                    <input type="text" name="Data_penumpang" class="form-control" value="<?= $gejala['Data_penumpang']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Harga_tiket">Harga Tiket</label>
                    <input type="text" name="Harga_tiket" class="form-control" value="<?= $gejala['Harga_tiket']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
