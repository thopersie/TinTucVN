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
$row_tin = ChiTietTin($idTin);
?>
<?php
if (isset($_POST["btnSua"])){
	$TieuDe = $_POST["TieuDe"];
	$TieuDe_KhongDau = changeTitle($TieuDe);
	$TomTat = $_POST["TomTat"];
	$urlHinh = $_POST["urlHinh"];
	$Ngay = date("Y-m-d");
	$idUser = $_SESSION["idUser"];
	settype($idUser,"int");
	$Content = $_POST["Content"];
	$idLT = $_POST["idLT"];
	settype($idLT,"int");
	$idTL = $_POST["idTL"];
	settype($idTL,"int");
	$SoLanXem = 0;
	$TinNoiBat = $_POST["TinNoiBat"];
	settype($TinNoiBat,"int");
	$AnHien = $_POST["AnHien"];
	settype($AnHien,"int");
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "UPDATE tin SET TieuDe ='$TieuDe',TieuDe_KhongDau='$TieuDe_KhongDau',TomTat='$TomTat',urlHinh='$urlHinh',Ngay='$Ngay'
			,idUser='$idUser',Content='$Content',idLT='$idLT',idTL='$idTL',
			SoLanXem='$SoLanXem',TinNoiBat='$TinNoiBat',AnHien='$AnHien')
			WHERE idTin = '$idTin'
			";
	mysqli_query($con,$sql);
	header("location:listTin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="layout.css"/>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
function ShowThumbnails( fileUrl, data ){	
	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
	document.getElementById( 'thumbnails' ).innerHTML +=
	'<div class="thumb">' +
	'<img src="' + fileUrl + '" />' +
	'<div class="caption">' +
	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
	'</div>' +
	'</div>';
	document.getElementById( 'preview' ).style.display = "";
	return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
}
</script>
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
    <td><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="700" border="0">
        <tr>
          <td colspan="2"><strong>SỬA TIN</strong></td>
        </tr>
        <tr>
          <td>TieuDe</td>
          <td><label for="TieuDe"></label>
            <input value="<?php echo $row_tin["TieuDe"]?>" type="text" name="TieuDe" id="TieuDe" /></td>
        </tr>
        <tr>
          <td>TomTat</td>
          <td><label for="TomTat"></label>
            <input value="<?php echo $row_tin["TomTat"]?>" name="TomTat" id="TomTat" cols="45" rows="5"/></td>
        </tr>
        <tr>
          <td>urlHinh</td>
          <td><label for="urlHinh"></label>
            <input  type="file" name="urlHinh" id="urlHinh" />
            <input type="submit" value="Submit" name="upload_file" />
            </td>
        </tr>
        <tr>
          <td>Content</td>
          <td><label for="Content"></label>
            <textarea value="<?php echo $row_tin["Content"]?>" name="Content" id="Content" cols="45" rows="5"></textarea>
            <script type="text/javascript">
			var editor = CKEDITOR.replace( 'Content',{
			uiColor : '#9AB8F3',
			language:'vi',
			skin:'v2',
			filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
			filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
			 	
			toolbar:[
			['Source','-','Save','NewPage','Preview','-','Templates'],
			['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
			['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
			['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
			['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
			['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
			['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
			['Link','Unlink','Anchor'],
			['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
			['Styles','Format','Font','FontSize'],
			['TextColor','BGColor'],
			['Maximize', 'ShowBlocks','-','About']
			]
			});		
			</script></td>
        </tr>
        <tr>
          <td>idTL</td>
          <td><label for="idTL"></label>
            <select name="idTL" id="idTL">
              <?php
		  $theloai = DanhSachTheLoai();
		  while ($row_theloai = mysqli_fetch_array($theloai,MYSQLI_BOTH)){
		  ?>
              <option <?php if($row_tin["idTL"]==$row_theloai["idTL"]) echo "selected='selected'"?>
               value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
              <?php
		  }
		  ?>
            </select></td>
        </tr>
        <tr>
          <td>idLT</td>
          <td><label for="idLT"></label>
            <select name="idLT" id="idLT">
              <?php
		  $loaitin = DanhSachLoaiTin();
		  while ($row_loaitin = mysqli_fetch_array($loaitin,MYSQLI_BOTH)){
		  ?>
              <option <?php if($row_tin["idLT"]==$row_loaitin["idLT"]) echo "selected='selected'"?>
              value="<?php echo $row_loaitin["idLT"] ?>"><?php echo $row_loaitin["Ten"] ?></option>
              <?php
		  }
		  ?>
            </select></td>
        </tr>
        <tr>
          <td>TinNoiBat</td>
          <td><p>
            <label>
              <input <?php if($row_tin["TinNoiBat"]==1) echo "checked = 'checked'" ?> type="radio" name="TinNoiBat" value="1" id="TinNoiBat_0" />
              Nổi bật</label>
            <br />
            <label>
              <input <?php if($row_tin["TinNoiBat"]==0) echo "checked = 'checked'" ?> type="radio" name="TinNoiBat" value="0" id="TinNoiBat_1" />
              Bình thường</label>
            <br />
          </p></td>
        </tr>
        <tr>
          <td>AnHien</td>
          <td><p>
            <label>
              <input <?php if($row_tin["AnHien"]==0) echo "checked = 'checked'" ?> type="radio" name="AnHien" value="0" id="AnHien_0" />
              Ẩn</label>
            <br />
            <label>
              <input <?php if($row_tin["AnHien"]==1) echo "checked = 'checked'" ?> type="radio" name="AnHien" value="1" id="AnHien_1" />
              Hiện</label>
            <br />
          </p></td>
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