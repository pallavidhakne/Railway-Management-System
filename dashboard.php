
<?php

session_start();

$email=$_SESSION['user_info'];
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}


        $sql = "SELECT * from trains where t_no = (SELECT t_no from passengers where email = '$email')";
        // $sql = "SELECT * from trains";
        
        $result = $conn->query($sql);

        $rnum = mysqli_num_rows($result);

        $data = mysqli_fetch_all($result);
        
        
        for($j=0;$j<$rnum;$j++){
            

        $info=array("Train no. ","Train name ","Source ","Destination ","Type" ,"Status ","No. of seats ","Duration ");
        echo'<h2 style="position: absolute; top: 20vh;">' ."Schedule of the Train" .'</h2>';
        for($i=0;$i<8;$i++){
            
            $h=3*$i+25+35*$j;
            echo'<h3 class="data1" style="position:absolute; top:'.$h.'vh;">'.$info[$i]."   :  ".$data[$j][$i].'</h3>';

        }
        
    }

?>

<HTML>
<HEAD>
    <TITLE>Indian Railways</TITLE>
    <LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#logo	{
			font-size: 20px;
			background-color: white;
			width: 500px;
			color: white;
			height: 300px;
			margin: auto;
			border-radius: 25px;
			border: 2px solid blue; 
			margin: auto;
  			position: absolute;
  			left: 0; 
  			right: 0;
  			padding-top: 40px;
  			padding-bottom:20px;
  			margin-top: 130px;
			background-color: rgba(0,0,0,0.8);
 
		}
		html   { 
		  background: url(img/img1.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#main	{
			padding-top: 20px;
		}
        form{
            display: inline-block;
        }
	</style>
</HEAD>
<BODY>
<?php
include("header.php"); ?>
<form action="changepw.php" method="POST">
    <input type="submit" value="Change the Password" name="changepw1" style="float:right;">    
</form>

<form action="logout.php" method="POST">
    <input type="submit" value="Logout" name="logout" style="float:right;">    
</form>


</div>
</BODY>
</HTML>