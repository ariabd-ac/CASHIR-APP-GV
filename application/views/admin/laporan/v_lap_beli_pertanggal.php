<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Penbelian Pertanggal</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PENbeliAN BARANG</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>
<?php 
    $b=$jml->row_array();
?>
<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<thead>
<tr>
<th colspan="9" style="text-align:left;">Tanggal : <?php echo $b['beli_tanggal'];?></th>
</tr>
    <tr>
        <th style="width:50px;">No</th>
        <th>No Faktur</th>
        <th>Tanggal</th>
        <th>Kode Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>kode Pembelian</th>
        <th>subTotal</th>
    
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        $nofak=$i['beli_kode'];
        $tgl=$i['beli_tanggal'];
        $kobar=$i['d_beli_barang_id'];
        $nabar=$i['d_beli_harga'];
        $satuan=$i['d_beli_jumlah'];
        $satuan1=$i['d_beli_nofak'];
        $harjul=$i['d_beli_total'];
        
       
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td style="padding-left:5px;"><?php echo $nofak;?></td>
        <td style="text-align:center;"><?php echo $tgl;?></td>
        <td style="text-align:center;"><?php echo $kobar;?></td>
        <td style="text-align:left;"><?php echo $nabar;?></td>
        <td style="text-align:left;"><?php echo $satuan;?></td>
        <td style="text-align:left;"><?php echo $satuan1;?></td>
        <td style="text-align:center;"><?php echo 'Rp '.number_format($harjul);?></td>
    </tr>

<?php }?>
</tbody>
<tfoot>

    <tr>
        <td colspan=7 style="text-align:center;"><b>Total</b></td>
        <td style="text-align:  center;"><b><?php echo 'Rp'.number_format($b['total']);?></b></td>
    </tr>
</tfoot>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Padang, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?php echo $this->session->userdata('nama');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>