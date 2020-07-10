<?php
function TinMoiNhat_MotTin(){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin ORDER BY idTin DESC LIMIT 0,1";
	return mysqli_query($con, $sql);		
}
function TinMoiNhat_BaTin(){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin ORDER BY idTin DESC LIMIT 1,4";
	return mysqli_query($con, $sql);		
}
function TinMoiNhat_BonTin(){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin ORDER BY idTin DESC LIMIT 4,8";
	return mysqli_query($con, $sql);		
}
function TinXemNhieu(){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin ORDER BY SoLanXem DESC LIMIT 0,6";
	return mysqli_query($con, $sql);	
}
function TinMoiNhat_TheoLoaiTin_MotTin($idLT){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin WHERE idLT = $idLT ORDER BY idTin DESC LIMIT 0,1";
	return mysqli_query($con, $sql);			
}
function TinMoiNhat_TheoLoaiTin_BonTin($idLT){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin WHERE idLT = $idLT ORDER BY idTin DESC LIMIT 1,6";
	return mysqli_query($con, $sql);		
}
function TenLoaiTin($idLT){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT Ten FROM loaitin WHERE idLT = $idLT";
	$loaitin = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($loaitin, MYSQLI_BOTH);
	return $row ["Ten"];	
}
function QuangCao($vitri){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM quangcao WHERE vitri = $vitri";
	return mysqli_query($con, $sql);
}
function DanhSachTheLoai(){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM theloai";
	return mysqli_query($con, $sql);	
}
function DanhSachLoaiTin_TheoTheLoai($idTL){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM loaitin WHERE idTL=$idTL";
	return mysqli_query($con, $sql);	
}
function TinMoi_BenTrai($idTL){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin WHERE idTL=$idTL ORDER BY idTin DESC LIMIT 0,1";
	return mysqli_query($con, $sql);
}
function TinMoi_BenPhai($idTL){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin WHERE idTL=$idTL ORDER BY idTin DESC LIMIT 1,2";
	return mysqli_query($con, $sql);		
}
function HienTinTheoLoai($idLT){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin WHERE idLT = $idLT ORDER BY idTin DESC";
	return mysqli_query($con, $sql);		
}
function HienTinTheoLoai_PhanTrang($idLT, $from, $sotin1trang){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin WHERE idLT = $idLT ORDER BY idTin DESC LIMIT $from, $sotin1trang";
	return mysqli_query($con, $sql);		
}

function breadCrumb($idLT){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT TenTL, Ten FROM theloai, loaitin WHERE theloai.idTL = loaitin.idTL 
			AND idLT = $idLT";
	return mysqli_query($con, $sql);		
}
function ChiTietTin($idTin){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin WHERE idTin = $idTin";
	return mysqli_query($con, $sql);		
}
function TinCungLoai($idTin, $idLT){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin WHERE idTin <> $idTin AND idLT = $idLT ORDER BY RAND() LIMIT 0,3";
	return mysqli_query($con, $sql);		
}
function CapNhatSoLanXemTin($idTin){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "UPDATE tin SET SoLanXem = SoLanXem + 1
			WHERE idTin = $idTin";
	return mysqli_query($con, $sql);
}
function TimKiem($tukhoa){
	$con = mysqli_connect("localhost","root","","tintucvn");
	$sql = "SELECT * FROM tin WHERE TieuDe REGEXP '$tukhoa' ORDER BY idTin DESC";
	return mysqli_query($con, $sql);
}

?>