<?php
// This script is the crew information page

$line = '';                      // Variable that reads name and title from file
$nline = '';                     // will be a array with 2 elements
$sup_title = '';                 // title of superintendant
$sup_name = '';                  // name of sup
$four_one_title = array(10);     // array that holds 4-1 titles
$four_one_name = array(10);      // array that holds 4-1 names
$four_two_title = array(10);     // array that holds 4-2 titles
$four_two_name = array(10);      // array that holds 4-2 names
// these next arrays hold the entire crew
// 0 - will be the sup
// 1 - will be Captian 4-1
// 11 - will be Captian 4-2
$title = array(21);              // array that holds all crew 4 titles
$cname = array(21);              // array that holds all crew 4 names

include "INCLUDES/common.inc";   // include php functions

html_head(0);                    // start html 0 = not index page
echo "\n";
//include "INCLUDES/crew_four_stylesheets.css";     // include stylesheets
echo "\n";
//include "INCLUDES/javascripts.js";                // include javascripts
echo "\n";
end_header("INCLUDES/crew_four_stylesheets.css", "INCLUDES/javascripts.js");                                     // end the head section

echo "<body bgcolor=#666666>\n";

echo "<!-- Mill Creek Logo -->\n";

place_image("logoII", "position:absolute;top:0;left:0", "./Images/MC4.jpg", 180);
place_image("logo", "position:absolute;top:10;left:200", "./Images/MCTITLE.JPG", 600);

echo "<!--Crew Information -->\n";

write_titlebar("a", "Mill Creek Information", "visible");
write_info("aa", "visible", "DATA/about.txt");

//Begin Mission Statement
echo "<!-- ****************************************  -->\n";
echo "<!-- Mission Statement -->\n";

write_titlebar("b", "Mission Statement", "hidden");
write_info("bb", "hidden", "DATA/mission.txt");

//End Mission Statement
echo "<!-- End Mission Statement -->\n";
//Begin Vision Statement

echo "<!-- ***************************************** -->\n";
echo "<!-- Vision Statement -->\n";

write_titlebar("c", "Vision Statement", "hidden");
write_info("cc", "hidden", "DATA/vision.txt");

//End Vision Statement
echo "<!-- End Vision Statement -->\n";
echo "<!-- ******************************************************************** -->\n";
//Begin Program Emphisis
echo "<!-- Program Emphisis -->\n";

write_titlebar("d", "Program Emphisis", "hidden");
write_info("dd", "hidden", "DATA/program.txt");

//End Program Emphisis
echo "<!-- End Program Emphisis -->\n";
echo "<!-- ************************************************************* -->\n";
// Begin Crew Organization
echo "<!-- Crew Organization -->\n";

write_titlebar("e", "Crew Organization", "hidden");

echo "<span id='ee' style='visibility:hidden;position:absolute;top:210;left:275;width:525;background:#666666;text-align:center;font-size:18pt;color:white'>\n";
echo "<br>\n";
echo "<table width=500>\n";
echo "<tr>\n";
echo "<td colspan=2  class='creworg'>\n";
echo "<span class='crew_tit'>Superintendant</span><br>\n";
echo "Pete Coy\n";
echo "</td></tr>\n";
   
if(!($fp = fopen("TEST/crewmembers1.mch", "r"))) die ("Cannot open file!");

$ctr=0;

do
  {
    $line = '';                   // set to blank
    $line = fgets($fp);           // read a line
    $nline = explode("=",$line);  // seperate to title and name
    $title[$ctr] = $nline[0];     // title

    $cname[$ctr] = $nline[1];     // name
    $ctr++;
  }while($line);
$limit = $ctr;
$ctr = 0;
$ctra = 11;

for($ctr = 0; $ctr < 10; $ctr++)
{
  $four_one_title[$ctr] = $title[($ctr+1)];
  $four_one_name[$ctr] = $cname[($ctr+1)];
  
  $four_two_title[$ctr] = $title[($ctr+11)];
  $four_two_name[$ctr] = $cname[($ctr+11)];
}

for($ctr=0; $ctr<=10; $ctr++)
{
  w_t($four_one_title[$ctr], $four_one_name[$ctr], $four_two_title[$ctr], $four_two_name[$ctr]);
}
echo "</table>\n</span>\n";

//End Crew Organization
echo "<!-- End Crew Organization -->\n";
echo "<!-- ******************************************************** -->\n";
// Begin Crew Training

write_titlebar("f", "Crew Training", "hidden");
write_info("ff", "hidden", "DATA/training.txt");

echo "<!-- Menu on left side of page -->\n";
echo "<div id='mill_creek_menu' style='position:absolute;left:0;top:210'>\n";
echo "<table class='menu'width=180 height=300>\n";
//write_menu_row("javascript:show_info(1);", "status='About Mill Creek Hotshots'", "About Mill Creek");
write_menu_row("javascript:show_info(1);", "onMouseOver=\"status='About Mill Creek Hotshots'; return true;\"", "About Mill Creek");
write_menu_row("javascript:show_info(2);", "onMouseOver=\"status='Mill Creek Hotshots Mission Statement'; return true;\"", "Mission Statement");

write_menu_row("javascript:show_info(3);", "onMouseOver=\"status='Mill Creek Hotshots Vission Statement'; return true;\"", "Vision Statement");

write_menu_row("javascript:show_info(4);", "onMouseOver=\"status='Mill Creek Hotshots Program Emphasis'; return true;\"", "Program Emphasis");

write_menu_row("javascript:show_info(5);", "onMouseOver=\"status='Mill Creek Hotshots Crew Organizaiton'; return true;\"", "Crew Organization");

write_menu_row("javascript:show_info(6);", "onMouseOver=\"status='Mill Creek Hotshots Training'; return true\"", "Training");

write_menu_row("index_test.php", "onMouseOver=\"status='Main Page'; return true;\"", "Home");

echo "</table>\n";
echo "</div>\n";
?>

</body>
</html>   
 
