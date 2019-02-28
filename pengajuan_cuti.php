
<?php
    $sisa = "";
    $ct = '';
    $cuti['cuti'] = 0;
    if($_SESSION['username']!='admin'){
        $year = date('Y');
        $id = $_SESSION['user_id'];
        $query = "SELECT count(*) as cuti FROM ct_cuti a 
                    LEFT JOIN ct_karyawan b ON a.id_karyawan=b.id_karyawan 
                    WHERE YEAR(a.tgl_mulai)='$year' AND a.status_cuti=1 AND a.approval_kabag=1 AND b.id_user='$id'";
        $sql = mysqli_query($connect, $query);
        $cuti = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        $sisa = 12-$cuti['cuti'];
        if($sisa < 1){
            $sisa = 0;
        }
        $ct =  " - Sisa Cuti ". $sisa ." Hari";
    }
?>

<div class="container-fluid">
    <div class="row-fluid add_form_content">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-plus"></i></span>
                    <h5>Pengajuan Cuti <?php echo $ct;?></h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" id="form-add">
                        <div class="control-group">
                            <label class="control-label">NIK</label>
                            <div class="controls">
                            <input type="text" name="nik" class="span5" required>
                            </div>
                        </div>

                        <input type="hidden" name="id_karyawan" >

                        <div class="control-group">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                            <input type="text" name="nama" class="span5" required readonly>
                            </div>
                        </div>

                        <div class="control-group" style="display:none;">
                            <label class="control-label">Jenis Cuti</label>
                            <div class="controls">
                                <select class="form-control" name="jenis_cuti">
                                    <option value=" " selected disabled>- Pilih Jenis Cuti -</option>
                                    <?php 

                                        $query = "SELECT * FROM ct_jenis_cuti";
                                        $sql = mysqli_query($connect,$query);

                                        while($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                                    ?>
                                    
                                        <option value="<?php echo $data['id_jenis_cuti'];?>"><?php echo $data['nama_jenis'];?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Tanggal Cuti</label>
                            <div class="controls">
                            <input type="text" name="tanggal_cuti" class="span3 daterange" required readonly>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Alasan Cuti</label>
                            <div class="controls">
                            <input type="text" name="alasan_cuti" class="span5" required>
                            </div>
                        </div>

                        <input type="hidden" name="action" value="save">

                        <div class="form-actions">
                            <center>
                                <button type="button" name="action" value="add" class="btn btn-primary" onclick="saveData()" <?php echo ($cuti['cuti']==12 ? 'disabled' : '');?> ><i class="icon-check"></i> Submit</button>
                                <button type="button" class="btn" style="margin-left: 10px;" onclick="hideAddForm()"><i class="icon-remove"></i> Cancel</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .gritter-green{
        background:#2eb82e !important;
    }
</style>
<script>

    var start = "<?php echo date('d-m-Y');?>";
    var end = "<?php echo date('d-m-Y', strtotime('+12 Days'));?>";
    
    $(document).ready(function(){

            

            $('.daterange').daterangepicker({
                "startDate": start,
                "endDate": end,
                "minDate": start,
                "locale": {
                    "format": "DD-MM-YYYY",
                }
            });
        
            $("[name='nik']").on('focusout',function(){
                $.ajax({
                    type: "post",
                    url: "pengajuan_cuti_process.php",
                    data: {
                        nik:$('[name="nik"]').val(),
                        action:'check'
                    },
                    dataType: "json",
                    success: function (response) {
                        if(response.result){
                            $('[name="nama"]').val(response.data.nama_karyawan);
                            $('[name="id_karyawan"]').val(response.data.id_karyawan);
                        }else{
                            if($("[name='nik']").val().replace(/\s+/g, '').length > 0){
                                $.gritter.add({
                                    title:	 "Data tidak ditemukan",
                                    text:	"Nik dan nama yang sesuai tidak ditemukan",
                                    sticky: false
                                });	
                            }
                        }
                    }
                });
            });
        

    });

    function saveData(){
		var formdata = $('#form-add').serialize();
	    $.ajax({
	        url: 'pengajuan_cuti_process.php',
	        type: 'POST',
	        data: formdata,
	        success: function(data){
				var res = JSON.parse(data);
				//console.log(res);
				if(!res.result){
					$.gritter.add({
						title:	 res.title,
						text:	res.msg,
                        sticky: false,
                        class_name:'gritter-green',
					});
                    //$('.gritter-item').addClass('gritter-green');
				}else{
					$.gritter.add({
						title:	 res.title,
						text:	res.msg,
						sticky: false
					});	
					document.getElementById("form-add").reset();
                    $('select').val(" ").trigger('change');
                    setTimeout(function () {
                        window.location.href = "http://localhost/cuti_karyawan/"; //will redirect to your blog page (an ex: blog.html)
                    }, 1000); //will call the function after 2 secs
	            	// tbl_data.ajax.reload();
	            	// hideAddForm();
				}
	           
	        }
        });
    }
</script>
