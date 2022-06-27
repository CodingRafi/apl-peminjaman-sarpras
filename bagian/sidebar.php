        <div class="container3 navaktif">
          <div class="container5">
            <div class="container8">
              <div class="menu-hamburger">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
          </div>

          <div class="container6">

          <ul>

            <li class="linkUnik <?= (($_GET) ? $_GET['hal'] == 'dashboard' : true ) ? 'nyala' : ''; ?>">
              <a href="index.php?hal=dashboard&&subhal=&&judul=Dashboard" class="dropDown-a">
                <svg class="container6-svg icon-utama" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                <span class="container6-jud">Dashboard</span>
              </a>
            </li>

            <!-- pengkondisian 2 kali bacanya cek ada $_get gak kalo ada cek lagi ada $get hal gak kalo misalnya ada isnya dashboard bukan kalo ya tampilkan nyala kalo gak gak usah ada apa apa -->

            <li class="linkUnik dropDown <?= (($_GET) ? $_GET['hal'] === 'kelbarang' : '') ? 'nyala' : ''; ?>">
                <a class="dropDown-a">
                    <svg class="container6-svg-1 icon-utama" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    <span class="container6-jud">Barang</span>
                    <svg class="container6-svg-arrow arrowo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <div class="dropdiv dropKesatuan">
                    <div class="dropdiv2">
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'barang' : '') ? 'nyala1' : ''; ?>" href="tampil.php?hal=kelbarang&&subhal=barang&&judul=Barang"> Barang</a>
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'tambahBarang' : '') ? 'nyala1' : ''; ?>" href="tambah.php?hal=kelbarang&&subhal=tambahBarang&&judul=Tambah Data Barang">Tambah Barang</a>
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'barangRusak' : '') ? 'nyala1' : ''; ?>" href="tampil.php?hal=kelbarang&&subhal=barangRusak&&judul=Barang Rusak"> Barang Rusak</a>
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'tambahBarangRusak' : '') ? 'nyala1' : ''; ?>" href="tambah.php?hal=kelbarang&&subhal=tambahBarangRusak&&judul=Tambah Data Barang Rusak">Tambah Barang Rusak</a>
                    </div>
                </div>
            </li>

            <li class="linkUnik dropDown3 <?= (($_GET) ? $_GET['hal'] == 'inventory' : "") ? 'nyala' : ''; ?>">
                <a class="dropDown-a">
                      <svg class="container6-svg-1 icon-utama"  aria-hidden="true" focusable="false" data-prefix="fas" data-icon="boxes" class="svg-inline--fa fa-boxes fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M560 288h-80v96l-32-21.3-32 21.3v-96h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16zm-384-64h224c8.8 0 16-7.2 16-16V16c0-8.8-7.2-16-16-16h-80v96l-32-21.3L256 96V0h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16zm64 64h-80v96l-32-21.3L96 384v-96H16c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16z"></path></svg>
                      <span class="container6-jud">Inventory</span>
                      <svg class="container6-svg-arrow2 arrowo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <div class="dropdiv4 dropKesatuan">
                    <div class="dropdiv2">
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'inven' : '') ? 'nyala1' : ''; ?>" href="tampil.php?hal=inventory&&subhal=inven&&judul=Inventory">Inventory</a>
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'tambahInven' : '') ? 'nyala1' : ''; ?>" href="tambah.php?hal=inventory&&subhal=tambahInven&&judul=Tambah Inventory">Tambah Inventory</a>
                    </div>
                </div>
            </li>

            <li class="linkUnik dropDown3 <?= (($_GET) ? $_GET['hal'] === 'pegawai' : '') ? 'nyala' : ''; ?>">
                <a class="dropDown-a">
                    <svg class="container6-svg-1 icon-utama" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-tie" class="svg-inline--fa fa-user-tie fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z"></path></svg>
                    <span class="container6-jud">Pegawai</span>
                    <svg class="container6-svg-arrow3 arrowo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <div class="dropdiv4 dropKesatuan">
                    <div class="dropdiv2">
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'peg' : '') ? 'nyala1' : ''; ?>" href="tampil.php?hal=pegawai&&subhal=peg&&judul=Pegawai"> Pegawai</a>
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'tambahpeg' : '') ? 'nyala1' : ''; ?>" href="tambah.php?hal=pegawai&&subhal=tambahpeg&&judul=Tambah Pegawai">Tambah Pegawai</a>
                    </div>
                </div>
            </li>

            <li class="linkUnik dropDown4 <?= (($_GET) ? $_GET['hal'] === 'users' : '') ? 'nyala' : ''; ?>">
                <a class="dropDown-a">
                    <svg class="container6-svg-1 icon-utama" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" class="svg-inline--fa fa-users fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>
                    <span class="container6-jud">Pelanggan</span>
                    <svg class="container6-svg-arrow4 arrowo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <div class="dropdiv5 dropKesatuan">
                    <div class="dropdiv2">
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'user' : '') ? 'nyala1' : ''; ?>" href="tampil.php?hal=users&&subhal=user&&judul=Pelanggan"> Pelanggan</a>
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'tambahUser' : '') ? 'nyala1' : ''; ?>" href="tambah.php?hal=users&&subhal=tambahUser&&judul=Tambah Pelanggan">Tambah Pelanggan</a>
                    </div>
                </div>
            </li>

            <li class="linkUnik dropDown5 <?= (($_GET) ? $_GET['hal'] === 'peminjaman' : '') ? 'nyala' : ''; ?>">
                <a class="dropDown-a">
                    <svg class="container6-svg-1 icon-utama" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="clipboard-list" class="svg-inline--fa fa-clipboard-list fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z"></path></svg>
                    <span class="container6-jud">Peminjaman</span>
                    <svg class="container6-svg-arrow5 arrowo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <div class="dropdiv6 dropKesatuan">
                    <div class="dropdiv2">
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'pinjam' : '') ? 'nyala1' : ''; ?>" href="tampil.php?hal=peminjaman&&subhal=pinjam&&judul=Peminjaman"> Peminjaman</a>
                        <a class="dropdiv2-a <?= (($_GET) ? $_GET['subhal'] === 'tambahPinjam' : '') ? 'nyala1' : ''; ?>" href="tambah.php?hal=peminjaman&&subhal=tambahPinjam&&judul=Tambah Peminjaman">Tambah Peminjaman</a>
                    </div>
                </div>
            </li>

          </ul>

          </div>
        </div>