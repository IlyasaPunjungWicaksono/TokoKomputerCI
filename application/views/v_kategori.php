<h2>Kategori</h2>

<center><a href="#tambah" data-toggle="modal" class="btn btn-success">Tambah</a></center>
<table id="tmbh" class="table table-hover table-stripped">
	<thead>
		<tr>
			<td>NO</td>
			<td>ID Kategori</td>
			<td>Nama Kategori</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $no = 0;foreach ($tampil_kategori as $kat):
			$no++;?>
		<tr>
			<td><?= $no?></td>
			<td><?=$kat->id_kategori?></td>
			<td><?=$kat->nama_kategori?></td>
			<td>
				<a href="#edit" onclick="edit('<?=$kat->id_kategori?>')" data-toggle="modal" class="btn btn-primary">
					Ubah
				</a>
				<a href="<?=base_url('index.php/kategori/hapus/'.$kat->id_kategori)?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger">
					Hapus
				</a>
			</td>
		</tr>
	<?php endforeach?>
	<?php
    if($this->session->flashdata('pesan')!= null){
      echo"<div class='alert alert-success' style='width:200px'>".$this->session->flashdata('pesan')."</div";
       }?>
	</tbody>
</table>

<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="color:white;"><h2>Tambah Kategori</h2>
				<button class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body"> 
			<form action="<?=base_url('index.php/kategori/tambah')?>" method="post">
				<table>
					<tr>
						<td>Nama Kategori</td>
						<td><input type="text" name="nama_kategori" required class="form-control"></td>
					</tr>
				</table>
				<br>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
			</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="edit">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header" style="color:white;">
			<center><h2>Edit Kategori</h2></center>
			<button class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
			</button>
		</div>
		<div class="modal-body">
			<form action="<?=base_url('index.php/kategori/kategori_update')?>" method="post">
				<input type="hidden" name="id_kategori_lama" id="id_kategori_lama">
				<table>
				<tr>
					
					<td><input type="hidden" name="id_kategori" id="id_kategori" required class="form-control">
					</td>
				</tr>
				<tr>
					<td>Nama Kategori </td>
					<td>
					<input type="text" id="nama_kategori" name="nama_kategori" required class="form-control">
					</td>
				</tr>
				</table>
				<input type="submit" name="edit" value="Simpan" class="btn btn-success">
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tmbh').DataTable();
	});
</script>
<script type="text/javascript">
	function edit(a){
		$.ajax({
			type:"post",
		url:"<?=base_url()?>index.php/kategori/edit_kategori/"+a,dataType:"json",
		success:function(data){
			$("#id_kategori").val(data.id_kategori);
			$("#nama_kategori").val(data.nama_kategori);
			$("#id_kategori_lama").val(data.id_kategori);
		}
		});
	}
</script>