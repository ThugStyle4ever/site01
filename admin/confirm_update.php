<?php
  require('dbconnect.php');
  session_start();

  if (!isset($_SESSION['gallery'])) {
    header('Location: index.php');
    exit();
  }
  // exit(print_r($_SESSION));

  $id =  htmlspecialchars($_SESSION['gallery']['id'],ENT_QUOTES, 'UTF-8');
  $caption =  htmlspecialchars($_SESSION['gallery']['caption'],ENT_QUOTES, 'UTF-8');
  $item_name = htmlspecialchars($_SESSION['gallery']['item_name'],ENT_QUOTES, 'UTF-8');
  $old_og_img = htmlspecialchars($_SESSION['gallery']['old_og_img'],ENT_QUOTES, 'UTF-8');
  $old_thum_img = htmlspecialchars($_SESSION['gallery']['old_thum_img'],ENT_QUOTES, 'UTF-8');

  $new_og_img = isset($_SESSION['gallery']['og_img'])? $_SESSION['gallery']['og_img']:$old_og_img;
  $new_thum_img = isset($_SESSION['gallery']['thum_img'])? $_SESSION['gallery']['thum_img']:$old_thum_img;

  //DB登録処理
  if (!empty($_POST)) {
    if(isset($_SESSION['gallery']['og_img']) && isset($_SESSION['gallery']['thum_img'])){
      $sql = sprintf('UPDATE gallery SET caption="%s", og_img="%s", thum_img="%s" ,item_name="%s", remark="%s" WHERE id=%d',
      mysql_real_escape_string(str_replace("\n", "<br />",$_SESSION['gallery']['caption'])),
      mysql_real_escape_string($_SESSION['gallery']['og_img']),
      mysql_real_escape_string($_SESSION['gallery']['thum_img']),
      mysql_real_escape_string($_SESSION['gallery']['item_name']),
      mysql_real_escape_string($_SESSION['gallery']['remark']),
      mysql_real_escape_string($_SESSION['gallery']['id'])
      );
    }else{
      $sql = sprintf('UPDATE gallery SET caption="%s",item_name="%s", remark="%s" WHERE id=%d',
      mysql_real_escape_string(str_replace("\n", "<br />",$_SESSION['gallery']['caption'])),
      mysql_real_escape_string($_SESSION['gallery']['item_name']),
      mysql_real_escape_string($_SESSION['gallery']['remark']),
      mysql_real_escape_string($_SESSION['gallery']['id'])
      );
    }
    mysql_query($sql) or die(mysql_error());
    unset($_SESSION['gallery']);

    header('Location: confirm.php');
    exit();
  }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <link rel="stylesheet" type="text/css" href="../css/gridforms.css" />
  <script type="text/javascript" href="../js/gridforms.js"></script>
  <title>確認画面:update</title>
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
                <legend>Caption</legend>
                <div data-field-span="1">
                  <label><?= $caption ?></label>
                </div>
              </div>
            </fieldset>
            <br />
            <fieldset>
              <div data-row-span="1">
                <legend>Original OldFile Name → Original NewFile Name</legend>
                <div data-field-span="1">
                  <label><?= $old_og_img ?> → <?= $new_og_img ?></label>
                </div>
              </div>
              <br />
              <div data-row-span="1">
                <legend>Thumbnail OldFile Name → Thumbnail NewFile Name</legend>
                <div data-field-span="1">
                  <label>[<?= $old_thum_img ?>] → [<?= $new_thum_img ?>]</label>
                </div>
              </div>
            </fieldset>
            <br />
            <fieldset>
              <div data-row-span="1">
                <legend>Uploaded OG Image → Uploaded NewOG Image</legend>
                <div data-field-span="1">
                  <label><img src="../images/gallery/og_images/<?= $old_og_img ?>" /> →
                  <img src="../images/gallery/og_images/<?= $new_og_img ?>" /></label>
                </div>
              </div>
              <br />
              <div data-row-span="1">
                <legend>Uploaded Thumb Image → Uploaded NewThumb Image</legend>
                <div data-field-span="1">
                  <label><img src="../images/gallery/thum_images/<?= $old_thum_img ?>" /> →
                  <img src="../images/gallery/thum_images/<?= $new_thum_img ?>" /></label>
                </div>
              </div>
            </fieldset>
            <fieldset>
              <br />
              <div data-field-span="1">
                <input type="submit" value="Register for DataBase" size="100" />
              </div>
            </fieldset>
          </fieldset>
        </form>
      </div>
      <br />
  </div>
  </body>
</html>