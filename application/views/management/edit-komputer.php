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

                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card card-info">
                                    <!-- form start -->
                                    <?php echo form_open_multipart('management/edit-komputer');?>
                                        <div class="card-body">
                                            <img src="<?= base_url('assets/dist/img/komputer/komputer.png') ?>" alt="foto-komputer" class="img-thumbnail mb-3 d-flex mx-auto" width="250">
                                            <input type="hidden" name="id_komputer" value="<?= $komputer['id_komputer'] ?>">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama PC</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nama_pc" value="<?= $komputer['nama_pc'] ?>" placeholder="Nama PC">
                                                    <?= form_error('nama_pc', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label">Processor</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="processor" value="<?= $komputer['processor'] ?>" placeholder="Processor">
                                                    <?= form_error('processor', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label">Ram</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="ram" value="<?= $komputer['ram'] ?>" placeholder="Ram">
                                                    <?= form_error('ram', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label">Graphic Card</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="graphic_card" value="<?= $komputer['graphic_card'] ?>" placeholder="Graphic Card">
                                                    <?= form_error('graphic_card', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label">Penyimpanan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="penyimpanan" value="<?= $komputer['penyimpanan'] ?>" placeholder="Penyimpanan">
                                                    <?= form_error('penyimpanan', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="customFile" class="col-sm-3 col-form-label">Foto Komputer</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="foto_komputer" id="foto_komputer">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Edit Komputer</button>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
