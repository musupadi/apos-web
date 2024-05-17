<section class="content-header">
    <h1>Inventory</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Inventory</a></li>
        <li class="active">Product</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Product</h3>
                </div>
                <!-- /.box-header -->
                <a href="<?php echo base_url("Product/Add")?>" class="btn btn-success btn-sm" style="width: 100px; margin-left: 10px"><i class="fa fa-fw fa-plus"></i>Add Product</a>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Stock</th>
                                <th style="width: 40px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($product as $data) {
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td style="height: 50px; vertical-align: middle;"><img class="profile-user-img img-responsive" src="<?php echo base_url()?>img/product/<?php echo $data->img?>" alt="Image Item"></td>
                                    <td style="height: 50px; vertical-align: middle;"> <?php echo $data->label ?></td>
                                    <td style="height: 50px; vertical-align: middle;"><?php echo number_format($data->price, 0, ',', '.') ?></td>
                                    <td style="height: 50px; vertical-align: middle;"><?php echo $data->description ?></td>
                                    <td style="height: 50px; vertical-align: middle;"><?php echo $data->category ?></td>
                                    <td style="height: 50px; vertical-align: middle;"><?php echo $data->unit ?></td>
                                    <td style="height: 50px; vertical-align: middle;"><?php echo $data->stock ?></td>
                                    <td style="style=height: 50px; vertical-align: middle; text-align: center;">
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Stock</th>
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
                <?php echo form_open_multipart('Product/Add/') ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Input Product</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="text"><span style="color: red; margin-right: 3px">*</span>Product Name</label>
                                    <input type="text" class="form-control" name="label" placeholder="Name" required>
                                    <p class="text-red"><?php echo form_error('label') ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="text"><span style="color: red; margin-right: 3px">*</span>Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="Category Name" required onchange="formatRupiah(this)">
                                    <p class="text-red"><?php echo form_error('label') ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="text"><span style="color: red; margin-right: 3px">*</span>Stock</label>
                                    <input type="text" class="form-control" name="stock" placeholder="Stock" required onchange="formatRupiah(this)>
                                    <p class="text-red"><?php echo form_error('label') ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="text"><span style="color: red; margin-right: 3px">*</span>Category Unit</label>
                                    <input type="text multiline" class="form-control" name="description" placeholder="Category Unit" required>
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
