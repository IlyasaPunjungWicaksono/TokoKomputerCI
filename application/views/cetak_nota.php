<h2 align="center">Nota</h2>
No Nota 		: <?= $transaksi->id_transaksi ?> <br>
Tanggal beli 	: <?= $transaksi->tanggal_beli ?> <br>
Nama Pembeli 	: <?= $transaksi->nama_pembeli ?> <br>
Kasir 			: <?= $this->session->userdata('nama_user'); ?> <br> <br>

<table border="1" style="border-collapse: collapse;">
	<tr>
		<th>No</th>
		<th>Nama Barang</th>
		<th>Harga</th>
		<th>QTY</th>
		<th>Subtotal</th>
	</tr>
		<?php $no=0; foreach($this->trans->detail_pembelian($transaksi->id_transaksi) as $barang): $no++; ?>
		<tr>
			<th><?=$no?></th>
			<th><?=$barang->nama_barang?></th>
			<th><?= number_format($barang->harga)?></th>
			<th><?=$barang->jumlah?></th>
			<th><?= number_format(($barang->harga*$barang->jumlah)) ?></th>
		</tr>
	<?php endforeach ?>
		<tr>
			<th colspan="4">Grand Total</th>
			<th><?= number_format($transaksi->total) ?></th>
		</tr>
</table>
<br>
Uang bayar : <?= $this->session->userdata('bayar'); ?> <br>
Kembalian : <?= $this->session->userdata('kembalian'); ?><br><br>

<a href="<?=base_url('index.php/transaksi')?>">Back</a>
<script type="text/javascript">
	window.print();
	// location.href="<?=base_url('index.php/transaksi')?>"
</script>