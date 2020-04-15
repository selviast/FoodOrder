    <div class="hero-wrap hero-bread" style="background-image: url(<?= base_url('assets/');?>images/header.jpg);">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">REVIEW PESANAN SAYA</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Nama Pesanan</th>
						        <th>@Harga</th>
						        <th>Jumlah</th>
						        <!-- <th>Total</th> -->
						      </tr>
						    </thead>
						    <tbody>
						<form action="<?= base_url('order/finish');?>" method="POST" class="billing-form">
							<?php $i=1; ?>							
							<?php foreach ($totalPesanan as $mk) :?>
							
						
							
							<?php $i++; ?>
						      <tr class="text-center">
						        <td class="product-remove"><a onclick="javascript: return confirm('Anda yakin untuk menghapus item pesanan?')" href="<?= base_url('order/deleteDataPesanan/'.$mk['id_pesanan']);?>"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(<?= base_url('assets/');?>upload/gambar/<?= $mk['gambar']?>)"></div></td>
						        
						        <td class="product-name">
								<input type="hidden" name="nama_pesanan" id="nama_pesanan" value="<?= $mk['nama_pesanan']?>">
						        	<h3><?= $mk['nama_pesanan']?></h3>
						        	<!-- <p>Far far away, behind the word mountains, far from the countries</p> -->
						        </td>
						        
						        <td class="price"><?= 'Rp. '.number_format($mk['total_harga'])?></td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-2">
									 
									 <span class="quantity form-control input-number">
									 <?php 										 
										//echo $totalPesanX = (int)implode($totalPesanX);
										echo $mk['total_jumlah'];
									 ?>
									 </span>									 
						          	</div>
					          	</td>
						        
						        
						      </tr><!-- END TR-->	

							   <?php endforeach; ?>	
						</from>				      
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			<hr>
    		<div class="row justify-content-end">
    			
    			
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				
    					
    				</div>
    				<p><a href="<?= base_url('order/checkOut');?>" class="btn btn-primary py-3 px-4">LANJUTKAN PESANAN</a></p>
    			</div>
    		</div>
			</div>
		</section>

	


  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>

	<script>

		
	</script>
    
  </body>
</html>