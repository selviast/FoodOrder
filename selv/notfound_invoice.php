

<?php $where = $this->input->post('cari_invoice');
        $hasil = $this->db->query("select nama, no_transaksi, lantai, nama_meja from transaksi join meja on transaksi.id_meja = meja.id_meja  where no_transaksi='$where'")->row_array(); ?>

<!-- <form action="<?= base_url('admin/deleteInvoice');?>" method="POST" class="billing-form"> -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h3>NOMOR TRANSAKSI TIDAK DITEMUKAN! </h3>
        <div class="modal-footer">
          <a href="<?= base_url('admin/index');?>"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> </a>
          <!-- <a onclick="javascript: return confirm('Anda yakin untuk menghapus?')" class="btn btn-primary" href="<?= base_url('admin/deleteInvoice/'.$hasil['no_transaksi']);?>">Validasi </a> -->
        </div>
      
    </section>
    <!-- /.content -->
  </div>
</form>
