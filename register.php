<?php
session_start(); // Starts the session

if (!isset($_SESSION['logins'])) {
    $_SESSION['logins'] = array();
}

if(isset($_POST['Register'])){
    $new_username = isset($_POST['NewUsername']) ? $_POST['NewUsername'] : '';
    $new_password = isset($_POST['NewPassword']) ? $_POST['NewPassword'] : '';

    if (!isset($_SESSION['logins'][$new_username])) {
        $_SESSION['logins'][$new_username] = $new_password;
        $_SESSION['registration_success'] = "Registration successful! Please login.";
        header("Location: login.php"); // Redirect to login page
        exit;
    } else {
        $msg = "<span style='color:red'>Username already exists!</span>";
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Registration Script</title>
<link href="login.css" rel="stylesheet">
</head>
<body>

<br>
<form action="" method="post" name="Register_Form">
  <div class="login-container"><table>
    
      <td colspan="2" align="" valign="top"><h3>Register</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">New Username</td>
      <td><input name="NewUsername" type="text" class="Input"></td>
    </tr>
    <tr>
      <td align="right">New Password</td>
      <td><input name="NewPassword" type="password" class="Input"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Register" type="submit" value="Register" class="Button3"></td>
    </tr>
  </table></Div>
</form>
</body>
</html>
