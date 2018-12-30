<?php 
include "db.php";


?>

<html>
<head>
<title>Page 2</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<style >
.rowheight {height:50px;}
</style>

<script>
myform.onsubmit=function()
{

  return false;
}
</script>

</head>
<body>
<form action="index4.php" method="post" id="myform">
<div class="container ">
		<h1>Buy and Hold Analysis</h1>
  <!-- Content here -->
    

<div id="page1">

  jklhlkhjkl


</div>




<div id="page2">

 

  <div class="row">
    <div class="col">
      <label for="reportTitle">Purchase Price *</label>
      <input type="text"  name="propertyPurchasePrice" class="form-control" id="propertyPurchasePrice" placeholder="$" value="<?php echo $property_price?>" required>
    </div>
      <div class="col"></div>
  </div>

  <div class="row   rowheight"> </div>
    <div class="row">
      <div class="col">
          <label for="propertyAddress">Down payment</label>
          <input type="text" class="form-control" name="propertyDownpayment" id="propertyDownpayment" placeholder="" value="<?php echo $property_downpayment?>" required>
      </div>
      <div class="col"></div>
  </div>	

  
<div class="row   rowheight"> </div>

<div class="row">

<div class="col">  
<label for="propertyCity">Loan Interest Rate (%) *</label>
      <input type="text" class="form-control" name="propertyInterestRate" id="propertyInterestRate" placeholder="" value="<?php echo $property_interest_rate?>" required>
</div>
<div class="col"> </div>
</div>

<div class="row   rowheight"> </div>
<div class="row rowheight">
	<div class="col">
<label for="propertyZip">Amortized Over How Many Years</label>
      <input type="text" class="form-control" name="propertyAmortized" id="propertyAmortized" placeholder="" value="<?php echo $property_amortized?>" required>
  
</div>
<div class="col"></div>
</div>

<div class="row rowheight"></div>



<div class="row   rowheight"> </div>

<button onclick="show()">Previous</button>  <button onclick="hide()">Next</button>

</div>



  
</div>




<button type="button" onclick="bump()">got it</button>
<script>

document.getElementById("page2").style.display="none";

function bump(){
      document.getElementById("page2").style.display="block";
      document.getElementById("page1").style.display="none";
}
</script>


</body>
</html>