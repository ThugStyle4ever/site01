<?php
  require('dbconnect.php');
  session_start();
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

  if(!empty($_POST)){

    $cap = htmlspecialchars($_POST['caption'], ENT_QUOTES,'UTF-8');
    $item_name = htmlspecialchars($_POST['item_name'], ENT_QUOTES,'UTF-8');
    $og = $_FILES['og_img'];
    $thum = $_FILES['thum_img'];

    //$ogflag = 0;
    //$thumflag = 0;

    if (empty($item_name)) {
      $error['item_naame'] = '<p class="err">いずれかを選択してください。</p>';
    }

    switch($og['error']){
      case UPLOAD_ERR_OK:
        $ext_og = substr($og['name'],-4);
        if ($ext_og == '.gif' || $ext_og == '.jpg' || $ext_og == '.png') {
          $og_newFile = $item_name. '_'. date('Y_md_His'). $ext_og; //EX）er_2013_1225_0945.jpg
          $og_filePath = '../images/gallery/og_images/'. $og_newFile;
          //$ogflag = 1;
        }else{
          $error['og_img'] = '<p class="err">＊拡張子が[.gif] [.jpg] [.png] のファイルのみアップロード可能</p>';
        }
        break;
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        $error['og_img'] ='<p class="err">サイズが1MBを超えています。</p>';
        break;
      case UPLOAD_ERR_PARTIAL:
        $error['og_img'] = '<p class="err">ファイル送信が中断、もしくは壊れています。</p>';
        break;
      case UPLOAD_ERR_NO_FILE:
        $error['og_img'] = '<p class="err">アップロードする画像を必ず指定してください。</p>';
        break;
      default:
        $error['og_img'] = '<p class="err">不明なエラーです。</p>';
        break;
    }
    switch($thum['error']){
      case UPLOAD_ERR_OK:
        $ext_thum = substr($thum['name'],-4);

        if ($ext_thm == '.gif' || $ext_thum == '.jpg' || $ext_thum == '.png') {
          $thum_newFile = $item_name. '_'.'thumb'. '_'. date('Y_md_His'). $ext_thum; //EX) er_thum_2013_1225_1410.jpg
          $thum_filePath = '../images/gallery/thum_images/'. $thum_newFile;
          //$thumflag = 1;
        }else{
          $error['thum_img'] = '<p class="err">＊拡張子が[.gif] [.jpg] [.png] のファイルのみアップロード可能</p>';
        }
        break;
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        $error['thum_img'] ='<p class="err">サイズが1MBを超えています。</p>';
        break;
      case UPLOAD_ERR_PARTIAL:
        $error['thum_img'] = '<p class="err">ファイル送信が中断、もしくは壊れています。</p>';
        break;
      case UPLOAD_ERR_NO_FILE:
        $error['thum_img'] = '<p class="err">アップロードする画像を必ず指定してください。</p>';
        break;
      default:
        $error['thum_img'] = '<p class="err">不明なエラーです。</p>';
        break;
    }

    $_SESSION['gallery'] = $_POST;
    $_SESSION['gallery']['og_img'] = $og_newFile;
    $_SESSION['gallery']['thum_img'] = $thum_newFile;

    if(empty($error)){
      move_uploaded_file($og['tmp_name'], $og_filePath);
      move_uploaded_file($thum['tmp_name'], $thum_filePath);
      header('Location: check.php');
      exit();
    }
  }
// exit('bbbbb35');
  /*

  //書き直し
  // if ($_GET['action'] == 'rewrite') {
  //   $_POST = $_SESSION['gallery'];
  //   $error['rewrite'] = true;

*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <link rel="stylesheet" type="text/css" href="../css/gridforms.css" />

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
        <form class="grid-form" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <br />
            <fieldset>
              <div data-row-span="1">
                <legend>Caption</legend>
                <div data-field-span="1">
                  <label>Input Caption</label>
                  <div>
                  <textarea name="caption" id="caption" cols="35" rows="3" autofocus ><?= $cap ?></textarea>
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
                  <label for="mr"><input name="item_name" type="radio" id="mr" value="mr"<?= $item_name == 'mr'? 'checked="checked"' : '' ; ?> />Marriage</label>
                  </div>
                  <div>
                  <label for="er"><input name="item_name" type="radio" id="er" value="er"<?= $item_name == 'er'? 'checked="checked"' : '' ; ?> />Engage</label>
                  </div>
                  <div>
                  <label for="pr"><input name="item_name" type="radio" id="pr" value="pr"<?= $item_name == 'pr'? 'checked="checked"' : '' ; ?> />Pair</label>
                  </div>
                  <div>
                  <label for="or"><input name="item_name" type="radio" id="or" value="or"<?= $item_name == 'or'? 'checked="checked"' : '' ; ?> />Order</label>
                  </div>
                  <?= $error['item_naame'] ?>
                </div>
              </div>
            </fieldset>

            <br />

            <fieldset>
              <div data-row-span="1">
                <legend>Select Image</legend>
                <div data-field-span="1">
                  <label>Select Original Image</label>
                  <input type="hidden" name="max_file_size" value="1000000" />
                  <input name="og_img" type="file" id="og_img" />
                  <?= $error['og_img'] ?>
                </div>
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Select thumbnail Image</label>
                  <input type="hidden" name="max_file_size" value="1000000" />
                  <input name="thum_img" type="file" id="thum_img" />
                  <?= $error['thum_img'] ?>
                </div>
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>&nbsp;</label>
                </div>
                <div data-field-span="1">
                  <input type="submit" value="UPLOAD" />
                </div>
              </div>
            </fieldset>
            <fieldset>
              <!-- <div data-row-span="1">
                <a href="index.php?action=rewrite">&laquo;&nbsp;Rewrite</a>
              </div> -->
            </fieldset>
          </fieldset>
        </form>
      </div>
      <br />
    </div>
  </body>
</html>