<?php
  exit('aaaa');
  require('dbconnect.php');

  $sql = 'SELECT caption, og_img, thum_img FROM gallery';
  $upload = mysql_query($sql) or die(mysql_error());


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <title>Gallery : s&amp;s + design</title>
  <meta http-equiv="Content-Type" content="text/html; charset=shift_jis">

  <link rel="stylesheet" type="text/css" href="../js/jquery.fancybox.css" media="screen" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script type="text/javascript" src="../js/jquery.fancybox.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect : 'elastic',
            openSpeed  : 300,
            closeEffect : 'elastic',
            closeSpeed  : 300,
            closeClick : true,
            helpers: {
                title : {
                    type : 'inside'
                },
                overlay : {
                    speedIn : 900,
                    opacity : 0.65,
                    css : {
                        'background-color' : '#fff'
                    }
                }
            }
        });
    });
  </script>

  </head>
  <body>
  <div id="topBar">
  </div>

  <h1 id="gallery">GALLERY</h1>

  <div id="topNav" style="left:560px;" >
    <a href="../index.html">
      <img src="../images/nav_01.gif" alt="home" /></a>
  </div>
  <div id="topNav" style="left:643px;" >
    <a href="#">
      <img src="../images/nav_02.gif" alt="works" /></a>
  </div>
  <div id="topNav" style="left:727px;" >
    <a href="./price.html">
      <img src="../images/nav_03.gif" alt="making" /></a>
  </div>
  <div id="topNav" style="left:810px;" >
    <a href="./about.html">
      <img src="../images/nav_04.gif" alt="about" /></a>
  </div>
  <div id="topNav" style="left:893px;" >
    <a href="./formoid.com:thugstyleforever@gmail.com:6912.html">
      <img src="../images/nav_05.gif" alt="contact" /></a>
  </div>
  <div id="topNav" style="left:977px;" >
    <a href="./sitemap.html">
      <img src="../images/nav_06.gif" alt="sitemap" /></a>
  </div>

    <div id="logo">
      <a href="../index.html">
        <img src="../images/top_logo.gif" alt="logo" /></a>
    </div>

<!-- ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->
        <!-- <tr>
          <td class="grid01"><a class="fancybox" href="../images/" data-fancybox-group="gallery" title="image1"><img src="../images/" height="200" width="200" alt="image" /></a></td>
          <td class="grid02"><a class="fancybox" href="../images/" data-fancybox-group="gallery" title="image1"><img src="../images/" height="200" width="200" alt="image" /></a></td>
          <td class="grid03"><a class="fancybox" href="../images/" data-fancybox-group="gallery" title="image1"><img src="../images/" height="200" width="200" alt="image" /></a></td>
          <td class="grid04"><a class="fancybox" href="../images/" data-fancybox-group="gallery" title="image1"><img src="../images/" height="200" width="200" alt="image" /></a></td>
          <td class="grid05"><a class="fancybox" href="../images/" data-fancybox-group="gallery" title="image1"><img src="../images/" height="200" width="200" alt="image" /></a></td>
        </tr> -->
<!-- ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->

    <div class="thumb clearfix" >
      <?php
        $i=0;
        while($up = mysql_fetch_assoc($upload)){
        $caption = htmlspecialchars($up['caption'], ENT_QUOTES, 'UTF-8');
        $og_img = htmlspecialchars($up['og_img'], ENT_QUOTES, 'UTF-8');
        $thum_img = htmlspecialchars($up['thum_img'], ENT_QUOTES, 'UTF-8');
      ?>
      <!-- <?=  ?> -->
          <p <?= ($i%5 == 0)? 'class="grid01"' : '' ; ?>>
            <a class="fancybox" href="../images/gallery/<?= $og_img ?>" data-fancybox-group="gallery" title="<?= $caption ?>">
            <img src="../images/gallery/<?= $thum_img ?>" height="200" width="200" alt="image" /></a></p>
      <?php
      $i++;
      }
      ?>

<!--           <p class="grid01">
            <a class="fancybox" href="../images/gallery/er_2013_1219_181807.jpg" data-fancybox-group="gallery" title="K18 スモーキークォーツ"><img src="../images/gallery/er_thumb_2013_1219_181807.jpg" height="200" width="200" alt="image" /></a></p>
          <p>
            <a class="fancybox" href="../images/gallery/er_2013_1219_181808.jpg" data-fancybox-group="gallery" title="K18 Diamond"><img src="../images/gallery/er_thumb_2013_1219_181808.jpg" height="200" width="200" alt="image" /></a></p>
          <p>
            <a class="fancybox" href="../images/gallery/er_2013_1219_181810.jpg" data-fancybox-group="gallery" title="Silver925"><img src="../images/gallery/er_thumb_2013_1219_181810.jpg" height="200" width="200" alt="image" /></a></p>
          <p>
            <a class="fancybox" href="../images/gallery/mr_2013_1219_181800.jpg" data-fancybox-group="gallery" title="Wood : Evony"><img src="../images/gallery/mr_thumb_2013_1219_181800.jpg" height="200" width="200" alt="image" /></a></p>
          <p>
            <a class="fancybox" href="../images/gallery/mr_2013_1219_181802.jpg" data-fancybox-group="gallery" title="K18 Diamond"><img src="../images/gallery/mr_thumb_2013_1219_181802.jpg" height="200" width="200" alt="image" /></a></p>


 -->
          <!-- <p class="grid01">
            <a class="fancybox" href="../images/gallery/ring12.jpg" data-fancybox-group="gallery" title="image1"><img src="../images/gallery/ring12_thumb.jpg" height="200" width="200" alt="image" /></a></p>
          <p>
            <a class="fancybox" href="../images/gallery/ring14.jpg" data-fancybox-group="gallery" title="image1"><img src="../images/gallery/ring14_thumb.jpg" height="200" width="200" alt="image" /></a></p>
          <p>
            <a class="fancybox" href="../images/gallery/ring18.jpg" data-fancybox-group="gallery" title="image1"><img src="../images/gallery/ring18_thumb.jpg" height="200" width="200" alt="image" /></a></p>
          <p>
            <a class="fancybox" href="../images/gallery/ring05.jpg" data-fancybox-group="gallery" title="image1"><img src="../images/gallery/ring05_thumb.jpg" height="200" width="200" alt="image" /></a></p>
          <p>
            <a class="fancybox" href="../images/gallery/ring20.jpg" data-fancybox-group="gallery" title="image1"><img src="../images/gallery/ring20_thumb.jpg" height="200" width="200" alt="image" /></a></p> -->

    </div>
  <div>
    <p id="gallery"><a href="#">ページトップへ</a></p>
  </div>
  <div>
      <p id="gfooter">Copyright&nbsp;&copy;&nbsp;2013&nbsp;*s&amp;s+design*&nbsp;All&nbsp;Rights&nbsp;Reserved.<br />
    :)</p>
  </div>

  </div>
  </body>
</html>