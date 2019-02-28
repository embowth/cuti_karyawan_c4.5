

<?php

	if(isset($_GET['id'])){

		$id_assessment = $_GET['id'];

		date_default_timezone_set("Asia/Bangkok");
		include "config/koneksi.php";

		$query = "SELECT * FROM sis_assessment WHERE id_assessment='$id_assessment' LIMIT 1";
		$sql = mysqli_query($connect,$query);

		$data_assessment = mysqli_fetch_array($sql,MYSQLI_BOTH);

		$query = "SELECT * FROM sis_soal WHERE id_assessment='$id_assessment'";
		$sql = mysqli_query($connect,$query);
		$jumlah_soal = mysqli_num_rows($sql);
	
		$type = ($data_assessment['type']==1 ? "POWERTRAIN" : "ENGINE");
		$name = $type . "_" . $data_assessment['kode'] . "_" . $data_assessment['produk'];

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=".$name.".xls");


		$query = "SELECT a.*,DATE_FORMAT(a.tanggal_assign,'%d-%m-%Y') as tgl_assign,DATE_FORMAT(a.tanggal_expired,'%d-%m-%Y') as tgl_expired,b.nrp,b.nama,b.level, c.id_nilai, c.achievement, c.commitment,c.quality_awareness,c.integrity,c.teamwork,c.self_confidence,c.apd,c.working_procedure,c.safety_habit FROM sis_participant a LEFT JOIN sis_mekanik b ON a.id_mekanik = b.id_mekanik LEFT JOIN sis_nilai_atasan c ON a.id_participant = c.id_participant WHERE id_assessment='$id_assessment' ORDER BY a.id_participant ASC";
		$sql = mysqli_query($connect,$query);

		$no = 1;
	
?>

		<table border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>NRP</th>
					<th>Nama</th>
					<th>Level</th>
					<th>Tanggal Assign</th>
					<th>Tanggal Expire</th>
					<th>Ujian Teori</th>
					<th>Nilai Asessment</th>
					<th>Nilai Atasan</th>
					<th>Nilai Kriteria</th>
					<th>Kriteria</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($data = mysqli_fetch_array($sql,MYSQLI_ASSOC)) { ?>
					
					<tr>
						<td><?php echo $no;?></td>	
						<td><?php echo $data['nrp'];?></td>	
						<td><?php echo $data['nama'];?></td>	
						<td><?php echo $data['level'];?></td>	
						<td><?php echo date('d-m-Y',strtotime($data['tgl_assign']));?></td>	
						<td><?php echo date('d-m-Y',strtotime($data['tgl_expired']));?></td>	
						<td>
							<?php

							$today = date('Y-m-d');
							$expire = $data['tgl_expired'];

							if($data['status_assign']==0){
								if($today>$expire){
									echo "Expired";
								}else{
									echo "Assigned";
								}
							}else{
								echo "Finish";
							}
							?>
						</td>	
						<td>
							<?php
								$ns = 0;
								if($data['nilai_teori']>=75 && $data['nilai_praktek']>=75){
									$ns = 20;
								}

								$nsa = $ns*(4.4/20);

								echo round($nsa,1);
							?>	
						</td>

						<td>
							<?php 
								$nilai_atasan = (($data['achievement']+$data['commitment']+$data['quality_awareness']+$data['integrity']+$data['teamwork']+$data['self_confidence']+$data['apd']+$data['working_procedure']+$data['safety_habit'])/9)*(4.4/3);

								if($nilai_atasan>0){
									echo round($nilai_atasan,1);
								}else{
									echo "0";
								}
							?>
						</td>

						<td>
							<?php
								$rate = (float)(round($nsa,1) + round($nilai_atasan,1))/2;
								echo $rate;
							?>
						</td>

						<td>
							<?php
								$rate = (float)(round($nsa,1) + round($nilai_atasan,1))/2;

								// echo $nsa;
								// echo $nilai_atasan;
								// echo $rate;

								if($rate <= 1.9){
									echo "Tidak Memenuhi Ekspektasi";
								}elseif($rate >= 2.0 && $rate <= 2.9){
									echo "Belum Memenuhi Ekspektasi";
								}elseif($rate >= 3.0 && $rate <= 3.4){
									echo "Cukup Memenuhi ekspektasi";
								}elseif($rate >= 3.5 && $rate <= 4.4){
									echo "Melebihi Ekspektasi";
								}elseif($rate >= 4.5 && $rate <= 5){
									echo "Melebihi Ekspektasi";
								}
							?>
						</td>	
						
					</tr>

				<?php $no++; } ?>

			</tbody>
		</table>

		<script type="text/javascript">
			jQuery(document).ready(function($) {
				window.location.href = 'http://localhost/sis/sis-admin?p=dl_ex_p&id=<?php echo $_GET['id'];?>';
			});
		</script>

<?php 	}else{

	header("location:http://localhost/sis/sis-admin/?p=m_sl");

}

?>