<div class="container" style="background-color:white;">
    <h1>Pustaka Barang Kami</h1>
</div>
<div class="container-fluid" style="background-color:white">
		<?php foreach($tampil_barang as $tb):?>
                      	<div class="col-md-4 col-sm-4 mb" >
                      		<div class="white-panel pn" style="margin:20px;width:auto;height:350px;">
                      			<div class="white-header" style="color:black!important;background-color:orange !important;font-weight:bold!important;">
						  			<h5><?=$tb->nama_barang?></h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-heart"></i>Stok Barang = <?=$tb->stok?> </p>
									</div>
									
	                      		</div>
	                      		<div class="centered">
										<img src="<?=base_url('assets/img/')?><?=$tb->foto_cover?>" width="160" height="160">
	                      		</div>
								  <div class="white-header" style="height:auto;margin-top:40px;color:black!important;">
								  <h3><?="Rp. ".number_format($tb->harga,0,",",".")?></h3>
                      			</div>
                      		</div>
							
                      	</div>
		<?php endforeach ?>
</div>   	