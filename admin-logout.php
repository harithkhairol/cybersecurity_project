<?php

session_start();
if(isset($_SESSION['admin'])){
  header('location: admin-profile.php');
}


?>

<?php

session_start();
unset($_SESSION["admin"]);
session_destroy();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <title>Admin Login</title>
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
          <a href="index.html">CYBERSECURITY</a>
        </div>
        <div class="nav-wrapper">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="history.html">History</a></li>
            <li><a href="dos.html">Threats</a></li>
            <li><a href="software-updates.html">Prevention</a></li>
            <li><a href="security.html">Security</a></li>
            <li><a href="career.html">Career</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="breadcrumb-group">
     <div class="breadtitle">ADMIN</div>

     <div class="breadright">
            <ul class="breadcrumb">
                  </ul>
     </div>

    </div>
    <div class="content">
    <div class="card-1">
      <h2 style="padding-bottom: 20px;">Admin Privilege</h2>

      <center>
      <?php echo "<span style='color: #FF0000; position: relative; top: -15px;'>".$output."</span>"; ?>
      </center>

        <form id="formstyle" method="POST" autocomplete="off">
          <div class="row">
            <div class="col-75">
              <input type="text" id="username" name="username" placeholder="Username">
            </div>
          </div>
          <div class="row">
            <div class="col-75">
              <input type="password" id="password" name="password" placeholder="Password">
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
