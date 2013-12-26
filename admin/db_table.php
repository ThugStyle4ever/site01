<?php
  require('dbconnect.php');
  session_start();
  $recordSet = mysql_query('SELECT * FROM gallery ORDER BY id DESC ');
  if(isset($_SESSION['gallery'])){
    unset($_SESSION['gallery']);
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <link rel="stylesheet" type="text/css" href="../css/gridforms.css" />
  <script type="text/javascript" href="../js/gridforms.js"></script>
  <title>画像一覧</title>
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
  <div id="db_table">
    <table>
      <tr>
        <th>ID</th>
        <th>Caption</th>
        <th>Original Image</th>
        <th>thumbnail Image</th>
        <th>Upload Date</th>
        <th>Delete / Update</th>
      </tr>
    <?php
      while ($table = mysql_fetch_assoc($recordSet)) {
         $id = htmlspecialchars($table['id']);
         $cap = htmlspecialchars($table['caption']);
         $og = htmlspecialchars($table['og_img']);
         $thum = htmlspecialchars($table['thum_img']);
         $item_name = htmlspecialchars($table['item_name']);
         $up = htmlspecialchars($table['upload_date']);
    ?>
      <tr>
        <td><a href="<?= $id ?>" class="id"><?= $id ?></a></td>
        <td nowrap><?= $cap ?></td>
        <td class="float"><a href="#"><img src="../images/gallery/og_images/<?= $table['og_img']; ?>" alt="" width="150" height="150" /></a><br /><?= $og ?></td>
        <td class="float"><a href="#"><img src="../images/gallery/thum_images/<?= $table['thum_img']; ?>" alt="" width="150" height="150" /></a><br /><?= $thum ?></td>
        <td nowrap><?= $up ?></td>
        <td><a href="./update.php?id=<?= $id ?>">Update</a>&nbsp;&nbsp;
            <a href="./delete_done.php?id=<?= $id ?>" onclick="return confirm('Really??');">Delete</a></td>
      </tr>
    <?php
    }
    ?>
    </table>
  </div>
  </body>
</html>