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
$row_loaitin = ChiTietLoaiTin($idLT);
?>
<?php
if(isset($_POST["btnSua"])){
	$Ten = $_POST["Ten"];
	$Ten_KhongDau = changeTitle($Ten);
	$ThuTu = $_POST["ThuTu"];
	settype($ThuTu,"int");
	$AnHien = $_POST["AnHien"];
	settype($AnHien,"int");
	$idTL = $_POST["idTL"];
	settype($idTL,"int");
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "UPDATE loaitin SET Ten = '$Ten', Ten_KhongDau = '$Ten_KhongDau',
							   ThuTu = '$ThuTu', AnHien = '$AnHien'
						   WHERE idLT = '$idLT'
			";
	mysqli_query($con,$sql);
	header("location:listLoaiTin.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="layout.css"/>
</head>

<body>
<table width="1000" border="0" align="center">
  <tr>
    <td id="hangTieuDe">TRANG QUẢN TRỊ WEBSITE
    <div style="width:200px; float:right">
    	<div> Chào bạn <?php echo $_SESSION["HoTen"]?> </div>
    </div>
    </td>
  </tr>
  <tr>
    <td id="menu"><?php require "menu.php"?></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <table width="500" border="0">
        <tr>
          <td colspan="2"><strong>SỬA LOẠI TIN</strong></td>
        </tr>
        <tr>
          <td>Ten</td>
          <td><label for="Ten"></label>
            <input value="<?php echo $row_loaitin["Ten"]?>" type="text" name="Ten" id="Ten" /></td>
        </tr>
        <tr>
          <td>ThuTu</td>
          <td><label for="ThuTu"></label>
            <input value="<?php echo $row_loaitin["ThuTu"]?>" type="text" name="ThuTu" id="ThuTu" /></td>
        </tr>
        <tr>
          <td>AnHien</td>
          <td><p>
            <label>
              <input <?php if($row_loaitin["AnHien"]==0) echo "checked = 'checked'" ?> type="radio" name="AnHien" value="0" id="AnHien_0" />
              An</label>
            <br />
            <label>
              <input <?php if($row_loaitin["AnHien"]==1) echo "checked = 'checked'" ?> type="radio" name="AnHien" value="1" id="AnHien_1" />
              Hien</label>
            <br />
          </p></td>
        </tr>
        <tr>
          <td>idTL</td>
          <td><label for="idTL"></label>
            <select name="idTL" id="idTL">
              <?php
		  $theloai = DanhSachTheLoai();
		  while ($row_theloai = mysqli_fetch_array($theloai,MYSQLI_BOTH)){
		  ?>
              <option <?php if($row_theloai["idTL"]==$row_loaitin["idTL"]) echo "selected='selected'" ?> 
              value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
          <?php
		  }
		  ?>
            </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btnSua" id="btnSua" value="Sửa" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>