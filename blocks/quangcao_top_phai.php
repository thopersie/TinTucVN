<?php 
$qcao = QuangCao(1);
while ($row_qcao = mysqli_fetch_array($qcao, MYSQLI_BOTH)){
?>
<a href="<?php echo $row_qcao["Url"]?>">
<img width="180" src="upload/quangcao/<?php echo $row_qcao["urlHinh"]?>" /></a>
<div style="height:15px"></div>
<?php
}
?>