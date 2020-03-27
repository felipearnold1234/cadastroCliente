<?php
extract($_REQUEST);
include 'config.php';
define( 'VERSAO', '?v=0.1' ); 
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $NomoImobiliaria; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom Theme files -->
		 <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container col-sm-12 text-center pt-5">
			
			<div class="border rounded p-3">
				<h2>Login</h2>
				<form method="post" action="validar.php">
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-6">
							<input type="text" placeholder="Email" required="" id="NomeUsuario" name="login" class="form-control">
						</div>
						<div class="col-md-6">
							<input type="password" placeholder="Senha" required="" id="inputPassword" name="senha" class="form-control">
						</div>
						</div>
						
					</div>
					<div class="col-md-12 login-do">
							<button type="submit" class="btn-block btn btn-warning" value="entrar" id="entrar" name="entrar">Login</button>
					</div>
					
					<div class="clearfix"> </div>
				</form>
			</div>
		</div>
		<!---->
		<div class="copy-right">
			
		</div>
			<!---->
			<!--scrolling js-->
			<script src="js/jquery.nicescroll.js"></script>
			<script src="js/scripts.js"></script>
			<!--//scrolling js-->
		</body>
	</html>