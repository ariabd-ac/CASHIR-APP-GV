<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri">
    <meta name="author" content="">

    <title>Welcome To Point of Sale Apps</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/font-awesome.css' ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() . 'assets/css/4-col-portfolio.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/dist/css/bootstrap-select.css' ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap-datetimepicker.min.css' ?>">
</head>

<body>
    <!-- Navigation -->
    <?php
    $this->load->view('admin/menu');
    ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <center><?php echo $this->session->flashdata('msg'); ?></center>
                <h1 class="page-header">Pembelian
                    <small>Barang</small>
                    <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Produk!</small></a>

                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo base_url() . 'admin/pembelian/add_to_cart' ?>" method="post">
                    <table>
                        <tr>
                            <th style="width:100px;padding-bottom:5px;">No Faktur</th>
                            <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" id="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                            <th style="width:90px;padding-bottom:5px;">Suplier</th>
                            <td style="width:350px;">
                                <select name="suplier" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Suplier" data-width="100%" required>
                                    <?php foreach ($sup->result_array() as $i) {
                                        $id_sup = $i['suplier_id'];
                                        $nm_sup = $i['suplier_nama'];
                                        $al_sup = $i['suplier_alamat'];
                                        $notelp_sup = $i['suplier_notelp'];
                                        $sess_id = $this->session->userdata('suplier');
                                        if ($sess_id == $id_sup)
                                            echo "<option value='$id_sup' selected>$nm_sup - $al_sup - $notelp_sup</option>";
                                        else
                                            echo "<option value='$id_sup'>$nm_sup - $al_sup - $notelp_sup</option>";
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>
                                <div class='input-group date' id='datepicker' style="width:200px;">
                                    <input type='text' name="tgl" class="form-control" value="<?php echo $this->session->userdata('tglfak'); ?>" placeholder="Tanggal..." required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <hr />
                    <table>
                        <tr>
                            <th>Kode Barang</th>
                        </tr>
                        <tr>
                            <th><input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm"></th>
                        </tr>
                        <div id="detail_barang" style="position:absolute;">
                        </div>
                    </table>
                </form>
                <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th style="text-align:center;">Satuan</th>
                            <th style="text-align:center;">Harga Pokok</th>
                            <th style="text-align:center;">Harga Jual</th>
                            <th style="text-align:center;">Jumlah Beli</th>
                            <th style="text-align:center;">Sub Total</th>
                            <th style="width:100px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items) : ?>
                            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                            <tr>
                                <td><?= $items['id']; ?></td>
                                <td><?= $items['name']; ?></td>
                                <td style="text-align:center;"><?= $items['satuan']; ?></td>
                                <td style="text-align:right;"><?php echo number_format($items['price']); ?></td>
                                <td style="text-align:right;"><?php echo number_format($items['harga']); ?></td>
                                <td style="text-align:center;"><?php echo number_format($items['qty']); ?></td>
                                <td style="text-align:right;"><?php echo number_format($items['subtotal']); ?></td>
                                <td style="text-align:center;"><a href="<?php echo base_url() . 'admin/pembelian/remove/' . $items['rowid']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" style="text-align:center;">Total</td>
                            <td style="text-align:right;">Rp. <?php echo number_format($this->cart->total()); ?></td>
                        </tr>
                    </tfoot>
                </table>
                <a href="<?php echo base_url() . 'admin/pembelian/simpan_pembelian' ?>" class="btn btn-info btn-lg"><span class="fa fa-save"></span> Simpan</a>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Data Barang</h3>
                    </div>
                    <div class="modal-body" style="overflow:scroll;height:500px;">

                        <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                            <thead>
                                <tr>
                                    <th style="text-align:center;width:40px;">No</th>
                                    <th style="width:120px;">Kode Barang</th>
                                    <th style="width:240px;">Nama Barang</th>
                                    <th>Satuan</th>
                                    <th style="width:100px;">Harga pokok</th>
                                    <th style="width:100px;">Harga jual</th>
                                    <th>jumlah</th>
                                    <th style="width:100px;text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($data->result_array() as $a) :
                                    $no++;
                                    $id = $a['barang_id'];
                                    $nm = $a['barang_nama'];
                                    $satuan = $a['barang_satuan'];
                                    $harpok = $a['barang_harpok'];
                                    $harjul = $a['barang_harjul'];
                                    $harjul_grosir = $a['barang_harjul_grosir'];
                                    $stok = $a['barang_stok'];
                                    $min_stok = $a['barang_min_stok'];
                                    $kat_id = $a['barang_kategori_id'];
                                    $kat_nama = $a['kategori_nama'];

                                ?>
                                    <tr>
                                        <td style="text-align:center;"><?php echo $no; ?></td>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $nm; ?></td>
                                        <td style="text-align:center;"><?php echo $satuan; ?></td>
                                        <form action="<?php echo base_url() . 'admin/pembelian/add_to_cart' ?>" method="post">
                                            <input type="hidden" name="kode_brg" value="<?php echo $id ?>">
                                            <input type="hidden" name="nabar" value="<?php echo $nm; ?>">
                                            <input type="hidden" name="satuan" value="<?php echo $satuan; ?>">
                                            <td><input type="text" name="harpok" value="<?php echo $harpok; ?>"></td>
                                            <td><input type="text" name="harjul" value="<?php echo $harjul; ?>"></td>
                                            <td><input type="number" name="jumlah" value="1" min="1" class="form-control input-sm" style="width:90px;margin-right:5px;" required></td>
                                            <td>
                                                <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                                        </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>

                    </div>
                </div>
            </div>
        </div>


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo 'DL-Tech'; ?>2020</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->


    <!-- jQuery -->
    <script src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() . 'assets/dist/js/bootstrap-select.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/dataTables.bootstrap.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.dataTables.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.price_format.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/moment.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap-datetimepicker.min.js' ?>"></script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker').datetimepicker({
                format: 'DD MMMM YYYY HH:mm',
            });

            $('#datepicker').datetimepicker({
                format: 'YYYY-MM-DD',
            });
            $('#datepicker2').datetimepicker({
                format: 'YYYY-MM-DD',
            });

            $('#timepicker').datetimepicker({
                format: 'HH:mm'
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('.harpok').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            $("#kode_brg").keyup(function() {
                var kobar = {
                    kode_brg: $(this).val()
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'admin/pembelian/get_barang'; ?>",
                    data: kobar,
                    success: function(msg) {
                        $('#detail_barang').html(msg);
                    }
                });
            });

            $("#kode_brg").keypress(function(e) {
                if (e.which == 13) {
                    $("#jumlah").focus();
                }
            });
        });
    </script>

</body>

</html>