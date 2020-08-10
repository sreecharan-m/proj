<?php

session_start();
$usr= $_SESSION['username'];
$name=$_SESSION['name'];
$conn=mysqli_connect('localhost','shaun','test1234','dproject');
$id= $_GET['id'];

$sqla="SELECT instructor FROM class WHERE id='$id'";
$resulta = mysqli_query($conn, $sqla); //result set of rows
$dataa= mysqli_fetch_all($resulta, MYSQLI_ASSOC);

$inst = $dataa[0]['instructor'];

if(isset($_POST['submit']))
{

	$msg = $_POST['classcomment'];
    $sql= "INSERT INTO discussion(username, name, class_id, instructor_username, message) VALUES ('$usr', '$name', '$id', '$inst', '$msg')";

    if(mysqli_query($conn,$sql))
    {
            //echo "success";        
    }

}

$sqlb="SELECT * FROM discussion WHERE class_id='$id' ORDER BY time desc";
$resultb = mysqli_query($conn, $sqlb); //result set of rows
$datab= mysqli_fetch_all($resultb, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Class Away From Class</title>

<style type="text/css">
	
   #comment
   {

   	margin-top: 10vh;
   	text-align: center;
   	display: flex;
   	flex-direction: row;
   	justify-content: center;
   }

   #cc {

   	border: 1px solid black;
   	border-radius: 25px;
   	width: 50vw;
   	height: 8vh;
   	text-align: center;
   }

   #input {
   	text-align: center;

   }

   input {
   	outline: none;
   	font-size: 15px;
   }

   #kkk {

   	display: flex;
   	flex-direction: row;
   	justify-content: center;
   }

   button {

   	outline: none;
    border: none;
    background-color: #ffffff;
    cursor: pointer;
   }

    hr {

   	border: 0;
   	clear: both;
   	display: block;
   	width: 100%;
   	height: 1.5px;
    background-color: #000;
    margin-top: 5vh;
    margin-left: 0px;
   }

   #previous {

   	margin-top: 10px;
   	padding: 10px;
   }

   #posts {

   	display: flex;
   	align-items: center;
   	flex-direction: column;
   }

   .qwe {

   	border: 1px solid black;
   	border-radius: 10px;
   	padding: 20px;
   	width: 70vw;
   	font:16px Open Sans;
    margin-bottom: 5vw;
   }

   .details {

    margin-left: 0px;
   	margin-top: 10px;
   }

</style>

</head>

<?php include('classviewtop.php'); ?>


<div id="comment">
	
  <form method="POST" action="classviewdiscussion.php?id=<?php echo $id ?>">
  
  <div id="kkk">
  <div id="input">
  
  	<input type="text" name="classcomment" id="cc" placeholder="share a public comment with your class">
 
  </div>

  <div id="send" style="margin-left: 20px; margin-top: 8px;">	
   
   <button name="submit"> <img src="images/sendlogo2.jpg" style="width: 42px; height: 42px;"> </button>  

  </div>

 </div>

  </form>

</div>

<hr>


<div id="previous">
	

     <div id="posts">
     	
        <?php foreach($datab as $key) { ?>

         <div class="details">
         Posted By : <?php echo $key['name']; ?>, At: <?php echo $key['time']; ?>
         </div>

         <div class="qwe">
         	
            <?php echo $key['message']; ?>

         </div>

        <?php } ?>	

     </div>


</div>


</div>

<body>

</body>
</html>