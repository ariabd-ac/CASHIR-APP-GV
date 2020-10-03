<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Faktur Penjualan Barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body>
    <table style="border-collapse: collapse; width: 96%" border="0">
        <tr>
            <td align="center">
                <table style="border-collapse: collapse; width: 90%;" border="0">
                    <tr>
                        <td style="text-align: center;">

                            <span style="font-size:  18pt;  font-weight:  bold;  color: red;">HENNY/DIDI</span><br>
                            <span style="font-size: 12pt; font-weight: bold; font-style: italic;">
                                <small style="font-size: x-small;">
                                    Karanganyar RT 04 RW 02 No 1 Kedungbanteng tegal 52471
                                </small>
                            </span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <div id="laporan">



            <table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">

                <!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
            </table>

            <table border="0" align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:0px;">
                <tr>

                </tr>

            </table>
            <?php
            $b = $data->row_array();
            ?>
            <table border="0" align="center" style="width:240px;border:none;">
                <!-- <tr>
                   
                    <th style="text-align:left;">Total</th>
                    <th style="text-align:left;">: <?php echo 'Rp ' . number_format($b['jual_total']) . ',-'; ?></th>
                </tr> -->
                <tr>
                    <th style="text-align:left;">Tanggal</th>
                    <th style="text-align:left;">: <?php echo $b['jual_tanggal']; ?></th>

                </tr>
                <tr>

                    <th style="text-align:left;">Kembalian</th>
                    <th style="text-align:left;">: <?php echo 'Rp ' . number_format($b['jual_kembalian']) . ',-'; ?></th>
                </tr>
                <tr>
                    <th style="text-align:left;">Tunai</th>
                    <th style="text-align:left;">: <?php echo 'Rp ' . number_format($b['jual_jml_uang']) . ',-'; ?></th>
                </tr>
            </table>

            <table border="0" align="center" style="width:240px;margin-bottom:20px;">
                <thead>

                    <tr>
                        <th style="width:5px;">No</th>
                        <th>Nama Barang</th>
                        <th>Harga Jual</th>
                        <th>Qty</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($data->result_array() as $i) {
                        $no++;

                        $nabar = $i['d_jual_barang_nama'];
                        $harjul = $i['d_jual_barang_harjul'];
                        $qty = $i['d_jual_qty'];
                        $total = $i['d_jual_total'];
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no; ?></td>
                            <td style="text-align:left;"><?php echo $nabar; ?></td>

                            <td style="text-align:right;"><?php echo 'Rp ' . number_format($harjul); ?></td>
                            <td style="text-align:center;"><?php echo $qty; ?></td>

                            <td style="text-align:right;"><?php echo 'Rp ' . number_format($total); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;"><b>Total</b></td>
                            <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['jual_total']); ?></b></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <!-- <tfoot>

                    <tr>
                        <td colspan="6" style="text-align:center;"><b>Total</b></td>
                        <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['jual_total']); ?></b></td>
                    </tr>
                </tfoot> -->
            </table>

            <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
                <tr>
                    <td>
                        <strong style="font-size: xx-small;">*Selamat Datang Kembali</strong><br>
                        <strong style="font-size: xx-small;">*Barang yang sudah dibeli tidak dapat ditukarkan
                            kembali</strong>
                    </td>
                </tr>
                <tr>
                    <td></td>
            </table>
            <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
                <tr>
                    <td align="left" style="font-size: xx-small;">Tegal, <?php echo date('d-M-Y') ?></td>
                </tr>
                <tr>
                    <td align="right"></td>
                </tr>

                <tr>
                    <td align="left" style="font-size: xx-small;">( <?php echo $this->session->userdata('nama'); ?> )</td>
                </tr>
                <tr>
                    <td align="center"></td>
                </tr>
            </table>
            <table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
                <tr>
                    <th><br /><br /></th>
                </tr>
                <tr>
                    <th align="left"></th>
                </tr>
            </table>
        </div>
</body>

</html>