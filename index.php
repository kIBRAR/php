<?php 
session_start();
require_once"functions.php";
$user =new LoginRegistration();
$uid = $_SESSION['uid'];
$username = $_SESSION['uname']; 
if (!$user->getSession())
	{ header('location:login.php');
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
					
		<p class="login_msg">
			<?php 

				if (isset($_SESSION['login_msg'])) {
					echo $_SESSION['login_msg'];
					unset($_SESSION['login_msg']);
				}

			?>
			
		</p>
		<h2>Welcome,<?php echo $username; ?></h2>
		<p class="userlist"> All User list</p>
		<table class"tableOne">
			<tr>
				<th>Serial</th>
				<th>Name</th>
				<th>Profile</th>
			</tr>

			<?php
				$i=0;
			 $alluser = $user->getAlluser();
			foreach ($alluser as $user) {
				$i++;
			

			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo$user['name'];?></td>
				<td><a href="userProfile.php?id=<?php echo $user['id']?>">View Details </a> </td>
			</tr>
				<?php } ?>
		</table>
		
		<div class="footer">
			<h3>Www.abc.com</h3>
		</div>
</div>
	</div>
</body>
</html>