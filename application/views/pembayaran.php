<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success" style="margin-left: 195px">
                <?php
                    $grand_total = 0;
                    if($keranjang = $this->cart->contents()){
                        foreach($keranjang as $item){
                            $grand_total = $grand_total + $item['subtotal'];
                        }
                        echo "<h4>Total Belanjaan : Rp. ".number_format($grand_total,0,',','.');
                    
                ?>
            </div><br><br>
            
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3 class="text-center">Input Pemesanan</h3>
                    <hr>
                    <form action="<?php echo base_url().'dashboard/simpan_order'?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" >
                            <label for="">No Meja</label>
                            <input class="form-control" type="number" name="no_meja" placeholder="Masukan Nomer Meja">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input class="form-control" type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">ID User</label>
                            <input class="form-control" type="text" name="id_user" value="<?php echo $this->session->userdata('id_user');?>" readonly>
                        </div>
                        <div class="form-group">
    <label for="">Keterangan</label>
    <textarea name="keterangan" class="form-control" placeholder="Masukan keterangan" cols="20" rows="4"></textarea>
</div>

<div class="form-group">
    <label for="">Upload bukti pembayaran</label>
    <input type="file" class="form-control-file" name="gambar_keterangan" accept="image/*">
    <small class="text-muted">Upload gambar jika ada catatan tambahan atau bukti pembayaran.</small>
</div>

                        <div class="form-group">
                            <label for="">Total Harga</label>
                            <input class="form-control" type="number" name="total_harga" value="<?php echo $grand_total?>" readonly>
                        </div>
                       <!-- Pilihan metode pembayaran -->
<div class="form-group">
    <label for="">Metode Pembayaran</label>
    <select class="form-control" name="metode_pembayaran" id="metodePembayaran" required>
        <option value="">-- Pilih Metode Pembayaran --</option>
        <option value="dana">Dana</option>
        <option value="tunai">Tunai</option>
    </select>
</div>

<!-- Tampilkan QR jika pilih Dana -->
<div id="qrDana" style="display: none; text-align: center; margin-bottom: 15px;">
    <label><strong>Scan QR Dana</strong></label><br>
    <img src="<?php echo base_url('assets/img/qr_dana.png'); ?>" alt="QR Dana" width="200"><br>
    <small class="text-muted">Scan menggunakan aplikasi Dana Anda.</small>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const metodeSelect = document.getElementById('metodePembayaran');
        const qrDana = document.getElementById('qrDana');

        metodeSelect.addEventListener('change', function () {
            if (this.value === 'dana') {
                qrDana.style.display = 'block';
            } else {
                qrDana.style.display = 'none';
            }
        });
    });
</script>



                        
                        <button type="submit" class="btn btn-sm btn-primary">Pesan</button>
                    </form>
                </div>
            </div>
            

            <?php
                } else {
                    echo "<h4>Keranjang Pembelanjaan Anda Masih Kosong!";
                    
                }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>