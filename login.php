<?php 
session_start();
if(isset($_SESSION['user'])){

	header('Location:amzflip_video_tuts.php');
}


?>


<?php 
$title = 'Login';
include 'header.php';




$user_data=['user_name'=>'', 'password'=>''];

// form validation

if(isset($_POST['submit'])){

	 		$_SESSION['user']=$user_data['user_name'];
	 		$_SESSION['login']=true;
	 		header('Location:amzflip_video_tuts.php');
	 		 	
 	
 }
 ?>

 
<form action="login.php" method="post" novalidate="">
	<h2 class="center capitalize mb-2">amzflip</h2>
	<div><span class="form-error danger-text block center error-bg"><?php echo $errors['login_error'] ?></span></div>
	<div>
	<label for="user_name">Enter your Username</label>
	<input class="<?php if($errors['user_name'] || $errors['login_error']) echo 'invalid' ?>" type="text" name="user_name" id="user_name" value="<?php echo $user_data['user_name'] ?>">
	<span class="form-error danger-text"><?php echo $errors['user_name'] ?></span>
</div>



<div>
<button class='btn-width-full success' type="submit" name="submit" value="submit
">Submit</button>
</div>
`
</form>

<div class="card">
	<p class="center">Don't have an account? <a class="blue link" href="sign_up.php">Sign Up</a> </p>
</div>

</body>
</html>