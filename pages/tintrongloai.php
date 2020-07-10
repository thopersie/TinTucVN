<?php
$idLT = $_GET["idLT"];
settype($idLT, "int");
?>

<?php
$bc = breadCrumb($idLT);
$row_bc = mysqli_fetch_array($bc, MYSQLI_BOTH);
?>
<div>
Trang chủ > <?php echo $row_bc["TenTL"]?> > <?php echo $row_bc["Ten"]?>
</div>

<?php
$sotin1trang = 4;
if(isset($_GET["trang"])){
	$trang = $_GET["trang"];
	settype($trang, "int");
}
else{
	$trang = 1;
}
$from = ($trang - 1)* $sotin1trang;
$tintheoloai = HienTinTheoLoai_PhanTrang($idLT, $from, $sotin1trang);
while($row_tintheoloai = mysqli_fetch_array($tintheoloai, MYSQLI_BOTH)){

?>
<div class="box-cat">
	<div class="cat1">
    	
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tintheoloai["idTin"]?>"><?php echo $row_tintheoloai["TieuDe"]?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tintheoloai["urlHinh"]?>" align="left" />
                    <div class="des"><?php echo $row_tintheoloai["TomTat"]?></div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            
        </div>
    </div>
</div>
<div class="clear"></div>


<!-- box cat-->
<?php
}
?>
<hr />

<div id="phantrang">
<?php
$t = HienTinTheoLoai($idLT);
$tongsotin = mysqli_num_rows($t);
$tongsotrang = ceil($tongsotin/$sotin1trang);
for ($i=1; $i <= $tongsotrang; $i++){
?>
<a <?php if($i == $trang) echo "style='background-color:yellow'"?>  href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>&trang=<?php echo $i?>">   <?php echo $i?></a>

<?php
}
?>
</div>