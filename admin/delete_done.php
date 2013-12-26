<?php
  require('dbconnect.php');

  $sql = sprintf('DELETE FROM gallery WHERE id=%d', mysql_real_escape_string($_GET['id']));
  mysql_query($sql) or die(mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <link rel="stylesheet" type="text/css" href="../css/gridforms.css" />
  <script type="text/javascript" href="../js/gridforms.js"></script>
  <title>削除完了</title>
  </head>
  <body>

  <div id="topBar">
  </div>

  <div id="logo">
    <a href="../index.html"><img src="../images/top_logo.gif" alt="logo" /></a>
  </div>

  <div id="topNav" style="left:560px;" >
    <a href="../index.html"><img src="../images/nav_01.gif" alt="home" /></a>
  </div>
  <div id="topNav" style="left:643px;" >
    <a href="#"><img src="../images/nav_02.gif" alt="works" /></a>
  </div>
  <div id="topNav" style="left:727px;" >
    <a href="../making/making.html"><img src="../images/nav_03.gif" alt="making" /></a>
  </div>
  <div id="topNav" style="left:810px;" >
    <a href="../making/about.html"><img src="../images/nav_04.gif" alt="about" /></a>
  </div>
  <div id="topNav" style="left:893px;" >
    <a href="../making/formoid.com:thugstyleforever@gmail.com:6912.html"><img src="../images/nav_05.gif" alt="contact" /></a>
  </div>
  <div id="topNav" style="left:977px;" >
    <a href="../sitemap.html"><img src="../images/nav_06.gif" alt="sitemap" /></a>
  </div>
  <div id="upload">
    <form action="" method="post" class="grid-form">
      <input type="hidden" name="action" value="submit" />
      <fieldset>
        <br />
        <fieldset>
          <div data-row-span="1">
            <legend>Congratulations!</legend>
            <div data-field-span="1">
              <label>Sucecss!! Deleted!!</label>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <br />
          <div data-field-span="1">
            <a href="db_table.php" class="css_btn_class">Back</a>
          </div>
          <br />
        </fieldset>
      </fieldset>
    </div>
  </body>
</html>