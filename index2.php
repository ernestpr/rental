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



</head>


<body>

<?php include "nav.html"; ?>
<div class="container ">
		<h1>Buy and Hold Analysis</h1>
  <!-- Content here -->
    <form action="index4.php" method="post" id="rentForm" enctype="multipart/form-data">

  <div id="page1">

  <div class="row">
    <label for="reportTitle">Report Title</label>
      <input type="text" name="reportTitle" class="form-control " id="reportTitle" placeholder="Report Title" value="<?php echo $report_title?>" required>

      <div class="invalid-feedback">
        Please provide a valid title.
      </div>
      
  </div>

  <div class="row   rowheight"> </div>
  <div class="row">
  <label for="propertyAddress">Property Address</label>
      <input type="text" class="form-control" name="propertyAddress" id="propertyAddress" placeholder="" value="<?php echo $property_address?>" required>
       <div class="invalid-feedback">
        Please provide a valid address.
      </div>
  </div>  
  
  <div class="row   rowheight"> </div>

  <div class="row">

  <div class="col">  
  <label for="propertyCity">Property City</label>
      <input type="text" class="form-control" name="propertyCity" id="propertyCity" placeholder="" value="<?php echo $property_city?>" required>
       <div class="invalid-feedback">
        Please provide a valid city.
      </div>
  </div>

  <div class="col">  
  <label for="propertyState">Property State</label>
      <input type="text" class="form-control" name="propertyState" id="propertyState" placeholder="" value="<?php echo $property_state?>" required>
       <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>

  </div>
  <div class="row   rowheight"> </div>
  <div class="row rowheight">
  <div class="col">
    <label for="propertyZip">Property Zip</label>
      <input type="text" class="form-control" name="propertyZip" id="propertyZip" placeholder="" value="<?php echo $property_zip?>" required>
   <div class="invalid-feedback">
        Please provide a valid zipcode.
      </div>
  </div>
  <div class="col"></div>
  </div>

  <div class="row rowheight"></div>

  <div class="row">
  <div class="col">
  
  <label for="propertyTaxes">Annual Property Taxes</label>
      <input type="text" class="form-control" name="propertyTaxes" id="propertyTaxes" placeholder="$" value="<?php echo $property_taxes?>" required>
   <div class="invalid-feedback">
        Please provide a yearly property tax.
      </div>
  </div>

  <div class="col"></div>

  </div>  
  <div class="row   rowheight"> </div>


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload Property Image</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" onchange="dispimage();" name="files">
    <label  id="testi" class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
  
</div>
<div class="row"><div id="testiy" class="col">ddd</div></div>

  <div class="row">
    <div class="col">
    <label for="propertyDescription" >Property Description</label>
    <textarea class="form-control" rows="5" name="propertyDescription" id="propertyDescription"><?php echo $property_description ?>
      
    </textarea>
    </div>
 <div class="invalid-feedback">
       
      </div>

    <div class="col"></div>


  </div>
  
<button onclick="nextPage()" type="button" class="btn btn-primary">Step 2</button>

</div>




<div id="page2">

 

  <div class="row">
    <div class="col">
      <label for="reportTitle">Purchase Price *</label>
      <input type="text"  name="propertyPurchasePrice" class="form-control" id="propertyPurchasePrice" placeholder="$" value="<?php echo $property_purchase_price?>" required>
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
          <label for="propertyClosingCosts">Closing Costs</label>
          <input type="text" class="form-control" name="propertyClosingCosts" id="property_city" placeholder="" value="<?php echo $property_closing_costs?>" required>
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

<button type="button" onclick="previousPage()">Previous</button>  <button type="button" onclick="nextPage()" class="btn btn-primary">Next</button> 

</div>





<div id="page3">


  <div class="row">
    <div class="col">
      <label for="reportTitle">Total Gross Monthly Rent *</label>
      <input type="text" class="form-control" name="propertyGrossRent" id="propertyGrossRent" placeholder="$" value="<?php echo $property_rent?>" required>
    </div>
      <div class="col"></div>
  </div>


<div class="row rowheight"></div>
  <div class="row   rowheight"> Yearly Fixed Expenses</div>

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
  <input type="text" class="form-control" name="propertyMaintenance" id="propertyMaintenance" placeholder="" value="<?php echo $property_maintenance?>" required>
  </div>

  <div class="col">
   <label for="propertyMaintenance">Other Expense</label>
  <input type="text" class="form-control" name="propertyOtherExpense" id="propertyOtherExpense" placeholder="" value="<?php echo $property_other_expense?>" required>
  </div> 

  <div class="col"></div> 
</div>

  
<div class="row   rowheight"> </div>

<div class="row rowheight">Variable Expenses</div>
<div class="row">




<div class="col">
  <label for="propertyVacancy">Vacancy %</label>
  <input type="text" class="form-control" name="propertyVacancy" id="propertyVacancy" placeholder="" value="<?php echo $property_vacancy?>" >


</div>

<div class="col">
  <label for="propertyVacancy">Repairs and Maintenance %</label>
  <input type="text" class="form-control" name="propertyRepairs" id="propertyRepairs" placeholder="" value="<?php echo $property_repairs?>" >

</div>
<div class="col">
  <label for="propertyVacancy">Capital Expenditures %</label>
  <input type="text" class="form-control" name="propertyExpenditures" id="propertyExpenditures" placeholder="" value="<?php echo $property_expenditures?>" >

</div>
<div class="col">
  <label for="propertyVacancy">Management Fees %</label>
  <input type="text" class="form-control" name="propertyManagement" id="propertyRepairs" placeholder="" value="<?php echo $property_management?>" >

</div>

</div><!--next row-->

<div class="row">

<div class="col">
  <label for="propertyVacancy">Sales Fees %</label>
  <input type="text" class="form-control" name="propertySaleFees" id="propertySaleFees" placeholder="" value="<?php echo $property_sale_fees?>" >

</div>
<div class="col"></div><div class="col"></div><div class="col"></div>

</div>  


<div class="row rowheight">Growth Assumptions</div>

  <div class="row" >
    <div class="col">
      
      <label for="revenueGrowth">Rent Growth %</label>
      <input type="text" class="form-control" name="revenueGrowth" id="revenueGrowth" value="<?php echo $revenue_growth?>" >
    </div> 

    <div class="col">
      <label for="expenseGrowth">Expense Growth %</label>
      <input type="text" class="form-control" name="expenseGrowth" id="expenseGrowth" value="<?php echo $expense_growth?>" >

    </div>

     <div class="col">
      <label for="expenseGrowth">Property Growth %</label>
      <input type="text" class="form-control" name="propertyGrowth" id="propertyGrowth" value="<?php echo $property_growth?>" >

    </div>

  </div>

<div class="row   rowheight"> 

<input type="hidden" value="<?php echo $_GET["id"]?>" name="id">
<?php if (isset($_GET["add"])) {?>
<input type="hidden" value="<?php echo $_GET["add"]?>" name="add">
<?php }?>
<div class="col"><button type="button" onclick="previousPage()">Previous</button> </div><div class="col"> <input type="submit" value="Calculate --&gt;" name="update_3" class="btn btn-primary" onclick="page4()"></div>

 
</div>
</div>


</div><!--- end page 3 --->  

</form>

<script>
function dispimage()
{


e=document.getElementById("inputGroupFile01");

lab=document.getElementById("testi").innerHTML;
document.getElementById("testi").innerHTML=e.value;


console.log(lab);
return
}
function addProperty()
{
//this is a function that routes to new property
sessionStorage.edit="add";
window.location.href="/index2.php";
return
}
  
//sessions
//Check to see if there is a session previous recorded because if it is then route to the right page
var pages=["page1","page2", "page3"];

//init page action

initPage();
//console.log(sessionStorage);

function initPage()
//if no previous session start page 1 otherwise start other page
{
if (sessionStorage.page )
    {
      pageActive(sessionStorage.page);
    }
else
    {
      sessionStorage.page=0;
      pageActive(sessionStorage.page);
    }
return;
}


function checkit()
//This function validates the form for the current page.
{
 
var e=document.getElementById(pages[sessionStorage.page]).getElementsByClassName("form-control");

//document.getElementById("reportTitle").style.borderColor="#dc3545";

var cleared=true;

for (i=0; i<e.length;i++)
  {
    
if (e[i].required && e[i].value.trim().length ==0)
{
  style1="invalid-feedback";
  cleared=false;
  //e[i].getElementsByClassName("form-control").className='invalid-feedback';
e[i].style.borderColor="#dc3545";
y=document.getElementsByClassName("invalid-feedback")[0].style.display="block";
//console.log(y[0].style);
//.style.display="block !important";

}
  

  }
  
return cleared;
}

function pageActive(x)
  {
    for(i=0;i<pages.length;i++)
      {
        document.getElementById(pages[i]).style.display="none";
      }

    document.getElementById(pages[x]).style.display="block";

  }





//find previous page

function previousPage()
//find out which you are at and subtract the page
{
if (sessionStorage.page == 0)return

sessionStorage.page--;
pageActive(sessionStorage.page);
return

}

function nextPage()
//find out what page you are at and add one
{
 
  if (sessionStorage.page<pages.length && checkit())
  {
    sessionStorage.page++;
    
    pageActive(sessionStorage.page);
  return
  }
}
</script>


</body>
</html>