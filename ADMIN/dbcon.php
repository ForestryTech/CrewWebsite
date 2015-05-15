<?php
include "../INCLUDES/common_db.inc";

$dbname = "millcreek";

$user_tablename = "admin_users";
//$user_table_def = "usernumber MEDIUMINT(10) DEFAULT 1 NOT NULL AUTO_INCREMENT,";
$user_table_def = "username VARCHAR(30) NOT NULL,";
$user_table_def .= "userpassword VARCHAR(20) BINARY NOT NULL";
//$user_table_def .= "UNIQUE usernumber (usernumber)";

$fa_table_name = "fires";
$fa_def = "date VARCHAR(20) NOT NULL,";
$fa_def .= "fire VARCHAR(3) NOT NULL,";
$fa_def .= "location VARCHAR(30) NOT NULL,";
$fa_def .= "nos VARCHAR(4) NOT NULL,";
$fa_def .= "class VARCHAR(4) NOT NULL";
//$fa_def .= "fireid MEDIUMINT(10) DEFAULT 1 NOT NULL AUTO_INCREMENT,";
//$fa_def .= "UNIQUE fireid (fireid)";

$link_id = db_connect();
if(!$link_id) {
  die(sql_error());
}

if(!mysql_select_db($dbname)) {
  die(sql_error());
}

//if(!mysql_query("CREATE TABLE $user_tablename ($user_table_def)")) {
//  die(sql_error());
//}

if(!mysql_query("CREATE TABLE $fa_table_name ($fa_def)")) {
  die(sql_error());
}

echo "Successfully created the $user_tablename and $fa_table_name tables.";
?>
