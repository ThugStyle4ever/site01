<?php
  require('dbconnect.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <link rel="stylesheet" type="text/css" href="../css/gridforms.css" />
  <script type="text/javascript" href="../js/gridforms.js"></script>
  <title>管理ページ</title>
  <meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
  </head>
  <body>

  <div id="topBar">
  </div>

  <div id="logo">
    <a href="../index.html"><img src="../images/top_logo.gif" alt="logo" /></a>
  </div>

  <div id="topNav" style="left:560px;" >
    <img src="../images/nav_01.gif" alt="home" />
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
      <p id="upload">GALLERY 画像アップロード</p>
        <form id="" name="" method="post" action="" class="grid-form">
          <dl>
            <dt>
              <label for="caption">キャプション</label>
            </dt>
            <dd>
              <textarea name="caption" id="caption" cols="35" rows="3"></textarea>
            </dd>
            <p></p>
            <dt>
              <label for="item_name">アイテム名</label>
            </dt>
            <dd>
              <input name="item_name" type="radio" id="mr" value="mr" /><label for="mr">マリッジリング</label>
              <input name="item_name" type="radio" id="er" value="er" /><label for="er">エンゲージリング</label>
              <input name="item_name" type="radio" id="pr" value="pr" /><label for="pr">ペアリング</label>
              <input name="item_name" type="radio" id="or" value="or" /><label for="or">オーダーメイド</label>
            </dd>
            <p></p>
            <dt>
              <label for="hoge">hoge</label>
            </dt>
            <dd>
              <input name="hoge" type="text" id="hoge" size="10" maxlength="10" />
            </dd>
            <p></p>
            <dt>
              <label for="upload">画像を選択</label>
            </dt>
            <p></p>
            <dd>
              <input name="upload" type="file" id="upload" />
            </dd>
            <p></p>
            <dd>
            <input type="submit" value="UPLOAD" />
            </dd>
          </dl>
        </form>
      </div>
      <br />
  <div>
      <p id="afooter">Copyright&nbsp;&copy;&nbsp;2013&nbsp;*s&amp;s+design*&nbsp;All&nbsp;Rights&nbsp;Reserved.<br />
    :)</p>
  </div>

  </div>
  </body>
</html>