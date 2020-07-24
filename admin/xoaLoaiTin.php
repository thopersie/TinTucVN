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
$idLT = $_GET["idLT"];
settype($idLT,"int");
$con = mysqli_connect("localhost","root","","tintucvn");
$sql = "DELETE FROM loaitin WHERE idLT = '$idLT'";
mysqli_query($con,$sql);
header("location:listLoaiTin.php");
?>