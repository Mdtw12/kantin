<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding-bottom: 80px; /* ruang untuk bottom nav */
            background: linear-gradient(to bottom, #ffe0b2, #ffecb3);
        }

        h2 {
            padding: 15px;
            margin: 0;
        }

        table {
            width: 95%;
            margin: 0 auto 20px auto;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f5f5f5;
        }

        .total-row td {
            background-color: #f0d9b5;
            font-weight: bold;
        }

        .btn-group {
        width: 95%;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin: 20px auto 100px auto;
        flex-wrap: wrap;
    }

    .btn-group a {
        padding: 10px 16px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        font-size: 14px;
        text-align: center;
        min-width: 120px;
    }

    .btn-danger { background-color: #e74c3c; }
    .btn-primary { background-color: #3498db; }
    .btn-success { background-color: #2ecc71; }

        /* Bottom Navigation */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #ffa726;
            display: flex;
            justify-content: space-around;
            border-top: 1px solid #ddd;
            z-index: 1000;
        }

        .nav-item {
            text-align: center;
            flex: 1;
            padding: 10px 0;
            color: white;
            font-size: 14px;
            transition: background 0.3s;
        }

        .nav-item a {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
            text-decoration: none;
        }

        .nav-item:hover {
            background-color: #fb8c00;
        }

        .nav-item.active {
            background-color: #ef6c00;
            font-weight: bold;
        }

        .nav-item i {
            font-size: 18px;
            margin-bottom: 5px;
        }

        @media (max-width: 600px) {
            .nav-item {
                font-size: 12px;
            }
            .nav-item i {
                font-size: 16px;
            }
            th, td {
                font-size: 13px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<h2>Keranjang Belanja</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Makanan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <!-- Cek jika keranjang kosong -->
        <?php if (empty($this->cart->contents())): ?>
            <tr>
                <td colspan="5">Keranjang masih kosong</td>
            </tr>
        <?php else: ?>
            <?php $no = 1; foreach ($this->cart->contents() as $item): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $item['name']; ?></td>
                    <td><?= $item['qty']; ?></td>
                    <td>Rp. <?= number_format($item['price']); ?></td>
                    <td>Rp. <?= number_format($item['subtotal']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr class="total-row">
            <td colspan="4" align="right">Total</td>
            <td><strong>Rp. <?= number_format($this->cart->total()); ?></strong></td>
        </tr>
    </tfoot>
</table>

<div class="btn-group">
    <a href="<?= base_url('dashboard/hapus_keranjang'); ?>" class="btn-danger">Hapus Keranjang</a>
    <a href="<?= base_url('dashboard/index'); ?>" class="btn-primary">Lanjutkan Belanja</a>
    <a href="<?= base_url('dashboard/pemesanan'); ?>" class="btn-success">Pemesanan</a>
</div>

<!-- Bottom Navigation -->
<div class="bottom-nav">
    <div class="nav-item <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
        <a href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-home"></i>
            <span>Beranda</span>
        </a>
    </div>
    <div class="nav-item <?= ($this->uri->segment(1) == 'makanan') ? 'active' : ''; ?>">
        <a href="<?= base_url('kategori/makan'); ?>">
            <i class="fas fa-utensils"></i>
            <span>Makanan</span>
        </a>
    </div>
    <div class="nav-item <?= ($this->uri->segment(1) == 'minuman') ? 'active' : ''; ?>">
        <a href="<?= base_url('kategori/minum'); ?>">
            <i class="fas fa-coffee"></i>
            <span>Minuman</span>
        </a>
    </div>
</div>

</body>
</html>
