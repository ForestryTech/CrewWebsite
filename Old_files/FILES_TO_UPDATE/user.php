<?php
$uname = array(5);
$pword = array(5);
$nline = array(2);
$ctr = 0;


include "../INCLUDES/common.inc";

if ($auth)
{
  if(!($fp = fopen("users.psw", "r"))) die ("Cannot open file!");
  //html_head();
  //end_header();
  do
  {
    $line='';
    $line = fgets($fp);
    //echo "$line<br>\n";
    $nline = explode(",", $line);
    $uname[$ctr] = trim($nline[0]);
    $pword[$ctr] = trim($nline[1]);
    if(($uname[$ctr] == $username) && ($pword[$ctr] == $password))
    {
      //password match
      $valid = 1;

      break;
    }
    $ctr++;
  }while($line);
  fclose($fp);
  if($valid == 1)
  {
  //set cookie
  setcookie("is_valid", "1", time()+1800);
  //list options
  html_head(0);
  include "../INCLUDES/crew_four_stylesheets.css";
  end_header();
  echo "<body bgcolor=#666666>\n";
  small_title_pic();
  echo "<center>\n";
  add_link("change_names.php", "Change crewmember names and titles");
  echo "<br>\n";
  add_link("../underconst.html", "Add Fire assignments");
  echo "<br>\n";
  add_link("../underconst.html", "Add crew pictures");
  echo "<br>\n";
  echo "</body>\n</html>\n";
  } else {
    html_head(0);
    include "../INCLUDES/crew_four_stylesheets.css";
    end_header();
    small_title_pic("Login");
    echo "<body bgcolor='#666666'>\n";
    echo "<h2>The username: $username was not found</h2>\n";
    echo "</body>\n</html>\n";
  }
} else {
  html_head(0);
  echo "\n";
  include "../INCLUDES/crew_four_stylesheets.css";
  echo "\n";
  end_header();

  echo "<body bgcolor=#666666>\n";
  small_title_pic();

  echo "<center>\n";
  echo "<form action=$PHP_SELF method=POST>\n";
  echo "<table>\n";
  echo "  <tr>\n";
  echo "  <td>Username:</td>\n";
  echo "  <td><input type=text size='20' maxlength='20' name='username'></td>\n";
  echo "  </tr>\n";
  echo "  <tr>\n";
  echo "  <td>Password:</td>\n";
  echo "  <td><input type=password size='20' maxlength='20' name='password'></td>\n";
  echo "  </tr>\n";
  echo "</table>\n";
  echo "<input type='submit' value='Login'>\n";
  echo "<input type='hidden' name=auth value=1>\n";
  echo "</form>\n";
  echo "</body>\n</html>\n";
  }
?>

