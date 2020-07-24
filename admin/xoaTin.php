<?php
ob_start();
session_start();
if(!isset($_SESSION["idUser"])){
	header("location:../index.php");

}
require "../lib/dbCon.php";
require "../lib/quantri.php";

?>
<?php
$idTin = $_GET["idTin"];
settype($idTin,"int");
$con = mysqli_connect("localhost","root","","tintucvn");
$sql = "DELETE FROM tin WHERE idTin = '$idTin'";
mysqli_query($con,$sql);
header("location:listTin.php");
?>