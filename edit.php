<?php 

require_once "inti.php";

$urlhal = $_GET['hal'];
$urlsubhal = $_GET["subhal"];
$urljudul = $_GET["judul"];

if($urlsubhal === 'barang'){
  $kode = $_GET["kode"];
  $barang = query("SELECT * FROM barang WHERE kode_barang='$kode'")[0];
}else if ($urlhal === "pegawai"){
  $kodePegawai = $_GET["kode"];
  $pegawai = query("SELECT * FROM pegawai WHERE id_pegawai = '$kodePegawai'")[0];
}else if($urlhal === "users"){
  $idPelanggan = $_GET["kode"];
  $pelanggan = query("SELECT * FROM pelanggan WHERE id_pelanggan = '$idPelanggan'")[0];
}else if($urlsubhal === "barangRusak"){
  $kodeRusak = $_GET["kodeRusak"];
  $barangRusak = query("SELECT * FROM barang_rusak WHERE id_barang_rusak=$kodeRusak")[0];
}else if($urlsubhal === "pinjam"){
  $kodePeminjaman = $_GET["kodePeminjaman"];
  $peminjaman = query("SELECT * FROM peminjaman WHERE kode_peminjaman='$kodePeminjaman'")[0];
}

if(isset($_POST['edit'])){
  $data = pengaman($_POST);

  if($urlsubhal === 'barang'){
    $jumlahPeminjaman = query("SELECT SUM(jumlah) AS jumlahPeminjaman FROM peminjaman WHERE kode_barang ='$data[0]'")[0]["jumlahPeminjaman"];
    $jumlahBarangRusak = query("SELECT SUM(jumlah) AS jumlahBarangRusak FROM barang_rusak WHERE kode_barang='$data[0]'")[0]["jumlahBarangRusak"];
    $jum = $jumlahPeminjaman+$jumlahBarangRusak;
    if($data[2] < $jum){
      $sql=false;
      $alert = "Jumlah barang anda masukkan terlalu sedikit (sudah ada dipinjam / barang rusak)";
    }else{
      $sql = "UPDATE barang SET 
              nama_barang = '$data[1]',
              total = $data[2],
              satuan = '$data[3]'
              WHERE kode_barang = '$data[0]'";
      $alert = "Data berhasil diubah";
    }
  }else if($urlsubhal === 'peg'){
    $sql = "UPDATE pegawai SET 
            nama = '$data[1]',
            no_telp = '$data[2]',
            email = '$data[3]',
            alamat = '$data[4]'
            WHERE id_pegawai='$data[0]'";
    $alert ="data berhasil diubah";
  }else if($urlsubhal === 'user'){
    $sql = "UPDATE pelanggan SET
            nama = '$data[1]',
            no_telp = '$data[2]',
            email = '$data[3]',
            alamat = '$data[4]'
            WHERE id_pelanggan = '$data[0]'";
    $alert ="data berhasil diubah";
  }else if($urlsubhal === "barangRusak"){
    $sql = "UPDATE barang_rusak SET
            kode_barang = '$data[1]',
            jumlah = '$data[2]',
            keterangan = '$data[3]'
            WHERE id_barang_rusak = $data[0]";
    $alert ="data berhasil diubah";
  }else if ($urlsubhal === "pinjam"){
    $sql = "UPDATE peminjaman SET
    kode_peminjaman = '$data[0]',
    kode_barang = '$data[1]',
    id_pelanggan = '$data[2]',
    jumlah = $data[3],
    tgl_peminjaman = '$data[4]'
    WHERE kode_peminjaman = '$data[0]'";
    $alert ="data berhasil diubah";
  }

  if($sql === false){
    echo "
      <script>
          alert('$alert');
          document.location.href = 'tampil.php?hal=". $urlhal ."&&subhal=". $urlsubhal ."&&judul=". $urljudul ."';
      </script>
      ";
  }else if(edit($sql) > 0){
      echo "
      <script>
          alert('$alert');
          document.location.href = 'tampil.php?hal=". $urlhal ."&&subhal=". $urlsubhal ."&&judul=". $urljudul ."';
      </script>
      ";
  }

}

if($urlsubhal === "pinjam"){
  $barangs = query("SELECT kode_barang,nama_barang FROM barang");
  $pelangganS = query("SELECT id_pelanggan, nama FROM pelanggan");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/main.css">

    <style>
      .container35 .card-body .form-control,.form-select{
          background: #393f43;
          border: none;
          color: #fff;
      }

      .container35 .card-body .form-control:focus{
        box-shadow:none;
      }

      .form-select:focus {
            border-color: none;
            outline: 0;
            box-shadow: none;
        }

        ::-webkit-calendar-picker-indicator {
          filter: invert(1);
      }
    </style>

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
            <form action="" method="post">
              <div class="card mb-3" style="width: 80%;margin: auto;background: #23252E;padding: 20px 0;margin-top: 5vh;">
                <div class="card-body" style="color: #F55930;width: 90%;margin: auto;">

                  <?php if($_GET["subhal"] === "barang") :?>
                    <input type="hidden" class="form-control" id="kode" name="kode" value="<?= $barang["kode_barang"]; ?>" required autocomplete="off" readonly>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $barang["nama_barang"]; ?>">
                      </div>
                      
                      <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" class="form-control" id="total" name="total" required autocomplete="off" value="<?= $barang["total"]; ?>">
                      </div>
    
                      <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan" required autocomplete="off" value="<?= $barang["satuan"]; ?>">
                      </div>

                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="tampil.php?hal=kelbarang&&subhal=barang&&judul=Barang" class="btn btn-danger">Back To Home</a>
                        <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                  <?php endif; ?>
                  <?php if($_GET["hal"] === "pegawai") :?>
                      <input type="hidden" class="form-control" id="id_pegawai" name="id_pegawai" value="<?= $pegawai["id_pegawai"]; ?>">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $pegawai["nama"]; ?>">
                      </div>
                      
                      <div class="mb-3">
                        <label for="no_telp" class="form-label">No Telepon</label>
                        <input type=" " class="form-control" id="no_telp" name="no_telp" required autocomplete="off" value="<?= $pegawai["no_telp"]; ?>">
                      </div>
    
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required autocomplete="off" value="<?= $pegawai["email"]; ?>">
                      </div>

                      <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off" value="<?= $pegawai["alamat"]; ?>">
                      </div>
                      
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="tampil.php?hal=pegawai&&subhal=peg&&judul=Pegawai" class="btn btn-danger">Back To Home</a>
                        <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                  <?php endif; ?>
                  <?php if($_GET["hal"] === "users") :?>
                      <input type="hidden" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $pelanggan["id_pelanggan"]; ?>">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $pelanggan["nama"]; ?>">
                      </div>
                      
                      <div class="mb-3">
                        <label for="no_telp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" required autocomplete="off" value="<?= $pelanggan["no_telp"]; ?>">
                      </div>
    
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required autocomplete="off" value="<?= $pelanggan["email"]; ?>">
                      </div>

                      <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off" value="<?= $pelanggan["alamat"]; ?>">
                      </div>
                      
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="tampil.php?hal=users&&subhal=user&&judul=Pelanggan" class="btn btn-danger">Back To Home</a>
                        <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                  <?php endif; ?>
                  <?php if($_GET["subhal"] === "barangRusak") :?>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $barangRusak["id_barang_rusak"]; ?>" required autocomplete="off" readonly>
                      <div class="mb-3">
                        <label for="kode_barang" class="form-label">Kode barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" required autocomplete="off" value="<?= $barangRusak["kode_barang"]; ?>">
                      </div>
                      
                      <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required autocomplete="off" value="<?= $barangRusak["jumlah"]; ?>">
                      </div>
    
                      <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required autocomplete="off" value="<?= $barangRusak["keterangan"]; ?>">
                      </div>

                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="tampil.php?hal=kelbarang&&subhal=barangRusak&&judul=Barang Rusak" class="btn btn-danger">Back To Home</a>
                        <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                  <?php endif; ?>
                  <?php if($_GET["subhal"] === "pinjam") :?>
                    <input type="hidden" class="form-control" id="kodePeminjaman" name="kodePeminjaman" value="<?= $peminjaman["kode_peminjaman"]; ?>" required autocomplete="off" readonly>
                      <div class="mb-3">
                        <label for="kode_barang" class="form-label">Nama barang</label>
                        <svg style="position: absolute;margin-top: 35px;margin-left: 56.5vw;color: #fff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><polyline points="19 12 12 19 5 12"></polyline></svg>
                        <select class="form-select" aria-label="Default select example" name="kode_barang">
                          <?php foreach($barangs as $barang) :?>
                            <option <?= ($barang["kode_barang"] == $peminjaman["kode_barang"]) ? "selected" : ""; ?> value="<?= $barang["kode_barang"]; ?>"><?= $barang["nama_barang"]; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      
                      <div class="mb-3">
                        <label for="id_pelanggan" class="form-label">Nama Peminjam</label>
                        <svg style="position: absolute;margin-top: 35px;margin-left: 54.5vw;color: #fff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><polyline points="19 12 12 19 5 12"></polyline></svg>
                        <select class="form-select" aria-label="Default select example" name="id_pelanggan">
                          <?php foreach($pelangganS as $planggan) :?>
                            <option <?= ($planggan["id_pelanggan"] == $peminjaman["id_pelanggan"]) ? "selected" : ""; ?> value="<?= $planggan["id_pelanggan"]; ?>"><?= $planggan["nama"]; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
    
                      <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Peminjaman</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required autocomplete="off" value="<?= $peminjaman["jumlah"]; ?>">
                      </div>

                      <div class="mb-3">
                        <label for="tgl_peminjaman" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" required autocomplete="off" value="<?= $peminjaman["tgl_peminjaman"]; ?>">
                      </div>

                      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="tampil.php?hal=peminjaman&&subhal=pinjam&&judul=Peminjaman" class="btn btn-danger">Back To Home</a>
                        <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                  <?php endif; ?>
                  
                </div>
              </div>
            </form>
          </div>

        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- My js -->
    <script src="js/script.js"></script>
  </body>
</html>