<?php
$selectedYear = isset($_GET['tahun']) ? $_GET['tahun'] : '';
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= $title; ?></h3>
    </div>
    <div class="card-body">
        <div class="margin">
            <div class="form-group">
                <label>Tahun</label>
                <form action="<?= base_url('Laporan/index'); ?>" method="get" id="tahunForm">
                    <select class="form-control select2" style="width: 100%;" name="tahun" onchange="submitForm()">
                        <option value="">-- Pilih tahun --</option>
                        <?php
                        $currentYear = date('Y');
                        for ($year = $currentYear; $year >= ($currentYear - 10); $year--) {
                            echo "<option value='$year' " . ($selectedYear == $year ? 'selected' : '') . ">$year</option>";
                        }
                        ?>
                    </select>
                    <br>
                </form>
            </div>

            <?php if (!empty($selectedYear)) : ?>
                <a class="btn btn-warning" href="<?= base_url('laporan/index') . '?tahun=' . $selectedYear; ?>">Data Persediaan Alat <?= $selectedYear; ?></a>
            <?php else : ?>
                <span class="text-danger">Pilih tahun untuk melihat laporan.</span>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function submitForm() {
        document.getElementById("tahunForm").submit();
    }
</script>
