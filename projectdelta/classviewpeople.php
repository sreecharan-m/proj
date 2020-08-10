<?php

session_start();
$usr= $_SESSION['username'];
$conn=mysqli_connect('localhost','shaun','test1234','dproject');

if(isset($_GET['id']))
{

	$id=$_GET['id'];
	$sql="SELECT instructor_name FROM class WHERE id='$id'";
	$result = mysqli_query($conn, $sql); //result set of rows
    $data= mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sqla="SELECT username FROM attendee_classes WHERE class_id='$id'";
    $resulta = mysqli_query($conn, $sqla); //result set of rows
    $dataa= mysqli_fetch_all($resulta, MYSQLI_ASSOC);
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Class Away From Class</title>

<style type="text/css">
	
   #ins {

   	margin-top: 5vh;
   	font: 25px Open Sans;
    font-weight: 900;
    margin-left: 10vw;
   }     

   #atds {

   	margin-top: 3vh;
   	font: 20px Open Sans;
   	margin-left: 10vw;
   
   }

   #names {

   	margin-top: 10px;
   	margin-left: 10vw;
   }

   hr {

   	border: 0;
   	clear: both;
   	display: block;
   	width: 90%;
   	height: 3px;
    background-color: #000;
    margin-top: 5vh;
    margin-right: 0px;
   }



</style>

</head>

<?php include('classviewtop.php'); ?>


<div id="ins">
	
   Instructor : 

  <?php echo $data[0]['instructor_name'];?>

</div>

<hr>

<div id="atds">
	
   <p style="font-weight: 900; font-size: 22px;">Attendees:</p>

   <?php foreach($dataa as $key) { ?>

   
    <?php 
    
    $xy= $key['username'];

    $sqlb= "SELECT name FROM users WHERE username='$xy'";
    $resultb = mysqli_query($conn, $sqlb); //result set of rows
    $datab= mysqli_fetch_all($resultb, MYSQLI_ASSOC);
    
    ?>

    <div id="names">
    	
       <?php echo $datab[0]['name']; ?>

    </div>
   

   <?php } ?>

</div>


</div>

<body>

</html>