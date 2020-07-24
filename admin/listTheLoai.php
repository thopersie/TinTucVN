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
<table width="900" border="0" align="center">
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
      <table width="691" border="0">
        <tr>
          <td colspan="6"><h1>DANH SÁCH THỂ LOẠI</h1></td>
        </tr>
        <tr>
          <td width="66">idTL</td>
          <td width="86">TenTL</td>
          <td width="238">TenTL_KhongDau</td>
          <td width="86">ThuTu</td>
          <td width="95">AnHien</td>
          <td width="94"><a href="themTheLoai.php">Thêm</a></td>
        </tr>
        <?php
		$theloai = DanhSachTheLoai();
		while ($row_theloai = mysqli_fetch_array($theloai,MYSQLI_BOTH)){
			ob_start();
		?>
        <tr>
          <td>{idTL}</td>
          <td>{TenTL}</td>
          <td>{TenTL_KhongDau}</td>
          <td>{ThuTu}</td>
          <td>{AnHien}</td>
          <td><a href="suaTheLoai.php?idTL={idTL}">Sửa</a>/ <a onclick ="return confirm('Bạn có muốn xóa không?')" href="xoaTheLoai.php?idTL={idTL}">Xóa</a></td>
        </tr>
        <?php
			$s = ob_get_clean();
			$s = str_replace("{idTL}",$row_theloai["idTL"],$s);
			$s = str_replace("{TenTL}",$row_theloai["TenTL"],$s);
			$s = str_replace("{TenTL_KhongDau}",$row_theloai["TenTL_KhongDau"],$s);
			$s = str_replace("{ThuTu}",$row_theloai["ThuTu"],$s);
			$s = str_replace("{AnHien}",$row_theloai["AnHien"],$s);
			echo $s;
		}
		?>
      </table>
    </form>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>