<?php
  require('dbconnect.php');
  session_start();
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); //php.iniによるディスプレイエラーを非表示にする

  $id = $_GET['id'];
  $sql = sprintf('SELECT * FROM gallery WHERE id=%d', mysql_real_escape_string($id));
  $recordSet = mysql_query($sql);
  $data = mysql_fetch_assoc($recordSet);

  $cap = htmlspecialchars($data['caption'], ENT_QUOTES);
  $item_name = htmlspecialchars($data['item_name'], ENT_QUOTES);
  $og_img = htmlspecialchars($data['og_img'], ENT_QUOTES);
  $thum_img = htmlspecialchars($data['thum_img'], ENT_QUOTES);

  if(!empty($_POST)){
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES,'UTF-8');
    $cap = htmlspecialchars($_POST['caption'], ENT_QUOTES,'UTF-8');
    $item_name = htmlspecialchars($_POST['item_name'], ENT_QUOTES,'UTF-8');
    $old_og_img = htmlspecialchars($_POST['old_og_img'], ENT_QUOTES);
    $old_thum_img = htmlspecialchars($_POST['old_thum_img'], ENT_QUOTES);

    $_SESSION['gallery'] = $_POST;

    if($_FILES['og_img']['name'] != '' && $_FILES['thum_img']['name'] != ''){
      //exit(print_r($_FILES));
      $og = $_FILES['og_img'];
      $thum = $_FILES['thum_img'];

      $ext_og = substr($og['name'],-4);
      $ext_thum = substr($thum['name'],-4);

      if ($ext_og == '.gif' || $ext_og == '.jpg' || $ext_og == '.png') {
        $og_newFile = $item_name. '_'. date('Y_md_His'). $ext_og; //EX）er_2013_1225_0945.jpg
        $og_filePath = '../images/gallery/og_images/'. $og_newFile;
        move_uploaded_file($og['tmp_name'], $og_filePath);
      }else{
        echo '＊拡張子が[.gif] [.jpg] [.png] のファイルのみアップロード可能';
      }

      if ($ext_thm == '.gif' || $ext_thum == '.jpg' || $ext_thum == '.png') {
        $thum_newFile = $item_name. '_'.'thumb'. '_'. date('Y_md_His'). $ext_thum; //EX) er_thum_2013_1225_1410.jpg
        $thum_filePath = '../images/gallery/thum_images/'. $thum_newFile;
        move_uploaded_file($thum['tmp_name'], $thum_filePath);
      }else{
        echo '＊拡張子が[.gif] [.jpg] [.png] のファイルのみアップロード可能';
      }
      $_SESSION['gallery']['og_img'] = $og_newFile;
      $_SESSION['gallery']['thum_img'] = $thum_newFile;

    }
    // exit(print_r($_SESSION['gallery']));
    header('Location: confirm_update.php');
    exit();
  }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <link rel="stylesheet" type="text/css" href="../css/gridforms.css" />

  <title>DB変更</title>
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
          <form class="grid-form" action="update.php" method="post" enctype="multipart/form-data">

            <fieldset id="margin">
              <br />
              <fieldset>
                <div data-row-span="1">
                  <legend>Caption</legend>
                  <div data-field-span="1">
                    <label>Input New Caption</label>
                    <div>
                    <input name="id" type="hidden" value="<?= $id ?>" />
                    <textarea name="caption" id="caption" cols="35" rows="3" autofocus　value="" ><?= $cap ?></textarea>
                    </div>
                  </div>
                </div>
              </fieldset>

              <br />

              <fieldset>
              <div data-row-span="1">
                <legend>Item Name</legend>
                <div data-field-span="1">
                  <label>Select Type</label>
                  <div>
                  <label for="mr">
                    <input name="item_name" type="radio" id="mr" value="mr"<?= $item_name == 'mr'? 'checked="checked"' : '' ; ?> />Marriage</label>
                  </div>
                  <div>
                  <label for="er">
                    <input name="item_name" type="radio" id="er" value="er"<?= $item_name == 'er'? 'checked="checked"' : '' ; ?> />Engage</label>
                  </div>
                  <div>
                  <label for="pr">
                    <input name="item_name" type="radio" id="pr" value="pr"<?= $item_name == 'pr'? 'checked="checked"' : '' ; ?> />Pair</label>
                  </div>
                  <div>
                  <label for="or">
                    <input name="item_name" type="radio" id="or" value="or"<?= $item_name == 'or'? 'checked="checked"' : '' ; ?> />Order</label>
                  </div>
                </div>
              </div>
            </fieldset>

              <br />

              <fieldset>
                <div data-row-span="2">
                  <legend>Select Image</legend>
                  <div data-field-span="1">
                    <img src="../images/gallery/og_images/<?= $og_img ?>" alt="" width="100" height="70" />
                  </div>
                  <div data-field-span="1">
                    <label>Please choose the Original Image to change.</label>
                    <input name="og_img" type="file" id="og_img" />
                    <input name="old_og_img" type="hidden" value="<?= $og_img ?>" />
                  </div>
                </div>
                <div data-row-span="2">
                  <div data-field-span="1">
                    <img src="../images/gallery/thum_images/<?= $thum_img ?>" alt="" width="100" height="70" />
                  </div>
                  <div data-field-span="1">
                    <label>Please choose the Thumbnail Image to change.</label>
                    <input name="thum_img" type="file" id="thum_img" />
                    <input name="old_thum_img" type="hidden" value="<?= $thum_img ?>" />
                  </div>
                </div>
                </fieldset>

                <div data-row-span="2">
                  <div data-field-span="1">
                    <label>&nbsp;</label>
                  </div>
                  <div data-field-span="1">
                    <input type="submit" value="UPDATE" />
                  </div>
                </div>
              </fieldset>
              <fieldset>
              </fieldset>
            </fieldset>
          </form>
        </div>
        <br />
    </div>
  </body>
</html>