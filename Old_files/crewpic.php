<?php

$ctr = 0;

function html_header($title) {
  echo "<html>";
  echo "<head><title>$title</title>";
}

function html_footer() {
  echo "</body>";
  echo "</html>";
}

function error_message($msg) {
  html_header();
  echo "<script>alert(\"$msg\"); history.go(-1)</script>";
  html_footer();
  exit;
}


function is_image($file) {
  $extension = array_pop(explode(".", $file));
  if ($extension == "JPG" || $extension == "jpg"){
    return 1;
  } else {
    return 0;
  }
}


html_header("Mill Creek Hotshots");
?>

<style type=text/css>
<!--
  a {color:FFE500;text-decoration:none}
  a.l {color:#666666; text-decoration:none}

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

//-->
</style>


<script lanugage=javascript>
var ima = new Array(9);
var n = new Array(9);

var x = 0;
<?php
if(!($dp = opendir($dir))) die("Cannot open $dir");
while($file = readdir($dp)) {
  if($file != '.' && $file != '..') {
    //echo "//$file";
    if(is_image($file) == 1) {
      //echo "ima[$ctr] = new Image();\n";
      echo "n[$ctr] = \"$dir";
      echo "$file\";\n";
      $ctr = $ctr + 1;
    }
  }
}
$ctr = $ctr - 1;
echo "\n\n";
?>

for (x =0; x < 9; x++)
{
   ima[x] = new Image();
   ima[x].src = n[x];
   //alert(ima[x].src);
}

function showfirstpic()
{
  x = 0;
  document.crew.src = ima[x].src;
}

function ppic()
{
    x--;
    if (x < 0) 
     {
<?php
     echo "      x = $ctr;\n";
?>
     }
    document.crew.src = ima[x].src;
}


function npic()
{  

    x++;
<?php
     echo "    if (x > $ctr)\n";
?>
    {
       x = 0;
    }
    document.crew.src = ima[x].src;

}
</script>
</head>
<body bgcolor=#666666 onload=showfirstpic();>
<center>
<table width=800>
    <tr>
	<td align=center>
            <image src=./Images/titleandlogo.jpg>
	</td>
    </tr>
    <tr>
	<td class='titlebar'>Crew Pictures</td>
    </tr>
</table>

<br>
<center>
<img src="Images/MC4.jpg" name='crew'>
<br>
<table width=500>
<tr>
<td width=150 align=left>
<a href=javascript:ppic(); class='l'><img src=./Images/backbutton.jpg></a>
</td>
<td width=200>
</td>
<td width=150 align=right>
<a href=javascript:npic(); class='l'><img src=./Images/nextbutton.jpg></a>
</td></tr>
</table>
<table width=500>
<tr>
<td width=60 align=center>Back</td>
<td width=380></td>
<td width=60 align=center>Next</td>
</tr>
</table>

<hr>
<table width=800>
<tr>
<td align=center><a href=index.html>Home</a></td>
<td align=center><a href=crew_info.html>Crew Information</a></td>
<td align=center><a href=underconst.html>Employment</a></td>
<td align=center><a href=underconst.html>Pictures</a></td>
<td align=center><a href=http://www.fs.fed.us/r5/sanbernardino/>San Bernardino NF</a></td>
<td align=center><a href=underconst.html>Fire Links</a></td>
<td align=center><a href=underconst.html>Contact Us</a></td>
</tr>
</table>
</center>

</body>
</html>

