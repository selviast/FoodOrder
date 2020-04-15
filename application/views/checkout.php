    <div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/');?>images/header.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span><a href="cart.html">Kembali review pesanan</a></span></p> -->
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">

			<form action="<?= base_url('order/finalOrder');?>" method="POST" class="billing-form" onsubmit="return checkForm(this);>
				<h3 class="mb-4 billing-heading">Detail Pemesanan</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Atas Nama</label>
	                  <input type="text" class="form-control" placeholder="" name="nama" required>
	                </div>
	              </div>
	              
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Tempat Duduk</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="id_meja" class="form-control" required>
							<option value="">Pilih Meja</option>
							
							<?php foreach ($meja as $mmeja){
							$idmeja = $mmeja['id_meja'];
							$namameja = $mmeja['nama_meja'];
							$lantai = $mmeja['lantai'];

							echo '<option value="'.$idmeja.'">'.'Lantai '. $lantai. ' Meja '.$namameja .'</option>';
							}
							?>
						</select>
		                </div>
		            	</div>
		            </div>
					<div class="w-100"></div>
					<!-- form ceklist -->
					<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Silakan bawa struk anda, dan lakukan pembayaran setelah selesai makan. </br> Terimakasih. huhu. </h3>
									
						<div class="form-group">
							<div class="col-md-12">
								<div class="checkbox">
									<label><input type="checkbox" value="" name="terms" class="mr-2" required >Pesanan saya sudah benar</label>
								</div>
							</div>
						</div>
						<button type="submit" name="tombol" class="btn btn-success" style="color: white;" > Buat Pesanan</button>									
					</div>
				  </div>
				    
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										
									</div>
                </div>
	            </div>
			  </form>

			  <!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class=" cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Total Pesanan</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
									<span><?php 
									$totalHarga = (int)implode($totalHarga); 
									echo 'Rp. '. number_format($totalHarga);
									?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Pajak</span>
		    						<span>
									<?php 
									$pajak = $totalHarga * 0.1;
									$pajakN = $totalHarga - $pajak;
									echo 'Rp. '. number_format($pajak);

									?>
									</span>
		    					</p>
		    					
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>
										<?php											
											echo 'Rp. '. number_format($pajakN);
										?>
									</span>
		    					</p>
								</div>
	          	</div>
	          	
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
	</section> <!-- .section -->

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

	<script>
	function print() {

		
		var w = window.open('invoice');
		w.print();
	  }
	  </script>

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

	function checkForm(form)
	{	
	if(!form.terms.checked) {
		alert("Please indicate that you accept the Terms and Conditions");
		form.terms.focus();
		return false;
	}
	return true;
	}

	</script>

  </body>
</html>