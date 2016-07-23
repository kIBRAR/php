<?php 
session_start();
require_once"functions.php";
$user =new LoginRegistration();
if ($user->getSession())
	{ header('location:index.php');
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
			<h2>Register</h2>
		
		<p class="msg">
			<?php 
				if ($_SERVER['REQUEST_METHOD'] == 'POST')
				 {
					$username =$_POST['username'];
					$password =$_POST['password'];
					$name =$_POST['name'];
					$email =$_POST['email'];
					$website =$_POST['website'];

					if(empty($username) or empty($password) or empty($name) or empty($email) or empty($website))
						{echo "<span style ='color:#e53d37'>Error...Field must not be empty</span>";}
					else
						{//$password=md5($password);
							$register = $user->registerUser($username,$password,$name,$email,$website);
							if ($register) 
								{echo "<span style='color:green'>Register Done <a href='login.php'>Click here</a> for login.</span>";
						}else{
							echo "<span style='color:#e53d37'>Username or email already exist.</span>";}
				}
			}

					
			?>
		</p>
		<div class="login_reg">
			<form action="" method="Post">
			<table>
				<tr>
                    <td>username:   </td>
                    <td><input type="text" name="username" placeholder="please give your username" ></td>
				</tr>

				<tr>
                    <td>Password:   </td>
                    <td><input type="password" name="password" placeholder="please give your password" ></td>
				</tr>

				<tr>
                    <td>Name:   </td>
                    <td><input type="text" name="name" placeholder="please Enter your name" ></td>
				</tr>

				<tr>
                    <td>Email:   </td>
                    <td><input type="email" name="email" placeholder="please enter your Email" ></td>
				</tr>

				<tr>
                    <td>Website:   </td>
                    <td><input type="text" name="website" placeholder="please enter your website" ></td>
				</tr>

				<tr>
                   <td colspan="2">
					<span style="float:right">
					<input type="submit" name="register" value="Register"/>
					<input  type="reset" value="Reset"/>
					</span>
					</td>
				</tr>	
				</table>
			</form>
		</div>
		<div class="back">
			<a herf="login.php"> <img src="img/back.png" alt="back"/></a>
		</div>
		<div class="footer">
			<h3>Www.abc.com</h3>
		</div>
</div>
	</div>
</body>
</html>