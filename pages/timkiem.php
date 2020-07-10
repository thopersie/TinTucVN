<?php
$tukhoa = $_GET["q"];
$tintheoloai = TimKiem($tukhoa);
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