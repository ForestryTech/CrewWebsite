<?php
//opening crewmembers file
$title_field = 14;
$equal_sign = 1;
$name = 20;

$new_sup_name = "Superintendant";
$new_sup_title = "Pete Coy";
$new_four_one_title = array(10);
$new_four_one_name = array(10);
$new_four_two_title = array(10);
$new_four_two_name = array(10);

$cname = array(21);
$title = array(21);
$ctr = 0;
$limit = 0;
$fname = "one";
$fnamea= "onea";
$line = '';

include "../INCLUDES/common.inc";

//if($is_valid != 1)/
//{
//  html_head(0);
//  echo "\n";
//  //include "../INCLUDES/crew_four_stylesheets.css";
//  echo "\n";
//  end_header("../INCLUDES/crew_four_stylesheets.css", "");
//  echo "<body bgcolor='#666666'>\n";
//  //small_title_pic();
//  echo "<h2>You are not authorized to view this page!</h2>\n";
//  echo "</body></html>\n";
//  exit;
//}

html_head(0);
echo "\n";
//include "../INCLUDES/crew_four_stylesheets.css";
echo "\n";
end_header("../INCLUDES/crew_four_stylesheets.css", "");

echo "\n<body bgcolor='#666666'>\n";



if($status == 1)
    {
      if(!($fp = fopen("../TEST/crewmembers1.mch", "w"))) die ("Cannot open file!");
      

        $line = $new_sup_title . "=" . $new_sup_name . "\n";
        fwrite($fp,$line);
      // 4-1 name and title loop
      for($ctr = 0; $ctr <= 9; $ctr++)
      {
        $new_four_one_title[$ctr] = $four_one_title[$ctr];
        if($four_one_name[$ctr] == "")
        {
          $new_four_one_name[$ctr] = "Vacant";
        } else {
          $new_four_one_name[$ctr] = $four_one_name[$ctr];
        }
        $line = $new_four_one_title[$ctr] . "=" . $new_four_one_name[$ctr] . "\n";
        fwrite($fp,$line);
        echo "$line\n -- was written to a file<br>\n";
      }
      
      // 4-2 name and title loop
      for($ctr = 0; $ctr <= 9; $ctr++)
      {
        $new_four_two_title[$ctr] = $four_two_title[$ctr];
        if($four_two_name[$ctr] == "")
        {
          $new_four_two_name[$ctr] = "Vacant";
        } else {
          $new_four_two_name[$ctr] = $four_two_name[$ctr];
        }
        $line = $new_four_two_title[$ctr] . "=" . $new_four_two_name[$ctr] . "\n";
        fwrite($fp,$line);
        echo "$line\n -- was written to a file<br>\n";

      }
      //exit;
      fclose($fp);
    }
if(!($fp = fopen("../TEST/crewmembers1.mch", "r"))) die ("Cannot open file!");

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
//echo "<center>\n"
echo "<form method=POST action=$PHP_SELF>\n";

echo "<table width=500 align='center'>\n<tr>\n<td colspan=2  class='creworg'>\n";
echo "<span class='crew_tit'>$title[0]</span><br>";
echo "$cname[0]\n";
    
for($ctr=1; $ctr<=10; $ctr++)
{
    echo "</td>\n</tr>\n<tr>\n";
    
    echo "<td class='creworg'><span class='crew_tit'>";
    echo "<input type='text' value='$title[$ctr]' size='20' maxlength='20' name='four_one_title[]'";
    echo " /></span>";
    echo "<br><input type='text' value='$cname[$ctr]' size='20' maxlength='20' name='four_one_name[]' /></td>\n";
    
    echo "<td class='creworg'><span class='crew_tit'>";
    echo "<input type='text' value='$title[$ctra]' size='20' maxlength='20' name='four_two_title[]'";
    echo " /></span><br><input type='text' value='$cname[$ctra]' size='20' maxlength='20' name='four_two_name[]' /></td>\n";
    echo "</tr>\n";
    $ctra++;
}
echo "</table>\n";
echo "<input type='hidden' name='status' value=1>";
echo "<center><input type='submit' value='Make Changes'></form></center>";
echo "</body>\n</html>\n";
?>
