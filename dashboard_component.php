<?php

		$id = $_SESSION['user_id'];
		$query = "SELECT a.*, b.nama_divisi, c.nama_jabatan FROM ct_karyawan a 
							LEFT JOIN ct_divisi b ON b.kd_divisi=a.kd_divisi
							LEFT JOIN ct_jabatan c ON c.kd_jabatan=a.kd_jabatan
							WHERE a.id_user='$id'";
		$sql = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($sql,MYSQLI_ASSOC);
		
	?>
	<div class="row-fluid">
		<div class="span12">
			<h2>Profile</h2>
			<hr>
			<table class="table table-hover table-striped">
				<tr>
					<th width="200px">
						NIK
					</th>
					<td width="1px">:</td>
					<td><?php echo $data['nik'];?></td>
				</tr>
				<tr>
					<th>
						Nama
					</th>
					<td>:</td>
					<td><?php echo $data['nama_karyawan'];?></td>
				</tr>
				<tr>
					<th>
						Tempat / Tgl Lahir
					</th>
					<td>:</td>
					<td><?php echo $data['tempat_lahir']." / ".date("d-m-Y",strtotime($data['tanggal_lahir']));?></td>
				</tr>
				<tr>
					<th>
						Status Perkawinan
					</th>
					<td>:</td>
					<td><?php echo ($data['status_kawin']==1 ? 'Single' : 'Married');?></td>
				</tr>
				<tr>
					<th>
						Divisi
					</th>
					<td>:</td>
					<td><?php echo $data['nama_divisi'];?></td>
				</tr>

				<tr>
					<th>
						Jabatan
					</th>
					<td>:</td>
					<td><?php echo $data['nama_jabatan'];?></td>
				</tr>

				<?php
					$age = date_diff(date_create($data['tanggal_lahir']), date_create('now'))->y;
					$query = "SELECT * FROM ct_golongan_usia where minimum_usia<'".$age."' ORDER BY minimum_usia	 DESC LIMIT 1";
					$sql = mysqli_query($connect, $query) or die(mysqli_error());
					$golongan = mysqli_fetch_array($sql, MYSQLI_ASSOC);
				?>
				<tr>
					<th>
						Golongan Umur
					</th>
					<td>:</td>
					<td><?php echo $golongan['nama_golongan'];?></td>
				</tr>

				<tr>
					<th>
						Agama
					</th>
					<td>:</td>
					<td>
						<?php
							switch($data['agama']){
								case 1:
									echo "Islam";
									break;
								case 2:
									echo "Protestan";
									break;
								case 3:
									echo "Katolik";
									break;
								case 4:
									echo "Hindu";
									break;
								case 5:
									echo "Budha";
									break;
								default:
									echo "";
									break;
							}
						?>
					</td>

					<tr>
						<th>
							Jenis Kelamin
						</th>
						<td>:</td>
						<td><?php echo ($data['jenis_kelamin']==1? 'Laki-laki' : 'Perempuan');?></td>
					</tr>
					
					<?php
						$year = date('Y');
						$id = $data['id_karyawan'];
						$query = "SELECT count(*) as cuti FROM ct_cuti WHERE YEAR(tgl_mulai)='$year' AND id_karyawan='$id' AND status_cuti=1 AND approval_kabag=1";
						$sql = mysqli_query($connect, $query);
						$cuti = mysqli_fetch_array($sql, MYSQLI_ASSOC);
					?>
					<tr>
						<th>
							Sisa Cuti
						</th>
						<td>:</td>
						<td>
							<?php 

								$sisa_cuti = 12-$cuti['cuti'];
							
								echo ($sisa_cuti < 1 ? 0 : $sisa_cuti);
								
							?> Hari
							
							</td>
					</tr>
				</tr>
				
			</table>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
							<h5>List Pengajuan Cuti</h5>
						</div>
						<div class="widget-content nopadding"> 
							

						<table id="tbl_data" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Tanggal Pengajuan</th>
									<th>NIK</th>
									<th>Nama Karyawan</th>
									<th>Jenis Cuti</th>
									<th>Mulai</th>
									<th>Selesai</th>
									<th>Alasan Cuti</th>
									<th>Approval HR</th>
									<th>Approval KABAG</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>

						<br>
						</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){

			tbl_data= $('#tbl_data').DataTable( {
	    	bJQueryUI: true,
	    	sPaginationType: "full_numbers",
	        "ajax" : "list_pengajuan_cuti_process.php?action=get&id=<?php echo $data['id_karyawan'];?>",
			columns:[
				{"data":null,"defaultContent":'',"searchable":false,"sortable":"false"},
				{"data":"tgl_pengajuan"},
				{"data":"nik"},
				{"data":"nama_karyawan"},
				{"data":"nama_jenis"},
				{"data":"tgl_mulai"},
				{"data":"tgl_selesai"},
				{"data":"alasan_cuti"},
				{
						"data":"status_cuti",
						"render":function(data,type,row,meta){
								var st = "";
								if(data==0){
										st='<span class="label label-warning">Pending</span>'
								}else if(data==1){
										st='<span class="label label-success">Disetujui</span>'
								}else if(data==2){
										st='<span class="label label-important">Ditolak</span>'

								}

								return "<center>"+st+"</center>";
						}
				},
				{
						"data":"approval_kabag",
						"render":function(data,type,row,meta){
								var st = "";
								if(data==0){
										st='<span class="label label-warning">Pending</span>'
								}else if(data==1){
										st='<span class="label label-success">Disetujui</span>'
								}else if(data==2){
										st='<span class="label label-important">Ditolak</span>'

								}

								return "<center>"+st+"</center>";
						}
				},
                
			],
	        order: [[ 1, 'asc' ]]
	    });

		tbl_data.on( 'order.dt search.dt', function () {
        tbl_data.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

	});
</script>