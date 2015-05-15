<?php
include "INCLUDES/common.inc";
$year_file = "years.txt";
$yfdata = array();

function end_html()
{
  echo "</body>\n</html>";
}

function html_body($style)
{
  echo "<body$style>\n";
}

function begin_page($message)
{
  html_head(0);
  end_header("INCLUDES/crew_four_stylesheets.css", "");
  html_body(" bgcolor=#666666");
  small_title_pic($message);
}
function is_image($file) {
  $extension = array_pop(explode(".", $file));
  if ($extension == "JPG" || $extension == "jpg"){
    return 1;
  } else {
    return 0;
  }
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
    $nline = $nline . $line . ",";
  }while ($line);
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

switch ($mode) {
  case 1:
  	$fp = open_file("Images/DATA/years.txt", "r");
  	$data = read_file($fp);
  	$total = count_lines($fp);
  	$yfdata = explode(",", $data);
  	echo "<center>\n";
  	echo "<table width=800>\n";
  	echo "<tr>\n";
		for($ctr = 1; $ctr <= ($total + 1); $ctr++) {
		  $z = $ctr - 1;
  	  echo "<td align=center>\n";
  	  echo "<a href=$PHP_SELF?year=$yfdata[$z]&mode=2>$yfdata[$z]</a>";
  	  echo "</td>\n";
  	  if((($ctr % 4) == 0) && $ctr != 0){
  	    echo "</tr><tr>\n";
  	  }
  	}
  	echo "</tr>\n</table>\n";
  	for($u = 0; $u < 15; $u++) {
  	  echo "<br>";
  	}
  	echo "\n";
  	page_nav();
  	close_file($fp);
  	end_html();
  	break;
  // This case will be used for when the page is first called
  // it will open the years.txt file and show them as links on
  // the page.  The links will call this same script
  // this will pass on the year in the link
  case 2:
  	$year_file = "Images/DATA/" . $year . ".txt";
		$fp = open_file($year_file, "r");
		$data = read_file($fp);
		$total = count_lines($fp);
		$data = str_replace("\n", "", $data);
		$yfdata = explode(",", $data);
		begin_page($year);
		echo "<center>\n";
		echo "<table width=800>\n";
		echo "<tr>\n";
		for($ctr = 1; $ctr <= ($total + 1); $ctr++) {
		  $z = $ctr - 1;
		  echo "<td align=center>\n";
		  $y = str_replace("/", " ", $yfdata[$z]);
		  $y = str_replace("_", " ", $y);
		  $x = str_replace("/", "%", $yfdata[$z]);
		  echo "<a href='$PHP_SELF?year=$year&fire=$x&mode=3'>$y</a>";
		  echo "</td>\n";
		  if((($ctr % 4) == 0) && $ctr != 0) {
		    echo "</tr><tr>\n";
		  }
		}
		echo "</tr>\n</table>\n";
		for($u = 0; $u < 15; $u++) {
  	  echo "<br>";
  	}
  	echo "\n";
  	page_nav();
		close_file($fp);
		end_html();
  	break;
  // This case will be used when a year is clicked on and it will
  // open the file that corresponds to that year and display all
  // of the fires that are in that year with links to those fires
  // this will pass on the year and the fire
  case 3:
  	html_head(0);
  	$dir = "Images/Pics/" . $year . "/" . $fire;
		echo "\n";
  	include "INCLUDES/crew_four_stylesheets.css";
  	echo "\n";
		echo "<script lanugage=javascript>\n";
		echo "<!--\n";
		echo "var ima = new Array(9);\n";
		echo "var n = new Array(9);\n";

		echo "var x = 0;\n";
		$ctr = 0;
		if(!($dp = opendir($dir))) die("Cannot open $dir");
		while($file = readdir($dp)) {
  		if($file != '.' && $file != '..') {
    	//echo "//$file";
    		if(is_image($file) == 1) {
      	//echo "ima[$ctr] = new Image();\n";
      	echo "n[$ctr] = \"$dir/";
      	echo "$file\";\n";
      	$ctr = $ctr + 1;
    		}
  		}
		}
		$ctr = $ctr - 1;
		echo "\n\n";


echo "for (x = 0; x <= $ctr; x++)\n";
?>
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

<?php
page_nav();
?>
</center>

</body>
</html>
<?php
  	break;
  // this case will be used when a fire has been selected and it will
  // show a slide show of the pictures in that directory
  default:
  	$fp = open_file("Images/DATA/years.txt", "r");
  	$data = read_file($fp);
  	$total = count_lines($fp);
  	$data = str_replace("\n", "", $data);
  	$yfdata = explode(",", $data);
  	begin_page("Mill Creek Pictures");
  	echo "<center>\n";
  	echo "<table width=800>\n";
  	echo "<tr>\n";
		for($ctr = 1; $ctr <= ($total + 1); $ctr++) {
		  $z = $ctr - 1;
  	  echo "<td align=center>\n";
  	  echo "<a href=$PHP_SELF?year=$yfdata[$z]&mode=2>$yfdata[$z]</a>";
  	  echo "</td>\n";
  	  if((($ctr % 4) == 0) && $ctr != 0) {
  	    echo "</tr><tr>\n";
  	  }
  	}
  	echo "</tr></table>\n";
  	for($u = 0; $u < 15; $u++) {
  	  echo "<br>";
  	}
  	echo "\n";
  	page_nav();
  	close_file($fp);
  	end_html();
  	break;
  // same as case 1
}
?>