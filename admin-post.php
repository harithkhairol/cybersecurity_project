<?php

	session_start();
	if (isset($_SESSION["admin"])) {
	}
	else {
		header('Location: admin-login.php');
	}

?>
<?php

$output = NULL;
$soutput = NULL;

if (isset($_POST['submit'])){
	//connect to database
	$mysqli = new Mysqli('localhost', 'root', '', 'articles');

	//real_escape_string to prevent sql injection
	$title = $mysqli->real_escape_string ($_POST['title']);
	$content = $mysqli->real_escape_string ($_POST['content']);

	//insert record
	$insert = $mysqli->query ("INSERT INTO posts (title, content) VALUES('$title', '$content')");

			if ($insert != TRUE) {
				$output = "A problem occured with post<br />";
				$output .= $mysqli->error;
			}
			else {
				$soutput = "Article is succesfully posted";
			}
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
    <title>Admin Profile</title>
  </head>
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
				<h2 style="padding-bottom: 20px;">Post an Article</h2>
				<center>
				<?php echo "<span style='color: #FF0000; position: relative; top: -15px;'>".$output."</span>"; ?><?php echo "<span style='color: #32CD32; position: relative; top: -15px;'>".$soutput."</span>"; ?>
				</center>
					<form id="formstyle" method="POST" autocomplete="off">
						<div class="row">
							<div>
								<input type='text' placeholder='Title' name='title' minlength='5' maxlength='50' required>
							</div>
						</div>
						<div class="row">
							<div>
								<textarea name='content' rows='8' cols='82' maxlength='2000' minlength='20' required></textarea>
							</div>
						</div>
						<div class="row">
							<input type="submit" id="submit" name="submit" value="Go!">
						</div>
					</form>
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
