<!DOCTYPE html>
<html>
<head>
	<title>SPK Matpres </title>
	<script type="text/javascript">
		var xhttp = false;
		if (window.XMLHttpRequest) {
			xhttp = new XMLHttpRequest();
		}
		else if(window.ActiveXObject){
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

	function login(){
		xhttp.responseText;
		xhttp.abort();
		xhttp.onreadysstatechange=function(){
			if (xhttp.teadyState ==4 && xhttp.status == 200) {
				document.getElementById('pesan').innerHTML =  xhttp.responseText;
			}
		}
	}
	var user=document.getElementById('uname').value;
	var pwd=document.getElementById('password').value;
	var captcha=document.getElementById('nilaiCaptcha').value;
	xhttp.open("Get", "http://localhost/utsweb/login.php?uname="+user+"&password="+pwd+"&nilaiCaptcha="+captcha, true);
	xhttp.send(null);
	</script>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	<?php include 'koneksi.php'; ?>
	<style type="text/css">
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>
</head>
<body>	
	<div class="container">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</div>";
			}
		}
		?>
		<div class="panel panel-default">
			<form action="login.php" method="post">
				<div class="col-md-4 col-md-offset-4 kotak">
					<h3>Login Kios Mamah</h3>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" placeholder="Username" name="uname">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" placeholder="Password" name="pass">
					</div>
					<div>
						<img src="gambar.php" alt="gambar" /><br><br>
						<input placeholder="Masukan Captcha" name="nilaiCaptcha" value="" maxlength="6"><br>
					</div>
					<div class="input-group">			
						<br><input type="submit" class="btn btn-primary" value="Login">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>