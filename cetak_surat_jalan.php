<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cetak Surat Jalan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <style>

        body{
            width: 10.5cm;
            height: 14.8cm;
            padding:0.3cm;
            /* border : solid 1px black; */
        }
        
        .borderless td, .borderless th{
            border:none;
        }

        li{
            font-size:8pt;
        }
        
        .table th, .table td{
            padding: 5px;
        }

        h4{
            margin: 0px !important;
        }
    </style>
</head>
<body onload="window.print();history.back();">
    <?php 
        include "config/koneksi.php";

        
        $query = "SELECT a.*,b.nik, b.nama as nama_pengemudi, b.telp, c.nama_jenis, d.nama_merk, e.* FROM mnj_jadwal a
                    LEFT JOIN mnj_pengemudi b ON a.id_pengemudi=b.id_pengemudi
                    LEFT JOIN mnj_kendaraan e ON a.id_kendaraan=e.id_kendaraan
                    LEFT JOIN mnj_jenis_kendaraan c ON e.jenis_kendaraan=c.id_jenis
                    LEFT JOIN mnj_merk_kendaraan d ON e.merk=d.id_merk
                    WHERE a.id_jadwal=".$_GET['id']."
                    ORDER BY id_jadwal ASC LIMIT 1";
                    
        $sql = mysqli_query($connect,$query);
                    
        $data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
                    
        if($data['status_job']==0){
            $query = "UPDATE mnj_jadwal SET status_print='1', status_job='1' WHERE id_jadwal='".$_GET['id']."'";
        }else{
            $query = "UPDATE mnj_jadwal SET status_print='1' WHERE id_jadwal='".$_GET['id']."'";
        }
        $sql = mysqli_query($connect, $query);
                    
    ?>
    <table cellspacing="0">
        <tr >
            <td rowspan="2"><img src="img/logomnj.jpg" style="width:100px;"></td>
            <td><center><h5>P.T. Marga Nusantara Jaya</h5></center></td>
        </tr>
        <tr>
            <td><center><h4>PAS JALAN KENDARAAN</h4></center></td>
        </tr>
    </table>
    
    
    <hr>
    <table class="table borderless" style="width:100%">
        <tr>
            <th width="35%"> Nomor Kendaraan</th>
            <td>: <?php echo $data['plat_nomor'];?></td>
        </tr>
        <tr>
            <th> Pemakai</th>
            <td>: <?php echo $data['penumpang'];?> </td>
        </tr>
        <tr>
            <th> Tujuan</th>
            <td>: <?php echo $data['tujuan'];?></td>
        </tr>
        <tr>
            <th> Pengemudi</th>
            <td>: <?php echo $data['nama_pengemudi'];?></td>
        </tr>
        <tr>
            <th> Siap Jam</th>
            <td>: <?php echo date('d-m-Y', strtotime($data['tanggal_berangkat'])).", ".date("H:i", strtotime($data['jam_berangkat']));?></td>
        </tr>
        <tr>
            <th> Kembali Jam</th>
            <td>: <?php echo date('d-m-Y', strtotime($data['tanggal_kembali'])).", ".date('H:i', strtotime($data['jam_kembali']));?></td>
        </tr>
    </table>
    
    <table class="table borderless" width="100%">
        <tr>
            <td width="50%"><center>Ttd. Pengemudi/Pemakai</center></td>
            <td><center>Bag. Umum</center></td>
        </tr>
        <tr>
            <td style="padding-top:1.2cm;"><center>( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</center></td>
            <td style="padding-top:1.2cm;"><center>( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</center></td>
        </tr>
    </table>

    <p>
        <ul>
            <li> Tanpa Pas Jalan Kendaraan ini petugas keamanan P.T. Marga Nusantara Jaya berhak menahan kendaraan.</li>
            <li> Hanya berlaku sekali pakai</li>
        </ul>
    </p>
</body>
</html>
