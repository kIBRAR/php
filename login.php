<?php 
session_start();
require_once"functions.php";
$user =new LoginRegistration();
if ($user->getSession()) {
	header('Location:index.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registration Page</title>
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
			<h2>Login</h2>		
				<p class="msg">
				<span class="login_msg">
					<?php
						if(isset($_GET['response']))
						{
							if($_GET['response'] == 1)
							{
								echo "Logout Successfully...";
							}
						}

					?>
				</span>
					<?php 
                  		 if($_SERVER['REQUEST_METHOD'] == 'POST')
                  		{
                   			$email = $_POST['email'];
                   			$password=$_POST['password'];
                   
                  			 if (empty($email) or empty($password))
                  			  {
                   				echo "<span style='color:#e53d37'>Field must not be empty...</span>";
                  			  }
                  			  else
                  			  {
                   				//$password=md5($password);
                   				$login = $user->loginUser($email,$password);
                   					if($login){
                   						header('Location:index.php');
                   						}else
                   						{
                   					echo "<span style='color:#e53d37'>Error...Email or Password not match</span>";
                   						}
                  				 }
               }
			?>
		</p>
		<div class="login_reg">
			<form action="" method="Post">
			<table>
				<tr>
                    <td>Email:   </td>
                    <td><input type="Email" name="email" placeholder="please enter your Email" ></td>
				</tr>
				<tr>
                    <td>Password:   </td>
                    <td><input type="password" name="password" placeholder="please give your password" ></td>
				</tr>
				<tr>
                   <td colspan="2">
					<span style="float:right">
					<input type="submit" name="login" value="Login"/>
					<input  type="reset" value="Reset"/>
					</span>
					</td>
				</tr>	
				</table>
			</form>
		</div>
		<div class="back">
			<a href="login.php"> <img src="img/back.png" alt="back"/></a>
		</div>
		<div class="footer">
			<h3>Www.abc.com</h3>
		</div>
</div>
	</div>
</body>
</html>