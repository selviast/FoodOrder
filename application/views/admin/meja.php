  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Meja</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active">Meja</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">Tambah Data </a>
      <?= $this->session->flashdata('message')?>
      <div class="card">            
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>                  
                <th>No </th>
                
                  <th>Nama </th>
                  <th>Lantai </th>
                  <th>Status </th>                  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $x=1;   ?>
                  <?php foreach ($meja as $i) :?>                  
                                    
                  <tr>                                      
                    <td><?= $x;?></td>
                    <td><?= "Meja ".$i['nama_meja'];?></td>                    
                    <td><?= $i['lantai'];?></td>
                    <td>
                        <?php 
                            if($i['status_meja'] == 0){
                                echo "<div class='badge badge-pill badge-info'>Meja kosong</div>";
                            }else {
                                echo "<div class='badge badge-pill badge-warning'>Meja dipakai</div>";
                            }
                        ?>
                    </td>
                    
                    <td>                                                                  
                      <a onclick="javascript: return confirm('Anda yakin untuk menghapus?')"  href="<?= base_url('admin/deleteDataMeja/'.$i['id_meja']);?>"><i class="fas fa-trash-alt"></i> delete</a>
                    </td>
                    </td>
                  </tr> 
                  <?php $x++; ?>
                  <?php endforeach; ?>       
                </tbody>

                <tfoot>
                <tr>
                  <th>No </th>
                  <th>Nama </th>
                  <th>Lantai </th>
                  <th>Status </th>                          
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
      
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahData">Upload data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?= form_open_multipart('admin/addDataMeja')?>
        <div class="modal-body">
            <div class="form-group">          
              <input type="text" class="form-control" name = "nama_meja" id="nama_meja" placeholder="Nama meja" required >
            </div>
            <div class="form-group">
            <select name="lantai" class="form-control">
                <option value="">Pilih Lantai</option>                
                <option value="1">Lantai 1</option>                
                <option value="2">Lantai 2</option>                
            </select>
            </div>                                         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      <?= form_close()?>
    </div>
  </div>
</div>

<!-- Modal edit data -->
<?php 
$no = 1;
foreach($meja as $i):  
  $id_meja = $i['id_meja'];
  $nama_meja = $i['nama_meja'];
  $lantai = $i['lantai'];
  $status = $i['status_meja'];  
  
?>

<div class="modal fade" id="editData<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="editDataLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editData">Edit data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('admin/updateDataMeja'); ?>      
        <div class="modal-body">
        
            <div class="form-group">  
                <label for="nama_doc">Nama</label>  
                <input type="hidden" class="form-control" name = "id_meja" id="id_meja" value="<?= $id_meja; ?>" >                     
                <input type="text" class="form-control" name = "nama_meja" id="nama_meja" placeholder="Nama" value="<?= $nama_meja; ?>" >
            </div>
            <div class="form-group">  
                <label for="tgl_doc">Harga</label>              
                <input type="text" class="form-control" id="lantai" name="lantai" placeholder="Tanggal lahir" autocomplete="off" value="<?= $lantai; ?>">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            <div class="form-group">  
                <label for="nama_doc">Stok</label>                            
                <input type="text" class="form-control" name = "status" id="status" placeholder="Nama" value="<?= $status; ?>" >
            </div>
             
                    

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
           
        <?= form_close()?>

    </div>
  </div>
</div>
<?php
  $no++;  
  endforeach;
?>




<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script type="text/javascript">
$('.datepicker').datepicker({
  format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
});
var flash = '<?php echo $this->session->flashdata('message')?>';
if(flash != ""){
  setTimeout(function(){    
    $("#notif").slideUp(1000, function(){ $(this).remove() });
  }, 2000);
}
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>