<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=m_rk" title="Data Jadwal Antar" class="tip-bottom"><i class="icon-check"></i> Rekap Jadwal</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->


<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h3>Rekap Jadwal</h3>
			<hr>
		</div>
	</div>

	<div class="row-fluid add_form_content">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon"><i class="icon-plus"></i></span>
					<h5>Filter Jadwal Antar</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" id="form-add">
				        
                        <div class="control-group">
				            <label class="control-label">Tanggal Awal</label>
				            <div class="controls">
                                <input type="text" data-date-format="dd-mm-yyyy" class="datepicker span3" name="tanggal_awal" readonly>
                                <span class="help-block"></span> 
                            </div>
				        </div>


                        <div class="control-group">
				          <label class="control-label">Tanggal Akhir</label>
				          <div class="controls">
                                <input type="text" data-date-format="dd-mm-yyyy" class="datepicker span3" name="tanggal_akhir" readonly>
                                <span class="help-block"></span> 
                            </div>
				        </div>

				        <div class="form-actions">
                            <div class="span2">
                            </div>
				        	<div class="span10">
					        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="searchRekap()"><i class="icon-check"></i> Filter</button>
					        	<button type="button" name="action" value="add" class="btn btn-warning" onclick="resetForm()"><i class="icon-refresh"></i> Reset</button>
                            </div>
				        </div>
				  	</form>
				</div>
			</div>
		</div>
	</div>


	<div class="row-fluid">
	  <div class="span12">
	    <div class="widget-box">
	      	<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
	        	<h5>Data Jadwal Antar</h5>
	      	</div>
	      	<div class="widget-content nopadding"> 
	      		

	    		<table id="tbl_data" class="table table-striped table-bordered" style="margin-top:10px;">
	    			<thead>
	    				<tr>
                            <th>#</th>
	    					<th>Pengemudi</th>
	    					<th>Kendaraan</th>
	    					<th>Penumpang</th>
	    					<th>Tujuan</th>
							<th>Berangkat</th>
							<th>Kembali</th>
							<th>Status</th>
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

	#profile-messages .dropdown-menu{
		left:0 !important;
	}

	.dropdown-menu{
		left:-235%;
	}
</style>

<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/buttons.print.min.js"></script>

<script type="text/javascript">
	var tbl_data;

	$(document).ready(function () {
		

	    //Setup - add a text input to each footer cell
	    // $('#tbl_mekanikthead th').each( function () {
	    //     var title = $(this).text();
	    //     $(this).html( title + '<br><input type="text" placeholder="Search '+title+'" />' );
	    // } );

	    tbl_data= $('#tbl_data').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
	    	bJQueryUI: true,
	    	sPaginationType: "full_numbers",
            "ajax" :{
               "url" : "jadwal_report_process.php?action=get",
               "data" : function(d){
                   d.tanggal_awal = $('[name="tanggal_awal"]').val();
                   d.tanggal_akhir = $('[name="tanggal_akhir"]').val();
               } 
            }, 
	        select: {
	            style: 'multi+shift',
	        },
			columns:[
				{"data":null,"defaultContent":"","searchable":false,"orderable":false},
				{"data":null,"defaultContent":""},
				{"data":null,"defaultContent":""},
				{"data":"penumpang"},
				{"data":"tujuan"},
				{"data":null,"defaultContent":""},
				{"data":null,"defaultContent":""},
				{"data":"status_job"}
			],
	        columnDefs: [
				{
					"targets": 1,
					"render": function(data,type,full,meta){
						return full.nik+" - "+full.nama_pengemudi;
					}
				},
				{
					"targets": 2,
					"render": function(data,type,full,meta){
						return full.plat_nomor+" - "+full.nama_merk+" - "+full.nama_jenis;
					}
				},
				{
					"targets": 5,
					"render": function(data,type,full,meta){
						return moment(full.tanggal_berangkat).format('DD-MM-YYYY')+", "+moment(full.jam_berangkat, 'HH:mm:ss').format('HH:mm');
					}
				},
				{
					"targets": 6,
					"render": function(data,type,full,meta){
						return moment(full.tanggal_kembali).format('DD-MM-YYYY')+", "+moment(full.jam_kembali, 'HH:mm:ss').format('HH:mm');
					}
				},
				{
					"targets":7,
					"class":"text-center",
					"render":function(data,type,full,meta){
						var status;
						switch (data) {
							case '1':
								status = '<center><span class="badge badge-warning">On Process</span></center>';
								break;
							case '2':
								status = '<center><span class="badge badge-success">Done</span></center>';
								break;
							case '3':
								status = '<center><span class="badge badge-important">Canceled</span></center>';
								break;
						
							default:
								status = '<center><span class="badge badge-info">Scheduled</span></center>';
								break;
						}

						return status;
					}
				}

	        ],

	        order: [[ 1, 'asc' ]]
	    });
        
        tbl_data.on( 'order.dt search.dt', function () {
            tbl_data.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    });
    
    function searchRekap(){
        tbl_data.ajax.reload();
    }

    function resetForm(){
        $('[name="tanggal_awal"]').val("");
        $('[name="tanggal_akhir"]').val("");
        tbl_data.ajax.reload();
    }
    
</script>