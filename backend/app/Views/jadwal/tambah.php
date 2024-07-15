<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-plus"></i> Tambah jadwal</h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Jadwal/simpan') ?>" method="post">
           
                <div class="form-group">
                    <label for="Hari">hari</label>
                    <input type="text" name="Hari" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Tanggal">Tanggal</label>
                    <input type="text" name="Tanggal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Bulan">Bulan</label>
                    <input name="Bulan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Tahun">Tahun</label>
                    <input type="text" name="Tahun" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Pelabuhan">Pelabuhan</label>
                    <input type="text" name="Pelabuhan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Kapal">Kapal</label>
                    <input name="Kapal" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
