<h2>Daftar Barang</h2>
<?= $this->session->flashdata('pesan'); ?>
<center>
  <a href="#tambah" data-toggle="modal" class="btn btn-warning">+Tambah</a>
</center>
<table id="example" class="table table-hover table-striped">
  <thead>
    <tr>
      <td>No</td>
      <td>Foto Cover</td>
      <td>Nama Barang</td>
      <td>Kategori</td>
      <td>Harga</td>
      <td>Merk</td>
      <td>Stok</td>
      <td>Aksi</td>
    </tr>
  </thead>
  <tbody>
    <?php $no=0; foreach($tampil_barang as $barang):
    $no++; ?>
    <tr>
      <td><?= $no ?></td>
      <td><img src="<?=base_url('assets/img/'.$barang->foto_cover )?>" style="width: 40px"></td>
      <td><?= $barang->nama_barang ?></td>
      <td><?= $barang->nama_kategori ?></td>
      <td><?= $barang->harga ?></td>
      <td><?= $barang->merk ?></td>
      <td><?= $barang->stok ?></td>
      <td><a href="#edit" onclick="edit('<?= $barang->id_barang ?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
        <a href="<?=base_url('index.php/barang/hapus/'.$barang->id_barang)?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Tambah Barang</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/barang/tambah')?>" method="post" enctype="multipart/form-data">
          <table>
            <tr>
              <td><input type="hidden" name="id_barang" class="form-control"></td>
            </tr>
            <tr>
              <td>Nama Barang</td>
              <td><input type="text" name="nama_barang" required class="form-control"></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td><select name="id_kategori" class="form-control">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required class="form-control"></td>
            </tr>
            <tr>
              <td>Merk</td>
              <td><input type="text" name="merk" required class="form-control"></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required class="form-control"></td>
            </tr>
            <tr>
              <td>Foto Cover</td>
              <td><input type="file" name="foto_cover" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="create" value="Simpan" class="btn btn-success">
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Edit Barang</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/barang/barang_update')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_barang_lama" id="id_barang_lama">
          <table>
            <tr>
              <td><input type="hidden" name="id_barang" id="id_barang" class="form-control"></td>
            </tr>
            <tr>
              <td>Nama Barang</td>
              <td><input type="text" name="nama_barang" id="nama_barang" required class="form-control"></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td><select name="id_kategori" class="form-control" id="id_kategori">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Harga</td>
              <td><input type="number" name="harga" required id="harga" class="form-control"></td>
            </tr>
            <tr>
              <td>Merk</td>
              <td><input type="text" name="merk" required id="merk" class="form-control"></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td><input type="number" name="stok" required id="stok" class="form-control"></td>
            </tr>
            <tr>
              <td>Foto Cover</td>
              <td><input type="file" name="foto_cover" id="foto_cover" class="form-control"></td>
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
  function edit(a){
    $.ajax({
      type:"post",
      url:"<?=base_url()?>index.php/barang/edit_barang/"+a,
      dataType:"json",
      success:function(data){
        $("#id_barang").val(data.id_barang);
        $("#nama_barang").val(data.nama_barang);
        $("#id_kategori").val(data.id_kategori);
        $("#harga").val(data.harga);
        $("#merk").val(data.merk);
        $("#stok").val(data.stok);
        $("#id_barang_lama").val(data.id_barang);
      }
    })
  }
</script>