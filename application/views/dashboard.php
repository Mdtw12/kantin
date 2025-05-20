<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>e-Kantin Modern</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #ffecd2, #fcb69f);
      min-height: 100vh;
      padding-bottom: 80px;
    }

    .header {
      background: linear-gradient(135deg, #ff9800, #ff5722);
      color: white;
      padding: 24px 20px;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
      position: relative;
    }

    .header h2 {
      margin: 0;
      font-weight: 600;
      font-size: 24px;
    }

    .header p {
      margin: 5px 0 15px;
      font-size: 16px;
    }

    .search-bar input {
      width: 100%;
      padding: 10px 15px;
      border: none;
      border-radius: 10px;
      outline: none;
      font-size: 14px;
    }

    .header-right {
      position: absolute;
      top: 20px;
      right: 20px;
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .kategori {
      padding: 20px;
    }

    .kategori h3 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .produk-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
      gap: 16px;
    }

    .produk {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
      padding: 10px;
      transition: transform 0.2s ease;
    }

    .produk:hover {
      transform: translateY(-5px);
    }

    .produk img {
      width: 100%;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 8px;
    }

    .produk div {
      font-size: 14px;
      font-weight: 500;
    }

    .produk small {
      color: gray;
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: 60px;
      background: linear-gradient(to right, #ffa726, #fb8c00);
      display: flex;
      justify-content: space-around;
      align-items: center;
      box-shadow: 0 -2px 8px rgba(0,0,0,0.15);
      z-index: 1000;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }

    .bottom-nav a {
      text-decoration: none;
      color: white;
      font-size: 13px;
      text-align: center;
      flex: 1;
      transition: 0.3s;
    }

    .bottom-nav a i {
      font-size: 18px;
      display: block;
      margin-bottom: 4px;
    }

    .bottom-nav a:hover {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      padding: 8px;
    }

  </style>
</head>
<body>

<div class="header">
  <h2>Hallo</h2>
  <p>Waktunya makan kak!</p>
  <div class="search-bar">
    <input type="text" placeholder="Cari makan apa?">
  </div>

  <div class="header-right">
    <!-- Keranjang -->
    <div>
      <?php 
        $keranjang = '🛒 '.$this->cart->total_items().' item';
        echo anchor('dashboard/detail_keranjang', $keranjang, 'style="color: white; text-decoration: none;"');
      ?>
    </div>
    <div style="height: 30px; width: 1px; background-color: white;"></div>
    <div>
      <?php if($this->session->userdata('username')) { ?>
        <span style="color: white;">Halo, <?php echo $this->session->userdata('nama_user'); ?></span>
        <?php echo anchor('auth/logout','Logout', 'style="margin-left: 10px; color: white;"'); ?>
      <?php } else { ?>
        <?php echo anchor('auth/login','Login', 'style="color: white;"'); ?>
      <?php } ?>
    </div>
  </div>
</div>

<div class="kategori">
<style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 20px;
      color: #333;
    }

    h3 {
      font-size: 28px;
      margin-bottom: 10px;
      color: #111;
    }

    .kategori {
      margin-bottom: 40px;
    }

    .kategori-scroll {
      display: flex;
      overflow-x: auto;
      padding-bottom: 10px;
      gap: 20px;
    }

    .produk {
      flex: 0 0 auto;
      width: 180px;
      background-color: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .produk:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
    }

    .produk img {
      width: 100%;
      height: 140px;
      object-fit: cover;
      border-top-left-radius: 16px;
      border-top-right-radius: 16px;
    }

    .produk div {
      padding: 12px;
      text-align: center;
      font-size: 16px;
    }

    .produk small {
      color: #888;
      font-size: 14px;
    }

    /* Scrollbar styling (optional) */
    .kategori-scroll::-webkit-scrollbar {
      height: 8px;
    }

    .kategori-scroll::-webkit-scrollbar-thumb {
      background-color: #ccc;
      border-radius: 4px;
    }

    .kategori-scroll::-webkit-scrollbar-track {
      background: transparent;
    }

    @media (max-width: 600px) {
      .produk {
        width: 140px;
      }

      h3 {
        font-size: 22px;
      }
    }
</style>


  <div class="kategori">
    <h3>Kategori Makanan</h3>
    <div class="kategori-scroll">
      <div class="produk">
        <img src="<?php echo base_url('assets/img/uduk.jpg'); ?>" alt="uduk">
        <div>naasi uduk<br><small>Rp 10.000</small></div>
      </div>
      <div class="produk">
        <img src="<?php echo base_url('assets/img/nasigoreng.jpg'); ?>" alt="Nasi Goreng">
        <div>Nasi Goreng<br><small>Rp 10.000</small></div>
      </div>
      <div class="produk">
        <img src="<?php echo base_url('assets/img/nasiayam.jpg'); ?>" alt="Nasi Ayam">
        <div>Nasi Ayam<br><small>Rp 12.000</small></div>
      </div>
      <div class="produk">
        <img src="<?php echo base_url('assets/img/pastasapi.jpg'); ?>" alt="Pasta Sapi">
        <div>Pasta Sapi<br><small>Rp 20.000</small></div>
      </div>
      <div class="produk">
        <img src="<?php echo base_url('assets/img/pempek.jpg'); ?>" alt="Pempek">
        <div>Pempek<br><small>Rp 10.000</small></div>
        
      </div>
    </div>
  </div>

  <div class="kategori">
    <h3>Kategori Minuman</h3>
    <div class="kategori-scroll">
      <div class="produk">
        <img src="<?php echo base_url('assets/img/esteh.jpg'); ?>" alt="Teh Manis">
        <div>es teh manis<br><small>Rp 5.000</small></div>
      </div>
      <div class="produk">
        <img src="<?php echo base_url('assets/img/jusalpukat.jpg'); ?>" alt="Jus Alpukat">
        <div>Jus Alpukat<br><small>Rp 10.000</small></div>
      </div>
      <div class="produk">
        <img src="<?php echo base_url('assets/img/jusstroberi.jpg'); ?>" alt="jus stroberi">
        <div>jus stroberi<br><small>Rp 7.000</small></div>
      </div>
      <div class="produk">
        <img src="<?php echo base_url('assets/img/aqua.jpg'); ?>" alt="Air Mineral">
        <div>Air Mineral<br><small>Rp 3.000</small></div>
      </div>
      <div class="produk">
        <img src="<?php echo base_url('assets/img/esjeruk.jpg'); ?>" alt="Es Jeruk">
        <div>Es Jeruk<br><small>Rp 6.000</small></div>
      </div>
    </div>
  </div>
      

<div class="bottom-nav">
  <a href="<?php echo base_url('dashboard'); ?>">
    <i class="fas fa-home"></i>
    <span>Beranda</span>
  </a>
  <a href="<?php echo base_url('kategori/makan'); ?>">
    <i class="fas fa-utensils"></i>
    <span>Makanan</span>
  </a>
  <a href="<?php echo base_url('kategori/minum'); ?>">
    <i class="fas fa-coffee"></i>
    <span>Minuman</span>
  </a>
</div>

</body>
</html>
