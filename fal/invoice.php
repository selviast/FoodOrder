<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link rel="stylesheet" href="invoice.css">
        <!------ Include the above in your HEAD tag ---------->
        <style>
            @page { size: 200mm } /* output size */
            body.receipt .sheet { width: 200mm; height: 500mm } /* sheet size */
            @media print { body.receipt { width: 200mm } } /* fix for Chrome */
          </style>
    </head>
<body>



<div class="container" id="print">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <h1>WARUNG MAKAN YAHUD</h1>
                        </div>
                        <?php 
                        //  print_r($totalPesanan);
                            $no = 1;
                            foreach($totalPesanan as $i):
                            $id = $i['id_pesanan'];
                            $nama_pesanan = $i['nama_pesanan'];
                            $harga = $i['total_harga'];
                            $harga_jml = $i['harga'];
                            $jumlah = $i['total_jumlah'];
                            $no_transaksi = $i['no_transaksi'];
                            $nama = $i['nama'];
                           
                            $tgl_pesanan = $i['tgl_pesanan'];
                            ?>
                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Invoice #<?= $i['no_transaksi'];?></p>
                            <p class="text-muted"><?= date('d F Y', $i['tgl_pesanan']);?></p>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Atas Nama:</p>
                            <p class="mb-1"><?= $i['nama'];?></p>
                            <p><?= 'Lantai'.$i['lantai'];?> <?= ' Meja'. $i['nama_meja'];?></p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Jumlah</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">@Harga</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Harga</th>

                                        <!-- <th class="border-0 text-uppercase small font-weight-bold">Total</th> -->
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php foreach($totalPesanan as $i): ?>
                                    <!-- <?php //print_r($i); ?> -->
                                    <tr>
                                        <td><?= $i['id_pesanan']?> </td>
                                        <td><?= $i['nama_pesanan']?></td>
                                        <td><?php echo $i['total_jumlah'];?></td>
                                        <td><?php echo 'Rp. '.number_format($i['harga']);?></td>
                                        <td><?= 'Rp. '.number_format($i['total_harga'])?></td>
                                    </tr>
                                   
                                    <?php endforeach ?>
                               
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>TOTAL</td>
                                        <td><?php echo 'Rp. '.number_format($totalHarga = (int)implode($totalHarga)) ?></td>
                                    </tr>
                                
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Pajak (10%)</td>
                                        <td><?php 
                                            $pajak = $totalHarga * 0.1;
                                            $pajakN = $totalHarga - $pajak;
                                            echo '- Rp. '.number_format($pajak);?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Total Keseluruhan</div>
                            <div class="h2 font-weight-light"><?php  echo 'Rp. ' .number_format($pajakN); ?></div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</div>
<?php
  $no++;  
  endforeach;
?>

</body>
</html>