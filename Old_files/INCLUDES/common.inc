<?php
function w_t($tone, $none, $ttwo, $ntwo)
{
  echo "<tr>\n";
  echo "<td class='creworg'><span class='crew_tit'>$tone</span><br>$none</td>\n";
  echo "<td class='creworg'><span class='crew_tit'>$ttwo</span><br>$ntwo</td>\n";
  echo "</tr>\n";
  return;
}
function html_head($index_page)
{
  //echo "<!doctype html public \"-//W3C//DTD HTML 4.01//EN\">\n";
  echo "<html>\n<head>\n";
  if($index_page ==1)
  {
    echo "<meta name=\"keywords\" lang=\"en-us\" ";
    echo "content=\"hotshots, hotshot, wildland fire, fire, millcreekhotshots, millcreek, forest service\">\n";
  }
  echo "<title>Mill Creek Hotshots</title>\n";
}
function end_header($style, $java)
{
  if($style)
  {
    include $style;
    echo "\n";
  }
  if($java)
  {
    include $java;
    echo "\n";
  }
  echo "</head>";
}
function place_image($id, $style, $i_name, $w)
{
  echo "<div id='$id' style='$style'>\n";
  echo "<image src='$i_name' width=$w>\n</div>\n";
}

function write_titlebar($id, $title, $status)
{
  echo "<div id='$id' style='position:absolute;top:180;left:0;visibility:$status'>\n";
  echo "  <table bgcolor=#023E19 width=800>\n";
  echo "    <tr>\n";
  echo "      <td class='titlebar' width=300>";
  echo gmdate("M d") . ", " . gmdate("Y"); // . " " . gmdate("T");
  echo "      </td>\n";
  echo "      <td class='titlebar' width=500>$title</td>\n";
  echo "   </tr>\n";
  echo "  </table>\n";
  echo "</div>\n";
  echo "<br>\n";
}

function write_info($id, $status, $fname)
{
  echo "<span id='$id' style='visibility:$status;position:absolute;top:210;left:275;width:525;background:#666666;text-align:justify;font-size:14pt;color:white'>\n";
  echo "<br>\n";
  include $fname;
  echo "</span>\n";
}

function write_menu_row($link, $onMover, $title)
{
  echo "<tr height=50>\n";
  echo "   <td class='menu' width=180>\n";
//  echo "       <a href=$link onMouseOver=$onMover; return true;>$title</a>\n";
  echo "       <a href=$link $onMover>$title</a>\n";
  echo "   </td>\n";
  echo " </tr>\n";
}

function do_popups($id, $title)
{
  echo "<div id='$id' style='position:absolute;top:210;left:189;visibility:hidden'>\n";
  echo "  <table class='popup' height=200>\n";
  echo "    <tr>\n";
  echo "      <td class='popup' width=70>$title</td>\n</tr>\n</table>\n</div>\n";
}
function small_title_pic($message)
{
  //echo "<body bgcolor=#666666>\n";
  echo "<center>\n";
  echo "<table width=800>\n";
  echo "    <tr>\n";
  echo "	<td align=center>\n";
  echo "    <image src=../Images/titleandlogo.jpg>\n";
  echo "	</td>\n";
  echo "    </tr>\n";
  echo "    <tr>\n";
  echo "	<td class='titlebar'>$message</td>\n";
  echo "    </tr>\n";
  echo "</table>\n";
  echo "</center>\n";
}

function add_link($link, $text)
{
  echo "<a href=$link>$text</a>\n";
}

?>
