
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2020 <a href="#">Laboratorium Komputer Lanjut</a>.</strong> All rights reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets'); ?>/dist/js/demo.js"></script>
    <script>
        $(document).ready(function () {
            $('.custom-file-input').on('change', function () {
                let filename = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass('selected').html(filename);
            });

            $('.data-table').DataTable();

            $('.btn-edit-jenis-hardware').on('click', function () {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var kode = $(this).data('kode');
                
                $('#edit-id-jenis-hardware').empty();
                $('#edit-nama-jenis-hardware').empty();
                $('#edit-kode-jenis-hardware').empty();

                $('#edit-id-jenis-hardware').attr('value', id);
                $('#edit-nama-jenis-hardware').attr('value', nama);
                $('#edit-kode-jenis-hardware').attr('value', kode);
            });

            $('.pop-image').on('click', function() {
                $('#imagepreview').attr('src', $('#imgsource').attr('src'));
                $('#modal-preview').modal('show');
            });

            $('.btn-detail-komputer').on('click', function() {
                $('.img-komputer').attr('src', '<?= base_url('assets/dist/img/komputer/') ?>' + $(this).data('foto'));
                $('.nama-pc').html($(this).data('nama_pc'));
                $('.processor').html($(this).data('processor'));
                $('.ram').html($(this).data('ram'));
                $('.graphic-card').html($(this).data('graphic_card'));
                $('.penyimpanan').html($(this).data('penyimpanan'));
            });
        });
    </script>
</body>

</html>