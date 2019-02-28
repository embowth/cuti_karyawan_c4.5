<style type="text/css">
	.img-custom{
		border-radius:50%;
		width: 250px;
		height: 250px;
		object-fit: cover;
	}

	table tbody tr {
		font-size: 17px;
	}

	table tbody tr td:first-child{
		text-align:right !important;
		font-weight: bold;
	}

</style>

<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    	<a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
	 	<a href="javascript:;" title="Edit Profile" class="tip-bottom"><i class="icon-user"></i> Profile</a>
	 </div>
  </div>
<!--End-breadcrumbs-->

<?php 
	
	$id_login = $_SESSION['user_id'];

	$role = $_SESSION['role'];



	$query = "SELECT * FROM mnj_login WHERE id_login='$id_login'";
	$sql = mysqli_query($connect,$query);

	$data_user = mysqli_fetch_array($sql,MYSQLI_ASSOC);


	$query = "SELECT * FROM mnj_image WHERE id_user='".$id_login."' ORDER BY id_image DESC LIMIT 1";
	$sql = mysqli_query($connect,$query);

	if(mysqli_num_rows($sql)>0){
		$data_image = mysqli_fetch_array($sql,MYSQLI_ASSOC);
	}else{
		$data_image['file'] = "user_img/blank_profile.png";
	}

	// print_r($data_image);

	

?>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">		
			<center><img class="img-rounded img-custom" src="<?php echo $data_image['file'];?>"></center>
			<br>
			<!-- <center><a href="javascript:;" class="btn btn-primary"><i class="icon-picture"></i> Ubah Gambar Profil</a></center> -->
			<form action="change_profile_picture.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
				<table class="table table-hover table-striped" width="50%">
					<div class="control-group">

						<tbody>
							<tr>
								<td width="27%"><label class="control-label"><strong>Upload Gambar Profil</strong></label></td>
								<td>
									<div class="controls">
									  <input type="file" size="19" name="fileToUpload">
									  <input type="hidden" name="id" value="<?php echo $data_user['id_login'];?>">
									</div>
								</td>
								<td>
									<button class="btn btn-primary" type="submit" style="margin-top:5px;"><i class="icon-picture"></i> Ubah Gambar</button>
								</td>
							</tr>
						</tbody>

					</div>
				</table>              
		              
			</form>
		</div>
	</div>

	<br>

	<?php if($role ==  1 || $role == 3){ ?>
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-hover table-striped" width="50%">
					<tbody>
						<tr>
							<td width="49%">Username</td>
							<td width="1%">:</td>
							<td><?php echo $data_user['username'];?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php }else{ ?>

		<div class="row-fluid">
			<div class="span12">
				<table class="table table-hover table-striped" width="50%">
					<tbody>
						<tr>
							<td width="49%">NRP</td>
							<td width="1%">:</td>
							<td><?php echo $data_user['nrp'];?></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?php echo $data_user['nama'];?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

	<?php } ?>

	<br><br>



	<div class="row-fluid">
		<div class="span12">

			<div id="alert-div" class="alert" style="display: none;">
				<button class="close" data-dismiss="alert">×</button>
				<span id="notif-span"></span>
			</div>



			<table class="table table-hover table-striped" width="50%">
				<tbody>
					<tr>
						<td colspan="3" style="text-align: center !important;font-size: 19px;">Ubah Password</td>
					</tr>
					<tr>
						<td width="49%">Password Lama</td>
						<td width="1%">:</td>
						<td><input type="password" name="pass_lama"></td>
					</tr>

					<tr>
						<td width="49%">Password Baru</td>
						<td width="1%">:</td>
						<td><input type="password" name="pass_baru"></td>
					</tr>

					<tr>
						<td width="49%">Konfirmasi Password Baru</td>
						<td width="1%">:</td>
						<td><input type="password" name="confirm_pass_baru"></td>
					</tr>

					<tr>
						<td colspan="3" style="text-align: center !important;font-size: 19px;"><button type="submit" name="submit_password" class="btn btn-success" onclick="savePassword();"><i class="icon-lock"></i> Ubah Password</button></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	function savePassword(){

		var pass_lama = $('[name=pass_lama]').val();
		var pass_baru = $('[name=pass_baru]').val();
		var confirm_pass_baru = $('[name=confirm_pass_baru]').val();

		if(pass_lama === "" || pass_baru === "" || confirm_pass_baru === ""){
			$('#alert-div').show('slow');
			$('#alert-div').removeClass('alert-warning');
			$('#alert-div').removeClass('alert-success');
			$('#alert-div').addClass('alert-danger');
			document.getElementById("notif-span").innerHTML = "<strong>Ooops!</strong> Harap isi semua form untuk menggati password!";
		}else{


			if(pass_baru === confirm_pass_baru){
				$.ajax({
				    url: 'change_password.php',
				    type: 'POST',
				    data: {
				        pass_lama: pass_lama,
				        pass_baru: pass_baru,
				        confirm_pass_baru: confirm_pass_baru,
				        id: "<?php echo $data_user['id_login'];?>"
				    },
				    success: function(data){
				    	var data = $.parseJSON(data);

				    	if(data.result==="ok"){
				    		$('[name=pass_lama]').val('');
				    		$('[name=pass_baru]').val('');
				    		$('[name=confirm_pass_baru]').val('');
				    		$('#alert-div').show('slow');
				    		$('#alert-div').removeClass('alert-danger');
				    		$('#alert-div').removeClass('alert-warning');
				    		$('#alert-div').addClass('alert-success');
				    		document.getElementById("notif-span").innerHTML = "<strong>Ubah Password Berhasil!</strong> ";
				    	}else if(data.result==="nos"){
				    		$('#alert-div').show('slow');
				    		$('#alert-div').removeClass('alert-success');
				    		$('#alert-div').removeClass('alert-danger');
				    		$('#alert-div').addClass('alert-warning');
				    		document.getElementById("notif-span").innerHTML = "<strong>Ooops!</strong> Isian password baru dan konfirmasinya tidak sama!";
				    	}else{
				    		$('#alert-div').show('slow');
				    		$('#alert-div').removeClass('alert-success');
				    		$('#alert-div').removeClass('alert-warning');
				    		$('#alert-div').addClass('alert-danger');
				    		document.getElementById("notif-span").innerHTML = "<strong>Ooops!</strong> Password lama anda salah";
				    	}
				        
				    }
				});
			}else{
				$('#alert-div').show('slow');
				$('#alert-div').removeClass('alert-success');
				$('#alert-div').removeClass('alert-danger');
				$('#alert-div').addClass('alert-warning');
				document.getElementById("notif-span").innerHTML = "<strong>Ooops!</strong> Isian password baru dan konfirmasinya tidak sama!";
			}

		}

	    
	}
</script>