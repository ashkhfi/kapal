</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<style>
    body {
        font-family: 'Times New Roman', serif;
        color: black;
        background-color: blue;
        /* Light green background */
    }

    .login-box {
        width: 360px;
        margin: 7% auto;
    }

    .card {
        border: 1px solid blue;
        /* Green border */
        border-radius: 10px;
    }

    .login-card-body {
        background-color: #d4edda;
        /* Light green background */
        border-top: 5px solid #28a745;
        /* Darker green top border */
        border-radius: 10px;
    }

    .login-logo h3 {
        color: #155724;
        /* Darker green text */
    }

    .btn-primary {
        background-color: blue;
        /* Green button */
        border-color: blue;
    }

    .btn-primary:hover {
        background-color: #218838;
        /* Darker green on hover */
        border-color: #1e7e34;
    }

    table.dataTable {
        border-collapse: collapse !important;
        background-color: #ffffff;
        /* White background */
        color: #f2f2f2;
        /* Dark text */
    }

    table.dataTable th,
    table.dataTable td {
        padding: 12px 15px;
    }

    table.dataTable thead th {
        background-color: blue;
        /* Green header background */
        color: white;
        /* White text */
    }

    table.dataTable tbody tr:nth-child(even) {
        background-color: blue;
        /* Light grey for even rows */
    }
</style>
<!-- jQuery -->
<script src="<?= base_url('template'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('template'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('template'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('template'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template'); ?>/dist/js/adminlte.min.js"></script>
<script src="<?= base_url('template'); ?>/plugins/summernote/summernote-bs4.min.js"></script>


<script src="<?= base_url('template'); ?>/plugins/chart.js/Chart.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            // "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()
        $('#summernote2').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

<script>
    $(function() {
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Digital Goods',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [28, 48, 40, 19, 86, 27, 90]
            }, ]
        }

        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }

        new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        })
    })
</script>

</body>

</html>