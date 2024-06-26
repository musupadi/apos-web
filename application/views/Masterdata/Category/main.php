<section class="content-header">
    <h1>Master Data</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Master Data</a></li>
        <li class="active">Category</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Category</h3>
                </div>
                <!-- /.box-header -->
                <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" style="width: 100px; margin-left: 10px"><i class="fa fa-fw fa-plus"></i>Add Category</a>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Category Name</th>
                                <th>Unit Name</th>
                                <th style="width: 40px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($category as $data) {
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?php echo $data->label ?></td>
                                    <td><?php echo $data->unit ?></td>
                                    <td style="text-align: center;">
                                        <a data-toggle="modal" data-target="#modal-info" onclick="edit('<?= $data->id ?>', '<?= $data->label ?>', '<?= $data->unit ?>')">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <a href="<?php echo base_url('Product/Deletecategory/' . $data->id); ?>" onclick="return confirm('Data akan dihapus?')">
                                            <i class="fa fa-fw fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Category Name</th>
                                <th>Unit Name</th>
                                <th style="width: 40px;">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php echo $this->session->flashdata('pesan'); ?>
                <!-- /.box-body -->
            </div>
            <!-- INPUT -->
            <div class="modal modal-success fade" id="modal-success">
                <?php echo form_open_multipart('Product/Addcategory/') ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Input Category</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="text"><span style="color: red; margin-right: 3px">*</span>Category Name</label>
                                    <input type="text" class="form-control" name="label" placeholder="Category Name" required>
                                    <p class="text-red"><?php echo form_error('label') ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="text"><span style="color: red; margin-right: 3px">*</span>Category Unit</label>
                                    <input type="text" class="form-control" name="unit" placeholder="Category Unit" required>
                                    <p class="text-red"><?php echo form_error('unit') ?></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>

            <!-- Modal for editing -->
            <div class="modal modal-info fade" id="modal-info">
                <?php echo form_open_multipart('Product/Editcategory/') ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Category</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <input type="hidden" class="form-control" name="id" id="id" placeholder="Category Name" required>
                                <div class="form-group">
                                    <label for="text"><span style="color: red; margin-right: 3px">*</span>Category Name</label>
                                    <input type="text" class="form-control" name="labels" id="labels" placeholder="Category Name" required>
                                    <p class="text-red"><?php echo form_error('labels') ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="text"><span style="color: red; margin-right: 3px">*</span>Category Unit</label>
                                    <input type="text" class="form-control" name="units" id="units" placeholder="Category Unit" required>
                                    <p class="text-red"><?php echo form_error('units') ?></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<script>
    function edit(id, labels, units) {
        console.log("test");
        document.getElementById('id').value = id;
        document.getElementById('labels').value = labels;
        document.getElementById('units').value = units;
    }
</script>
