

<?php 
$title = 'sign up';
include 'header.php';

include 'db_connect.php';


$errors =['user_name'=>'', 'email'=>'', 'password1'=>'', 'password2'=>''];
$user_data=['user_name'=>'', 'email'=>'', 'password1'=>'', 'password2'=>''];

// form validation

if(isset($_POST['submit'])){

	if(empty($_POST['user_name'])){
		$errors['user_name']='Username required';
	}else{
		$user_data['user_name']=htmlspecialchars($_POST['user_name']);
	}


	if(empty($_POST['email'])){
		$errors['email']='Email required';
	}else{
		$user_data['email']=htmlspecialchars($_POST['email']);
		if (!filter_var($user_data['email'], FILTER_VALIDATE_EMAIL)){
			$errors['email']='Enter a valid email address';
		}
	}


	if(empty($_POST['password'])){
		$errors['password1']='Password required';
	}else{
		$user_data['password1']=htmlspecialchars($_POST['password']);
		if(strlen($user_data['password1'])<8){
			$errors['password1']='Password too short';
		}

	if(empty($_POST['confirm_password'])){
		$errors['password2']='Confirm Password ';
	}else{
		$user_data['password2']=htmlspecialchars($_POST['confirm_password']);

		if($_POST['password'] !== $_POST['confirm_password']){
			$errors['password2']= 'Password don\'t match';
		}
		}

		
	}


// checking for errors

	 if(array_filter($errors)){
	 	//echo 'form contains errors';
	 }

	 // if no errors post the data to database
	 else{
	 	
	 	$username = mysqli_real_escape_string($conn, $user_data['user_name']);
	 	$email = mysqli_real_escape_string($conn, $user_data['email']);
	 	$password =mysqli_real_escape_string($conn, $user_data['password1']);

	 	$query = "INSERT INTO user_data ( user_name, email, password) VALUES ('$username','$email', '$password') ";
	 	//save to database
	 	

	 	if(mysqli_query($conn, $query)){
	 		 //echo 'success';
	 		header('Location: login.php');

	 		mysqli_close($conn);

	 		}
	 	else{echo 'query error'.mysqli_error($conn);}

 	}
 }
 ?>

<form action="sign_up.php" method="post" novalidate="">
	<h2 class="center capitalize"> sign up</h2>
	<div>
	<label for="user_name">Username</label>
	<input class="<?php if($errors['user_name']) echo 'invalid' ?>" type="text" name="user_name" id="user_name" value="<?php echo $user_data['user_name'] ?>">
	<span class="form-error danger-text"><?php echo $errors['user_name'] ?></span>
</div>

<div>
	<label for="email">Email</label>
	<input class="<?php if($errors['email']) echo 'invalid'?>" type="email" name="email" id="email" value="<?php echo $user_data['email'] ?>">
	<span class="form-error danger-text"><?php echo $errors['email'] ?></span>
</div>

<div>
	<label for="password">Password</label>
	<input class="<?php if($errors['password1']) echo 'invalid'?>" type="password" name="password" id="password" value="<?php echo $user_data['password1'] ?>">
	<span class="form-error danger-text"><?php echo $errors['password1'] ?></span>
</div>

<div>
	<label for="confirm_password"> Confirm Password</label>
	<input class="<?php if($errors['password2']) echo 'invalid'?>" type="password" name="confirm_password" id="confirm_password" value="<?php echo $user_data['password2'] ?>">
	<span class="form-error danger-text"><?php echo $errors['password2'] ?></span>
</div>

<div>
<button class='btn-width-full success' type="submit" name="submit" value="submit
" >Sign up</button>
</div>
`
</form>
<div class="card">
	<p class="center">Have an account? <a class="blue link" href="login.php">Login</a> </p>
</div>


</body>
</html>