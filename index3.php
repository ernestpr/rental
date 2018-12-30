<?php 
include "db.php";


?>

<html>
<head>
<title>Page 3</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style >
.rowheight {height:50px;}
</style>
</head>
<body>

	<div class="container ">
		<h1>Buy and Hold Analysis</h1>
  <!-- Content here -->

  <form  action="index4.php" method="POST">

  <div class="row">
    <div class="col">
<label for="reportTitle">Total Gross Montly Rent *</label>
      <input type="text" class="form-control" name="propertyGrossRent" id="propertyGrossRent" placeholder="$" value="<?php echo $property_rent?>" >
      </div>
      <div class="col"></div>
</div>



<div class="row   rowheight"> Fixed Expenses</div>

<div class="row">

  <div class="col">
<label for="propertyElectricity">Electricity</label>
      <input type="text" class="form-control" name="propertyElectricity"  id="propertyElectricity" placeholder="" value="<?php echo $property_electricity?>" >
</div>

<div class="col">
<label for="propertyWaterSewer">Water and Sewer</label>
      <input type="text" class="form-control" name="propertyWaterSewer" id="propertyWaterSewer" placeholder="" value="<?php echo $property_watersewer?>" >
</div>

<div class="col">
<label for="propertyPMI">PMI</label>
      <input type="text" class="form-control" name="propertyPMI"  id="propertyPMI" placeholder="" value="<?php echo $property_pmi?>" >
</div>

</div>	



<div class="row">

  <div class="col">
<label for="propertyGarbage">Garbage</label>
      <input type="text" class="form-control" name="propertyGarbage"  id="propertyGarbage" placeholder="" value="<?php echo $property_garbage?>" >
</div>

<div class="col">
<label for="propertyHOA">HOA</label>
      <input type="text" class="form-control" name="propertyHOA"  id="propertyHOA" placeholder="" value="<?php echo $property_hoa?>" >
</div>

<div class="col">
<label for="propertyInsurance">Insurance</label>
      <input type="text" class="form-control"  name="propertyInsurance" id="propertyInsurance" placeholder="" value="<?php echo $property_insurance?>" >
</div>

</div>  

<div class="row">
<div class="col">
  <label for="propertyMaintenance">Maintenance</label>
  <input type="text" class="form-control" name="propertyMaintenance" id="propertyInsurance" placeholder="" value="<?php echo $property_maintenance?>" >
  </div>
  <div class="col"></div><div class="col"></div> 
</div>


</div>
  
<div class="row   rowheight"> </div>



<div class="row rowheight"></div>



<div class="row   rowheight"> </div>




<input type="submit" value="Calculate --&gt;" name="update_3">
</div>

</form>
</div>

</body>
</html>