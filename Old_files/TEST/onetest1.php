<?php
//opening crewmembers file
$title_field = 14;
$equal_sign = 1;
$name = 20;
$cname = array(21);
$title = array(21);
$ctr = 0;
$limit = 0;
$fname = "one";
$fnamea= "onea";
$line = '';


?>
<!doctype html public "-//W3C//DTD HTML 4.01//EN">

<html>

<head>
<title>Untitled</title>
<meta http-equiv="generator" content="PHP Designer 2005" />
</head>
<style type=text/css>
<!--
  a {color:FFE500;text-decoration:none}

  td.menu {background-color:#666666; color:#023E19;
           font-family:arial, serif, Times, 'Courier New';
           font-size:15pt}

  table.menu {background-color:#666666}

  table.titlebar { background-color:#FFE500 }

  td.titlebar { background-color:#023E19; color:#ffE500;
                font-family:arial, serif, Times, 'Courier New';
                font-size:10pt; line-height:15pt;
                text-align:center}

  table.popup {background-color:#666666}

  td.popup {background-color:#666666; color:FFE500;
            font-family:arial, serif, Times, 'Courier New';
            font-size:10pt; text-align:left}

  td.creworg {font-family:arial, serif, Times, 'Courier New';
              font-size:14pt; text-align:center}
  td.creworgII {font-family:arial, serif, Times, 'Courier New';
                font-size:14pt; text-align:center;
                text-color:white;}
  crewinfo {visibility:visible;
            position:absolute;top:210;left:275;
            width:525;
            background:white;
            text-align:center;
            font-size:18pt}
  span.prog_tit {text-decoration:underline;}
  span.crew_tit {text-decoration:underline; color:white;}

//-->
</style>

<body bgcolor="#666666" text="#000000" link="#0000FF" vlink="#800080" alink="#FF0000">


<?php
if($status == 1)
    {
      if(!($fp = fopen("./crewmembers1.mch", "w"))) die ("Cannot open file!");
      
      $title[0] = "Superintendant";
      $cname[0] = "Pete Coy";
      
      for($ctr = 1; $ctr <= 10; $ctr++)
      {
        $title[$ctr] = $titleb[$ctr - 1];
        $cname[$ctr] = $nameb[$ctr - 1];
        $line = $title[$ctr] . "=" . $cname[$ctr] . "\n";
        fwrite($fp,$line);
        echo "$line\n -- was written to a file<br>\n";
      }
      for($ctr = 0; $ctr <= 9; $ctr++)
      {
        $title[$ctr+11] = $titlea[$ctr];
        $cname[$ctr+11] = $namea[$ctr];
        $line = $title[$ctr+11] . "=" . $cname[$ctr+11] . "\n";
        fwrite($fp,$line);
        echo "$line\n -- was written to a file<br>\n";
        fclose($fp);
      }
      //exit;
    }
if(!($fp = fopen("./crewmembers1.mch", "r"))) die ("Cannot open file!");



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
    echo "<input type='text' value='$title[$ctr]' size='20' maxlength='20' name='titleb[]'";
    echo " /></span>";
    echo "<br><input type='text' value='$cname[$ctr]' size='20' maxlength='20' name='nameb[]' /></td>\n";
    
    echo "<td class='creworg'><span class='crew_tit'>";
    echo "<input type='text' value='$title[$ctra]' size='20' maxlength='20' name='titlea[]'";
    echo " /></span><br><input type='text' value='$cname[$ctra]' size='20' maxlength='20' name='namea[]' /></td>\n";
    echo "</tr>\n";
    $ctra++;
}
echo "</table>\n";
echo "<input type='hidden' name='status' value=1>";
echo "<center><input type='submit' value='Make Changes'></form></center>";
echo "</body>\n</html>\n";
 ?>
