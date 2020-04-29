        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $second_title ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
                                <li class="breadcrumb-item active"><?= $second_title ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">

                <?= $this->session->flashdata('message'); ?>

                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('management/tambah-komputer') ?>" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data Komputer</a>
                        <a href="<?= base_url('cetak/cetak-pdf-komputer') ?>" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Cetak PDF</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach($data_komputer as $item) : ?>
                                <div class="col-md-3 mr-3">
                                    <div class="card">
                                        <img src="<?= base_url('assets/dist/img/komputer/') . $item['foto_komputer'] ?>" class="card-img-top" alt="komputer">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $item['nama_pc'] ?></h5><br>
                                            <div class="row justify-content-end">   
                                                <span data-toggle="modal" data-target="#modal-preview">
                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Detail Komputer" class="btn btn-sm btn-primary btn-detail-komputer" data-nama_pc="<?= $item['nama_pc'] ?>" data-processor="<?= $item['processor'] ?>" data-ram="<?= $item['ram'] ?>" data-graphic_card="<?= $item['graphic_card'] ?>" data-penyimpanan="<?= $item['penyimpanan'] ?>" data-foto="<?= $item['foto_komputer'] ?>"><i class="fas fa-info-circle"></i></button>
                                                </span>
                                                <a href="<?= base_url('management/edit-komputer/') . $item['id_komputer'] ?>" data-toggle="tooltip" data-placement="top" title="Edit Komputer" class="btn btn-sm btn-info ml-2"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('management/delete-komputer/') . $item['id_komputer'] ?>" onclick="return confirm('Anda yakin untuk menghapus data?')" data-toggle="tooltip" data-placement="top" title="Delete Komputer" class="btn btn-sm btn-danger ml-2"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <div class="modal fade" id="modal-preview">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Detail Komputer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-thumbnail img-komputer" alt="foto-komputer">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Nama PC</td>
                                            <td class="nama-pc"></td>
                                        </tr>
                                        <tr>
                                            <td>Processor</td>
                                            <td class="processor"></td>
                                        </tr>
                                        <tr>
                                            <td>Ram</td>
                                            <td class="ram"></td>
                                        </tr>
                                        <tr>
                                            <td>Graphic Card</td>
                                            <td class="graphic-card"></td>
                                        </tr>
                                        <tr>
                                            <td>Penyimpanan</td>
                                            <td class="penyimpanan"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->