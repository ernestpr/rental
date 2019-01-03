<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rental";


//setup db pointer for test code
$id="nothing";
if(isset($_GET["id"]))$id=$_GET["id"];

    $property_address="";

    $report_title="";
    $property_zip="";
    $property_city="";
    $property_state="";
    $property_description="";
    $property_taxes="";
    $property_rent="";
    $property_electricity="";
    $property_watersewer="";
    $property_pmi="";
    $property_garbage="";
    $property_hoa="";
    $property_insurance="";
    $property_maintenance="";
    $property_purchase_price="";
    $property_downpayment="";
    $property_interest_rate="";
    $property_amortized="";
    $revenue_growth="";
    $expense_growth="";
    $property_growth="";
    $property_management="";
    $property_vacancy="";
    $property_expenditures="";
    $property_repairs="";
    $property_other_expense="";
    $property_closing_costs="";
    $property_sale_fees="";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



//update the first page
if (isset($_POST["update_3"]) && isset($_POST["id"]))
{
    $id=$_POST["id"];
    
    // check to see if photo is uploaded then you would need to add to SQL to update image

    $photoupdated="";
    //photo uploaded
    if ($isfile_uploaded)$photoupdated=",property_image='" . $file_upload_name . "'";
 
    $sql = "UPDATE  property 
    SET property_address='". $_POST["propertyAddress"]. "',
    report_title='" . $_POST["reportTitle"] . "',

    property_zip='" . $_POST["propertyZip"]  . "',
    property_city='" . $_POST["propertyCity"]  . "',
    property_state='" . $_POST["propertyState"]  . "',
    property_description='" . $_POST["propertyDescription"]  . "',
    property_taxes='" . $_POST["propertyTaxes"]  . "',
    property_rent='" . $_POST["propertyGrossRent"] . "',
    property_electricity='" . $_POST["propertyElectricity"]  . "',
    property_watersewer='" . $_POST["propertyWaterSewer"]  . "',
    property_pmi='" . $_POST["propertyPMI"]  . "',
    property_garbage='" . $_POST["propertyGarbage"] . "',
    property_hoa='" . $_POST["propertyHOA"]  . "',
    property_insurance='" . $_POST["propertyInsurance"]  . "',
    property_maintenance='". $_POST["propertyMaintenance"]. "',
    property_purchase_price='" . $_POST["propertyPurchasePrice"]  . "',
    property_downpayment='" . $_POST["propertyDownpayment"]  . "',
    property_interest_rate='" . $_POST["propertyInterestRate"]  . "',
    property_amortized='" . $_POST["propertyAmortized"]  . "',
    revenue_growth='" . $_POST["revenueGrowth"]. "',
    expense_growth='" . $_POST["expenseGrowth"]. "',
    property_management='" . $_POST["propertyManagement"]. "',
    property_vacancy='". $_POST["propertyVacancy"]."',
    property_expenditures='". $_POST["propertyExpenditures"]. "',
    property_repairs='" . $_POST["propertyRepairs"]. "',
    property_growth='". $_POST["propertyGrowth"]. "',
    property_closing_costs='". $_POST["propertyClosingCosts"]. "',
    property_sale_fees='". $_POST["propertySaleFees"]. "',
    property_other_expense='" . $_POST["propertyOtherExpense"]. "'". $photoupdated .
    "
    
    where ID='".$id ."'";
 
   $result = $conn->query($sql);
//echo $sql;


}


//insert the first page
if (isset($_POST["update_3"]) && isset($_POST["add"]))
{

$sql= "INSERT INTO property 

(   property_address,
    report_title,
    property_zip,
    property_city,
    property_state,
    property_description,
    property_taxes,
    property_rent,
    property_electricity,
    property_watersewer,
    property_pmi,
    property_garbage,
    property_hoa,
    property_insurance,
    property_maintenance,
    property_purchase_price,
    property_downpayment,
    property_interest_rate,
    property_amortized,
    revenue_growth,
    expense_growth,
    property_growth,
    property_management,
    property_vacancy,
    property_expenditures,
    property_repairs,
    property_other_expense,
    property_image,
    property_closing_costs,
    property_sale_fees

) VALUES 

(

    '" . $_POST["propertyAddress"] . "',
    '" . $_POST["reportTitle"] . "',
    '" . $_POST["propertyZip"]  . "',
    '" . $_POST["propertyCity"]  . "',
    '" . $_POST["propertyState"]  . "',
    '" . $_POST["propertyDescription"]  . "',
    '" . $_POST["propertyTaxes"]  . "',
    '" . $_POST["propertyGrossRent"] . "',
    '" . $_POST["propertyElectricity"]  . "',
    '" . $_POST["propertyWaterSewer"]  . "',
    '" . $_POST["propertyPMI"]  . "',
    '" . $_POST["propertyGarbage"] . "',
    '" . $_POST["propertyHOA"]  . "',
    '" . $_POST["propertyInsurance"]  . "',
    '" . $_POST["propertyMaintenance"]. "',
    '" . $_POST["propertyPurchasePrice"]  . "',
    '" . $_POST["propertyDownpayment"]  . "',
    '" . $_POST["propertyInterestRate"]  . "',
    '" . $_POST["propertyAmortized"]  . "',
    '" . $_POST["revenueGrowth"]. "',
    '" . $_POST["expenseGrowth"]. "',
    '" . $_POST["propertyGrowth"]. "',
    '" . $_POST["propertyManagement"]. "',
    '" . $_POST["propertyVacancy"]."',
    '" . $_POST["propertyExpenditures"]. "',
    '" . $_POST["propertyRepairs"]. "',
    '" . $_POST["propertyOtherExpense"]. "',
    '" . $_POST["propertyClosingCosts"]. "',
    '" . $_POST["propertySaleFees"]. "',
    '" . $file_upload_name. "'

)";
    $property_address=$_POST["propertyAddress"];
    $report_title=$_POST["reportTitle"] ;
    $property_zip=$_POST["propertyZip"]  ;
    $property_city=$_POST["propertyCity"]  ;
    $property_state=$_POST["propertyState"]  ;
    $property_description=$_POST["propertyDescription"]  ;
    $property_taxes=$_POST["propertyTaxes"]  ;
    $property_rent=$_POST["propertyGrossRent"] ;
    $property_electricity=$_POST["propertyElectricity"]  ;
    $property_watersewer=$_POST["propertyWaterSewer"]  ;
    $property_pmi=$_POST["propertyPMI"]  ;
    $property_garbage=$_POST["propertyGarbage"] ;
    $property_hoa=$_POST["propertyHOA"]  ;
    $property_insurance=$_POST["propertyInsurance"]  ;
    $property_maintenance=$_POST["propertyMaintenance"];
    $property_purchase_price=$_POST["propertyPurchasePrice"]  ;
    $property_downpayment=$_POST["propertyDownpayment"]  ;
    $property_interest_rate=$_POST["propertyInterestRate"]  ;
    $property_amortized=$_POST["propertyAmortized"]  ;
    $revenue_growth=$_POST["revenueGrowth"];
    $expense_growth=$_POST["expenseGrowth"];
    $property_growth=$_POST["propertyGrowth"];
    $property_management=$_POST["propertyManagement"];
    $property_vacancy=$_POST["propertyVacancy"];
    $property_expenditures=$_POST["propertyExpenditures"];
    $property_repairs=$_POST["propertyRepairs"];
    $property_closing_costs=$_POST["propertyClosingCosts"];

    $property_sale_fees=$_POST["propertySaleFees"];
    //if uploaded assign name
    $property_photo=$file_upload_name;
    

    $property_other_expense=$_POST["propertyOtherExpense"];
//echo $sql;
$result =$conn->query($sql);
 $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;

}


$sql = "SELECT * FROM property where ID='".$id ."'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $id=$row["ID"];
        $report_title=$row["report_title"];
        $property_description=$row["property_description"];
        $property_address=$row["property_address"];
        $property_city=$row["property_city"];
        $property_state=$row["property_state"];
        $property_zip=$row["property_zip"];
        $property_taxes=$row["property_taxes"];
        //
        $property_purchase_price=$row["property_purchase_price"];
        $property_interest_rate=$row["property_interest_rate"];
        $property_amortized=$row["property_amortized"];
        $property_taxes=$row["property_taxes"];
        $property_downpayment=$row["property_downpayment"];

        $property_rent=$row["property_rent"];

        $property_garbage=$row["property_garbage"];
        $property_hoa=$row["property_hoa"];
        $property_insurance=$row["property_insurance"];
        $property_other_expense=$row["property_other_expense"];


        $property_electricity=$row["property_electricity"];
        $property_pmi=$row["property_pmi"];
        $property_watersewer=$row["property_watersewer"];
        $property_photo=$row["property_image"];
        $property_maintenance=$row["property_maintenance"];
        $revenue_growth=$row["revenue_growth"];
        $expense_growth=$row["expense_growth"];
        $property_growth=$row["property_growth"];

        $property_expenditures=$row["property_expenditures"];
        $property_vacancy=$row["property_vacancy"];
        $property_management=$row["property_management"];
        $property_repairs=$row["property_repairs"];
        $property_closing_costs=$row["property_closing_costs"];
        $property_sale_fees=$row["property_sale_fees"];
    }
} 

else {
    //echo "0 results";
}


$sql = "SELECT * FROM property";
$result = $conn->query($sql);



$conn->close();

//var_dump($result);




?>