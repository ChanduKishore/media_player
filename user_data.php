
<?php  
$title= 'user data';
include 'header.php';
?>
<?php

//user data.php

include 'db_connect.php';
session_start();
if(isset($_SESSION['login'])){
if($_SESSION['user'] != 'dinesh' and $_SESSION['user'] != 'chandu'){
	die('Error 404: page not found');
}
}
else{header('location:login.php');}


// making query

$query = 'SELECT * FROM user_data';

$result = mysqli_query($conn, $query);

// fetching results

$userAccounts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//close db
mysqli_close($conn);

// display user data 
?>
<table>
<tr>
	<th>Id</th>
	<th>Email</th>
	<th>Username</th>
	<th>Password</th>
</tr>

<?php foreach($userAccounts  as $account):?>

	<tr>
		<?php foreach($account as $label=>$user): ?>
		<td> <?php echo $user.'<br>'?>
		<?php endforeach; ?>
	</tr>

<?php endforeach; ?>
<caption>User Database</caption>	
</table>
</body>
</html>