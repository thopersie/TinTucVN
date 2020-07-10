<div id="register">
<form name="form1" method="post" action="">
  <table width="100%" border="0">
    <tr>
      <td><strong>Đăng Ký</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Username</td>
      <td><label for="txtUsername"></label>
      <input type="text" name="txtUsername" id="txtUsername" size="16"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtPassword"></label>
      <input type="password" name="txtPassword" id="txtPassword" size="17"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnDangky" id="btnDangky" value="Đăng ký"></td>
    </tr>
  </table>
</form>
<?php
$con=mysqli_connect("localhost", "root", "", "tintucvn");
if(isset($_POST['btnDangky'])){
	$name = mysqli_real_escape_string($con,$_POST['txtUsername']);
	$password = mysqli_real_escape_string($con,$_POST['txtPassword']);
	$password = md5($password);
	$sql = "INSERT INTO users(Username,Password) VALUES('$name', '$password') ";
	$query = mysqli_query($con,$sql);
}
?>
</div>