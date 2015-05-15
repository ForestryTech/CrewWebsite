<?php
$INCLUDE_DIRECTORY = "INCLUDES";
include "INCLUDES/common.inc";
html_head(1);
//include $INCLUDE_DIRECTORY . "/crew_four_stylesheets.css";
echo "\n";
//include $INCLUDE_DIRECTORY . "/main_javascripts.js";
end_header("INCLUDES/crew_four_stylesheets.css", "INCLUDES/main_javascripts.js");

echo "<body bgcolor=#666666 onLoad=delay_move();>\n";
place_image("logoII", "position:absolute;top:0;left:0", "Images/MC4.jpg", 180);

place_image("logo", "position:absolute;top:-105;left:200", "Images/MCTITLE.JPG", 600);

write_titlebar("b", "Welcome to the Mill Creek Hotshots Website", "visible");

echo "<br>\n";
place_image("millcreek", "position:absolute;top:210;left:275", "Images/gc.jpg", 500);

echo "<div id='ind' style='position:absolute;top:210;left:-250'>\n";
echo "<table class='menu' height=200>\n";
write_menu_row("crew_info.php", "onmouseover=show_window('crew_popup'); onmouseout=hide_window('crew_popup')", "Crew Information");

write_menu_row("fireassign.html", "onmouseover=show_window('fire_popup'); onmouseout=hide_window('fire_popup')", "Fire Assignments");

write_menu_row("www.avuedigitalservices.com", "onmouseover=show_window('emp_popup'); onmouseout=hide_window('emp_popup')", "Employemnt");

write_menu_row("crewpicmain.html", "onmouseover=show_window('images_popup'); onmouseout=hide_window('images_popup')", "Pictures");

write_menu_row("http://www.fs.fed.us/r5/sanbernardino/", "onmouseover=show_window('BDF_popup'); onmouseout=hide_window('BDF_popup')", "San Bernardino NF");

write_menu_row("links.html", "onmouseover=show_window('crew_popup'); onmouseout=hide_window('sit_popup')", "Fire Links");

write_menu_row("underconst.html", "onmouseover=show_window('contact_popup'); onmouseout=hide_window('contact_popup')", "Contact Us");

echo "</table>\n";
echo "</div>\n";

do_popups("crew_popup", "See Information on the Mill Creek Hotshots");

do_popups("fire_popup", "All of our Fire Assignments");

do_popups("emp_popup", "Employment with the Mill Creek Hotshots");

do_popups("images_popup", "Photos taken by Crew members");

do_popups("BDF_popup", "Visit the San Bernardino National Forest");

do_popups("sit_popup", "Links to other wildland fire websites");

do_popups("contact_popup", "Need to ask someone a question?");

echo "</body>\n";
echo "</html>";
?>

