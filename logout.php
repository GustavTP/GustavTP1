<?
//========================================================================//
//  PROYEC : ADMINISTRADOR DE CONTENIDOS WEB
//	AUTOR  : JUAN CARLOS PINTO LARICO
//	FECHA  : DICIEMBRE   2014
//	VERSION: 1.0.0
//  E-MAIL : jcpintol@hotmail.com
//========================================================================//
session_start();
if(!isset($_SESSION["users"])){
header("location:login.php");
} else {
session_unset();
session_destroy();
require "login.php";
echo "<script type='text/javascript'>window.close()</script>";
exit(); 
}
?>