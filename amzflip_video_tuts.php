<!DOCTYPE html>
<?php  

session_start();

session_regenerate_id();
if(!isset($_SESSION['login'])){
header('location:login.php');

}

// logout 
 if(isset($_POST['logout'])){
  $_SESSION['login']= false;
  header('Location:login.php');
  session_destroy();
 }

?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
   	<title>amzflip tuts </title>
    <link rel="stylesheet" type="text/css" href="sheet.css">
    <script type="text/javascript" src="script.js" defer></script>
</head>
<body>

<header class="flex space_between pr-2  ">
  <h2 class="brand capitalize white   ml-3">amzflip</h2>
<div class=" flex">
<p class="user_logo" user-name="<?php echo $_SESSION['user']?>" ><?php echo $_SESSION['user'][0] ?></p>
<form class="logout" method="post" action="amzflip_video_tuts.php"><input class=" fs-1-2 btn white" type="submit" value="Exit" name="logout" ></form>
</div>
	
</header>
    <main>
       
      <section >
        <div>
        <iframe allowtransparency="true" title="amzflip_video_tuts" allowfullscreen frameborder="0" scrolling="no" src="" width="400" height="225"> video iframe </iframe>
        <p class="video-title">video title</p>
      </div>
      </section>

      <aside >
        <div class="select_wrapper">
        <select>
          <option value="module1">Marvel New Movie Trailers</option>
          <option value="module2">Bollywood New Release</option>
          <option value="module3">Telugu Latest Release</option>        
        </select>
      </div>
        <div class="aside_content"></div>
      </aside>
    </main>

</body>

  </script>
</html>