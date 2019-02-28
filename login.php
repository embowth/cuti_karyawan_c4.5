<?php

    session_start();

    include "config/koneksi.php";

    if(isset($_SESSION['login'])){
      header("location:".$base_url."/");
    }

?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Manajemen Cuti Karyawan</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

        <style type="text/css">
            h3{
                text-align: center;
                color:#fff;
            }

            body{
                top: -60px;
                position: relative;
            }
        </style>
    </head>
    <body >
        
        <h3>LOGIN</h3>
        <div id="loginbox">
            <?php if(isset($_SESSION['notice'])){ ?>
                <div class="alert alert-error">
                    <!-- <button class="close" data-dismiss="alert">×</button> -->
                    <strong><?php echo $_SESSION['notice'];?></strong> <?php echo $_SESSION['notice_msg'];?>
                </div>     
            <?php 
                    session_unset('notice');
                    session_unset('notice_msg');
                } 
            ?>
            <form id="loginform" class="form-vertical" method="POST" action="login_process.php">
				 <!-- <div class="control-group normal_text"> <h3><img src="#" class="img-circle" alt="Logo" /></h3></div> -->
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Username" name="username" required/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" required/>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="token" value="marganusantarajaya">

                <div class="form-actions">
                    <span class="pull-right"><button type="submit" class="btn btn-success" /> Login</button></span>
                </div>
            </form>
        </div>
        

        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
