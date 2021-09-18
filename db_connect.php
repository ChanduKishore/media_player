?php

// database credentials
/*
$host='sql6.freemysqlhosting.net';
$userName= 'sql6434745';
$password= 'nxXGBYGF7N;
$dbName ='sql6434745';
*/

// initilizing to database 

$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6434745', 'nxXGBYGF7N', 'sql6434745');
//$conn = mysqli_connect('localhost','chandu', 'chandu12365', 'users');


// checking db connection 

if (!$conn){
	echo 'database connection failed: '.mysqli_connect_error();
}
//else{echo 'database connection succesfull';}
?>