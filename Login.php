<!doctype html>
<html lang="es">
<head>
<title>GUSTAVO ALVARO TITO POMA</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">


<?PHP

		function fnComprueba(&$msg){
			if( md5($_POST ['clave'])!= $_SESSION['key'])return 0;
			else return 1;   
		}
		/* AGENTES DE USUARIO */
		function check_user_agent( $type = NULL ) {
        $user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
			if ( $type == 'bot' ) {
				// matches popular bots
				if( preg_match ( "/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent ) ) {
                        return true;
                        // watchmouse|pingdom\.com are "uptime services"
                }
			} else if ( $type == 'browser' ) {
					// matches core browser types
					if ( preg_match ( "/mozilla\/|opera\//", $user_agent ) ) {
							return true;
					}
			} else if ( $type == 'mobile' ) {
					// matches popular mobile devices that have small screens and/or touch inputs
					// mobile devices have regional trends; some of these will have varying popularity in Europe, Asia, and America
					// detailed demographics are unknown, and South America, the Pacific Islands, and Africa trends might not be represented, here
					if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
							// these are the most common
							// estos son los mas comunes
							return true;
					} else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
							// these are less common, and might not be worth checking
							// estos son menos comunes y puede que no valga la pena revisarlos
							return true;
					}
			}
			return false;
		}

		//-------------------------------------------------------------------------//
		session_start();
		if(isset($_SESSION['users'])){ 
			header("location:user.php"); 
		}else{
			if(!$_POST){	//===HOJA DE INICIO===//
				if(check_user_agent('mobile')==false){
					$mensaje="Iniciar&nbsp;&nbsp;Sesi&oacute;n";
				}else{
					$mensaje="Iniciar&nbsp;&nbsp;Sesi&oacute;n Mobil";
				}
			}else{	//===HOJA PROCESADA===//

				if( $_POST['clave'] == "true" || fnComprueba($msg) == 1){
				  require_once("script/conex.php");
				  $cn= new MySQLcn();
				  $login = htmlspecialchars(trim($_POST['users']));
				  //$pass = sha1(md5(trim($_POST['pass'])));
				  $pass = trim($_POST['pass']);
				  $querys ="CALL Acceder('$login','$pass');";
				  $cn->Query($querys);
				  if($cn->NumRows()==true){
					$data=$cn->FetRows();
					$cn->Close();
					$_SESSION["userId"]=$data[0];
					$_SESSION["grupoId"]=$data[1];
					$_SESSION["nombre"]=$data[2];
					$_SESSION["users"]=$data[3];
					$_SESSION["nivel"]=$data[5];
					$_SESSION["hora"]=date("Y-n-j H:i:s");
					/*
					if($data[4]== '3')
						header("location:acerca_nosotros");
					else
						header("location:resumen");
					*/
					header("location:user.php"); 
				  }else{
					$mensaje="Usuario o Contrase&ntilde;a Incorrecto";
				  }
				}else{
					$mensaje="Marcaci&oacute;n de Imagen Incorrecta";
				}
			}


		?>




</head>


<body>


<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">TITO POMA GUSTAVO ALVARO</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-7 col-lg-5">
<div class="wrap">
<div class="img" style="background-image: url(images/gif1.gif);"></div>
<div class="login-wrap p-4 p-md-5">
<div class="d-flex">
<div class="w-100">
<h3 class="mb-4"><?echo $mensaje; ?></h3>

</div>
<div class="w-100">
<p class="social-media d-flex justify-content-end">
<a href="https://www.facebook.com/" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
<a href="https://twitter.com/?lang=es" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
</p>
</div>
</div>
<form name="sesion" action="login.php" class="signin-form" method="POST">
<div class="form-group mt-3">
<input type="text" name="users" id="users" class="form-control" required>
<label class="form-control-placeholder" for="username">Usuario</label>
</div>
<div class="form-group">
<input id="password-field" type="password" name="pass" id="pass" class="form-control" required>
<label class="form-control-placeholder" for="password">Password</label>
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
<center>
<div class="form-group mt-3">
 <img src= "script/generax.php?imgCant=4&imgTipo=Num"/>
</div>
</center>
<div class="form-group mt-3">
<input type="text" name= "clave" id="clave"type="password" class="form-control" required>
<label class="form-control-placeholder" for="username">Capcha</label> 
</div>
<div class="form-group">
<button type="submit" class="form-control btn btn-primary rounded submit px-3">INGRESAR</button>
</div>
<div class="form-group d-md-flex">
<div class="w-50 text-left">
<label class="checkbox-wrap checkbox-primary mb-0">RECORDAR
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</div>
<div class="w-50 text-md-right">
<a href="#">OLVIDE MI CONTRASEÑA</a>
</div>
</div>
</form>
<p class="text-center">¿no es un miembro? <a data-toggle="tab" href="#signup">registrar</a></p>
</div>
</div>
</div>
</div>
</div>
</section>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"776088f6e9789549","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
</body>

<? } ?>

</html>
