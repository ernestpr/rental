<?php 
include "fileupload.php";
include "db.php";
include "pay.php";
include "testit1.php";
include "myclass.php";

?>

<?php 
$total=($property_garbage+$property_taxes+$property_hoa+$property_pmi+$property_insurance+$property_electricity
+$property_watersewer+$property_other_expense)/12;
$year_expenses=($property_garbage+$property_taxes+$property_hoa+$property_pmi+$property_insurance+$property_electricity
+$property_watersewer+$property_other_expense);

$interest=$property_interest_rate/1200;
$periods=$property_amortized*12;
$pv=$property_purchase_price*(1-$property_downpayment/100);
$loan_payment=payment($interest, $periods, $pv);
$down_payment=$property_purchase_price*$property_downpayment/100;
$year_loan_payment=12*$loan_payment;

//got it
$year_1_loanBalance=loanBalance($interest,12,$pv,$loan_payment);
$year_2_loanBalance=loanBalance($interest,24,$pv,$loan_payment);
$year_3_loanBalance=loanBalance($interest,36,$pv,$loan_payment);
$year_5_loanBalance=loanBalance($interest,60,$pv,$loan_payment);
$year_10_loanBalance=loanBalance($interest,120,$pv,$loan_payment);
$year_20_loanBalance=loanBalance($interest,240,$pv,$loan_payment);
$year_30_loanBalance=loanBalance($interest,360,$pv,$loan_payment);

$noi=$property_rent - $total;
$cashflow= $noi-$loan_payment;
$cash_on_cash=100*(12* $cashflow)/$down_payment; //adding more expenses to this category


//equity


$year_1_revenue=$property_rent*12;

$year_2_revenue=$year_1_revenue*(1+$revenue_growth/100);
$year_3_revenue=$year_1_revenue*pow(1+$revenue_growth/100,2);
$year_5_revenue=$year_1_revenue*pow(1+$revenue_growth/100,4);
$year_10_revenue=$year_1_revenue*pow(1+$revenue_growth/100,9);
$year_20_revenue=$year_1_revenue*pow(1+$revenue_growth/100,19);
$year_30_revenue=$year_1_revenue*pow(1+$revenue_growth/100,29);

$year_1_expenses=($property_garbage+$property_taxes+$property_hoa+$property_pmi+$property_insurance+$property_electricity
+$property_watersewer+$property_other_expense+12*$property_management/100*$property_rent+12*$property_vacancy/100*$property_rent
+ 12*$property_repairs/100*$property_rent);
/*
echo "insurance=". $property_insurance . "<p>";
echo "garbage=". $property_garbage . "<p>";
echo "taxes=". $property_taxes . "<p>";
echo "Electricity=". $property_electricity . "<p>";
echo "Management=". $property_management/100*$property_rent . "<p>";
echo "Vacancy=". $property_vacancy/100*$property_rent . "<p>";
echo "Repair=". $property_repairs/100*$property_rent . "<p>";


echo $year_1_expenses/12 ."-";
echo $property_management/100*$property_rent. "-";
echo $property_vacancy/100*$property_rent;

*/
$year_2_expenses=$year_1_expenses*(1+$expense_growth/100);
$year_3_expenses=$year_1_expenses*pow(1+$expense_growth/100,2);
$year_5_expenses=$year_1_expenses*pow(1+$expense_growth/100,4);
$year_10_expenses=$year_1_expenses*pow(1+$expense_growth/100,9);
$year_20_expenses=$year_1_expenses*pow(1+$expense_growth/100,19);
$year_30_expenses=$year_1_expenses*pow(1+$expense_growth/100,29);

$year_1_cashflow=$year_1_revenue-$year_1_expenses-$year_loan_payment;
$year_2_cashflow=$year_2_revenue-$year_2_expenses-$year_loan_payment;
$year_3_cashflow=$year_3_revenue-$year_3_expenses-$year_loan_payment;
$year_5_cashflow=$year_5_revenue-$year_5_expenses-$year_loan_payment;
$year_10_cashflow=$year_10_revenue-$year_10_expenses-$year_loan_payment;
$year_20_cashflow=$year_20_revenue-$year_20_expenses-$year_loan_payment;
$year_30_cashflow=$year_30_revenue-$year_30_expenses-$year_loan_payment;

//equity

$year_1_equity=$down_payment+$year_1_cashflow+$pv-$year_1_loanBalance;
$year_2_equity=$down_payment+ $year_1_cashflow+$year_2_cashflow+$pv-$year_2_loanBalance;
$year_3_equity=$down_payment+ $year_1_cashflow+$year_2_cashflow+$year_3_cashflow+$pv-$year_3_loanBalance;
$year_5_equity=$down_payment+ $year_1_cashflow+$year_2_cashflow+$year_3_cashflow+$year_5_cashflow+$pv-$year_1_loanBalance;
$year_10_equity=$down_payment+ $year_1_cashflow+$year_2_cashflow+$year_3_cashflow+$year_5_cashflow+$year_10_cashflow+$pv-$year_10_loanBalance;
$year_20_equity=$down_payment+ $year_1_cashflow+$year_2_cashflow+$year_3_cashflow+$year_5_cashflow+$year_10_cashflow+$year_20_cashflow+$pv-$year_20_loanBalance;
$year_30_equity=$down_payment+ $year_1_cashflow+$year_2_cashflow+$year_3_cashflow+$year_5_cashflow+$year_20_cashflow+$year_30_cashflow+$pv-$year_30_loanBalance;

$year_1_noi=$year_1_revenue-$year_1_expenses;
$year_2_noi=$year_2_revenue-$year_2_expenses;
$year_3_noi=$year_3_revenue-$year_3_expenses;
$year_5_noi=$year_5_revenue-$year_5_expenses;
$year_10_noi=$year_10_revenue-$year_10_expenses;
$year_20_noi=$year_20_revenue-$year_20_expenses;
$year_30_noi=$year_30_revenue-$year_30_expenses;
?>
<html>
<head>
<title>Results of Analysis</title>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style >
.rowheight {height:50px;}
</style>
</head>
<body>

<?php include "nav.html"; ?>
	<div class="container ">
		<h1>Rental Analysis Results</h1>

  <div class="row">

     <div class="col">

      <h1><?php echo $property_address ?></h1>
  

          <?php echo $property_description?>

    </div>

    <div class="col">
      <img src="<?php echo "images/".$property_photo?>" width="300" >
    </div>  

</div> <!--end row-->

<div class="row">

  <div class="col">
<!--used to be here-->
  </div>

</div> 

<div class="row" >

  <div class="col">
    <h1><?php echo "$ ".number_format($property_purchase_price) ?></h1>
    <h2>Price</h2>

    <table class="table">

        <tr>
          <td>Down Payment</td>
          <td><?php echo number_format($down_payment) ?></td>
        </tr>

        <tr>
          <td>Loan Amount</td>
          <td><?php echo number_format($pv) ?></td>
        </tr>

        <tr>
          <td>Amortized Over</td>
          <td><?php echo $property_amortized . " years"?></td>
        </tr>

        <tr>
          <td>Interest Rate</td>
          <td><?php echo number_format($property_interest_rate,3)."%" ?></td>
        </tr>

        <tr>
          <td>Monthly P/I</td>
          <td><?php echo "$". number_format($loan_payment,2) ?></td>
        </tr>


        </table>
    </div><!---end red --->


    <div class="col">
  

      <table class="table">
          <tr>
            <td>Total Income<td>Monthly Expenses</td><td>Net Operating Income</td>
          </tr>
<tr>
<td><h2><?php echo "$". number_format($property_rent) ?></h2><td><h2><?php echo "$". number_format($total) ?></h2></td><td><h2><?php echo "$". number_format($noi*12);  ?></h2></td>

    </tr>

    <tr>
<td>Monthly Cash Flow<td>Down Payment</td><td>Cash On Cash</td>
</tr>
<tr>
<td><h2><?php echo "$". number_format($cashflow) ?></h2><td><h2><?php echo "$". number_format($down_payment) ?></h2></td><td><h2><?php echo "%". number_format($cash_on_cash,2);  ?></h2></td>

    </tr>  
    </table>  
</div></div><!--- end row --->

<?php // content="text/plain; charset=utf-8"
//
$c1= new Graphprep($property_downpayment,$property_purchase_price,$property_interest_rate,$property_amortized);


//compute($propertygrowth, $expensegrowth,$revenuegrowth,$expensestart,$revenuestart)

$c1->compute($property_growth, $expense_growth,$revenue_growth,$year_1_expenses, $property_rent*12);

$c1->checkit($property_electricity, "Electricity");
$c1->checkit($property_watersewer, "Water and Sewer");
$c1->checkit($property_insurance, "Insurance");
$c1->checkit($property_garbage,"Garbage");
$c1->checkit($property_hoa,"HOA");
$c1->checkit($property_taxes,"Property Taxes");
$c1->checkit($property_other_expense,"Other \n Expenses");
$c1->checkit($loan_payment*12, "P/I");
$c1->checkit(12*$property_vacancy/100*$property_rent,"Property Vacancy");
$c1->checkit(12*$property_management/100*$property_rent, "Management Fees");
$c1->checkit(12*$property_repairs/100*$property_rent, "Property Repair");

var_dump($c1->balance);
$c1->buildit();

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');
require_once ('jpgraph/jpgraph_pie3d.php');
require_once ('jpgraph/jpgraph_line.php');



$data=$c1->a;
//$labels=array("Electricity","Water and Sewer", "","Property Insurance", "PMI", "HOA", "Property Taxes", "Other Expense");
$labels=$c1->b;
//var_dump($data);
// Create the Pie Graph. 


$graph = new PieGraph(450,350);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Property Expenses");

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);
$p1->SetLegends($c1->b);
$p1->SetLabelType(PIE_VALUE_PER);
$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$p1->SetLabels($labels);
$p1->SetLabelPos(.75);
$graph->Stroke('mypie.jpg');



 
$datay1=$c1->balance; 
$datay2=$c1->equity;
$datay3=$c1->propertyvalue;

// Create the graph. These two calls are always required
$graph = new Graph(600,400);
$graph->SetScale("textlin");
$graph->SetShadow();
$graph->img->SetMargin(49,30,20,40);
 
// Create the linear plots for each category
$dplot1 = new LinePLot($datay1);
$dplot2 = new LinePLot($datay2);
$dplot3 = new LinePLot($datay3);

$graph->Add($dplot1);
$graph->Add($dplot2);
$graph->Add($dplot3);

$dplot1->SetFillColor('#0234A9@0.2');
$dplot2->SetFillColor('yellow@0.2');
$dplot3->SetFillColor('skyblue@0.5');

// Set the legends for the plots
$dplot1->SetLegend('Loan Balance');
$dplot2->SetLegend('Equity');
$dplot3->SetLegend('Property Value');

$graph->xaxis->SetTextTickInterval(2);
$graph->title->Set("Loan Balance, Equity & Property Value");
$graph->xaxis->title->Set("Year");
//$graph->yaxis->title->Set("Loan Balance");
 
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
// Display the graph
$graph->Stroke("loanBalance.jpg");

// Create the linear plots for each Income,expenses, cashflow

$graph1 = new Graph(600,400);
$graph1->SetScale("textlin");
$graph1->SetShadow();
$graph1->img->SetMargin(49,30,20,40);
 
// Create the linear plots for each category
$dplot1 = new LinePLot($c1->noi);
$dplot2 = new LinePLot($c1->expenses);
$dplot3 = new LinePLot($c1->cashflow);

$graph1->Add($dplot1);
$graph1->Add($dplot2);
$graph1->Add($dplot3);

$dplot1->SetFillColor('#0234A9@0.2');
$dplot2->SetFillColor('yellow@0.2');
$dplot3->SetFillColor('skyblue@0.5');

// Set the legends for the plots
$dplot1->SetLegend('Income');
$dplot2->SetLegend('Expenses');
$dplot3->SetLegend('Cash Flow');

$graph1->xaxis->SetTextTickInterval(2);
$graph1->title->Set("Income (NOI), Expenses & Cash Flow");
$graph1->xaxis->title->Set("Year");
//$graph->yaxis->title->Set("Loan Balance");
 
$graph1->title->SetFont(FF_FONT1,FS_BOLD);
$graph1->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph1->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
// Display the graph
$graph1->Stroke("income.jpg");

?>

<div class="row"">
  <div class="col">
<img src="mypie.jpg">
</div>
<div class="col">
  <h2>Monthly Expenses</h2>
  Total Operating Expense: <?php  echo  "$".number_format($year_1_expenses/12,2) ?><br>
  Mortgage: <?php echo "$".number_format($loan_payment,2)?><br>
<?php echo maketable($c1->a,$c1->b);?>
<!--<table class="table" style="width:500px"><tr><td>dd</td></tr></table>-->
</div>

</div>
<!---//end of graph--->





<div class="row">
  <div class="col">
    
    <img src="loanBalance.jpg" width=500>
  </div>

  <div class="col">
<img src="income.jpg" width=500>
  </div>  


</div>	




</div>

</form>


</div>
</div>

</body>
</html>