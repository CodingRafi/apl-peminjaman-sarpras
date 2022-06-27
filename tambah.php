<?php 

require_once "inti.php";

$hal = $_GET["hal"];
$subhal = $_GET["subhal"];
$judul= $_GET["judul"];

$data = pengaman($_POST);

if(isset($_POST["simpan"])){
  
  if($subhal === "tambahBarang"){
    $urlhal1 = "kelbarang";
    $urlsubhal1 = "barang";
    $urljudul1 = "Barang";
    if(cekAdaGak("SELECT kode_barang FROM barang WHERE kode_barang = '$data[0]'") > 0){
      $alert = "Gagal menambahkan barang baru .Data barang sudah ada";
      $sql = false;
    }else{
      if(strlen("$data[0]") > 5){
        $alert = "Gagal menambahkan barang baru. Kode barang terlalu panjang";
        $sql = false;
      }else{
        $sql = ["INSERT INTO barang VALUES ('$data[0]', '$data[1]', $data[2], '$data[3]')"];
        $alert = "Berhasil menambahkan data barang baru";
      }
    }
  }else if($subhal === "tambahBarangRusak"){
      $urlhal1 = "kelbarang";
      $urlsubhal1 = "barangRusak";
      $urljudul1 = "Barang Rusak";
      if(cekAdaGak("SELECT kode_barang FROM inventory WHERE kode_barang = '$data[0]'") > 0){
        if(query("SELECT stock_tersedia FROM inventory WHERE kode_barang = '$data[0]'")[0]["stock_tersedia"] > 0){
          $sql = ["INSERT INTO barang_rusak VALUES ('', '$data[0]', $data[1], '$data[2]')"];
          $alert = "Data barang berhasil ditambahkan";
        }else{
          $alert = "Gagal menambahkan barang rusak baru. Tidak ada stock barang";
          $sql = false;
        }
      }else{
        $alert = "Gagal menambahkan barang rusak baru .Data barang tidak ditemukan";
        $sql = false;
      }
  }else if($subhal === "tambahpeg"){
      $urlhal1 = "pegawai";
      $urlsubhal1 = "peg";
      $urljudul1 = "Pegawai";
      if(cekAdaGak("SELECT id_pegawai FROM pegawai WHERE id_pegawai = '$data[0]'") > 0){
        $alert = "Data pegawai sudah ada";
        $sql = false;
      }else{
        if(strlen("$data[0]") > 10){
          $alert="Id pegawai terlalu panjang";
          $sql = false;
        }else{
          $sql = ["INSERT INTO pegawai VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')"];
          $alert = "Data pegawai baru telah ditambahkan";
        }
      }
  }else if($subhal === "tambahUser"){
      $urlhal1 = "users";
      $urlsubhal1 = "user";
      $urljudul1 = "Pelanggan";
      $sql = ["INSERT INTO pelanggan VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')"];
      if(strlen("$data[0]") > 5){
        $alert = "Gagal menambahkan. Id Pelanggan terlalu panjang";
        $sql = false;
      }else{
        if(cekAdaGak("SELECT id_pelanggan FROM pelanggan WHERE id_pelanggan = '$data[0]'") > 0){
          $alert = "Data pelanggan sudah ada";
          $sql = false;
        }else{
          $alert = "Data pelanggan baru telah ditambahkan";
        }
      }
  }else if($subhal === "tambahInven"){
      $urlhal1 = "inventory";
      $urlsubhal1 = "inven";
      $urljudul1 = "Inventory";
      $sql = [
        "UPDATE barang SET total=$data[1] WHERE kode_barang='$data[0]'",
        "INSERT INTO inventory VALUES ('$data[0]', $data[1], cariStatus($data[1]))"
      ];
      $alert = "Data berhasil ditambahkan";
  }else if($subhal === "tambahBarangInven"){
      $urlhal1 = "inventory";
      $urlsubhal1 = "inven";
      $urljudul1 = "Inventory";
      if(strlen("$data[0]") > 5){
        $sql = false;
        $alert = "Gagal Menambahkan Inventory baru. Kode barang terlalu panjang";
      }else{
        $sql = [
          "INSERT INTO barang VALUES ('$data[0]', '$data[1]', $data[2], '$data[3]')"
        ];
        $alert = "Data berhasil ditambahkan";
      }
  }else if($subhal === "tambahPinjam"){
      $urlhal1 = "peminjaman";
      $urlsubhal1 = "pinjam";
      $urljudul1 = "Peminjaman";

      if(cekAdaGak("SELECT kode_peminjaman FROM peminjaman WHERE kode_peminjaman = '$data[0]'") > 0){
        $alert= "Data Peminjaman Sudah ada";
        $sql = false;
      }else{
        if(cekAdaGak("SELECT kode_barang FROM inventory WHERE kode_barang = '$data[1]'") > 0){
          if(query("SELECT stock_tersedia FROM inventory WHERE kode_barang = '$data[1]'")[0]["stock_tersedia"] > 0){
            if(cekAdaGak("SELECT id_pelanggan FROM pelanggan WHERE id_pelanggan = '$data[2]'") > 0){
              if($data[3] > query("SELECT stock_tersedia FROM inventory WHERE kode_barang = '$data[1]'")[0]["stock_tersedia"]){
                $alert = "anda meminjam terlalu banyak, stock tidak cukup";
                $sql = false;
              }else{
                $sql = ["INSERT INTO peminjaman VALUES ('$data[0]', '$data[1]', '$data[2]', $data[3], '$data[4]')"];
                $alert="Peminjaman Berhasil";
              }
            }else{
              $alert="Data pengguna tidak ada";
              $sql = false;
            }
          }else{
            $alert="Barang sudah dipinjam";
            $sql = false;
          }
        }else{
          $alert="Data barang tidak ada di inventory";
          $sql = false;
        }
      }
  }

  if($sql === false){
    echo "
      <script>
          alert('$alert');
          document.location.href = 'tampil.php?hal=". $urlhal1 ."&&subhal=". $urlsubhal1 ."&&judul=". $urljudul1 ."';
      </script>
      ";
  }else if(cek(tambah($sql)) > 0){
      echo "
      <script>
          alert('$alert');
          document.location.href = 'tampil.php?hal=". $urlhal1 ."&&subhal=". $urlsubhal1 ."&&judul=". $urljudul1 ."';
      </script>
      ";
  }else{
    echo "
    <script>
        alert('$alert');
        document.location.href = 'tampil.php?hal=". $urlhal1 ."&&subhal=". $urlsubhal1 ."&&judul=". $urljudul1 ."';
    </script>
    ";
  }

}

if($subhal === "tambahPinjam"){
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

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" rel="stylesheet">

    <style>
      .container35 .card-body .form-control, .form-select{
          background: #393f43;
          border: none;
          color: #fff;
      }

      .container35 .card-body .form-control:focus{
        box-shadow:none;
      }

      ::-webkit-calendar-picker-indicator {
          filter: invert(1);
      }

      .form-select:focus {
            border-color: none;
            outline: 0;
            box-shadow: none;
        }

    </style>

    <title></title>
  </head>
  <body>

      <?php 
      
        if(isset($_POST["simpanInven"])){ // simpanInven dari name button subhal tambahInven
          
          if(strlen("$data[0]") > 5){
            echo "
                <script>
                  alert('Gagal menambahkan .Kode barang terlalu panjang');
                  document.location.href = 'tampil.php?hal=inventory&&subhal=inven&&judul=Inventory&&status=gagal';
                </script>
              ";
          }else{
            $query = mysqli_query($conn, "SELECT kode_barang FROM inventory WHERE kode_barang = '$data[0]'"); //cek data barang di tbl inventory
  
            if(mysqli_num_rows($query) > 0){ // jika barang sudah ada di inventory
                echo "
                  <script>
                      alert('Data sudah ada');
                      document.location.href = 'tampil.php?hal=inventory&&subhal=inven&&judul=Inventory';
                  </script>
                ";
            }else{ // kalo belom ada 
              $query1 = mysqli_query($conn, "SELECT kode_barang FROM barang WHERE kode_barang = '$data[0]'");
              if(mysqli_num_rows($query1) > 0){ //  cek kode barang di tblbarang kalo udha ada 
                $query2 = query("SELECT total FROM barang WHERE kode_barang = '$data[0]'")[0]; // lanjut cek stocknya sama gak kaya yang dibarang
                if($data[1] != $query2["total"]){  // kalo gak sama tanya ke user mau rubah stock di tbl barang gak
                  echo '
                    <div class="modal" tabindex="-1" style="display:block;background:rgba(255,255,255,.4)">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        <form action="" method="post">
                          <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi</h5>
                            <a href="tampil.php?hal=inventory&&subhal=inven&&judul=Inventory" style="text-decoration:none;color:#000;">X</a>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="kodeBarang" value="'. $data[0] .'">
                            <input type="hidden" name="stockInputUser" value="'. $data[1] .'">
                            <p>Jumlah stock Input anda tidak sesuai dengan stock barang. apakah anda mau merubah stock barang?</p>
                          </div>
                          <div class="modal-footer">
                            <a href="tampil.php?hal=inventory&&subhal=inven&&judul=Inventory" class="btn btn-secondary">Tidak</a>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  ';
                }else{  // jika kode barang dan stock di tbl barang sama tinggal insert ke tbl inventory
                    $sql = "INSERT INTO inventory VALUES ('$data[0]', $data[1], cariStatus($data[1]))";
                    $query = mysqli_query($conn, $sql);
  
                    if(mysqli_affected_rows($conn) > 0){
                      echo "
                      <script>
                          alert('Data berhasil ditambahkan');
                          document.location.href = 'tampil.php?hal=inventory&&subhal=inven&&judul=Inventory';
                      </script>
                      ";
                    }else{
                        echo "
                        <script>
                            alert('Data Sudah ada');
                            document.location.href = 'tampil.php?hal=inventory&&subhal=inven&&judul=Inventory&&status=gagal';
                        </script>
                        ";
                    }
  
                }
  
              }else{ // jika di tbl barang gak ada tanya ke user mau buat data baru di tbl barang gak kalo mao bisa
                echo '
                    <div class="modal" tabindex="-1" style="display:block;background:rgba(255,255,255,.4)">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        <form action="tambah.php?hal=kelbarang&&subhal=tambahBarangInven&&judul=Tambah Barang dan Inventory" method="post">
                          <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi</h5>
                            <a href="tampil.php?hal=inventory&&subhal=inven&&judul=Inventory" style="text-decoration:none;color:#000;">X</a>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="kodeBarang1" value="'. $data[0] .'">
                            <input type="hidden" name="stockInputUser1" value="'. $data[1] .'">
                            <p>Data barang tidak ditemukan. apakah anda mau membuat baru?</p>
                          </div>
                          <div class="modal-footer">
                            <a href="tampil.php?hal=inventory&&subhal=inven&&judul=Inventory" class="btn btn-secondary">Tidak</a>
                            <button type="submit" name="bikin" class="btn btn-primary">Ya</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  ';
              }
  
            }
          }
        }

      ?>

    <div class="container2">

        <?php include "bagian/sidebar.php" ?>

        <div class="container4">
          
          <?php include "bagian/navbar.php" ?>

          <div class="container35" style="overflow:auto;">

              <form action="" method="post" style="display: flex;justify-content: center;align-items: center;">
                <div class="card mb-3" style="width: 80%;margin: auto;background: #23252E;padding: 20px 0;">
                  <div class="card-body" style="color: #F55930;width: 90%;margin: auto;">
                    
                  <?php if($subhal === 'tambahBarang') :?>
                    <div class="mb-3">
                      <label for="kode" class="form-label">Kode Barang</label>
                      <input type="text" class="form-control" id="kode" name="kode" required placeholder="BR***">
                    </div>
                    
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama Barang</label>
                      <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Barang">
                    </div>
                    
                    <div class="mb-3">
                      <label for="total" class="form-label">Total</label>
                      <input type="number" class="form-control" id="total" name="total" required placeholder="Total Barang">
                    </div>

                    <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan</label>
                      <input type="text" class="form-control" id="satuan" name="satuan" required placeholder="Satuan">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a href="tampil.php?hal=kelbarang&&subhal=barang&&judul=Barang" class="btn btn-danger">Back To Home</a>
                      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                  <?php endif; ?>
                  <?php if($subhal === "tambahBarangRusak") :?>
                    <div class="mb-3">
                      <label for="kode" class="form-label">Kode Barang</label>
                      <input type="text" class="form-control" id="kode" name="kode" required placeholder="BR***">
                    </div>
                    
                    <div class="mb-3">
                      <label for="jumlah" class="form-label">Jumlah Barang Rusak</label>
                      <input type="number" class="form-control" id="jumlah" name="jumlah" required placeholder="Jumlah Barang Rusak">
                    </div>

                    <div class="mb-3">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan" required placeholder="Keterangan">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a href="tampil.php?hal=kelbarang&&subhal=barangRusak&&judul=Barang%20Rusak" class="btn btn-danger">Back To Home</a>
                      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                  <?php endif; ?>
                  <?php if($subhal === "tambahpeg") :?>
                    <div class="mb-3">
                      <label for="id_pegawai" class="form-label">Id Pegawai</label>
                      <input type="text" class="form-control" id="id_pegawai" name="id_pegawai" required placeholder="PG********">
                    </div>

                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama Pegawai</label>
                      <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Pegawai">
                    </div>

                    <div class="mb-3">
                      <label for="no_telp" class="form-label">No Telepon</label>
                      <input type="text" class="form-control" id="no_telp" name="no_telp" required placeholder="No Telepon">
                    </div>
                    
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required placeholder="email@gmail.com">
                    </div>

                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <textarea class="form-control" placeholder="Alamat" style="height: 100px" id="alamat" name="alamat" required></textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a href="tampil.php?hal=pegawai&&subhal=peg&&judul=Pegawai" class="btn btn-danger">Back To Home</a>
                      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                  <?php endif; ?>
                  <?php if($subhal === "tambahUser") :?>
                    <div class="mb-3">
                      <label for="id_pelanggan" class="form-label">Id Pelanggan</label>
                      <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" required placeholder="P****">
                    </div>

                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama Pelanggan</label>
                      <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Pelanggan">
                    </div>

                    <div class="mb-3">
                      <label for="no_telp" class="form-label">No Telepon</label>
                      <input type="text" class="form-control" id="no_telp" name="no_telp" required placeholder="No Telepon">
                    </div>
                    
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required placeholder="email@gmail.com">
                    </div>

                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <textarea class="form-control" placeholder="Alamat" style="height: 100px" id="alamat" name="alamat"></textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a href="tampil.php?hal=users&&subhal=user&&judul=Pelanggan" class="btn btn-danger">Back To Home</a>
                      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                  <?php endif; ?>
                  <?php if($subhal === "tambahPinjam") :?>
                    <div class="mb-3">
                      <label for="kode_peminjaman" class="form-label">Kode Peminjaman</label>
                      <input type="text" class="form-control" id="kode_peminjaman" name="kode_peminjaman" required placeholder="PM***">
                    </div>

                    <div class="mb-3">
                      <label for="nama_barang" class="form-label">Nama Barang</label>
                      <svg style="position: absolute;margin-top: 35px;margin-left: 56.5vw;color: #fff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><polyline points="19 12 12 19 5 12"></polyline></svg>
                      <select class="form-select" aria-label="Default select example" name="kode_barang">
                        <?php foreach($barangs as $barang) :?>
                          <option value="<?= $barang["kode_barang"]; ?>"><?= $barang["nama_barang"]; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="id_pelanggan" class="form-label">Nama Peminjam</label>
                      <svg style="position: absolute;margin-top: 35px;margin-left: 55.5vw;color: #fff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><polyline points="19 12 12 19 5 12"></polyline></svg>
                      <select class="form-select" aria-label="Default select example" name="id_pelanggan">
                        <?php foreach($pelangganS as $planggan) :?>
                          <option value="<?= $planggan["id_pelanggan"]; ?>"><?= $planggan["nama"]; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label for="jumlah_peminjaman" class="form-label">Jumalah Peminjaman</label>
                      <input type="text" class="form-control" id="jumlah_peminjaman" name="jumlah_peminjaman" required placeholder="Jumlah Peminjaman">
                    </div>

                    <div class="mb-3">
                      <label for="tgl_peminjaman" class="form-label">Tanggal Peminjaman</label>
                      <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" required >
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a href="tampil.php?hal=peminjaman&&subhal=pinjam&&judul=Peminjaman" class="btn btn-danger">Back To Home</a>
                      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                  <?php endif; ?>
                  <?php if($subhal === "tambahInven") :?>
                    <div class="mb-3">
                      <label for="kode_barang" class="form-label">Kode Barang</label>
                      <input type="text" class="form-control" id="kode_barang" name="kode_barang" required placeholder="BR***">
                    </div>

                    <div class="mb-3">
                      <label for="stock_tersedia" class="form-label">Stock Tersedia</label>
                      <input type="number" class="form-control" id="stock_tersedia" name="stock_tersedia" required placeholder="Stock Tersedia">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a href="tampil.php?hal=inventory&&subhal=inven&&judul=Inventory" class="btn btn-danger">Back To Home</a>
                      <button type="submit" name="simpanInven" class="btn btn-primary">Simpan</button>
                    </div>
                  <?php endif; ?>
                  <?php if(isset($_POST["bikin"])) :?>
                    <div class="mb-3">
                      <label for="kode" class="form-label">Kode Barang</label>
                      <input type="text" class="form-control" id="kode" name="kode" required value="<?= $data[0]; ?>" placeholder="BR***">
                    </div>
                    
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama Barang</label>
                      <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Barang">
                    </div>
                    
                    <div class="mb-3">
                      <label for="total" class="form-label">Total</label>
                      <input type="number" class="form-control" id="total" name="total" required value="<?= $data[1]; ?>" placeholder="Total barang">
                    </div>

                    <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan</label>
                      <input type="text" class="form-control" id="satuan" name="satuan" required placeholder="Satuan">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a href="tampil.php?hal=kelbarang&&subhal=barang&&judul=Barang" class="btn btn-danger">Back To Home</a>
                      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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