<?php
  mysql_connect('localhost', 'root' ,'root') or die(mysql_error());
  mysql_select_db('sawada') or die(mysql_error());
  mysql_query('SET NAMES UTF8') or die(mysql_error());
?>