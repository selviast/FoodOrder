<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/');?>images/header.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Silahkan</a></span> <span>Pilih</span></p> -->
            <h1 class="mb-0 bread">Silakan Pilih Pesanan Anda</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">Makanan</a></li>
						<li><a href="<?= base_url('order/indexMinuman');?>">Minuman</a></li>
    				</ul>
    			</div>
    		</div>
			<div class="row">
				<?php $i=1; ?>
                <?php foreach ($makanan as $mk) :?>
                  
                <?php $i++; ?>
				
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
					<a href="#" class="img-prod"><img class="" width="250px" height="250px" src="<?= base_url('assets/')?>upload/gambar/<?= $mk['gambar'];?>" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?=$mk['nama_pesanan'];?></a></h3>
    						<div class="d-flex">
    							<div class="text py-3 pb-4 px-3 text-center">
		    						<p class=""><?= 'Rp. '.number_format($mk['harga']).',-'?></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="<?= base_url('order/tambahPesananMakanan/'.$mk['id_pesanan']);?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
									
										<span><i class="ion-ios-cart"></i></span>

    
	    							</a>		
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>

                <?php endforeach; ?>
    			
			</div>
			 		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
	</section>
	
