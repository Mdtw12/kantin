<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
  body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background: linear-gradient(to bottom, #ffe0b2, #fff3e0); /* Orange ke putih */
    min-height: 100vh;
    padding-bottom: 80px; /* Supaya konten tidak ketutup navbar bawah */
  }

  h3.text-center {
    font-size: 32px;
    font-weight: bold;
    color: #fb8c00;
    margin-top: 30px;
  }

  .card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 28px rgba(0,0,0,0.15);
  }

  .card-title {
    font-size: 18px;
    font-weight: 600;
    color: #333;
  }

  .badge-success {
    background-color: #43a047 !important;
    font-size: 14px;
    padding: 5px 10px;
  }

  .btn-sm {
    margin: 5px 3px;
    border-radius: 10px;
  }

  .bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 65px;
    background: linear-gradient(to right, #ffa726, #fb8c00);
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.15);
    z-index: 1000;
    border-top-left-radius: 14px;
    border-top-right-radius: 14px;
  }

  .bottom-nav a {
    text-decoration: none;
    color: white;
    font-size: 13px;
    text-align: center;
    flex: 1;
    transition: background 0.2s ease;
  }

  .bottom-nav a i {
    font-size: 18px;
    display: block;
    margin-bottom: 4px;
  }

  .bottom-nav a:hover {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 12px;
    padding: 6px;
  }
</style>

<style>
  .bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px;
    background: linear-gradient(to right, #ffa726, #fb8c00); /* Gradiasi orange */
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
<div class="container-fluid">
    <h3 class="text-center">Data Makanan</h3>
    <hr>
    <div class="row text-center">
        <?php foreach($makan as $mkn) : ?>
            <div class="card ml-3 mb-4" style="width: 17rem;">
                <img src="<?php echo base_url().'/upload/'.$mkn->gambar?>" class="card-img-top" alt="<?php echo $mkn->nama_makanan ?>">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?php echo $mkn->nama_makanan ?></h5>
                    <span class="badge badge-pill badge-success mb-3">
                        Rp. <?php echo number_format($mkn->harga, 0,',','.') ?>
                    </span>
                    <br>
                    <?php echo anchor('dashboard/tambah_ke_keranjang/'.$mkn->id_makanan,
                        '<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>')?>
                    <?php echo anchor('dashboard/detail/'.$mkn->id_makanan,
                        '<div class="btn btn-sm btn-success">Detail</div>')?>
                </div>
            </div>
        <?php endforeach; ?>
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

