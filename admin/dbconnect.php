<?php
  mysql_connect('localhost', 'root' ,'root') or die(mysql_error());
  mysql_select_db('gallery');
  mysql_query('SET NAMES UTF8');
?>