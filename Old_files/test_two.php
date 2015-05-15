<?php
$years = array();
$ctr = 0;
$default_years_dir = "../Images/Pics/";

include "../INCLUDES/common.inc";

function open_file($fname, $mode)
{
  if(!($fp = fopen("$fname", "$mode"))) die ("Cannot open file!");
  //echo "<h4>File opened</h4><br>";
  return $fp;
}

function read_file($fp)
{
  do
  {
    $line='';
    $line = fgets($fp);
    //echo "<br>$line<br>";
    $nline = $nline . $line . ",";
  }while ($line);
  return $nline;
}

function count_lines($fp)
{
  rewind($fp);
  do
  {
    $line='';
    $line = fgets($fp);
    //echo "<br>$line<br>";
    $ctr++;
  }while ($line);
  return ($ctr - 1);
}

function close_file($fp)
{
  fclose($fp);
}

function add_to_file($fp, $year)
{
  fwrite($fp, $year);
}

function select_year_form($fp, $act)
{
  $hold = read_file($fp);
  $total = count_lines($fp);
  $years = explode(",", $hold);
  
  echo "<center>\n";
  echo "<form method=POST action=$act>\n";
  echo "<table>\n";
  echo "<tr>\n";
  echo "<td class='creworgII'>Select year</td>\n";
  echo "<td class='creworgII'>";
  echo "<select name=year>\n";
  for($x = 0; $x < $total; $x++)
  {
  echo "<option>$years[$x]</option>\n";
  }
  echo "</td>\n";
  echo "<td class='creworgII'><input type=submit value=Continue></td>\n</tr>\n</table>\n";
  echo "</select>\n";
  echo "<input type=hidden name=mode value=1></form>\n";
}

function add_year_form($act)
{
  echo "<form method=POST action=$act>\n";
  echo "<table>\n<tr>\n";
  echo "<td class='creworgII'>Add a Year</td>\n<td class='creworgII'><input type=text size=5 maxlenth=4 name=year></td>\n";
  echo "<td class='creworgII'><input type=submit value='Add Year'></td>\n";
  echo "</tr>\n</table>\n<input type=hidden name=mode value=2></form>\n";
  echo "</body>\n</html>\n";
}

function end_html()
{
  echo "</body>\n</html>";
}
function html_body($style)
{
  echo "<body$style>\n";
}

function open_directory($d)
{
  if(!($dp = opendir($d))) die("Cannot open $d");
  return $dp;
}

switch ($mode)
{
  case 1:   // A year was selected
    html_head(0);
    end_header("../INCLUDES/crew_four_stylesheets.css", "");
    html_body(" bgcolor=#666666");
    echo "<h1>Year selected</h1>";
    end_html();
    break;
  case 2:  // Add a year to the file and display same screen
    html_head(0);
    end_header("../INCLUDES/crew_four_stylesheets.css", "");
    //$fp = open_file("../Images/DATA/years.txt", "a");
    //$year = $year . "\n";
    //add_to_file($fp, $year);
    //close_file($fp);
    //$dp = open_directory("../Images/Pics/");
    $y = str_replace("\n", "", $year);
    chdir($default_years_dir);
    mkdir($y);
    chdir("../../ADMIN");
    $n_dir = $default_years_dir . $y;
    $fp = open_file("../Images/DATA/years.txt", "r");
    html_body(" bgcolor=#666666");
    echo "<h2>$n_dir</h2><br>\n";

    select_year_form($fp, $PHP_SELF);
    add_year_form($PHP_SELF);
    end_html();
    break;
  default:  // Select a year or add one
    html_head(0);
    end_header("../INCLUDES/crew_four_stylesheets.css", "");
    $fp = open_file("../Images/DATA/years.txt", "r");
    html_body(" bgcolor=#666666");
    select_year_form($fp, $PHP_SELF);
    close_file($fp);
    add_year_form($PHP_SELF);
    end_html();
}
?>
