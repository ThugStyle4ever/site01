<?php
  require('dbconnect.php');
  session_start();

  if (!isset($_SESSION['gallery'])) {
    header('Location: index.php');
    exit();
  }

  //DB登録処理
  if (!empty($_POST)) {
    $sql = sprintf('INSERT INTO gallery SET caption=');
  }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <link rel="stylesheet" type="text/css" href="../css/gridforms.css" />
  <script type="text/javascript" href="../js/gridforms.js"></script>
  <title>確認画面</title>
  <meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
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
          <fieldset>
            <br /><br />
            <fieldset>
              <div data-row-span="1">
                <legend>Caption</legend>
                <div data-field-span="1">
                  <label><?= htmlspecialchars($_SESSION['gallery']['caption'],ENT_QUOTES, 'UTF-8'); ?>入力したキャプション</label>
                </div>
              </div>
            </fieldset>
            <br />
            <fieldset>
              <div data-row-span="1">
                <legend>Original File Name</legend>
                <div data-field-span="1">
                  <label><?= $_SESSION['gallery']['og_img'] ?>アップロードしたオリジナルファイル名</label>
                </div>
              </div>
              <br />
              <div data-row-span="1">
                <legend>Thumbnail File Name</legend>
                <div data-field-span="1">
                  <label><?= $_SESSION['gallery']['thum_img'] ?>アップロードしたサムネイルファイル名</label>
                </div>
              </div>
            </fieldset>
            <br />
            <fieldset>
              <div data-row-span="1">
                <legend>Uploaded OG Image</legend>
                <div data-field-span="1">
                  <label><img src="../images/og_images/<?= $_SESSION['gallery']['og_img'] ?>" />アップロードしたオリジナル画像を表示</label>
                </div>
              </div>
              <br />
              <div data-row-span="1">
                <legend>Uploaded Thumb Image</legend>
                <div data-field-span="1">
                  <label><img src="../images/thum_images/<?= $_SESSION['gallery']['thum_img'] ?>" />アップロードしたサムネイル画像を表示</label>
                </div>
              </div>
            </fieldset>
              <div data-field-span="1">
                <input type="submit" value="DBに登録する" />
              </div>
          </fieldset>
        </form>
      </div>
      <br />
  </div>
  </body>
</html>