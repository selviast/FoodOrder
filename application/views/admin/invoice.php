<link href="<?= base_url('assets/');?>search/css/main.css" rel="stylesheet" />

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validasi Tagihan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active">Validasi Tagihan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <form action="<?= base_url('admin/validInvoice');?>" method="POST" class="billing-form">
    <div class="modal-body"> 
            <div class="form-group">
            <label for="no_invoice">No. Invoice </label>      
              <input type="text" class="form-control" name = "no_invoice" id="search_invoice" value="<?php echo($pesanan['no_transaksi']); ?>" disabled >
             
            </div>
            <div class="form-group">  
            <label for="nama_pemesan">Atas Nama </label>        
              <input type="text" class="form-control" name = "nama_pemesan" id="search_invoice" value="<?php echo($pesanan['nama']); ?>" disabled >
            </div>
            <label for="nama_pemesan">Lantai</label>        
            <div class="form-group">          
              <input type="text" class="form-control" name = "lantai" id="search_invoice" value="<?php echo("lantai " .$pesanan['lantai'] ." Meja. " .$pesanan['nama_meja']); ?>" disabled >
            </div>
            <label for="nama_pemesan">Total Tagihan</label>        
            <div class="form-group">          
            <input type="text" class="form-control" name = "nama_pemesan" id="search_invoice" value="<?php echo'Rp. '.(number_format($pesanan['total_harga'])); ?>" disabled >
            </div>
                                                   
        </div>
        <div class="modal-footer">
          <a href="<?= base_url('admin/index');?>"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> </a>
          <a onclick="javascript: return confirm('Anda yakin untuk memvalidasinya?')" class="btn btn-primary" href="<?= base_url('admin/validInvoice/'.$pesanan['no_transaksi']);?>">Validasi </a>
        </div>
      
    </form>
    
    <section class="content">
    

    </div>

    </section>

</div>


      
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
