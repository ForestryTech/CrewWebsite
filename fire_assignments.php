<?php

include "INCLUDES/common.inc";
$f_years = "DATA/f_years.txt";
$common_array = array();
$lines_array = array();

function open_file($fname, $mode)
{
  if(!($fp = fopen("$fname", "$mode"))) die ("Cannot open file!");
  return $fp;
}

function read_file($fp)
{
  do
  {
    $line='';
    $line = fgets($fp);
    $nline = $nline . $line . ":";
  }while ($line);
  //echo "$nline<br>\n";
  $nline = str_replace("_", " ", $nline);
  $nline = str_replace("\n", "", $nline);
  return $nline;
}

function count_lines($fp)
{
  rewind($fp);
  do
  {
    $line='';
    $line = fgets($fp);
    $ctr++;
  }while ($line);
  return ($ctr - 1);
}

function close_file($fp)
{
  fclose($fp);
}

function html_body($style)
{
  echo "<body$style>\n";
}

function subtract_zero($data)
{
    if (ereg("[0][1-9]", $data)) {
      $data = str_replace("0", "", $data);
    }
    return $data;
}

function date_for_display($data)
{
    $z = explode("-", $data); //$z[0] will have start $z[1] will have last
    $md_start = explode("/", $z[0]); //should split 6/9
    $md_end = explode("/", $z[1]);   //should split 6/9
    $md_start[0] = subtract_zero($md_start[0]);
    $md_start[1] = subtract_zero($md_start[1]);
    $md_end[0] = subtract_zero($md_end[0]);
    $md_end[1] = subtract_zero($md_end[1]);
    $no_zero = $md_start[0] . "/" . $md_start[1];
    if($md_end[0] != "") {
        $no_zero = $no_zero . " - " . $md_end[0] . "/" . $md_end[1];
    }
    return $no_zero;
}

function table_headers()
{
    echo "<tr>\n";
    echo "<td align=center><b>Date</b></td>\n";
    echo "<td align=center><b>Fire Name</b></td>\n";
    echo "<td align=center><b>Location</b></td>\n";
    echo "<td align=center><b>Number of Shifts</b></td>\n";
    echo "<td align=center><b>Fire Class</b></td>\n";
    echo "</tr>\n";
}

switch ($mode) {
  case 1:
  	// default: open the file with the years and display the different years
  	// that has fire assignments
		$ctr = 1;
  	$fp = open_file($f_years, "r");
  	$f_years = read_file($fp);
  	$common_array = explode(":", $f_years);
  	html_head(0);
  	end_header("INCLUDES/crew_four_stylesheets.css", "");
  	html_body(" bgcolor=#666666");
  	small_title_pic("Fire Assignments");
  	echo "<center>\n";
  	echo "<table width=800><tr>\n";
  	foreach ($common_array as $v) {
  	  echo "<td align=center>\n";
  	  echo "<a href=$PHP_SELF?mode=2&d_year=$v>$v</a>\n";
  	  echo "<br>ctr = $ctr</td>\n";
  	  if((($ctr % 3) == 0) && ($ctr >= 3)){
  	    echo "</tr><tr>\n";
  	  }
  	  $ctr++;
  	}
  	echo "</tr></table>\n";
  	close_file($fp);
  	echo "</body></html>\n";
  	break;
  case 2:
  	$ctr = 0;
  	$year_file = "DATA/" . $d_year . "fassign.txt";
  	if (!(file_exists($year_file))) {
  	  html_head(0);
  	  end_header("INCLUDES/crew_four_stylesheets.css", "");
  	  html_body(" bgcolor=#666666");
  	  small_title_pic($d_year);
  	  echo "<h3>No Fire Assignments for this year</h3>\n";
  	  for($ctr = 0; $ctr <= 10; $ctr++) {
  	    echo "<br>\n";
  	  }
  	  page_nav();
  	  echo "</body></html>";
  	  exit;
  	}
  	$fp = open_file($year_file, "r");
  	$f_assignments = read_file($fp);
  	$common_array = explode(":", $f_assignments);
		$message = "Fire Assignments for year " . $d_year;
  	html_head(0);
  	end_header("INCLUDES/crew_four_stylesheets.css", "");
  	html_body(" bgcolor=#666666");
  	small_title_pic($message);
  	echo "<center>\n";
  	echo "<table width=800>\n";
  	table_headers();
		foreach ($common_array as $v) {
  	  if ($v != "") {
  	    $lines_array = explode(",", $v);
  	    $lines_array[0] = date_for_display($lines_array[0]);
  	    echo "<tr>\n";
				foreach($lines_array as $d) {
  	      echo "<td align=center>$d</td>\n";
  	    }
  	    echo "</tr>\n";
  	  }
  	}
  	echo "</table>\n";
  	page_nav();
  	echo "</body></html>";
  	// a year was selected.  Open the corresponding file and display the 
  	// fire assignments for that year.
  	break;
  default:
    $ctr = 1;
  	$fp = open_file($f_years, "r");
  	$f_years = read_file($fp);
  	$common_array = explode(":", $f_years);
  	html_head(0);
  	end_header("INCLUDES/crew_four_stylesheets.css", "");
  	html_body(" bgcolor=#666666");
  	small_title_pic("Fire Assignments");
  	echo "<center>\n";
  	echo "<table width=800><tr>\n";
  	foreach ($common_array as $v) {
  	  echo "<td align=center>\n";
  	  echo "<a href=$PHP_SELF?mode=2&d_year=$v>$v</a></td>\n";
  	  if((($ctr % 3) == 0) && ($ctr >=3)) {
  	    echo "</tr><tr>\n";
  	  }
  	  $ctr++;
  	}
  	close_file($fp);
  	echo "</body></html>\n";
  	// same as case 1.
}