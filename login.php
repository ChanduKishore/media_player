<?php 
session_start();
if(isset($_SESSION['user'])){

	header('Location:media_player.php');
}


?>


<?php 
$title = 'Login';
include 'header.php';

$user_data=['username'=>''];

if(isset($_POST['submit'])){
	$user_data['username']=htmlspecialchars($_POST['username']);
		if($_POST['username']!==''){
	 			$_SESSION['user']=$user_data['username']; 				 	
	 		 	}
	 		 	else{
	 		 		$_SESSION['user']='Stranger';		
	 		 	}
	 	$_SESSION['login']=true;
	 	header('Location:media_player.php'); 
 }
 ?>

 
<form action="login.php" method="post" novalidate="">
	<h2 class="center capitalize mb-2">Company Name</h2>
	<div>
	<label for="username">Enter your Username</label>
	<input class="<?php if($errors['username'] || $errors['login_error']) echo 'invalid' ?>" type="text" name="username" id="username" value="Stranger">
	</div>

<div>
<button class='btn-width-full success' type="submit" name="submit" value="submit
">Submit</button>
</div>
</form>

</body>
</html>