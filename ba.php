<?php
//require_once('connect.php');// Start the session
session_start();// Clear the error message
$error_msg = "";
// If the user isn't logged in, try to log them in
if (!isset($_SESSION['user_id'])){
    if (isset($_POST['submit'])){
      // Connect to the database
	  $hostname="webblogdatabase1.db.137138907.hostedresource.com";  $username="webblogdatabase1";

$password="password!";    $dbname="webblogdatabase1";     $count=0;
$usertable = blog1;
$dbc = mysqli_connect($hostname,$username, $password,$dbname) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");


      // Grab the user-entered log-in data
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
        //$query = "SELECT user_id, username FROM users WHERE username = '$user_username' AND password = SHA('$user_password')";
		$query = "SELECT user_id, username FROM users WHERE username = '$user_username' AND password = '$user_password'";
			$user_password =sha1($user_password);
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          //$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 'index.php';
          //header('Location: ' . $home_url);
		//out put the job page
		
		  
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = "Sorry, you must enter a valid username and password to log in! ";
		  
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in!!';
      }
    }
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<script src=\"//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js\"></script>
<script src=\"sorttable.js\"></script>
<script src=\"general.js\"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Stephen's Interviewer App</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h3>Business Advantage App <a href='https://p3nlmysqladm002.secureserver.net/grid55/5/index.php'>Mwsql</a></h3>

<?php
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Log In</legend>
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
      <label for="password">Password:</label>
      <input type="password" name="password" />
    </fieldset>
    <input type="submit" value="Log In" name="submit" />
  </form>

<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
	
	
	
	$subject = $_REQUEST['job'] ; if(empty($subject)) $subject="Business Advantage Research"; else $subject.="";
	$job=$_REQUEST['job'] ;
	$job=strtoupper($job);

 $hostname="webblogdatabase1.db.13738907.hostedresource.com";  $username="webblogdatabase1";

$password="Feat127aloe508!";    $dbname="webblogdatabase1";     $count=0;
$dbc = mysqli_connect($hostname,$username, $password,$dbname) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
        $queryba = "SELECT * from BusinessAdvantage where Status not like '%Refused%'  and Status not like 'Completed'";
        $resultba = mysqli_query($dbc, $queryba);
if($resultba)
{


while($row = mysqli_fetch_array($resultba))
{     $CompanyNumber =  $row["CompanyNumber"];
   //   $html.=$CompanyNumber;
    $CompanyName =  $row["CompanyName"];
     //     $html.=$CompanyName;
    $Respondent = $row["Respondent"];
  //    $html.=$Respondent;
   $Position = $row["Position"];
   //      $html.=$Job;
   $PhoneNumber = $row["PhoneNumber"];
      $LastCalled = $row["DateandTime"];
            $Status = $row["Status"];
                           $Notes = $row["Notes"];
         $html.="Call ".$Respondent." on <a href='callto://".$PhoneNumber."' title='Status:".$Status.", last called: ".$LastCalled."'>".$PhoneNumber."</a>, ". $Position." at ".$CompanyName." #". $CompanyNumber; 
                  if (isset($Notes) && !(empty($Notes))) $html.= " Notes: <span style='color:red'>". $Notes ."</span>";
                  $html.="<br>";

      //         $html.=$Status;
     //    $date = $row["Notes"];

  $month = date( "F",strtotime($date));
            $year = date( "Y",strtotime($date));



  }

  echo $html;
  $html="";
}
$dbc = mysqli_connect($hostname,$username, $password,$dbname) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");

        $querybaCompanies = "SELECT * from BusinessAdvantageCompanies where status not like 'Completed' and status not like 'Refused'";
        $resultbaCompanies = mysqli_query($dbc, $querybaCompanies);
if($resultbaCompanies)
{


while($row = mysqli_fetch_array($resultbaCompanies))
{     $CompanyNumber =  $row["CompanyNumber"];
   //   $html.=$CompanyNumber;
    $CompanyName =  $row["CompanyName"];
     //     $html.=$CompanyName;
    $PhoneNumber = $row["Number"];
  //    $html.=$Respondent;
            $Status = $row["Status"];
         $html.="Company Name ".$CompanyName." #". $CompanyNumber." ".$Status; 
                  $html.="<br>";


  }

  echo $html;
}
else echo "no company result";

?>
 <br>
<a href='ba.php?job=report'>Send previous report</a> 
<a href='ba.php?job=schedule'>Ask to scheduled appointment</a> 
<a href='ba.php?job=Thanks'>Thank for interview</a> 
</h3>
  <form method='post' action='apply-ba.php' name="Mailer"><input name='email' type='text' value='sifan64@gmail.com'><input name='subject' type='text' value='<?php echo $subject ?>'><br><textarea name='message' rows='10' cols='40'>Dear <? $Respondent ?> Sir or Madam,<br><br>
<?

if (preg_match("/\bschedule\b/i", $job)) {

?>

Thank you for talking to me, as requested, here is my email contact.
I would like to schedule an appointment with you. 

I look forward to hearing from you,<br><br>

Warmest regards,<br><br>
Stephen P. Thompson<br><br>
+44 my number<br>

<? 
}

elseif (preg_match("/\bThanks\b/i", $job)) {

?>

Thank you for talking to me. If you would like a copy of our final report, please contact me. 

I look forward to hearing from you,<br><br>

Warmest regards,<br><br>
Stephen P. Thompson<br><br>
+44 my number<br>
<a href='http://hk.linkedin.com/in/1stephenthompson'>http://hk.linkedin.com/in/1stephenthompson</a> 

<? 
}
elseif (preg_match("/\breport\b/i", $job)) {

?>

Thank you for talking to me. As requested, here is copy of our final report. 

Best wishes,<br><br>

Warmest regards,<br><br>
Stephen P. Thompson<br><br>
+44 my number<br>
<a href='http://hk.linkedin.com/in/1stephenthompson'>http://hk.linkedin.com/in/1stephenthompson</a> 
<? 
}

else {
 
?>
I am calling from Business Advantage, we are researching PLM solutions in your industry and we would like to talk to you! <a href='http://hk.linkedin.com/in/1stephenthompson'>http://hk.linkedin.com/in/1stephenthompson</a>    <br><br>
Stephen Thompson<br><br>
+44 my number<br>

<?
}


?>
</textarea><br>Contact phone number: <input type='text' name='phonenumber'><br><input type='submit' 'send'> </form>
<?

echo "<a href='logout.php'>logout</a>";
  }
?>
</body>
</html>
