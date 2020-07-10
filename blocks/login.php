<div id="login">
<form name="form" method="post" action="">
  <table width="100%" border="0">
    <tr>
      <td><strong>Đăng Nhập</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Username</td>
      <td><label for="txtUser"></label>
      <input type="text" name="txtUser" id="txtUser" size="16"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtPass"></label>
      <input type="password" name="txtPass" id="txtPass" size="17"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnDangnhap" id="btnDangnhap" value="Đăng nhập"></td>
    </tr>
  </table>
</form>
<?php
$con=mysqli_connect("localhost", "root", "", "tintucvn");
if(isset($_POST['btnDangnhap'])){
	$n = mysqli_real_escape_string($con,$_POST['txtUser']);
	$p = mysqli_real_escape_string($con,$_POST['txtPass']);
	$p = md5($p);
	$sql = "SELECT * FROM users WHERE Username = '$n' AND Password = '$p'";
	$query = mysqli_query($con,$sql);
	$numrow = mysqli_num_rows($query);
	if($numrow != 0){
		echo("Đăng nhập thành công");
	}else{
		echo("Tên hoặc mật khẩu không đúng");
	}
}
?>
</div>