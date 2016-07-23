<?php 
session_start();
require_once"functions.php";
$user =new LoginRegistration();
$uid = $_SESSION['uid'];


if (!$user->getSession())
	{ header('location:login.php');
exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<h3>PHP OOP LOGIN REGISTER SYSTEM</h3>

		</div>
		<div class="mainmenu">
			<ul>
				<?php if ($user->getSession()) {?>
				<li><a href="index.php">HOME</a></li>
				<li><a href="changePassword.php">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="content">
		<h2>Update Your Profile</h2>
					
		<p class="msg">

		<?php 
				if ($_SERVER['REQUEST_METHOD'] == 'POST')
				 {
					$old_pass 		=$_POST['old_password'];
					$new_pass 		=$_POST['new_password'];
					$confirm_pass 	=$_POST['confirm_password'];

					if(empty($old_pass)  or empty($new_pass) or empty($confirm_pass))
						{echo "<span style ='color:#e53d37'>Error...Field must not be empty</span>";
						}else if($new_pass != $confirm_pass)
						{
							echo "<span style ='color:#e53d37'>Error...Password Does not matched.</span>";
							}else
							{	//$old_pass =md5($old_pass);
								//$new_pass = md5($new_pass);
								$passUpdate =  $user->updatePassword($uid, $new_pass, $old_pass);
								if($passUpdate)
								{
									echo "<span>password Changed Successfully</span>";
								}
							}	
					}
				?>
				</p>
		<div class="login_reg">
			<form action="" method="Post" >
			<table>
				<tr>
                    <td>Old Password</td>
                    <td><input type="text" name="old_password" placeholder="Please Enter Your Old Password" ></td>
				</tr>

				<tr>
                    <td>New Password   </td>
                    <td><input type="text" name="new_password" placeholder="Please Enter your New password"  ></td>
				</tr>

				<tr>
                    <td>Confirm:   </td>
                    <td><input type="text" name="confirm_password" placeholder="Please Enter your New password Agin"  ></td>
				</tr>

	
				<tr>
                   <td colspan="2">
					<span style="float:right">
					<input type="submit" name="update" value="udate"/>
					<input  type="reset" value="Reset"/>
					</span>
					</td>
				</tr>	
				</table>
			</form>
		</div>
		

		<div class="back">
			<a href="index.php"> <img src="img/back.png" alt="back"/></a>
		</div>
		
		<div class="footer">
			<h3>Www.abc.com</h3>
		</div>
</div>
	</div>
</body>
</html>