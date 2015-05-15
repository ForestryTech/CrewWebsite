<?php

$line = '';
$nline = '';
$sup_title = '';
$sup_name = '';
$four_one_title = array(10);
$four_one_name = array(10);
$four_two_title = array(10);
$four_two_name = array(10);
$title = array(21);
$cname = array(21);


function w_t($tone, $none, $ttwo, $ntwo)
{
  echo "<tr>\n";
  echo "<td class='creworg'><span class='crew_tit'>$tone</span><br>$none</td>\n";
  echo "<td class='creworg'><span class='crew_tit'>$ttwo</span><br>$ntwo</td>\n";
  echo "</tr>\n";
  return;
}
function html_head()
{
  echo "<html>\n<head>\n<title>Mill Creek Hotshots</title>\n";
}
function end_header()
{
  echo "</head>";
}
function place_image($id, $style, $i_name, $w)
{
  echo "<div id='$id' style='$style'>\n";
  echo "<image src='$i_name' width=$w>\n</div>\n";
}

html_head();
echo "\n";
include "styles.inc";
echo "\n";
include "javascripts.inc";
echo "\n";
end_header();






echo "<body bgcolor=#666666>\n";

echo "<!-- Mill Creek Logo -->\n";

place_image("logoII", "position:absolute;top:0;left:0", "./Images/MC4.jpg", 180);
place_image("a", "position:absolute;top:10;left:200", "./Images/MCTITLE.JPG", 600);

//<div id="logoII" style="position:absolute;top:0;left:0">
// 	 <image src="./Images/MC4.bmp">
//</div>

//<!-- Title Mill Creek Hand Crew -->
//<span id="logo" style="position:absolute;top:10;left:200">
//	<img src="./Images/MCTITLE.JPG" width=600>
//</span>
?>
<!--Crew Information -->
<div id='a' style='position:absolute;top:180;left:0;visibility:visible'>
  <table bgcolor=#023E19 width=800> <!--bgcolor=#006600 width=800> -->
    <tr>



<script language="JavaScript1.2">
      document.write("<td class='titlebar' width=300>" + lmonth + " " + date +", " + year + "</td>");

</script>      
<td class='titlebar' width=500>Mill Creek Information</td>
    </tr>
  </table>
</div>
<br>

<span id='aa' style='visibility:visible;position:absolute;top:210;left:275;width:525;background:#666666;text-align:justify;font-size:14pt;color:white'>
<br>
The Mill Creek Hotshots is a 21 person Type-I Hotshot crew located at the Mill Creek Ranger Station in the San Bernardino 
National Forest.  
</span>

<!-- ***************************************************************************************  -->
<!-- Mission Statement -->




<div id='b' style='position:absolute;top:180;left:0;visibility:hidden'>
  <table bgcolor=#023E19 width=800> <!--bgcolor=#006600 width=800> -->
    <tr>

<script language="JavaScript1.2">
      document.write("<td class='titlebar' width=300>" + lmonth + " " + date +", " + year + "</td>");

</script>

      <td class='titlebar' width=500>
          Mission Statement
      </td>
    </tr>
  </table>
</div>
<br>
<span id='bb' style='visibility:hidden;position:absolute;top:210;left:275;width:525;background:#666666;text-align:justify;font-size:14pt;color:white'>

<br>
The primary mission of the Mill Creek Hotshots is to provide federal, state, and local fire
      cooperators a well trained, highly skilled, and professional wildland fire suppression team.
</span>
<!-- End Mission Statement -->
<!-- ************************************************************************************** -->

<!-- Vision Statement -->
<div id='c' style='position:absolute;top:180;left:0;visibility:hidden'>
  <table bgcolor=#023E19 width=800> <!--bgcolor=#006600 width=800> -->
    <tr>
<script language="Javascript1.2">
      document.write("<td class='titlebar' width=300>" + lmonth + " " + date +", " + year + "</td>");
</script>
      <td class='titlebar' width=500>
          Vision Statement
      </td>
    </tr>
  </table>
</div>
<br>
<span id='cc'  style='visibility:hidden;position:absolute;top:210;left:275;width:525;background:#666666;text-align:justify;font-size:14pt;color:white'>

<br>
The vision of the Mill Creek Hotshot Crew is to maintain the qualifications and requirements of a Regional Hotshot Crew 
and to establish a Hotshot Crew Legacy for itself on the San Bernardino National Forest through a continuing tradition 
of high ethical standards, teamwork, organizational pride, and professional attitude
</span>
<!-- End Vision Statement -->
<!-- ***************************************************************************************** -->

<!-- Program Emphisis -->
<div id='d' style='position:absolute;top:180;left:0;visibility:hidden'>
  <table bgcolor=#023E19 width=800> <!--bgcolor=#006600 width=800> -->
    <tr>
<script language="Javascript1.2">
      document.write("<td class='titlebar' width=300>" + lmonth + " " + date +", " + year + "</td>");
</script>

      <td class='titlebar' width=500>
          Program Emphisis
      </td>
    </tr>
  </table>
</div>
<br>
<span id='dd' style='visibility:hidden;position:absolute;top:210;left:275;width:525;background:#666666;text-align:justify;font-size:14pt;color:white'>

<br>
1.  <span class='prog_tit'>Wildland Fire Suppression</span><br>
The Mill Creek Hotshots primary goal is to be used as a Type-I Regional Hotshot Crew during the 
suppresion of wildland fires at the federal level and to assist the state and local fire agencies
as requested.  The majority of our operating procedures, training, and crew structure will reflect
wildland fire operations, prescribed burning, and hazardous fuels reduction.

<br>
2.  <span class='prog_tit'>Disaster Assistance</span><br>
The Mill Creek Hotshots will also be available for incidents such as floods, earthquakes, hurricanes, etc...
During these types of incidents the crew will respond within its limits of experience, training, and 
qualifications.  At these times the crew will maintain its organizational structure, discipline, and 
professionalism in order to meet the needs of the incident.

<br>
3.  <span class='prog_tit'>Resource Management</span><br>
When not commited to incident assignments the Mill Creek Hotshots will be available for other resource
management objectives.  The crew will strive to be an effective and energetic workforce for forest 
projects initiated by prevention, recreation, facilities, and enviornmental resources staffs.

</span>
<!-- End Program Emphisis -->
<!-- ******************************************************************************************************* -->

<!-- Crew Organization -->
<div id='e' style='position:absolute;top:180;left:0;visibility:hidden'>
  <table bgcolor=#023E19 width=800> <!--bgcolor=#006600 width=800> -->
    <tr>
<script language="Javascript1.2">
      document.write("<td class='titlebar' width=300>" + lmonth + " " + date +", " + year + "</td>");
</script>
      <td class='titlebar' width=500>
          Crew Organization
      </td>
    </tr>
  </table>
</div>
<br>
<span id='ee' style='visibility:hidden;position:absolute;top:210;left:275;width:525;background:#666666;text-align:center;font-size:18pt;color:white'>


<br>
<?php

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
    $line = '';
    $line = fgets($fp);
    $nline = explode("=",$line);
    $title[$ctr] = $nline[0];

    $cname[$ctr] = $nline[1];
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
//echo "<center>\n"
//echo "<form method=POST action=$PHP_SELF>\n";

//echo "<table width=500 align='center'>\n<tr>\n<td colspan=2  class='creworg'>\n";
//echo "<span class='crew_tit'>$title[0]</span><br>";
//echo "$cname[0]\n";
//echo "</td>\n</tr>\n";
for($ctr=0; $ctr<=10; $ctr++)
{
  w_t($four_one_title[$ctr], $four_one_name[$ctr], $four_two_title[$ctr], $four_two_name[$ctr]);
}
echo "</table>\n</span>\n";
?>

<!-- End Crew Organization -->
<!-- ********************************************************************************************************* -->



<div id='f' style='position:absolute;top:180;left:0;visibility:hidden'>
  <table bgcolor=#023E19 width=800> <!--bgcolor=#006600 width=800> -->
    <tr>
<script language="Javascript1.2">
      document.write("<td class='titlebar' width=300>" + lmonth + " " + date +", " + year + "</td>");
</script>
      <td class='titlebar' width=500>
          Crew Training
      </td>
    </tr>
  </table>
</div>
<span id='ff' style='visibility:hidden;position:absolute;top:210;left:275;width:525;background:#666666;text-align:justify;font-size:14pt;color:white'>
Mill Creek Training
</span>

<!-- Menu on left side of page -->
<div id='mill_creek_menu' style='position:absolute;left:0;top:210'>
<table class='menu'width=180 height=300>
   <tr height=50>
      <td class='menu' width=180>
         <a href=javascript:show_info(1);>About Mill Creek</a>
      </td>
   </tr>

   <tr height=50>
      <td class='menu' width=180>
         <a href=javascript:show_info(2);>Mission Statement</a>
      </td>
   </tr>

   <tr height=50>
      <td class='menu' width=180>
         <a href=javascript:show_info(3);>Vision Statement</a>
      </td>
   </tr>

   <tr height=50>
      <td class='menu' width=180>
         <a href=javascript:show_info(4); onMouseOver="status='Mill Creek Hotshots Program Emphasis'; return true;">Program Emphasis</a> 
      </td>
   </tr>

   <tr height=50>
      <td class='menu' width=180>
         <a href=javascript:show_info(5); onMouseOver="status='Mill Creek Hotshots Crew Organization'; return true;">Crew Organization</a>  
      </td>
   </tr>

   <tr height=50>
      <td class='menu' width=180>
         <a href=javascript:show_info(6); onMouseOver="status='Mill Creek Hotshots Training'; return true;">Training</a>
      </td>
   </tr>

   <tr height=50>
      <td class='menu' width=180>
         <a href=index.html>Home</a>  
      </td>
   </tr>
</table>
</div>










</body>
</html>   
 
