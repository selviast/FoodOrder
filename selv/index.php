<link href="<?= base_url('assets/');?>search/css/main.css" rel="stylesheet" />

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>pembayaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active">pembayaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
    <div class="s003">

    <?php $where = $this->input->post('cari_invoice');
        $hasil = $this->db->query("select * from transaksi where no_transaksi='$where'")->row_array(); ?>


    <form action="<?= base_url('admin/cariInvoice');?>" method="post">
        <!-- <?php echo ($hasil); ?> -->
        <div class="inner-form">
          <div class="input-field second-wrap">	
            <input id="search" type="text" placeholder="Enter Number Invoice?" autocomplete="off" name="cari_invoice"/>

          </div>
          <div class="input-field third-wrap">
          <!-- data target nya blm diedit -->
            <button class="btn-search" data-toggle="modal" data-target="" type="submit">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>

    </div>

    </section>

<!-- Modal search-->
<div class="modal" id="search_invoice" tabindex="-1" role="dialog" aria-labelledby="kosongkan_meja" aria-hidden="true">
  <div class="modal-dialog" role="document">  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="search_invoice">VALIDASI PEMBAYARAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <!-- end modal -->

    <!-- form isi modals -->

    
    <?= form_open_multipart('admin/index')?>
    
    <form action="<?= base_url('admin/cariInvoice');?>" method="POST" class="billing-form">


        <div class="modal-body">
            <div class="form-group">
            <label for="no_invoice">No. Invoice </label>      
              <input type="text" class="form-control" name = "no_invoice" id="search_invoice" disabled >
              <?php echo($hasil['no_transaksi']) ?>
            </div>
            <div class="form-group">  
            <label for="nama_pemesan">Atas Nama </label>        
              <input type="text" class="form-control" name = "nama_pemesan" id="search_invoice" disabled >
            </div>
            <label for="nama_pemesan">Lantai</label>        
            <div class="form-group">          
              <input type="text" class="form-control" name = "lantai" id="search_invoice" disabled >
            </div>
                                                   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Kosongkan Meja</button>
        </div>
        </form>
      <?= form_close()?>
    </div>
  </div>
</div>
      
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
