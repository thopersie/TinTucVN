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
$idTL = $_GET["idTL"];
settype($idTL,"int");
$con = mysqli_connect("localhost","root","","tintucvn");
$sql = "DELETE FROM theloai WHERE idTL = '$idTL'";
mysqli_query($con,$sql);
header("location:listTheLoai.php");
?>