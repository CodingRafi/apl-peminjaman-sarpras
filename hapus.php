<?php 
require_once "inti.php";

$subhal2 = $_GET["subhal"];


    if($subhal2 === "peg"){
        $kodepegawai = $_GET["kode"];
        $urlhal = "pegawai";
        $urlsubhal = "peg";
        $urljudul = "Pegawai";
        $sql = ["DELETE FROM pegawai WHERE id_pegawai = '$kodepegawai'"];
    }else if($subhal2 === "pinjam"){
        $kodePeminjaman = $_GET["kodePeminjaman"];
        $urlhal = "peminjaman";
        $urlsubhal = "pinjam";
        $urljudul = "Peminjaman";
        $sql = ["DELETE FROM peminjaman WHERE kode_peminjaman = '$kodePeminjaman'"];
    }else if($subhal2 === "barang"){
        $kode = $_GET["kode"];
        $urlhal = "kelbarang";
        $urlsubhal = "barang";
        $urljudul = "Barang";
        $sql = [
            "DELETE FROM peminjaman WHERE kode_barang = '$kode'",
            "DELETE FROM barang_rusak WHERE kode_barang = '$kode'",
            "DELETE FROM inventory WHERE kode_barang = '$kode'",
            "DELETE FROM barang WHERE kode_barang = '$kode'"
        ];
    }else if ($subhal2 === "user"){
        $kodePelanggan = $_GET["kode"];
        $urlhal = "users";
        $urlsubhal = "user";
        $urljudul = "Pelanggan";
        $sql = [
            "DELETE FROM peminjaman WHERE id_pelanggan = '$kodePelanggan'",
            "DELETE FROM pelanggan WHERE id_pelanggan = '$kodePelanggan'"
        ];
    }else if ($subhal2 === "inven"){
        $kode = $_GET["kode"];
        $urlhal = "inventory";
        $urlsubhal = "inven";
        $urljudul = "Inventory";
        $sql = [
            "DELETE FROM peminjaman WHERE kode_barang = '$kode'",
            "DELETE FROM barang_rusak WHERE kode_barang = '$kode'",
            "DELETE FROM inventory WHERE kode_barang = '$kode'"
        ];
    }else{
        $idBarangRusak = $_GET["kodeRusak"];
        $urlhal = "kelbarang";
        $urlsubhal = "barangRusak";
        $urljudul = "Barang Rusak";
        $sql = ["DELETE FROM barang_rusak WHERE id_barang_rusak = $idBarangRusak"];
    }
    
    if(cek(hapus($sql)) === true){
        echo "
          <script>
              alert('data berhasil dihapus');
              document.location.href = 'tampil.php?hal=". $urlhal ."&&subhal=". $urlsubhal ."&&judul=". $urljudul ."';
          </script>
          ";
    }else{
        echo "
          <script>
              alert('data gagal dihapus');
              document.location.href = 'tampil.php?hal=". $urlhal ."&&subhal=". $urlsubhal ."&&judul=". $urljudul ."&&status=gagal';
          </script>
          ";
    }

