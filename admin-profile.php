<?php

	session_start();
	if (isset($_SESSION["admin"])) {
	}
	else {
		header('Location: admin-login.php');
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
            <li><a class="active" href="admin-profile.php">Profile</a></li>
						<li><a href="admin-post.php">Post Article</a></li>
            <li><a href="admin-logout.php" onclick="return confirm('Are you sure?')" >Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="breadcrumb-group">
     <div class="breadtitle">ADMIN</div>

     <div class="breadright">
            <ul class="breadcrumb">
								<li>Profile</li>
            </ul>
     </div>

    </div>
    <!--<div class="card-title">

        <h1 class="title-1">THREATS?</h1>

    </div>-->
  	<div class="content">
	    <div class="card-1">
				<table id="myTable" class="usertab">
		        <caption>Posted Article</caption>
		          <thead>
		                      <tr>
		                          <th class='style'>No.</th>
		                          <th class='style'>Title</th>
		                          <th class='style'>Created</th>
		                          <th class='style'>Action</th>
		                      </tr>
		          </thead>
		          <tbody class="art">

		                      <?php

		                      $mysqli = new Mysqli('localhost', 'root', '', 'articles');
		                      $resultSet = $mysqli->query("SELECT * FROM posts");

		                      $i = 1;

		                      while ($row = mysqli_fetch_array($resultSet, MYSQLI_ASSOC)) {

		                      $title = $row['title'];
		                      $created = $row['timestamp'];
		                      $id = $row['id'];

		                      ?>
		                      <tr>
		                          <td scope="row" data-label="No."><?php echo strip_tags($i); ?></td>
		                          <td data-label="title"><?php echo strip_tags($title); ?></td>
		                          <td data-label="created"><?php echo strip_tags ($created); ?></td>
		                          <td>
		                              <a class="hyperclass delstyle" href="admin-profile.php?deleteart=<?php echo strip_tags($id); ?>"onclick="return confirm('Are you sure?')" >Delete</a>
		                          </td>
		                      </tr>
		          </tbody>
		                      <?php

		                      $i++;

		                      }
		                      if (isset($_GET['deleteart'])) {

		                        $delete = $_GET['deleteart'];

		                        $mysqli = new Mysqli('localhost', 'root', '', 'articles');
		                        $resultSet = $mysqli->query("DELETE FROM posts WHERE id='$delete'");

		                        $URL="admin-profile.php";
		                        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
		                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

		                }
		              ?>

		    </table>
	    </div>

			<div class="card-1">
				<table id="myTable" class="usertab">
		        <caption>All Images</caption>
		          <thead>
		                      <tr>
		                          <th class='style'>ID</th>
		                          <th class='style'>PAGE</th>
		                          <th class='style'>IMAGE</th>
		                          <th class='style'>Action</th>
		                      </tr>
		          </thead>
		          <tbody class="art">

		                      <?php

		                      $mysqli = new Mysqli('localhost', 'root', '', 'articles');
		                      $resultSet = $mysqli->query("SELECT * FROM images");

		                      $i = 1;

		                      while ($row = mysqli_fetch_array($resultSet, MYSQLI_ASSOC)) {

		                      $id = $row['id'];
		                      $page = $row['page'];
		                      $image = $row['image'];

		                      ?>
		                      <tr>
		                          <td scope="row" data-label="No."><?php echo strip_tags($id); ?></td>
		                          <td data-label="title"><?php echo strip_tags($page); ?></td>
		                          <td data-label="created"><img src="<?php echo strip_tags($image);?>" style="width:100%; height:10%;"></td>
		                          <td>
		                              <a class="hyperclass delstyle" href="admin-image.php?id=<?php echo strip_tags($id); ?>">Update</a>
		                          </td>
		                      </tr>
		          </tbody>
		                      <?php

		                      $i++;

		                      }
		                      if (isset($_GET['deleteart'])) {

		                        $delete = $_GET['deleteart'];

		                        $mysqli = new Mysqli('localhost', 'root', '', 'articles');
		                        $resultSet = $mysqli->query("DELETE FROM posts WHERE id='$delete'");

		                        $URL="admin-profile.php";
		                        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
		                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

		                }
		              ?>

		    </table>
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
