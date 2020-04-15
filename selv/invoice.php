<?php $where = $this->input->post('cari_invoice');
        $hasil = $this->db->query("select nama, no_transaksi, lantai, nama_meja from transaksi join meja on transaksi.id_meja = meja.id_meja  where no_transaksi='$where'")->row_array(); ?>

        
<form action="<?= base_url('admin/deleteInvoice');?>" method="POST" class="billing-form">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="modal-body"> 
            <div class="form-group">
            <label for="no_invoice">No. Invoice </label>      
              <input type="text" class="form-control" name = "no_invoice" id="search_invoice" value="<?php echo($hasil['no_transaksi']); ?>" disabled >
             
            </div>
            <div class="form-group">  
            <label for="nama_pemesan">Atas Nama </label>        
              <input type="text" class="form-control" name = "nama_pemesan" id="search_invoice" value="<?php echo($hasil['nama']); ?>" disabled >
            </div>
            <label for="nama_pemesan">Lantai</label>        
            <div class="form-group">          
              <input type="text" class="form-control" name = "lantai" id="search_invoice" value="<?php echo("lantai " .$hasil['lantai'] ." no. " .$hasil['nama_meja']); ?>" disabled >
            </div>
                                                   
        </div>
        <div class="modal-footer">
          <a href="<?= base_url('admin/index');?>"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> </a>
          <a onclick="javascript: return confirm('Anda yakin untuk menghapus?')" class="btn btn-primary" href="<?= base_url('admin/deleteInvoice/'.$hasil['no_transaksi']);?>">Validasi </a>
        </div>
      
    </section>
    <!-- /.content -->
  </div>
</form>
