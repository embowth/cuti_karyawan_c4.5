<!--breadcrumbs-->
<div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=gl_us" title="Data Golongan Usia" class="tip-bottom"><i class="icon-user"></i> Golongan Usia</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->


<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h3>Golongan Usia</h3>
			<hr>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php if($_SESSION['role']==1){ ?>
			<a href="javascript:void(0)" class="btn btn-primary" onclick="showAddForm()"  id="add_form"><i class="icon-plus"></i> Tambah Golongan Usia</a>
			<a href="javascript:void(0)" class="btn btn-warning" onclick="hideAddForm()" style="display: none;" id="remove_form"><i class="icon-remove"></i> Cancel</a>
			<a href="javascript:void(0)" class="btn btn-danger" id="deletedata"><i class="icon-trash"></i> Hapus Golongan Usia</a>
			<?php } ?>
		</div>
	</div>

	<div class="row-fluid add_form_content" style="display: none;">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon"><i class="icon-plus"></i></span>
					<h5>Tambah Golongan Usia</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" id="form-add">

				        <div class="control-group">
				          <label class="control-label">Golongan Usia</label>
				          <div class="controls">
				            <input type="text" name="nama_golongan" class="span5" required>
				          </div>
                          
				        </div>

                        <div class="control-group">
                            <label class="control-label">Minimum Usia</label>
                            <div class="controls">
                                <input type="text" name="minimum_usia" class="span5" required>
                            </div>
                        </div>

						<div class="control-group">
                            <label class="control-label">Maksimum Usia</label>
                            <div class="controls">
                                <input type="text" name="maksimum_usia" class="span5" required>
                            </div>
                        </div>

				        <input type="hidden" name="id_golongan" value="">

				        <div class="form-actions">
				        	<center>
					        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="saveGolongan()"><i class="icon-check"></i> Submit</button>
					        	<button type="button" class="btn" style="margin-left: 10px;" onclick="hideAddForm()"><i class="icon-remove"></i> Cancel</button>
				        	</center>
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
	        	<h5>Data Golongan Usia</h5>
	      	</div>
	      	<div class="widget-content nopadding"> 
	      		

	    		<table id="tbl_data" class="table table-striped table-bordered">
	    			<thead>
	    				<tr>
	    					<th></th>
	    					<th>Golongan Usia</th>
	    					<th>Minimum Usia</th>
	    					<th>Maksimum Usia</th>
	    					<th width="8%">Option</th>
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

<div id="edit-modal" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Ubah Data Golongan Usia</h3>
  </div>
  <div class="modal-body">
    		<div class="widget-box">
    			<div class="widget-content nopadding">
    				<form class="form-horizontal" id="form-edit">

    			        <div class="control-group">
				          <label class="control-label">Golongan Usia</label>
				          <div class="controls">
				            <input type="text" name="nama_golongan" id="edit_nama_golongan" style="height:30px;" required>
				          </div>
                          
				        </div>

                        <div class="control-group">
                            <label class="control-label">Minimum Usia</label>
                            <div class="controls">
                                <input type="text" name="minimum_usia" id="edit_minimum_usia" style="height:30px;" required>
                            </div>
                        </div>

						<div class="control-group">
                            <label class="control-label">Maksimum Usia</label>
                            <div class="controls">
                                <input type="text" name="maksimum_usia" id="edit_maksimum_usia" style="height:30px;" required>
                            </div>
                        </div>


    			        <input type="hidden" value="" id="id_golongan">

    			        <div class="form-actions">
    			        	<center>
    				        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="editJenisKendaraan()"><i class="icon-check"></i> Submit</button>
    				        	<button type="button" class="btn" style="margin-left: 10px;" onclick="closeModal()"><i class="icon-remove"></i> Cancel</button>
    			        	</center>
    			        </div>
    			  	</form>
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
</style>
<script type="text/javascript">
	var tbl_data;

	$(document).ready(function () {
		

	    //Setup - add a text input to each footer cell
	    // $('#tbl_instrukturthead th').each( function () {
	    //     var title = $(this).text();
	    //     $(this).html( title + '<br><input type="text" placeholder="Search '+title+'" />' );
	    // } );

	    tbl_data= $('#tbl_data').DataTable( {
	    	bJQueryUI: true,
	    	sPaginationType: "full_numbers",
	        "ajax" : "golongan_usia_process.php?action=get",
	        select: {
	            style: 'multi+shift',
	        },
			columns:[
				{
	                "orderable": false,
	                "className": 'select-checkbox',
	                "data":null,
	                "defaultContent": "",
                    "width":"4%"
	            },
				{"data":"nama_golongan"},
				{
                    "data":"minimum_usia",
                    "width":"120px",
                    "render":function(data,type,row,meta){
                        return "<center>"+data+"</center>";
                    }
                },
				{
                    "data":"maksimum_usia",
                    "width":"120px",
                    "render":function(data,type,row,meta){
                        return "<center>"+data+"</center>";
                    }
                },
				{"data":null,"defaultContent":""},
			],
	        columnDefs: [                
	            {
	                "sortable":false,
	                "targets": 4,
	                "data": "id_golongan",
	                "render": function ( data, type, full, meta ) {
						<?php if($_SESSION['role']==1){ ?>
	                    	return '<center><a href="javascript:;" class="btn btn-mini btn-info edit-btn" ><i class="icon-edit"></i> Edit</a></center>';
						<?php } ?>
					}
	            },
	        ],
	        select: {
	            style:    'os',
	            selector: 'td:first-child'
	        },
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

	    

	    $('#deletedata').click( function(){
	            /* get selected row count and its data */
	            var count = tbl_data.rows('.selected').data().length;
	            var item = tbl_data.rows('.selected').data();

	            /* perform deletion */
	            if(count > 0){ /* if has selected count >= 1 */
	                
	                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' Data Golongan Usia. <br><br><br> <strong class="text-danger">Perhatian : Proses ini akan menghapus seluruh data yang dipilih</strong>', function(r){
	                    if(r){
	                        for (var i = 0; i <= count - 1; i++) {
	                            //console.log(item[i]['id_inkaso']);
	                            var did=item[i]['id_golongan'];
	                            $.post( 'golongan_usia_process.php?action=del&id=' + did).done(function(){tbl_data.ajax.reload(); });
	                        };
	                    }
	                });
	            }else{
	                $.messager.alert('Delete Confirmation','Tidak ada item terpilih untuk dihapus','warning');                
	            }
	        });
	    
	    
	    $('select').select2();

	    $('#tbl_data tbody').on('click', '.edit-btn', function () {
	        $('#edit-modal').modal();
	        $('#id_golongan').val(tbl_data.row($(this).parents('tr')).data().id_golongan);
	        $('#edit_nama_golongan').val(tbl_data.row($(this).parents('tr')).data().nama_golongan);
	        $('#edit_minimum_usia').val(tbl_data.row($(this).parents('tr')).data().minimum_usia);
	        $('#edit_maksimum_usia').val(tbl_data.row($(this).parents('tr')).data().maksimum_usia);
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

	function saveGolongan(){
	    $.ajax({
	        url: 'golongan_usia_process.php',
	        type: 'POST',
	        data: {
	            nama_golongan: $('[name=nama_golongan]').val(),
	            minimum_usia: $('[name=minimum_usia]').val(),
	            maksimum_usia: $('[name=maksimum_usia]').val(),
	            action: $('[name=action]').val(),
	            id_golongan: $('[name=id_golongan]').val(),
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
	        url: 'golongan_usia_process.php',
	        type: 'POST',
	        data: {
	            nama_golongan: $('#edit_nama_golongan').val(),
	            minimum_usia: $('#edit_minimum_usia').val(),
	            maksimum_usia: $('#edit_maksimum_usia').val(),
	            action: $('[name=action]').val(),
	            id_golongan: $('#id_golongan').val(),
	        },
	        success: function(data){
	            $('#form-edit').form('reset');
	            tbl_data.ajax.reload();
	            $('#edit-modal').modal('toggle');
	        }
	    });
	}
</script>