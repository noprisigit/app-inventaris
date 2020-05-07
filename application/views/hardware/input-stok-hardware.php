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

                <!-- Default box -->
                <div class="card">
                    <?php echo form_open_multipart('hardware/input-stok-hardware');?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jenis-barang">Jenis Barang</label>
                                <select name="jenis_barang" class="form-control">
                                    <option selected disabled>Pilih Jenis Barang</option>
                                    <?php foreach($jenis_barang as $item) : ?>
                                        <option value="<?= $item['nama_jenis_hardware'] ?>"><?= $item['nama_jenis_hardware'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('jenis_barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="kode-barang">Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" placeholder="ex. 31/..../...">
                                <?= form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama-barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" placeholder="ex. Keyboard Praktikan">
                                <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="merk-barang">Merk Barang</label>
                                <input type="text" class="form-control" name="merk_barang" placeholder="ex. Logitech, Razer">
                                <?= form_error('merk_barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="kondisi-barang">Kondisi Barang</label>
                                <select name="kondisi_barang" class="form-control">
                                    <option selected disabled>Pilih Kondisi Barang</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                                <?= form_error('kondisi_barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="merk-barang">Tanggal Barang Masuk</label>
                                <input type="date" class="form-control" name="tgl_masuk">
                                <?= form_error('tgl_masuk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="foto-barang">Foto Barang</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto_barang" id="foto_barang">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <?= form_error('foto_barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->