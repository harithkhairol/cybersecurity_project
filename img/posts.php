<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Short Articles</title>
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
            <li><a href="threat.html">Threats</a></li>
            <li><a href="software-updates.html">Prevention</a></li>
            <li><a href="security.html">Security</a></li>
            <li><a href="career.html">Career</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="breadcrumb-group">
     <div class="breadtitle">Short Articles</div>

     <div class="breadright">
            <ul class="breadcrumb">
              <li>Posts</li>
            </ul>
     </div>

    </div>
    <div class="card-title" style="background-image: url(img/art.jpg); background-size: cover; background-position: right;"><h1 class="title-1">Short Articles</h1></div>


    <div class="content">
    <!--<div class="card-1" style="text-align: center;">
      <iframe width="680" height="380" align="center" src="https://www.youtube.com/embed/kJVrV2HT-s4"></iframe>
      <p style="text-align: center; padding-top: 10px;">Source: <a style="color: #000;" href="https://goo.gl/4zbsx4" target="_blank">Graham Cluley</a> </p>
    </div>-->
    <?php

    $mysqli = new Mysqli('localhost', 'root', '', 'articles');
    $resultSet = $mysqli->query("SELECT * FROM posts ORDER BY id DESC");

    while ($row = mysqli_fetch_array($resultSet, MYSQLI_ASSOC)) {

    $title = $row['title'];
    $content = $row['content'];
    $created = $row['timestamp'];

    ?>
    <div class="card-1">
      <div class="title-3"><h1 style="text-align: left;"><?php echo strip_tags($title); ?></h1></div>
      <p><?php echo strip_tags($content); ?></p>
      <p style="padding-top: 10px;"><span style="font-weight: bold;">Time Posted:</span> <?php echo strip_tags ($created); ?></p>
    </div>
    <?php
    }
    ?>

    <!--<div class="card-1">
    <p style="text-align: center;">Source: <a style="color: #000;" href="https://goo.gl/6AF9Xp" target="_blank">Chron</a> </p>
  </div>-->
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
