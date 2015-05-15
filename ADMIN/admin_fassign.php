<?php

$f_years = "../DATA/f_years.txt";
include "../INCLUDES/common.inc";

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

function add_to_file($fp, $data)
{
  fwrite($fp, $data);
}

function end_html()
{
  echo "</body>\n</html>";
}

function html_body($style)
{
  echo "<body$style>\n";
}

function add_zero($data)
{
    if(!(ereg("[0-9][0-9]", $data))) {
        $data = "0" . $data;
    }
    return $data;
}

function subtract_zero($data)
{
    if (ereg("[0][1-9]", $data)) {
      $data = str_replace("0", "", $data);
    }
    return $data;
}

function date_for_file($date)
{
    $date = str_replace(" ", "", $date);
    if ( strpos("$date", "-")) {
        $x = explode("-", $date);
        $md_start = explode("/", $x[0]);
        $md_end = explode("/", $x[1]);
        $md_start[0] = add_zero($md_start[0]);
        $md_start[1] = add_zero($md_start[1]);
        $md_end[0] = add_zero($md_end[0]);
        $md_end[1] = add_zero($md_end[1]);
        $date = $md_start[0] . "/" . $md_start[1] . " - " . $md_end[0] . "/" . $md_end[1];
    } else {
        $md = explode("/", $date);
        $md[0] = add_zero($md[0]);
        $md[1] = add_zero($md[1]);
        $date = $md[0] . "/" . $md[1];
    }
    return $date;
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

function main_display()
{
    global $f_years, $PHP_SELF;
    $fp = open_file($f_years, "r");
    $hold = read_file($fp);
    $hold_one = str_replace("\n", "", $hold);
    $hold_one = str_replace("_", " ", $hold_one);
    $total = count_lines($fp);
    $years = explode(":", $hold_one);
    html_head(0);
    end_header("../INCLUDES/crew_four_stylesheets.css", "");
    html_body(" bgcolor=#C0C0C0");
    echo "<center>\n";
    echo "<form method=POST action=$PHP_SELF>\n";
    echo "<table>\n";
    echo "<tr>\n";
    echo "<td class='creworgII'>Select Year</td>\n";
    echo "<td class='creworgII'>";
    echo "<select name=year>\n";
    for($x = 0; $x < $total; $x++)
    {
        echo "<option>$years[$x]</option>\n";
    }
    echo "</td>\n";
    echo "<td class='creworgII'>";
    echo "<input type=submit value=Continue></td>\n</tr>\n</table>\n";
    echo "</select>\n";
    echo "<input type=hidden name=mode value=3></form></center>\n";
    echo "<br>\n";
    echo "<center>\n<form method=POST action=$PHP_SELF>\n";
    echo "<table>\n<tr>\n";
    echo "<td class='creworgII'>Add a Year</td>\n";
	echo "<td class='creworgII'>";
	echo "<input type=text size=5 maxlenth=4 name=n_year></td>\n";
    echo "<td class='creworgII'>";
	echo "<input type=submit value='Add Year'></td>\n";
    echo "</tr>\n</table>\n";
    echo "<input type=hidden name=mode value=2>\n";
    echo "</form></center>\n";
    echo "</body></html>\n";

}

function table_headers()
{
    echo "<tr>\n";
    echo "<td align=center>Date</td>\n";
    echo "<td align=center>Fire Name</td>\n";
    echo "<td align=center>Location</td>\n";
    echo "<td align=center>Number of Shifts</td>\n";
    echo "<td align=center>Fire Class</td>\n";
    echo "</tr>\n";
}

function fa_table($fa, $year)
{
    global $PHP_SELF;
    echo "<h3>Fire Assignments $year</h3>\n";
    echo "<form action=$PHP_SELF method=POST>\n";
    echo "<table width=600>\n";
    table_headers();
    foreach ($fa as $line) {
      if ($line != "") {
        $x = explode(",", $line);
        $x[0] = date_for_display($x[0]);

        echo "<tr>\n";
        foreach ($x as $y) {
            echo "<td align=center>$y</td>\n";
        }
        echo "<td><input type=checkbox name=to_delete[] value='$line'>";
        //echo "<input type=hidden name=to_delete_v[] value='$line'>";
        echo "</td>\n";
      echo "</tr>\n";
      }
    }
    echo "</table>\n";
    echo "<input type=hidden name=mode value=5>\n";
    echo "<input type=hidden name=year value=$year>\n";
    echo "<input type=submit value='Delete Selected Items'>\n";
    echo "</form>\n";
}

function fa_form($year)
{
    global $PHP_SELF;
    echo "<form action=$PHP_SELF method=POST>\n";
    echo "<table width=600>\n";
    table_headers();
    echo "<tr>\n";
    echo "<td align=center><input type=text name=date size=12></td>\n";
    echo "<td align=center><input type=text name=fname size=16></td>\n";
    echo "<td align=center><input type=text name=location size=16></td>\n";
    echo "<td align=center><input type=text name=nos size=5></td>\n";
    echo "<td align=center><input type=text name=f_class size=5></td>\n";
    echo "</tr>\n";
    echo "</table>\n";
    echo "<input type=hidden name=mode value=4>\n";
    echo "<input type=hidden name=year value=$year>\n";
    echo "<br><input type=submit value='Add Assignment'>\n";
    echo "</form>\n";
}

function check_values($data)
{
    $v = array("Date", "Fire Name", "Location", "No. Of Shifts", "Class");
    $line = explode(",", $data);
    for ($ctr = 0; $ctr <= 4; $ctr++) {
      if ($line[$ctr] == "") {
        html_head(0);
        end_header("", "");
        html_body(" bgcolor=#C0C0C0");
        echo "<h2>There is no value for <b>$v[$ctr]</b>.</h2>\n";
        $valid = 1;
        return $valid;
      } else {
        $valid = 0;
      }
    }
    return $valid;
}

switch ($mode) {
  case 1:
    main_display();
	//open file and display form with list box//so year can be selected//display text box so year can be added
    break;
  case 2:
    $fp = open_file($f_years, "a");
    $n_year = $n_year . "\n";
    add_to_file($fp, $n_year);
    close_file($fp);
    main_display();
    // a year was added, add to the years_fassign.txt file// the display the same select year form// display the add year form
    break;
  case 3:
    $f_file = "../DATA/" . $year . "fassign.txt";
    $fp = open_file($f_file, "r");
    $data = read_file($fp);
    $total = count_lines($fp);
    $data = str_replace("\n", "", $data);
    $f_as = explode(":", $data);
    sort($f_as);
    html_head(0);
    end_header("../INCLUDES/crew_four_stylesheets.css", "");
    html_body(" bgcolor=#C0C0C0");
    echo "<center>\n";
    fa_table($f_as, $year);
    echo "<hr>\n";
    fa_form($year);
    end_html();
    // a year was selected. Display the fire assignments for that// year and a form to add one.// delete capabilities will be added.
    break;
  case 4:
    $f_file = "../DATA/" . $year . "fassign.txt";
    $fp = open_file($f_file, "a");
    $line = $date . "," . $fname . "," . $location . "," . $nos . "," . $f_class . "\n";
    if(check_values($line)) {
      die("Cannot continue.");
    }
    $date = date_for_file($date);
    $line = $date . "," . $fname . "," . $location . "," . $nos . "," . $f_class . "\n";
    add_to_file($fp, $line);
    close_file($fp);
    
    $fp = open_file($f_file, "r");
    $data = read_file($fp);
    $total = count_lines($fp);
    $data = str_replace("\n", "", $data);
    $f_as = explode(":", $data);
    sort($f_as);
    html_head(0);
    end_header("../INCLUDES/crew_four_stylesheets.css", "");
    html_body(" bgcolor=#C0C0C0");
    echo "<center>\n";
    fa_table($f_as, $year);
    echo "<hr>\n";
    fa_form($year);
    end_html();
    // a fire assignment was added.  Add fire assignment to file// corresponding to the year.  Display the same case 3 stuff
    break;
  case 5:
  //$to_delete;
  //$to_delete_v;
    $total = count($to_delete);
    //if($total != $total_two) die ("Something is very wrong!");
    html_head(0);
    end_header("", "");
    html_body(" bgcolor=#C0C0C0");
    //echo "total: $total<br>\n";
    //echo "total_two: $total_two<br>\n";
    //for ($ctr = 0; $ctr < $total; $ctr++) {
      //if($to_delete[$ctr] == 1) {
        //echo "Line selected for deletion:---> $to_delete[$ctr]<br>\n";
      //}
      //echo "to_delete[$ctr]: $to_delete[$ctr]<br>\n";
    //}
    $f_file = "../DATA/" . $year . "fassign.txt";
    $fp = open_file($f_file, "r");
    //close_file($fp);
    $new_file = array();
    $ctr = 0;
    do
    {
      $line_found = 0;
      $line = "";
      $line = fgets($fp);
      $nl = chr(13) . chr(10);
      //$y = trim($line, "\n\r");
      $y = trim($line);
      for($a = 0; $a < $total; $a++) {
        if ($y == $to_delete[$a]) {
          //echo "A match was found:$y = $to_delete[$a]<br>\n";
          $line_found = 1;
        }
      }
      if($line_found == 0) {
        $new_file[$ctr] = $line;
        $ctr++;
      }
    }while ($line);
    close_file($fp);
    $n_a = explode(":", $new_file);
    //echo "<h4>The new file:</h4><br>\n";
    $fp = open_file($f_file, "w");
    
    foreach ($new_file as $u) {
      if ($u != "") {
        $u = $u . "\n";
        add_to_file($fp, $u);
      }
      //echo "$u<br>\n";
    }
    close_file($fp);
    //$fp = open_file($f_file, "r");
    $fp = open_file($f_file, "r");
    $data = read_file($fp);
    $total = count_lines($fp);
    $data = str_replace("\n", "", $data);
    $f_as = explode(":", $data);
    sort($f_as);
    html_head(0);
    end_header("../INCLUDES/crew_four_stylesheets.css", "");
    html_body(" bgcolor=#C0C0C0");
    echo "<center>\n";
    fa_table($f_as, $year);
    echo "<hr>\n";
    fa_form($year);
    end_html();
    // a fire assignment was selected for deletion.
    break;
  default:
    main_display();
    // same as case 1.

}
?>
