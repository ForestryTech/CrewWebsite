<?php

include "../INCLUDES/common.inc";

$action = array("vission", "mission", "about", "training", "program");
$label = array("Vission Statement", "Mission Statement", "About Mill Creek", "Training information", "Program Emphisis");

$V_STATEMENT = "../DATA/vision.txt";   // mode 1
$M_STATEMENT = "../DATA/mission.txt";  // mode 2
$ABOUT = "../DATA/about.txt";          // mode 3
$TRAINING = "../DATA/training.txt";    // mode 4
$PROGRAM = "../DATA/program.txt";      // mode 5

function end_html()
{
  echo "</body>\n</html>";
}

function html_body($style)
{
  echo "<body$style>\n";
}

function close_file($fp)
{
  fclose($fp);
}

function add_to_file($fp, $data)
{
  fwrite($fp, $data);
}

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
    $nline = $nline . $line; // . ":";
  }while ($line);
  //echo "$nline<br>\n";
  //$nline = str_replace("_", " ", $nline);
  //$nline = str_replace("\n", "", $nline);
  return $nline;
}

function display_form($file, $mode, $action, $title)
{
  global $PHP_SELF;
  $fp = open_file($file, "r");
  $text = read_file($fp);
  close_file($fp);
  html_head(0);
  end_header("","");
  html_body(" bgcolor=#C0C0C0");
  echo "<center>\n";
  echo "<h3>$title</h3><br>\n";
  echo "<form action=$PHP_SELF method=POST>\n";
  echo "<textarea name=new_text rows=20 cols=80>";
  echo $text;
  echo "</textarea><br>\n";
  echo "<input type=hidden name=mode value=$mode>\n";
  echo "<input type=hidden name=act value='$action'>\n";
  echo "<input type=submit value='Save Changes'>\n";
  echo "</form></center>\n";
  end_html();
}

function save_form($file)
{
  global $new_text;
  $fp = open_file($file, "w");
  add_to_file($fp, $new_text);
  close_file($fp);
}

switch ($mode) {
  case 1: // display vision statement for change
    display_form($V_STATEMENT, 6, $action[0], $label[0]);
    break;
  case 2: // display mission statement for change
    display_form($M_STATEMENT, 6, $action[1], $label[1]);
    break;
  case 3: // display about mill creek for change
    display_form($ABOUT, 6, $action[2], $label[2]);
    break;
  case 4: // display training for change
    display_form($TRAINING, 6, $action[3], $label[3]);
    break;
  case 5: // display program emphisis for change
    display_form($PROGRAM, 6, $action[4], $label[4]);
    break;
  case 6: // save changes made
  echo "act: $action<br>\n";
    switch ($act) {
        case "vission":
          $file = $V_STATEMENT;
          $title = $label[0];
          break;
        case "mission":
          $file = $M_STATEMENT;
          $title = $label[1];
          break;
        case "about":
          $file = $ABOUT;
          $title = $label[2];
          break;
        case "training":
          $file = $TRAINING;
          $title = $label[3];
          break;
        case "program":
          $file = $PROGRAM;
          $title = $label[4];
          break;
    }
    echo "file: $file<br>\n";
    save_form($file);
    display_form($file, 6, $act, $title);
    break;
  default: // display links to make changes
    html_head(0);
    end_header("","");
    html_body(" bgcolor=#C0C0C0");
    echo "<center>\n";
    echo "<h3>Click link below to make changes</h3>\n<br>\n";
    for ($ctr = 1; $ctr <= 5; $ctr++) {
      echo "<a href=$PHP_SELF?mode=$ctr>Edit " . $label[$ctr - 1] . "</a><br>\n";
    }
    //echo "<a href=$PHP_SELF?mode=1>Edit Vission Statement</a><br>\n";
    //echo "<a href=$PHP_SELF?mode=2>Edit Mission Statement</a><br>\n";
    //echo "<a href=$PHP_SELF?mode=3>Edit About Mill Creek</a><br>\n";
    //echo "<a href=$PHP_SELF?mode=4>Edit Training information</a><br>\n";
    //echo "<a href=$PHP_SELF?mode=5>Edit Program Emphisis</a><br>\n";
    echo "</center>\n";
    end_html();
}
?>

