<?php 

require_once "inti.php";

if($_GET["subhal"] === 'barang'){
  $barangs = query("SELECT * FROM barang");
  $jumlahBarang = count($barangs);
}else if($_GET["subhal"] === "barangRusak"){
  $barangRusaks = query("SELECT * FROM barang_rusak");
  $jumlahBarangRusak = count($barangRusaks);
} else if ($_GET["subhal"] === 'inven'){
  $inventory = query("SELECT * FROM inventory");
  $jumlahInven = count($inventory);
}else if($_GET["subhal"] === 'peg'){
  $pegawai = query("SELECT * FROM pegawai");
  $jumlahPegawai = count($pegawai);
}else if($_GET["subhal"] === 'user'){
  $pelanggan = query("SELECT * FROM pelanggan");
  $jumlahPelanggan = count($pelanggan);
}else{
  $peminjaman = query("SELECT * FROM peminjaman");
  $jumlahPeminjaman = count($peminjaman);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- My style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/settings.css">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" rel="stylesheet">

    <title></title>
  </head>
  <body>

    <div class="container2">

        <?php include "bagian/sidebar.php" ?>

        <div class="container4">
  
        <?php include "bagian/navbar.php" ?>

        <div class="container35">
          <div class="container36">

            <?php if($_GET["subhal"] === "barang" || $_GET["subhal"] === "inven") :?>
              <div class="settings" onclick="setting()">
                <div class="settings-svg">
                  <svg class="settings-svg-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                </div>
                <div class="perintah ">
                  <?php if($_GET["subhal"] === "barang") : ?>
                    <div class="container-settings">
                      <h1 class="perintah-edit">Fitur edit</h1>
                      <div class="tombolAk">
                        <div class="edit1" onclick="editBarang1(confirm('Apakah anda yakin ingin mengaktifkan fitur edit?'))">
                          <span class="edit"></span>
                        </div>
                      </div>
                    </div>
                    <div class="container-settings">
                      <h1 class="perintah-delete">Fitur delete</h1>
                      <div class="tombolAkDel">
                        <div class="hapus1" onclick="hapusbarang1(confirm('Apakah anda yakin ingin mengaktifkan fitur delete?'))">
                          <span class="hapus11"></span>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php if($_GET["subhal"] === "inven") : ?>
                    <div class="container-settings">
                      <h1 class="perintah-delete2">Fitur delete</h1>
                      <div class="tombolAkDel2">
                        <div class="hapus3" onclick="hapusInven(confirm('Apakah anda yakin ingin mengaktifkan fitur delete?'))">
                          <span class="hapus33"></span>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if($_GET["subhal"] === 'barang') : ?>
              <?php if($jumlahBarang > 0 ) { ?>
              <table class="table" style="text-align:center;width:95%;margin: auto;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Total</th>
                    <th scope="col">Satuan</th>
                    <th scope="col" style="width: 13vw;" class="tableBarangAction">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                    <?php foreach($barangs as $barang) : ?>
                      <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $barang["kode_barang"]; ?></td>
                        <td><?= $barang["nama_barang"]; ?></td>
                        <td><?= $barang["total"]; ?></td>
                        <td><?= $barang["satuan"]; ?></td>
                        <td class="tableBarangAction">
                          <a href="edit.php?kode=<?= $barang["kode_barang"]; ?>&&hal=kelbarang&&subhal=barang&&judul=Edit Barang" class="btn btn-warning editBarang">Edit</a>
                          <a href="hapus.php?kode=<?= $barang["kode_barang"]; ?>&&subhal=barang" class="btn btn-danger hapusBarang" onclick="return confirm('Apakah anda yakin ingin menghapus dat abarang in? karena ini akan mengahapus inventory, Barang rusak, dan peminjaman')">Hapus</a>
                        </td>
                      </tr>
                    <?php $no++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php }else{ ?>
                <div class="gada">
                  <div class="alert alert-dark" role="alert" style="font-size: 30px;font-weight: 700;">
                    Tidak ada barang Tersedia
                  </div>
                </div>
              <?php } ?>
            <?php endif; ?>

            <?php if($_GET["subhal"] === 'inven') :?>
              <?php if($jumlahInven > 0){ ?>
              <table class="table" style="text-align:center;width:95%;margin: auto;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Stock Tersedia</th>
                    <th scope="col">Status Barang</th>
                    <th scope="col" style="width: 13vw;" class="tableInven">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                    <?php foreach($inventory as $inven) : ?>
                      <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $inven["kode_barang"]; ?></td>
                        <td><?= $inven["stock_tersedia"]; ?></td>
                        <td style="text-transform:capitalize;"><?= $inven["status_barang"]; ?></td>
                        <td class="tableInven">
                          <a href="hapus.php?kode=<?= $inven["kode_barang"]; ?>&&hal=inventory&&subhal=inven" class="btn btn-danger hapus2" onclick="return confirm('Apakah anda yakin ingin menghapus data inventory ini? karena ini juga akan menghapus semua data peminjaman dan barang rusak')">Hapus</a>
                        </td>
                      </tr>
                    <?php $no++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php }else{ ?>
                <div class="gada">
                  <div class="alert alert-dark" role="alert" style="font-size: 30px;font-weight: 700;">
                    Tidak ada Inventory
                  </div>
                </div>
              <?php } ?>
            <?php endif; ?>

            <?php if($_GET["subhal"] === 'peg') :?>
              <?php if($jumlahPegawai > 0){ ?>
              <table class="table" style="text-align:center;width:95%;margin: auto;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id Pegawai</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col" style="width: 13vw;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                    <?php foreach($pegawai as $peg) : ?>
                      <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $peg["id_pegawai"]; ?></td>
                        <td><?= $peg["nama"]; ?></td>
                        <td><?= $peg["no_telp"]; ?></td>
                        <td><?= $peg["email"]; ?></td>
                        <td><?= $peg["alamat"]; ?></td>
                        <td>
                          <a href="edit.php?kode=<?= $peg["id_pegawai"]; ?>&&hal=pegawai&&subhal=peg&&judul=Edit Pegawai" class="btn btn-warning">Edit</a>
                          <a href="hapus.php?kode=<?= $peg["id_pegawai"]; ?>&&subhal=peg" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data pegawai ini?')">Hapus</a>
                        </td>
                      </tr>
                    <?php $no++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php }else{ ?>
                <div class="gada">
                  <div class="alert alert-dark" role="alert" style="font-size: 30px;font-weight: 700;">
                    Tidak ada pegawai
                  </div>
                </div>  
              <?php } ?>
            <?php endif; ?>

            <?php if($_GET["subhal"] === 'user') :?>
              <?php if($jumlahPelanggan > 0){ ?>
              <table class="table" style="text-align:center;width:95%;margin: auto;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id Pelanggan</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col" style="width: 13vw;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                    <?php foreach($pelanggan as $peg) : ?>
                      <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $peg["id_pelanggan"]; ?></td>
                        <td><?= $peg["nama"]; ?></td>
                        <td><?= $peg["no_telp"]; ?></td>
                        <td><?= $peg["email"]; ?></td>
                        <td><?= $peg["alamat"]; ?></td>
                        <td>
                          <a href="edit.php?kode=<?= $peg["id_pelanggan"]; ?>&&hal=users&&subhal=user&&judul=Edit Pelanggan" class="btn btn-warning">Edit</a>
                          <a href="hapus.php?kode=<?= $peg["id_pelanggan"]; ?>&&hal=users&&subhal=user" class="btn btn-danger" onclick="return confirm('Apakah anda yain ingin menhapus pelanggan ini?. karena semua history peminjaman pelanggan ini juga akan terhapus')">Hapus</a>
                        </td>
                      </tr>
                    <?php $no++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php }else{ ?>
                <div class="gada">
                  <div class="alert alert-dark" role="alert" style="font-size: 30px;font-weight: 700;">
                    Tidak ada pelanggan
                  </div>
                </div>
              <?php } ?>
            <?php endif; ?>

            <?php if($_GET["subhal"] === 'pinjam') :?>
              <?php if($jumlahPeminjaman > 0){ ?>
              <table class="table" style="text-align:center;width:95%;margin: auto;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Peminjaman</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Taggal Peminjaman</th>
                    <th scope="col" style="width: 13vw;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                    <?php foreach($peminjaman as $pinjam) : ?>
                      <?php $kode_barang = $pinjam['kode_barang']; ?>
                      <?php $id_pelanggan = $pinjam['id_pelanggan']; ?>
                      <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $pinjam["kode_peminjaman"]; ?></td>
                        <td><?= query("SELECT nama_barang FROM barang WHERE kode_barang = '$kode_barang'")[0]["nama_barang"]; ?></td>
                        <td><?= query("SELECT nama FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'")[0]["nama"]; ?></td>
                        <td><?= $pinjam["jumlah"]; ?></td>
                        <td><?= $pinjam["tgl_peminjaman"]; ?></td>
                        <td>
                          <a href="edit.php?kodePeminjaman=<?= $pinjam["kode_peminjaman"]; ?>&&hal=peminjaman&&subhal=pinjam&&judul=Edit Peminjaman" class="btn btn-warning">Edit</a>
                          <a href="hapus.php?kodePeminjaman=<?= $pinjam["kode_peminjaman"]; ?>&&subhal=pinjam" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus peminjaman ini?')">Hapus</a>
                        </td>
                      </tr>
                    <?php $no++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php }else{ ?>
                <div class="gada">
                  <div class="alert alert-dark" role="alert" style="font-size: 30px;font-weight: 700;">
                    Tidak ada peminjaman
                  </div>
                </div>
              <?php } ?>
            <?php endif; ?>

            <?php if($_GET["subhal"] === 'barangRusak') :?>
              <?php if($jumlahBarangRusak > 0) { ?>
              <table class="table" style="text-align:center;width:95%;margin: auto;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id Barang Rusak</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col" style="width: 13vw;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                    <?php foreach($barangRusaks as $barangRusak) : ?>
                      <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $barangRusak["id_barang_rusak"]; ?></td>
                        <td><?= $barangRusak["kode_barang"]; ?></td>
                        <td><?= $barangRusak["jumlah"]; ?></td>
                        <td><?= $barangRusak["keterangan"]; ?></td>
                        <td>
                          <a href="edit.php?kodeRusak=<?= $barangRusak["id_barang_rusak"]; ?>&&hal=kelbarang&&subhal=barangRusak&&judul=Edit Barang Rusak" class="btn btn-warning">Edit</a>
                          <a href="hapus.php?kodeRusak=<?= $barangRusak["id_barang_rusak"]; ?>&&subhal=barangRusak" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus barang rusak ini?')">Hapus</a>
                        </td>
                      </tr>
                    <?php $no++ ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php }else{ ?>
                <div class="gada">
                  <div class="alert alert-dark" role="alert" style="font-size: 30px;font-weight: 700;">
                    Tidak ada barang rusak 
                  </div>
                </div>
              <?php } ?>
            <?php endif; ?>

          </div>
        </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- My js -->
    <script src="js/script.js"></script>
  </body>
</html>