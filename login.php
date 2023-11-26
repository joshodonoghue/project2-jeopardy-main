<?php 
session_start(); // Starts the session

if(isset($_POST['Submit'])){
    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
    
    if (isset($_SESSION['logins'][$Username]) && $_SESSION['logins'][$Username] == $Password){
        $_SESSION['UserData']['Username'] = $Username;
        header("location: main.html");
        exit;
    } else {
        $msg = "<span style='color:red'>Invalid Login Details</span>";
    }
}
if (isset($_SESSION['registration_success'])) {
    $msg = $_SESSION['registration_success'];
    unset($_SESSION['registration_success']); // Clear the message after displaying it
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Login Script Without Using Database</title>
<link href="login.css" rel="stylesheet">
</head>
<body>



<form action="" method="post" name="main.html">
<div class = "login-container" >
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">Username</td>
      <td><input name="Username" type="text" class="Input"></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="Password" type="password" class="Input"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>
  </table>
  </div>
</form>
</div>
</body>
</html>
