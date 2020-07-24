<?php
ob_start();
session_start();
if(!isset($_SESSION["idUser"])){
	header("location:../index.php");

}
require "../lib/dbCon.php";
require "../lib/quantri.php";

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
    <td><table width="600" border="0">
      <tr>
        <td colspan="7"><h1>DANH SÁCH LOẠI TIN</h1></td>
        </tr>
      <tr>
        <td>idLT</td>
        <td>Ten</td>
        <td>Ten_KhongDau</td>
        <td>ThuTu</td>
        <td>AnHien</td>
        <td>idTL</td>
        <td><a href="themLoaiTin.php">Thêm</a></td>
      </tr>
      <?php
	  $loaitin = DanhSachLoaiTin();
	  while($row_loaitin = mysqli_fetch_array($loaitin,MYSQLI_BOTH)){
		  ob_start();
	  ?>
      <tr>
        <td>{idLT}</td>
        <td>{Ten}</td>
        <td>{Ten_KhongDau}</td>
        <td>{ThuTu}</td>
        <td>{AnHien}</td>
        <td>{TenTL}</td>
        <td><a href="suaLoaiTin.php?idLT={idLT}">Sửa</a>/
        <a onclick ="return confirm('Bạn có muốn xóa không?')" href="xoaLoaiTin.php?idLT={idLT}">Xóa</a></td>
      </tr>
      <?php
	  	 $s = ob_get_clean();
		 $s = str_replace("{idLT}",$row_loaitin["idLT"],$s);
		 $s = str_replace("{Ten}",$row_loaitin["Ten"],$s);
		 $s = str_replace("{Ten_KhongDau}",$row_loaitin["Ten_KhongDau"],$s);
		 $s = str_replace("{ThuTu}",$row_loaitin["ThuTu"],$s);
		 $s = str_replace("{AnHien}",$row_loaitin["AnHien"],$s);
		 $s = str_replace("{TenTL}",$row_loaitin["TenTL"],$s);
		 echo $s;
	  }
	  ?>
    </table></td>
  </tr>
</table>
</body>
</html>