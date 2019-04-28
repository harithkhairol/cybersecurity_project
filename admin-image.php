<?php

	session_start();
	if (isset($_SESSION["admin"])) {
	}
	else {
		header('Location: admin-login.php');
	}

//connect to database
$mysqli = new Mysqli('localhost', 'root', '', 'articles');
$getid=$_GET['id'];
$resultSet = $mysqli->query("SELECT * FROM images WHERE id='$getid'");

while ($row = mysqli_fetch_array($resultSet, MYSQLI_ASSOC)) {
	$page = $row['page'];
	$image = $row['image'];
}

$output = NULL;
$soutput = NULL;
error_reporting(0);

if (isset($_POST['submit'])){

	$status = 1;
	$file = $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$path = "img/".$file;
	$file1 = explode(".",$file);
	$ext = $file1[1];
	$allowed = array("jpg","png","gif","wmv");

	if(in_array($ext,$allowed))
	{
		move_uploaded_file($tmp_name,$path);
		$insert = $mysqli->query ("UPDATE images SET image='$path' WHERE id='$getid'");
		$soutput = "Image is succesfully updated.";
		echo "<script>window.setTimeout(function(){
        	window.location.href = 'admin-profile.php';
					}, 3000);</script>";
	}
	else{
		$output = "A problem occured with image.<br/>";
		$output .= $mysqli->error;
		echo "<script>window.setTimeout(function(){
        	window.location.href = 'admin-profile.php';
					}, 3000);</script>";
	}
}
else{
	$status = 2;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
		<script src="alert/dist/sweetalert-dev.js"></script>
    <title>Admin Profile</title>
  </head>
	<style>
	.alert {
	  padding: 20px;
	  background-color: #f44336;
	  color: white;
	  opacity: 1;
	  transition: opacity 0.6s;
	  margin-bottom: 15px;
	}

	.alert.success {background-color: #4CAF50;}
	.alert.info {background-color: #2196F3;}
	.alert.warning {background-color: #ff9800;}

	.closebtn {
	  margin-left: 15px;
	  color: white;
	  font-weight: bold;
	  float: right;
	  font-size: 22px;
	  line-height: 20px;
	  cursor: pointer;
	  transition: 0.3s;
	}

	.closebtn:hover {
	  color: black;
	}
	</style>
  <body>
    <div class="container">
      <nav>
        <input type="checkbox" id="nav" class="hidden">
        <label for="nav" class="nav-btn">
          <i></i>
          <i></i>
          <i></i>
        </label>
				<a href="index.html"><img src="img/badge-b.png" alt="cyber_security" style="float: left; width: 25px; margin-left: 19px; margin-top: 14px"></a>
        <div class="logo">
          <a href="admin-profile.php">CYBERSECURITY</a>
        </div>
        <div class="nav-wrapper">
          <ul>
            <li><a href="admin-profile.php">Profile</a></li>
						<li><a class="active" href="admin-post.php">Post Article</a></li>
            <li><a href="admin-logout.php" onclick="return confirm('Are you sure?')" >Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="breadcrumb-group">
     <div class="breadtitle">ADMIN</div>

     <div class="breadright">
            <ul class="breadcrumb">
								<li><a href="admin-profile.php">Profile</a></li>
								<li>Post Article</li>
            </ul>
     </div>

    </div>



    <!--<div class="card-title">

        <h1 class="title-1">THREATS?</h1>

    </div>-->

  	<div class="content">
	    <div class="card-1">
				<h2 style="padding-bottom: 20px;">Change Image</h2>
				<center>
					<?php echo "<span style='color: #FF0000; position: relative; top: -15px;'>".$output."</span>"; ?><?php echo "<span style='color: #32CD32; position: relative; top: -15px;'>".$soutput."</span>"; ?>
				</center>
				<?php if($status == 2){?>
					<div style="display: block;">
						<form id="formstyle" method="POST" autocomplete="off" enctype="multipart/form-data">
							<div class="row">
								<div>
									<input type='text' placeholder='Page: <?php echo strip_tags($page); ?>' name='title' minlength='5' maxlength='50'>
								</div>
							</div>
							<div class="row">
								<div>
									<img src="<?php echo strip_tags ($image); ?>" style="width:550px; height:10%;"><br>
									<input type="file" name="file">
								</div>
							</div>
							<div class="row">
								<input type="submit" id="submit" name="submit" value="Go!">
							</div>
						</form>
					</div>
				<?php } else{ ?>
					<div style="display: none;">
						<form id="formstyle" method="POST" autocomplete="off" enctype="multipart/form-data">
							<div class="row">
								<div>
									<input type='text' placeholder='Page: <?php echo strip_tags($page); ?>' name='title' minlength='5' maxlength='50'>
								</div>
							</div>
							<div class="row">
								<div>
									<img src="<?php echo strip_tags ($image); ?>" style="width:550px; height:10%;"><br>
									<input type="file" name="file">
								</div>
							</div>
							<div class="row">
								<input type="submit" id="submit" name="submit" value="Go!">
							</div>
						</form>
					</div>
				<?php }?>
				</div>
	    </div>
    </div>
		<div class="footer">
        <div class="contain">
          <div class="col"></div>
          <div class="col">
            <h1>Threats</h1>
              <ul>
                <li><a href="dos.html">DDOS</a></li>
                <li><a href="malware.html">Malware</a></li>
                <li><a href="sql-injection.html">SQL Injection</a></li>
                <li><a href="phishing.html">Phishing</a></li>
              </ul>
          </div>
          <div class="col">
            <h1>Prevention</h1>
            <ul>
              <li><a href="software-updates.html">Software Updates</a></li>
              <li><a href="password-change.html">Password Change</a></li>
              <li><a href="data-backup.html">Data Backup</a></li>
              <li><a href="unweb.html">Untrusted Websites</a></li>
            </ul>
          </div>
          <div class="col">
            <h1>Security</h1>
            <ul>
              <li><a href="firewall.html">Firewall</a></li>
              <li><a href="antivirus.html">Antivirus</a></li>
              <li><a href="sandbox.html">Sandbox</a></li>
              <li><a href="crypto.html">Cryptographic Software</a></li>
            </ul>
          </div>
          <div class="col social">
            <p style="color: #fff; padding: 20px 0px 5px 0px;">&copy; By Ninja Turtle</p>
            <ul>
              <li><img src="img/badge-w.png" width="32" style="width: 32px;"></li>
            </ul>
          </div>
          <div class="col"></div>
          <div class="clearfix"></div>
          </div>
    </div>
  </body>
  <script src="js/script.js"></script>
</html>
