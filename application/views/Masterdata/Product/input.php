<section class="content-header">
      <h1>
        Input Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Inventory</a></li>
        <li class="active">Product</li>
      </ol>
    </section>
    <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open_multipart('Product/add')?>
                <form role="form" action="<?php echo base_url('Product/add')?>" method="post" >
                  <div class="box-body">
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Product Name</label>
                        <input type="text" class="form-control" name="label" placeholder="Product Name" required>
                      <p class="text-red"><?php echo form_error('label')?></p>
                    </div>
                    <div class="form-group">
                        <label><span style="color: red; margin-right: 3px">*</span>Select Role</label>
                        <select class="form-control" name="id_category" onchange="pilihcategory(this)">
                          <option value="" data-unit="Unit">Pick Category</option>
                          <?php foreach ($category as $data){ ?>
                              <option value="<?php echo $data->id?>" data-unit="<?= $data->unit ?>"><?php echo $data->label ?></option>
                          <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><span style="color: red; margin-right: 3px">*</span>Unit</label>
                        <input type="email" class="form-control" id="unit" name="unit" placeholder="Unit" disabled>
                    </div>
                    <div class="form-group">
                        <label><span style="color: red; margin-right: 3px">*</span>Description</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Price</label>
                      <input type="text" class="form-control" name="price" id="price" placeholder="Price" required oninput="formatRupiah(this)">
                      <p class="text-red"><?php echo form_error('price')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Stock</label>
                      <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" required oninput="formatRupiah(this)">
                      <p class="text-red"><?php echo form_error('stock')?></p>
                    </div>                
                    <div class="form-group">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Upload Photo Profile</label>
                        <input type="file" class="form-control" name="photo" size="20" id="file-upload" onchange="displayImageAndName(this)">
                        <br>
                        <div id="image-container" style="display: none;">
                            <img id="image-preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px;">
                            <p id="file-name"></p>
                        </div>
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a href="<?php echo base_url('User')?>">Batal</a>
                  </div>
                </form>
              </div>
              <!-- /.box -->
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </section>
<script>

let divSelect = document.getElementById('listwr');
let select = document.getElementById('id_warehouse');
let id_user = document.getElementById('id_user');

function pilihcategory(selectElement)
{
 // Mendapatkan indeks opsi yang dipilih
    var selectedIndex = selectElement.selectedIndex;
        // Mendapatkan teks dari opsi yang dipilih
    var selectedOptionText = selectElement.options[selectedIndex].getAttribute('data-unit');
        // Mengatur nilai input dengan teks opsi yang dipilih
    document.getElementById('unit').value = selectedOptionText;
}



</script>