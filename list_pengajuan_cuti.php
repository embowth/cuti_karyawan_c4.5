<!--breadcrumbs-->
<div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=lc_app" title="List Pengajuan Cuti" class="tip-bottom"><i class="icon-user"></i> List Pengajuan Cuti</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->

	<?php
    $bln_mulai = '';
    $bln_selesai = '';
    $thn_mulai = '';
    $thn_selesai = '';
    if(isset($_GET['pre'])){
        $bln_mulai = $_GET['bulan_mulai'] ;
        $bln_selesai = $_GET['bulan_selesai'];
        $thn_mulai = $_GET['tahun_mulai'];
        $thn_selesai = $_GET['tahun_selesai'];
        
    }else{
		$bln_mulai = '1' ;
        $bln_selesai = '12';
        $thn_mulai = date('Y', strtotime("-1 years"));
        $thn_selesai = $thn_mulai;
	}
     
     
?>

<div class="container-fluid">
	<div class="row-fluid add_form_content">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-plus"></i></span>
                        <h5>Filter List Cuti</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" id="form-add">
                            <div class="control-group">
                                <label class="control-label">Bulan Mulai</label>
                                <div class="controls">
                                    <select name="bulan_mulai" class="span5">
                                        <option value="" <?php echo ($bln_mulai=='' ? 'selected' : '');?> >Pilih Bulan</option>
                                        <option value="1" <?php echo ($bln_mulai=='1' ? 'selected' : '');?> >Januari</option>
                                        <option value="2" <?php echo ($bln_mulai=='2' ? 'selected' : '');?> >Februari</option>
                                        <option value="3" <?php echo ($bln_mulai=='3' ? 'selected' : '');?> >Maret</option>
                                        <option value="4" <?php echo ($bln_mulai=='4' ? 'selected' : '');?> >April</option>
                                        <option value="5" <?php echo ($bln_mulai=='5' ? 'selected' : '');?> >Mei</option>
                                        <option value="6" <?php echo ($bln_mulai=='6' ? 'selected' : '');?> >Juni</option>
                                        <option value="7" <?php echo ($bln_mulai=='7' ? 'selected' : '');?> >Juli</option>
                                        <option value="8" <?php echo ($bln_mulai=='8' ? 'selected' : '');?> >Agustus</option>
                                        <option value="9" <?php echo ($bln_mulai=='9' ? 'selected' : '');?> >September</option>
                                        <option value="10" <?php echo ($bln_mulai=='10' ? 'selected' : '');?> >Oktober</option>
                                        <option value="11" <?php echo ($bln_mulai=='11' ? 'selected' : '');?> >November</option>
                                        <option value="12" <?php echo ($bln_mulai=='12' ? 'selected' : '');?> >Desember</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Tahun Mulai</label>
                                <div class="controls">
                                    <input type="text" class="span5" name="tahun_mulai" value="<?php echo ($thn_mulai=='' ? date('Y', strtotime('-1 Years')) : $thn_mulai);?>">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Bulan Selesai</label>
                                <div class="controls">
                                    <select name="bulan_selesai" class="span5">
                                        <option value="" <?php echo ($bln_selesai=='' ? 'selected' : '');?> >Pilih Bulan</option>
                                        <option value="1" <?php echo ($bln_selesai=='1' ? 'selected' : '');?> >Januari</option>
                                        <option value="2" <?php echo ($bln_selesai=='2' ? 'selected' : '');?> >Februari</option>
                                        <option value="3" <?php echo ($bln_selesai=='3' ? 'selected' : '');?> >Maret</option>
                                        <option value="4" <?php echo ($bln_selesai=='4' ? 'selected' : '');?> >April</option>
                                        <option value="5" <?php echo ($bln_selesai=='5' ? 'selected' : '');?> >Mei</option>
                                        <option value="6" <?php echo ($bln_selesai=='6' ? 'selected' : '');?> >Juni</option>
                                        <option value="7" <?php echo ($bln_selesai=='7' ? 'selected' : '');?> >Juli</option>
                                        <option value="8" <?php echo ($bln_selesai=='8' ? 'selected' : '');?> >Agustus</option>
                                        <option value="9" <?php echo ($bln_selesai=='9' ? 'selected' : '');?> >September</option>
                                        <option value="10" <?php echo ($bln_selesai=='10' ? 'selected' : '');?> >Oktober</option>
                                        <option value="11" <?php echo ($bln_selesai=='11' ? 'selected' : '');?> >November</option>
                                        <option value="12" <?php echo ($bln_selesai=='12' ? 'selected' : '');?> >Desember</option>
                                    </select>
                                    <input type="hidden" name="pre" value="1">;
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Tahun Selesai</label>
                                <div class="controls">
                                    <input type="text" class="span5" name="tahun_selesai" value="<?php echo ($thn_selesai == '' ? date('Y') : $thn_selesai);?>">
                                </div>
                            </div>

                            <div class="form-actions">
                                <center>
                                    <button type="button" class="btn btn-primary" id="filter_cuti"><i class="icon-search"></i> Filter</button>
                                    
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                            <th>Tanggal Pengajuan</th>
	    					<th>NIK</th>
                            <th>Nama Karyawan</th>
							<th>Divisi</th>
                            <th>Jenis Cuti</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Alasan Cuti</th>
							<th>Sisa Cuti</th>
                            <th>Status</th>
                            <th>Approval KABAG</th>
                            <th>Option</th>
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

	<div class="row-fluid">
	  <div class="span12">
	    <div class="widget-box">
	      	<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
	        	<h5>Total Pengajuan Cuti Per Divisi</h5>
	      	</div>
	      	<div class="widget-content nopadding"> 
	      		

	    		<table id="tbl_data2" class="table table-striped table-bordered">
	    			<thead>
	    				<tr>
                            <th>Divisi</th>
                            <th width="8%" class="text-right">Total Cuti</th>
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



<link rel="stylesheet" href="css/jquery-confirm.min.css" />

<script src="js/jquery-confirm.min.js"></script> 


<style type="text/css">
	.select2-container{
		margin:0 !important;
	}
	span.select2-container{
		z-index:10050 !important;
	}
	.select2-container--open{
	    z-index:10050 !important;         
    }
    .select2-close-mask{
        z-index: 10050 !important;
    }
    .select2-dropdown{
        z-index: 10050 !important;
    }
    .modal{
    	z-index: 9999 !important;
    }
</style>
<script type="text/javascript">
	var tbl_data, tbl_data2;
	var max_cuti = 12;
	var count_cuti = new Array();

	$(document).ready(function () {

		$("#filter_cuti").on('click',function(){
			count_cuti = new Array();
			tbl_data.ajax.reload();
			tbl_data2.ajax.reload();
		});
		

	    //Setup - add a text input to each footer cell
	    // $('#tbl_instrukturthead th').each( function () {
	    //     var title = $(this).text();
	    //     $(this).html( title + '<br><input type="text" placeholder="Search '+title+'" />' );
	    // } );

	    tbl_data= $('#tbl_data').DataTable( {
	    	bJQueryUI: true,
	    	sPaginationType: "full_numbers",
	        "ajax" : {
				"url":"list_pengajuan_cuti_process.php?action=get",
				"method":"get",
				"data":function(f){
					f.bulan_m = $('[name="bulan_mulai"]').val();
					f.tahun_m = $('[name="tahun_mulai"]').val();
					f.bulan_s = $('[name="bulan_selesai"]').val();
					f.tahun_s = $('[name="tahun_selesai"]').val();
				}
				
			},
			columns:[
				{"data":"tgl_pengajuan", "visible":false},
				{"data":"nik"},
				{"data":"nama_karyawan"},
				{"data":"nama_divisi"},
				{"data":"nama_jenis"},
				{"data":"tgl_mulai"},
				{"data":"tgl_selesai"},
				{"data":"alasan_cuti"},
				{
					"data":"total_hari",
					"render":function(data,type,row,meta){
						var ind = parseInt(row.id_karyawan+row.year_cuti);
						//console.log(ind);

						if(isNaN(count_cuti[ind])){
							count_cuti[ind] = 0;
						}

						var cnt = count_cuti[ind];
						// console.log(count_cuti[ind]);
						if(isNaN(cnt)){
							cnt = 0;
						}
						count_cuti[ind] = parseInt(cnt)+parseInt(data);
						// console.log(ind +" "+ data + " "+ cnt +" "+count_cuti[ind]);
						return max_cuti-count_cuti[ind];
					}
				},
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
                {
                    "data":null,
                    "defaultContent":"",
					"class":"text-center",
                    "render":function(data,type,row,meta){
                        var content = '';

						<?php if($_SESSION['role']==1){ ?>
						if(row.status_cuti==0){
							content += '<a href="javascript:;" class="btn btn-success btn-mini hr-app"><i class="icon-check"></i> HR Approve</a>';
						}
						<?php } ?>
						
						<?php if($_SESSION['role']==2){ ?>
						if(row.approval_kabag==0){
							content += '<a href="javascript:;" class="btn btn-primary btn-mini kabag-app"><i class="icon-check"></i> KABAG Approve</a>';
						}
						<?php } ?>



						return "<center>"+content+"</center>";

                    }
                },
			],
	        order: [[ 1, 'asc' ]]
	    });

	    // Apply the search
	    tbl_data.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );

	

	    $('#tbl_data tbody').on('click', '.hr-app', function () {
	        var id = tbl_data.row($(this).parents('tr')).data().id_cuti;
			confirm_hr(id);
	    }).on('click', '.kabag-app', function () {
	        var id = tbl_data.row($(this).parents('tr')).data().id_cuti;
			confirm_kabag(id);
	    }); 

		 tbl_data2= $('#tbl_data2').DataTable( {
	    	bJQueryUI: true,
	    	sPaginationType: "full_numbers",
	        "ajax" : {
				"url":"list_pengajuan_cuti_process.php?action=get_div",
				"method":"get",
				"data":function(f){
					f.bulan_m = $('[name="bulan_mulai"]').val();
					f.tahun_m = $('[name="tahun_mulai"]').val();
					f.bulan_s = $('[name="bulan_selesai"]').val();
					f.tahun_s = $('[name="tahun_selesai"]').val();
				}
				
			},
			"columns":[
				{"data":"nama_divisi"},
				{"data":"total_cuti"}
			]
		 });
	});

	function editRecord(){
		
		// $('#edit_level').val(tbl_data.row().data().level);
		// $('#edit_section').val(tbl_data.row().data().section);
	}

	function closeModal(){
		$('#edit-modal').modal('toggle');
	}


	function showAddForm(){
	    $('#add_form').hide();
	    $('#remove_form').show();
	    $('.add_form_content').slideDown('slow');
	}

	function hideAddForm(){
	    $('#remove_form').hide();
	    $('#add_form').show();
	    $('.add_form_content').slideUp('slow');
	}

	function saveJenisKendaraan(){
	    $.ajax({
	        url: 'divisi_process.php',
	        type: 'POST',
	        data: {
	            jenis: $('[name=nama_divisi]').val(),
	            action: $('[name=action]').val(),
	            kd_divisi: $('[name=kd_divisi]').val(),
	        },
	        success: function(data){
	        	document.getElementById("form-add").reset();
	            tbl_data.ajax.reload();
	            hideAddForm();
	        }
	    });
	}

	function editJenisKendaraan(){
	    $.ajax({
	        url: 'divisi_process.php',
	        type: 'POST',
	        data: {
	            jenis: $('#edit_nama_divisi').val(),
	            action: $('[name=action]').val(),
	            kd_divisi: $('#kd_divisi').val(),
	        },
	        success: function(data){
	            $('#form-edit').form('reset');
	            tbl_data.ajax.reload();
	            $('#edit-modal').modal('toggle');
	        }
	    });
	}

	function confirm_hr(id){
		var code = id;
		$.confirm({
			title: 'Pengajuan Cuti',
			content: 'Konfirmasi Pengajuan Cuti',
			buttons: {
				accept: {
					text:"Accept",
					btnClass:"btn-success",
					action:function(){
						$.ajax({
							type: "post",
							url: "list_pengajuan_cuti_process.php",
							data:{
								id_:code,
								action:'acc_hr',
							},
							dataType: "json",
							success: function (response) {
								tbl_data.ajax.reload();
							}
						});
					}
					
				},
				reject: {
					text: 'Reject',
					btnClass: 'btn-danger',
					action: function(){
						$.ajax({
							type: "post",
							url: "list_pengajuan_cuti_process.php",
							data:{
								id_:code,
								action:'den_hr',
							},
							dataType: "json",
							success: function (response) {
								tbl_data.ajax.reload();
							}
						});
					}
				},
				cancel: function () {
					return true;
				},
				
			}
		});
	}

	function confirm_kabag(id){
		var code = id;
		$.confirm({
			title: 'Pengajuan Cuti',
			content: 'Konfirmasi Pengajuan Cuti',
			buttons: {
				accept: {
					text:"Accept",
					btnClass:"btn-success",
					action:function(){
						$.ajax({
							type: "post",
							url: "list_pengajuan_cuti_process.php",
							data:{
								id_:code,
								action:'acc_kabag',
							},
							dataType: "json",
							success: function (response) {
								tbl_data.ajax.reload();
							}
						});
					}
					
				},
				reject: {
					text: 'Reject',
					btnClass: 'btn-danger',
					action: function(){
						$.ajax({
							type: "post",
							url: "list_pengajuan_cuti_process.php",
							data:{
								id_:code,
								action:'den_kabag',
							},
							dataType: "json",
							success: function (response) {
								tbl_data.ajax.reload();
							}
						});
					}
				},
				cancel: function () {
					return true;
				},
				
			}
		});
	}

	

</script>
