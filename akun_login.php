
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=m_mk" title="Data Login" class="tip-bottom"><i class="icon-user"></i> Login</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->


<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h3>Login</h3>
			<hr>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">

			<a href="javascript:void(0)" class="btn btn-primary" onclick="showAddForm()"  id="add_form"><i class="icon-plus"></i> Tambah Login</a>
			<a href="javascript:void(0)" class="btn btn-warning" onclick="hideAddForm()" style="display: none;" id="remove_form"><i class="icon-remove"></i> Cancel</a>
			<a href="javascript:void(0)" class="btn btn-danger" id="deleteLogin"><i class="icon-trash"></i> Hapus Login</a>
			
		</div>
	</div>

	<div class="row-fluid add_form_content" style="display: none;">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon"><i class="icon-plus"></i></span>
					<h5>Tambah Login</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" id="form_login">
				        <div class="control-group">
				          <label class="control-label">Username</label>
				          <div class="controls">
				            <input type="text" name="username" required>
				          </div>
				        </div>
						<div class="control-group">
				          <label class="control-label">Password</label>
				          <div class="controls">
				            <input type="password" name="password" placeholder="">
				          </div>
				        </div>
						<div class="control-group">
				          <label class="control-label">Nama</label>
				          <div class="controls">
				            <input type="text" name="nama" required>
				          </div>
				        </div>
				        <div class="control-group">
				          	<label class="control-label">Role</label>
				          	<div class="controls">
				              <select class="span5" name="role">
				                <option value=" " selected disabled>- Pilih Role -</option>

				                <?php 
				                	$query = "SELECT * FROM mnj_role ORDER BY id_role ASC";
				                	$sql = mysqli_query($connect,$query);

				                	while($data_role = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
				                ?>
				                		<option value="<?php echo $data_role['id_role'];?>"><?php echo ucfirst($data_role['nama_role']);?></option>
				                <?php 
				                	}
				                ?>
				              </select>
				            </div>
				        </div>

				        <input type="hidden" name="id_login" value="">

				        <div class="form-actions">
				        	<center>
					        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="saveAccount()"><i class="icon-check"></i> Submit</button>
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
	        	<h5>Data Login</h5>
	      	</div>
	      	<div class="widget-content nopadding"> 
	      		

	    		<table id="tbl_account" class="table table-striped table-bordered">
	    			<thead>
	    				<tr>
	    					<th></th>
	    					<th>Username</th>
	    					<th>Role</th>
	    					<th>Nama</th>
	    					<th width="6%">Option</th>
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
    <h3>Ubah Data Login</h3>
  </div>
  <div class="modal-body">
    		<div class="widget-box">
    			<div class="widget-content nopadding">
    				<form class="form-horizontal" id="form_login_edit">
    			       
    			       <div class="control-group">
				          <label class="control-label">Username</label>
				          <div class="controls">
				            <input type="text" id="edit_username" required>
				          </div>
				        </div>
				        <div class="control-group">
				          <label class="control-label">Password</label>
				          <div class="controls">
				            <input type="password" id="edit_password" placeholder="Isi jika ingin mengganti password">
				          </div>
				        </div>
						<div class="control-group">
				          <label class="control-label">Nama</label>
				          <div class="controls">
				            <input type="text" id="edit_nama" required>
				          </div>
				        </div>
				        <div class="control-group">
				          	<label class="control-label">Role</label>
				          	<div class="controls">
				              <select class="span5" id="edit_role">
				                <option value=" " selected disabled>- Pilih Role -</option>

				                <?php 
				                	$query = "SELECT * FROM mnj_role ORDER BY id_role ASC";
				                	$sql = mysqli_query($connect,$query);

				                	while($data_role = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
				                ?>
				                		<option value="<?php echo $data_role['id_role'];?>"><?php echo ucfirst($data_role['nama_role']);?></option>
				                <?php 
				                	}
				                ?>
				              </select>
				            </div>
				        </div>

    			        <input type="hidden" name="id_login" value="" id="id_login">

    			        <div class="form-actions">
    			        	<center>
    				        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="editAccount()"><i class="icon-check"></i> Submit</button>
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
	var tbl_account;

	$(document).ready(function () {
		

	    //Setup - add a text input to each footer cell
	    // $('#tbl_accountthead th').each( function () {
	    //     var title = $(this).text();
	    //     $(this).html( title + '<br><input type="text" placeholder="Search '+title+'" />' );
	    // } );

	    tbl_account= $('#tbl_account').DataTable( {
	    	bJQueryUI: true,
	    	sPaginationType: "full_numbers",
	        "ajax" : "akun_login_process.php?action=get",
	        select: {
	            style: 'multi+shift',
	        },
	        columnDefs: [                
	            {
	                "orderable": false,
	                "className": 'select-checkbox',
	                "targets": 0,
	                "data":null,
	                "defaultContent": ""
	            },
	            {
	                "data":"username",
	                "targets": 1
	            },
	            {
	                "data":"role",
	                "targets": 2
	            },
	            {
	                "sortable":false,
	                "targets": 3,
	                "data": "nama_user",
	                
	            },
	            {
	                "sortable":false,
	                "targets": 4,
	                "data": "id_login",
	                "render": function ( data, type, full, meta ) {
	                    return '<a href="javascript:;" class="btn btn-mini btn-info edit-btn" ><i class="icon-edit"></i> Edit</a>';
	                }
	            },
	            {
	                "sortable":false,
	                "searchable":false,
	                "data" : "id_login",
	                "targets":5,
	                "visible":false
	            }
	        ],
	        select: {
	            style:    'os',
	            selector: 'td:first-child'
	        },
	        order: [[ 5, 'asc' ]]
	    });

	    // Apply the search
	    tbl_account.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );

	    

	    $('#deleteLogin').click( function(){
	            /* get selected row count and its data */
	            var count = tbl_account.rows('.selected').data().length;
	            var item = tbl_account.rows('.selected').data();

	            /* perform deletion */
	            if(count > 0){ /* if has selected count >= 1 */
	                
	                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' Data Login. <br><br><br> <strong class="text-danger">Perhatian : Proses ini akan menghapus seluruh data yang dipilih</strong>', function(r){
	                    if(r){
	                        for (var i = 0; i <= count - 1; i++) {
	                            //console.log(item[i]['id_inkaso']);
	                            var did=item[i]['id_login'];
	                            $.post( 'akun_login_process.php?action=del&id=' + did).done(function(){tbl_account.ajax.reload(); });
	                        };
	                    }
	                });
	            }else{
	                $.messager.alert('Delete Confirmation','Tidak ada item terpilih untuk dihapus','warning');                
	            }
	        });
	    
	    
	    $('select').select2();

	    $('#tbl_account tbody').on('click', '.edit-btn', function () {
	        $('#edit-modal').modal();
	        $('#id_login').val(tbl_account.row($(this).parents('tr')).data().id_login);
	        $('#edit_username').val(tbl_account.row($(this).parents('tr')).data().username);
	        $('#edit_nama').val(tbl_account.row($(this).parents('tr')).data().nama_user);
	        $('#edit_role').val(tbl_account.row($(this).parents('tr')).data().id_role).trigger('change');
	    }); 
	});

	function editRecord(){
		
		// $('#edit_level').val(tbl_account.row().data().level);
		// $('#edit_section').val(tbl_account.row().data().section);
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

	function saveAccount(){
	    $.ajax({
	        url: 'akun_login_process.php',
	        type: 'POST',
	        data: {
	            username: $('[name=username]').val(),
				password: $('[name=password]').val(),
				nama:$('[name=nama]').val(),
	            role: $('[name=role]').val(),
	            action: $('[name=action]').val(),
	            id_login: $('[name=id_login]').val(),
	        },
	        success: function(data){
	            $('#form_login').form('reset');
				$('[name=role]').val(" ").trigger('change');
	            tbl_account.ajax.reload();
	            hideAddForm();
	        }
	    });
	}

	function editAccount(){
	    $.ajax({
	        url: 'akun_login_process.php',
	        type: 'POST',
	        data: {
	            username: $('#edit_username').val(),
	            role: $('#edit_role').val(),
	            action: $('[name=action]').val(),
	            password: $('#edit_password').val(),
	            nama: $('#edit_nama').val(),
	            id_login: $('#id_login').val(),
	        },
	        success: function(data){
	            $('#form_login_edit').form('reset');
				$("#edit_role").val(" ").trigger('change');
	            tbl_account.ajax.reload();
	            $('#edit-modal').modal('toggle');
	        }
	    });
	}
</script>