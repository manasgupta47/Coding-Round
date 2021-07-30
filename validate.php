<html>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Validation</title>
</head>
<body>
<div style="background-image: url('https://mcdn.wallpapersafari.com/medium/23/30/IpcZNP.jpg');">
<form method="post" action="final.php" >

<?php


$email=$_POST['email'];
$psw=$_POST['pass'];
$flag=0;
$s=array();
$file = fopen("details.txt", 'r');
while(!feof($file))
  {
  $s=fgets($file);
  $str_arr = array_pad(explode('::', $s),4,null);
  if ($str_arr[1]==$psw and $str_arr[2]==$email){
		session_start();
		$_SESSION['name']=$str_arr[0];
		$_SESSION['email']=$str_arr[1];
		$_SESSION['app_num']=$str_arr[3];

		$ques_num=(($str_arr[3])%20) + 1;
		echo "<h2><mark>Welcome ".$_SESSION['name']."<mark></h2><br>";
                echo "Your Job Application number for <b><u> STATUS INFOTAINMENT</u></b> is ".$str_arr[3];
                echo "<center><h2><mark>".file_get_contents( "questions/".$ques_num.".txt" )."</mark></h2></center>" ;
		
?>

<center>

<table border=0>
<tr>
<td><b>Choose Your Programming Language
<td>
<select name="lang" class="un">
<option value=".java">Java</option>
<option value=".py">Python</option>
</select></b>

</tr>
<tr>
<td colspan=2><textarea name="prog" rows=31 cols=150 required></textarea>
</tr>

</table>
</form>
<center>
<?php
		$flag=1;
	  	break;
	}//end if 
  }//end while
if ($flag==0)
	echo "Please register before login  ";
fclose($file);
?>
<input class="submit" align="left"  type="submit" value="Submit" >

</body>
</html>