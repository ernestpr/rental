<?php 
include "db.php";


?>

<html>
<head>

  <script>
function addProperty()
{
//this is a function that routes to new property
sessionStorage.edit="add";
window.location.href="index2.php?add=add";
return
}
</script>

<title>Page 2</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<style >
.rowheight {height:50px;}
</style>



</head>
<body>
<?php 
session_start();
//print_r($_SESSIONS) ?>

<div class="row rowheight"></div>
<div class="row rowheight">
  <div class="col"></div>
  <div class="col">
    <button class="btn btn-primary" onclick="addProperty();">Add Property</button>
  <table class="table">
<?php 

//while loop through database

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      ?>
      <tr>
        
  <td><a href="index4.php?id=<?php echo $row["ID"]?>">
    <?php echo $row["report_title"]?></a></td><td><a href="index2.php?id=<?php echo $row["ID"]?>">Edit</a></td><td>Delete</td>
  
</tr>

    
     
      <?php
    }
} else {
    echo "0 results";
}
?>
 </table>


  


</div>
<div class="col"></div>

</div>
</body>
</html>