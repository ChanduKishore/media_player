<?php 
session_start();
if(isset($_SESSION['user'])){

	header('Location:amzflip_video_tuts.php');
}


?>


<?php 
$title = 'Login';
include 'header.php';

include 'db_connect.php';


$errors =['user_name'=>'', 'password'=>'', 'login_error'=>''];
$user_data=['user_name'=>'', 'password'=>''];

// form validation

if(isset($_POST['submit'])){

	if(empty($_POST['user_name'])){
		$errors['user_name']='Enter Your Username';
	}else{
		$user_data['user_name']=htmlspecialchars($_POST['user_name']);
	}



	if(empty($_POST['password'])){
		$errors['password']='Enter Your Password ';
	}
	else{
		$user_data['password']=htmlspecialchars($_POST['password']);
		}	


// checking for errors

	 if(array_filter($errors)){
	 	//echo 'form contains errors';
	 }

	 // if no errors post the data to database
	 else{

	 	if(auth($user_data['user_name'], $user_data['password'],$conn)){

	 		$_SESSION['user']=$user_data['user_name'];
	 		$_SESSION['login']=true;
	 		header('Location:amzflip_video_tuts.php');
	 		
	 		//echo $_SESSION['user'];
	 	}else{
	 		$errors['login_error']= 'invalid username or password';
	 	}
	
 	}
 }
 ?>




 <?php

function auth($userName, $Paasword,$conn){
	$username = mysqli_real_escape_string($conn, $userName);
	 	$password =mysqli_real_escape_string($conn, $Paasword);

	 	$query = "SELECT * FROM user_data WHERE user_name='$username' AND password='$password'";
	 	//save to database

	 	$result = mysqli_query($conn, $query);
	 	

	 	// testing for query errors

	 	if($result){
	 	//echo 1;
	 	}else{
	 		echo mysqli_error($conn);
	 	}

	 	$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 


		$count = mysqli_num_rows($result); 

	 	if($count==1){

	 		 //echo 'success';
	
	 		mysqli_close($conn);
	 		return true;

	 		}
	 	else{
	 	//echo 'query error'.mysqli_error($conn);

	 	return false;

	 }

} ?>


<form action="login.php" method="post" novalidate="">
	<h2 class="center capitalize mb-2">amzflip</h2>
	<div><span class="form-error danger-text block center error-bg"><?php echo $errors['login_error'] ?></span></div>
	<div>
	<label for="user_name">Username</label>
	<input class="<?php if($errors['user_name'] || $errors['login_error']) echo 'invalid' ?>" type="text" name="user_name" id="user_name" value="<?php echo $user_data['user_name'] ?>">
	<span class="form-error danger-text"><?php echo $errors['user_name'] ?></span>
</div>

<div>
	<label for="password">Password</label>
	<input class="<?php if($errors['password'] || $errors['login_error']) echo 'invalid'?>" type="password" name="password" id="password" value="<?php echo $user_data['password'] ?>">
	<span class="form-error danger-text"><?php echo $errors['password'] ?></span>
</div>

<div>
<button class='btn-width-full success' type="submit" name="submit" value="submit
">Login</button>
</div>
`
</form>

<div class="card">
	<p class="center">Don't have an account? <a class="blue link" href="sign_up.php">Sign Up</a> </p>
</div>

</body>
</html>