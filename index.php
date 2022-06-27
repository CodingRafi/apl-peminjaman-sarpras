<?php 
require_once "inti.php";

$barang = count(query("SELECT * FROM barang"));
$barangRusak = count(query("SELECT * FROM barang_rusak"));
$inventory = count(query("SELECT * FROM inventory"));
$pegawai = count(query("SELECT * FROM pegawai"));
$pelanggan = count(query("SELECT * FROM pelanggan"));
$peminjaman = count(query("SELECT * FROM peminjaman"));

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
        .col-4{
          padding:0;
        }

        .card{
          background-color:#23252E;
        }

        .card:hover{
          box-shadow: inset 5px 5px 10px #0d0d10, inset -5px -5px 10px #333542;
        }

        .card-body{
          padding: 1rem 2rem;
        }

        a{
          text-decoration:none;
        }

        .tulisan{
          padding: 0 15px;
        }

        .card-body-svg{
          width: 60px;
          color: #F55930;
        }

        .tulisan-h1{
          font-size: 1.9rem;
          margin: 0;
          padding: 0;
          color: #fff;
          margin-top: -6px;
        }

        .tulisan-span{
          display: block;
          font-size: 20px;
          letter-spacing: 1px;
          color:#878b93;
        }
      </style>

    <title></title>
  </head>
  <body>

    <div class="container2">
        <?php include "bagian/sidebar.php" ?>
        
        <div class="container4">
          
          <?php include "bagian/navbar.php" ?>

          <div class="container35">

            <div class="container" style="padding: 0 15px;">
              <div class="row" style="justify-content:center;">
                <div class="col-4">
                  <a href="tampil.php?hal=kelbarang&&subhal=barang&&judul=Barang">
                    <div class="card" style="width: 92%;margin:auto;">
                      <div class="card-body" style="display:flex;">
                        <svg class="card-body-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <div class="tulisan">
                          <span class="tulisan-span">Barang</span>
                          <h1 class="tulisan-h1"><?= $barang; ?> Barang</h1>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-4">
                  <a href="tampil.php?hal=kelbarang&&subhal=barangRusak&&judul=Barang Rusak">
                    <div class="card" style="width: 92%;margin:auto;height: 97px;">
                      <div class="card-body" style="display:flex;">
                      <svg style="width: 70px;" class="card-body-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                        <div class="tulisan">
                          <span class="tulisan-span">Barang Rusak</span>
                          <h1 class="tulisan-h1"><?= $barangRusak; ?> Barang</h1>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-4">
                  <a href="tampil.php?hal=inventory&&subhal=inven&&judul=Inventory">
                    <div class="card" style="width: 92%;margin:auto;">
                      <div class="card-body" style="display:flex;">
                        <svg class="card-body-svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="boxes" class="svg-inline--fa fa-boxes fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M560 288h-80v96l-32-21.3-32 21.3v-96h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16zm-384-64h224c8.8 0 16-7.2 16-16V16c0-8.8-7.2-16-16-16h-80v96l-32-21.3L256 96V0h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16zm64 64h-80v96l-32-21.3L96 384v-96H16c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16z"></path></svg>
                        <div class="tulisan">
                          <span class="tulisan-span">Inventory</span>
                          <h1 class="tulisan-h1"><?= $inventory; ?> inventory</h1>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-4" style="margin-top: 35px;">
                  <a href="tampil.php?hal=pegawai&&subhal=peg&&judul=Pegawai">
                    <div class="card" style="width: 92%;margin:auto;">
                      <div class="card-body" style="display:flex;">
                        <svg style="width: 48px;" class="card-body-svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-tie" class="svg-inline--fa fa-user-tie fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z"></path></svg>
                        <div class="tulisan">
                          <span class="tulisan-span">Pegawai</span>
                          <h1 class="tulisan-h1"><?= $pegawai; ?> Orang</h1>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-4" style="margin-top: 35px;">
                  <a href="tampil.php?hal=users&&subhal=user&&judul=Pelanggan">   
                    <div class="card" style="width: 92%;margin:auto;">
                      <div class="card-body" style="display:flex;">
                        <svg  class="card-body-svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" class="svg-inline--fa fa-users fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="#F55930" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>
                        <div class="tulisan">
                          <span class="tulisan-span">Pelanggan</span>
                          <h1 class="tulisan-h1"><?= $pelanggan; ?> Orang</h1>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-4" style="margin-top: 35px;">
                  <a href="tampil.php?hal=peminjaman&&subhal=pinjam&&judul=Peminjaman">   
                    <div class="card" style="width: 92%;margin:auto;">
                      <div class="card-body" style="display:flex;">
                        <svg style="width: 48px;" class="card-body-svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clipboard-list" class="svg-inline--fa fa-clipboard-list fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z"></path></svg>
                        <div class="tulisan">
                          <span class="tulisan-span">Peminjaman</span>
                          <h1 class="tulisan-h1"><?= $peminjaman; ?> Peminjaman</h1>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

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