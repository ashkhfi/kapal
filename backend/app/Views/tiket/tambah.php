<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Gejala</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Tiket/simpan'); ?>" method="post">
                <div class="form-group">
                    <label for="Pelabuhan_asal">Pelabuhan Asal</label>
                    <input type="text" name="Pelabuhan_asal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Pelabuhan_tujuan">Pelabuhan Tujuan</label>
                    <input type="text" name="Pelabuhan_tujuan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Data_penumpang">Data Penumpang</label>
                    <input type="text" name="Data_penumpang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Harga_tiket">Harga Tiket</label>
                    <input type="text" name="Harga_tiket" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>