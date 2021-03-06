<?php
$years = array();
$ctr = 0;
$default_years_dir = "../Images/Pics/";
$data_dir = "../Images/DATA/";
$years_file = "years.txt";

include "../INCLUDES/common.inc";

function open_file($fname, $mode)
{
  if(!($fp = fopen("$fname", "$mode"))) die ("Cannot open file!");
  //echo "<h4>File opened</h4><br>";
  return $fp;
}

function read_file($fp)
{
  do
  {
    $line='';
    $line = fgets($fp);
    //echo "<br>$line<br>";
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
    //echo "<br>$line<br>";
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

function select_form($fp, $mode, $year)
{
  global $PHP_SELF;
	$hold = read_file($fp);
  $hold_one = str_replace("\n", "", $hold);
  $total = count_lines($fp);
  $years = explode(",", $hold_one);
  
  switch ($mode) {
    case "fire":
  		$title = "fire";
			$s_name = "fire";
			$value = "3";
			break;
		case "year":
			$title = "year";
			$s_name = "year";
			$value = "1";
			break;
	}  
	echo "<center>\n";
  echo "<form method=POST action=$PHP_SELF>\n";
  echo "<table>\n";
  echo "<tr>\n";
  echo "<td class='creworgII'>Select $title</td>\n";
  echo "<td class='creworgII'>";
  echo "<select name=$s_name>\n";
  for($x = 0; $x < $total; $x++)
  {
  echo "<option>$years[$x]</option>\n";
  }
  echo "</td>\n";
  echo "<td class='creworgII'><input type=submit value=Continue></td>\n</tr>\n</table>\n";
  echo "</select>\n";
  echo "<input type=hidden name=dir_year value=$year>\n";
  echo "<input type=hidden name=mode value=$value></form></center>\n";
}

function add_form($mode, $year)
{
  global $PHP_SELF;
  
  switch ($mode) {
    case "fire":
    	$title = "fire";
			$t_title = "fire";
			$value = "4";
			$s = "20";
			$ml = "20";
			break;
		case "year":
			$title = "year";
			$t_title = "year";
			$value = "2";
			$s = "5";
			$ml = "4";
			break;
	}	
	echo "<center>\n<form method=POST action=$PHP_SELF>\n";
  echo "<table>\n<tr>\n";
  echo "<td class='creworgII'>Add a $title</td>\n";
	echo "<td class='creworgII'>";
	echo "<input type=text size=$s maxlenth=$ml name=$t_title></td>\n";
  echo "<td class='creworgII'>";
	echo "<input type=submit value='Add $title'></td>\n";
  echo "</tr>\n</table>\n";
  echo "<input type=hidden name=mode value=$value>\n";
  echo "<input type=hidden name=dir_year value=$year></form></center>\n";
  //echo "</body>\n</html>\n";
}

function end_html()
{
  echo "</body>\n</html>";
}

function html_body($style)
{
  echo "<body$style>\n";
}

function add_or_select_year($year)
{
    //global $PHP_SELF;
    html_head(0);
    end_header("../INCLUDES/crew_four_stylesheets.css", "");
    $fp = open_file("../Images/DATA/years.txt", "r");
    html_body(" bgcolor=#666666");
    small_title_pic("Add Pictures to site");
    select_form($fp, "year", $year);
    close_file($fp);
    add_form("year", $year);
    //echo "<br>" . getcwd() . "<br>";
    end_html();
}

function add_data_to_file($fname, $data)
{
  global $data_dir;
  $f = $data_dir . $fname;
	$fp = open_file($f, "a");
  $data = $data . "\n";
  add_to_file($fp, $data);
  close_file($fp);
}

function create_directory($dir, $new_dir)
{
  $current_dir = getcwd();
  echo "<br>$current_dir<br>";
  if($new_dir == "")
  {
    echo "<h1>No Directory to create</h1><br>\n";
  } elseif ($dir == "") {
    echo "<h1>Cannot change directory!</h1><br>\n";
  } else {
    chdir($dir);
    mkdir($new_dir, octdec("2775"));
    //chmod($new_dir, 2775);
    chdir($current_dir);
  }
}

function is_image($file) {
  $extension = array_pop(explode(".", $file));
  if ($extension == "JPG" || $extension == "jpg"){
    return 1;
  } else {
    return 0;
  }
}

function pic_links($dir_name)
{
  global $PHP_SELF;
	$dir = dir($dir_name);
  //echo $dir->handle;
  //echo "<br>\n";
  //echo $dir->path;
  //echo "</h3>\n";
  //$x_dir = "../Images/Pics/" . $dir_year . "/" . $fire . "/";
  echo "<center>\n";	
  while($f = $dir->read()) {
	   if($f != '.' && $f != '..') {
	     if(is_image($f)) {
	       echo "<table>\n<tr><td>\n";
				 echo "<form action=$PHP_SELF method=POST>\n";
	       echo "<input type=hidden name=mode value=7>\n";
	       echo "<input type=hidden name=dir_name value=$dir_name>\n";
	       echo "<input type=hidden name=image value='$f'>\n";
	       echo "<table width=300>\n<tr>\n";
	       echo "<td align=left valign=middle>$f</td>\n";
	       echo "<td align=right valign=middle><input type=submit value='View Image'></td>\n";
	       echo "</tr>\n</table>\n</form>\n";
	       echo "</td>\n<td>\n";
	       echo "<form action=$PHP_SELF method=POST>\n";
	       echo "<table width=100>\n<tr>\n";
	       echo "<input type=hidden name=mode value=6>\n";
	       echo "<input type=hidden name=dir_name value=$dir_name>\n";
	       echo "<input type=hidden name=image value='$f'>\n";
	       echo "<td align=right valign=middle><input type=submit value='Delete Image'></td>\n";
	       echo "</tr>\n</table>\n</form>\n";
	       echo "</td>\n</tr>\n</table><br>\n";
	       //echo "<a href=" . $dir_name . "/" . $f . ">$f" . "<br>";
	     }
	   }
	}
	echo "</center>\n";
  $dir->close();    
}
function upload_form($dir_name)
{
	global $PHP_SELF;
	echo "<center>\n";
	echo "<table border=1><tr><td cellpadding=5 align=center valign=middle>\n";
	echo "<form method='POST' enctype='multipart/form-data' action='$PHP_SELF'>\n";
  echo "<input type=hidden name=mode value=5>\n";
  echo "<input type=hidden name=dir_name value=$dir_name>\n";
  echo "<table>\n";
  echo "<tr>\n";
  echo "<td align=center valign=middle>Select picture to upload:</td>\n";
  echo "<td align=center valign=middle><input type=file name=userfile></td>\n";
  echo "<td align=center valign=middle><input type=submit name value='Upload File'></td>\n";
  echo "</tr>\n";
  echo "</table>\n";
  echo "</form>\n";
  echo "</td></tr></table>\n";
	echo "</center>\n";  
}

function upload_file($dir_name)
{
	global $userfile, $userfile_name, $userfile_size, $userfile_type, $archive_dir, $WINDIR;
	if(isset($WINDIR)) $userfile = str_replace("\\\\", "\\", $userfile);
		
	$filename = basename($userfile_name);
	$filename = str_replace(" ", "", $filename);
	$upload_file = $dir_name . "/" . $filename;
	if($userfile_size <= 0) die ("$filename is empty");
		
	if(!@copy($userfile, $upload_file)) die ("Can't copy $userfile_name to $filename");
		
	//if(isset(!($WINDIR)) && !(@unlink($userfile))) die ("Can't delete $userfile_name");
	if(!@unlink($userfile)) die ("Can't delete $userfile_name");
}

function begin_page($message)
{
  html_head(0);
  end_header("../INCLUDES/crew_four_stylesheets.css", "");
  html_body(" bgcolor=#666666");
  small_title_pic($message);
}

switch ($mode)
{
  case 1:   // A year was selected
    begin_page($year);
		//open file for year selected
    $year_file = "../Images/DATA/" . $year . ".txt";
    $year_file = str_replace(" ", "", $year_file);
    $fp = open_file($year_file, "r");    
    select_form($fp, "fire", $year);
    add_form("fire", $year);
    //get fires for the year if any
    //display choice for fires
    //display text box for new fires
    //echo "<h1>Year selected</h1>";
    end_html();
    break;
  case 2:  // Add a year to the file and display same screen
    add_data_to_file($years_file, $year);  // Add the year to file
    create_directory("../Images/Pics", $year);
    add_or_select_year("''");
    break;
  case 3: // A Fire was selected
  	begin_page("$fire");		
		//echo "<h1>A Fire was selected: $fire, $dir_year</h1><br>\n";
  	//echo "<h2>The directory will be: $dir_year/$fire</h2><br>\n";
  	//echo "<h3>The current directory is:";
  	$n_dir = "../Images/Pics/" . $dir_year . "/" . $fire;
    pic_links($n_dir);
    upload_form($n_dir);
  	end_html();
  	break;
  case 4: // Add a fire to the list
  	$y_file = $dir_year . ".txt";   // holds the filename for the year selected
  	begin_page("Select or Add Fire");
		//echo "<h1>$y_file will be used</h1><br>\n";
		add_data_to_file($y_file, $fire);
  	$y_dir = "../Images/Pics/" . $dir_year;
  	//echo "<h1>$y_dir is the Directory to be used</h1><br>\n";
  	//echo "<h2>$fire is the Directory to be created</h2><br>\n";
  	create_directory($y_dir, $fire);
	  //add fire to year file//add directory//display fire select page
		$y_file = $data_dir . $y_file;
		$fp = open_file($y_file, "r");
		select_form($fp, "fire", $dir_year);
		add_form("fire", $dir_year);
		end_html();
		break;
	case 5:  // uploading a file
		begin_page("Select or Add Picture");		
		upload_file($dir_name);
    pic_links($dir_name);
    upload_form($dir_name);
  	end_html();
  	break;
	case 6: //delete a file
		begin_page("Delete Image");
		echo "Directory is: $dir_name\n<br>\n";
		echo "File name is: $image\n<br>\n";
		$dir = dir($dir_name);
		while($f = $dir->read()) {
		  if($image == $f) {
		    echo "$image was found and is able to delete!\n<br>\n";
		    $ok = 1;
		  }
		}
		$dir->close();
		
		$current_dir = getcwd();
		if($ok == 1) {
		  chdir($dir_name);
		  if(!@unlink($image)) die ("Can't delete file: $image");
		  echo "Image: <b>$image</b> was deleted.<br>\n";
		  chdir($current_dir);
		}
		pic_links($dir_name);
		upload_form($dir_name);
		
		end_html();
	  break;
	case 7: // display pic page to delete
		begin_page($image);
		echo "<center>\n";
		echo "<img src='" . $dir_name . "/" . $image . "'>\n";
		$d = explode("/", $dir_name);
		$num = count($d);
		
		$f = end($d);
		$y = prev($d);
		//echo "\$f(Fire Directory): $f<br>\n";
		//echo "\$y(Year Directory): $y<br>\n";
		echo "<br>\n";
		echo "Year directory is: $y<br>\n";
		echo "Image is: $image<br>\n";
		echo "<table><tr><td>\n";
		echo "<form action=$PHP_SELF method=POST>\n";
		echo "<input type=hidden name=dir_year value=$y>\n";
		echo "<input type=hidden name=fire value=$f>\n";
		echo "<input type=hidden name=mode value=3>\n";
		echo "<input type=submit value='Back'>\n";
		echo "</form>\n";
		echo "<td><form action=$PHP_SELF method=POST>\n";
		echo "<input type=hidden name=dir_name value=$dir_name>\n";
		echo "<input type=hidden name=mode value=6>\n";
		echo "<input type=hidden name=image value='$image'>\n";
		echo "<input type=submit value='Delete'>\n";
		echo "</form></td></tr></table></center>\n";
		end_html();
		break;	
  default:  // Select a year or add one
    add_or_select_year("''");

}
?>
