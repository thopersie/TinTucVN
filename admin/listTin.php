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
    <td><form id="form1" name="form1" method="post" action="">
      <table width="800" border="0">
        <tr>
          <td colspan="5"><h1>DANH SÁCH TIN TỨC</h1></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><a href="themTin.php">Thêm</a></td>
          </tr>
        <?php
		$tin = DanhSachTin();
		while($row_tin = mysqli_fetch_array($tin,MYSQLI_BOTH)){
			ob_start();
		?>
        <tr>
          <td><p>idTin:{idTin}</p>
            <p>{Ngay}</p></td>
          <td><p><a href="suaTin.php?idTin={idTin}">{TieuDe}</a></p>
            <p><img style="float:left; margin-right:5px" src="../upload/tintuc/{urlHinh}" width="108" height="96" />{TomTat}</p></td>
          <td>{TenTL}<br />
            -<br />
            {Ten}<br /></td>
          <td><p>Số Lần Xem:</p>
            <p>{SoLanXem}<br />
              {TinNoiBat}-{AnHien}
              <br />
          </p></td>
          <td><a href="suaTin.php?idTin={idTin}">Sửa</a>/
          <a onclick ="return confirm('Bạn có muốn xóa không?')" href="xoaTin.php?idTin={idTin}">Xóa</a></td>
          </tr>
          <?php
		    $s = ob_get_clean();
			$s = str_replace("{idTin}",$row_tin["idTin"],$s);
			$s = str_replace("{Ngay}",$row_tin["Ngay"],$s);
			$s = str_replace("{TieuDe}",$row_tin["TieuDe"],$s);
			$s = str_replace("{TomTat}",$row_tin["TomTat"],$s);
			$s = str_replace("{urlHinh}",$row_tin["urlHinh"],$s);
			$s = str_replace("{TenTL}",$row_tin["TenTL"],$s);
			$s = str_replace("{Ten}",$row_tin["Ten"],$s);
			$s = str_replace("{SoLanXem}",$row_tin["SoLanXem"],$s);
			$s = str_replace("{TinNoiBat}",$row_tin["TinNoiBat"],$s);
			$s = str_replace("{AnHien}",$row_tin["AnHien"],$s);
			echo $s;
		  }
		  ?>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>