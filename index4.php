<?php 
include "fileupload.php";
include "db.php";
include "pay.php";
include "testit1.php";
include "myclass.php";

?>

<?php 

//Total Expenses

$year_1_revenue=$property_rent*12;

$year_1_expenses=($property_garbage+$property_taxes+$property_hoa+$property_pmi+$property_insurance+$property_electricity
+$property_watersewer+$property_other_expense+$property_management/100*$year_1_revenue+$property_vacancy/100*$year_1_revenue+
$property_repairs/100*$year_1_revenue);

//monthly expenses
$monthly_expenses=$year_1_expenses/12;

//Net Operating Income
$noi=$property_rent - $monthly_expenses;

$interest=$property_interest_rate/1200;
$periods=$property_amortized*12;

//pv is present value of loan
//Downpayment
$down_payment=$property_purchase_price*$property_downpayment/100;
$pv=$property_purchase_price-$property_downpayment;

//Loan Payment
$loan_payment=payment($interest, $periods, $pv);
$year_loan_payment=12*$loan_payment;


$cashflow= $noi-$loan_payment;
$cash_on_cash=100*(12* $cashflow)/$down_payment; //adding more expenses to this category

$deal_cost=$property_purchase_price+$property_closing_costs;
$total_cash_needed=$property_closing_costs+$down_payment;
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
          <td>Closing Costs</td>
          <td><?php echo "$".number_format($property_closing_costs) ?></td>
        </tr>
        <tr>
          <td>Project Cost</td>
          <td><?php echo "$".number_format($deal_cost) ?></td>
        </tr>
        <tr>
          <td>Down Payment</td>
          <td><?php echo "$".number_format($down_payment) ?></td>
        </tr>

        <tr>
          <td>Loan Amount</td>
          <td><?php echo "$".number_format($pv) ?></td>
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
        <tr>
          <td>Total Cash Required</td>
          <td><?php echo "$". number_format($total_cash_needed,2) ?></td>
        </tr>

        </table>
    </div><!---end red --->


    <div class="col">
  

      <table class="table">
          <tr>
            <td>Total Income<td>Monthly Expenses</td><td>Net Operating Income</td>
          </tr>
<tr>
<td><h2><?php echo "$". number_format($property_rent) ?></h2><td><h2><?php echo "$". number_format($year_1_expenses) ?></h2></td><td><h2><?php echo "$". number_format($noi*12);  ?></h2></td>

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
$c1->property_closing_costs=$property_closing_costs;
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




require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');
require_once ('jpgraph/jpgraph_pie3d.php');
require_once ('jpgraph/jpgraph_line.php');



$data=$c1->a;
//$labels=array("Electricity","Water and Sewer", "","Property Insurance", "PMI", "HOA", "Property Taxes", "Other Expense");
$labels=$c1->b;
//var_dump($data);
// Create the Pie Graph. 


$graph = new PieGraph(550,290);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
//$graph->title->Set("Property Expenses");

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
$p1->SetLabelMargin(30);
$p1->SetAngle(45);

$graph->Stroke('mypie.png');



 
$datay1=$c1->balance; 
$datay2=$c1->equity;
$datay3=$c1->propertyvalue;

// Create the graph. These two calls are always required
$graph = new Graph(600,400);
$graph->SetScale("textlin");
$graph->SetShadow();
$graph->img->SetMargin(40,30,20,40);
 
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
$graph->Stroke("loanBalance.png");

// Create the linear plots for each Income,expenses, cashflow

$graph1 = new Graph(600,400);
$graph1->SetScale("textlin");
$graph1->SetShadow();
$graph1->img->SetMargin(40,30,20,40);
 
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
$graph1->Stroke("income.png");

?>

<div class="row"">
  <div class="col">
<img src="mypie.png">
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


<?php $c1->buildit();?>


<div class="row">
  <div class="col">
    
    <img src="loanBalance.png" width=500>
  </div>

  <div class="col">
<img src="income.png" width=500>
  </div>  


</div>	




</div>

</form>


</div>
</div>

<?php
$pdf= New PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',28);
$pdf->Cell(40,10,'Rental Analysis Results');
$pdf->SetY(10);
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(30,10, $property_address. "," . $property_city . "," . $property_state . " ". $property_zip );
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(80,5,"Beautiful New Construction - This is a one level ranch home with 4 bedrooms and 2 baths with over 1800 sq. ft. This home features an open floor plan, living room with lots of natural light and a spacious eat-in kitchen with granite counter tops and stainless steal appliances. Large owners bedroom, a full on-suite with a garden tub and walk-in shower, complete with granite counter tops and two walk-in closets. ");

$pdf->Line(10,80,200,80);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',14);


$pdf->SetFont('Arial','B',24);
$pdf->Cell(10,10, "Price $". number_format($property_purchase_price));
$pdf->Ln(1);
//$pdf->SetFont('Arial','B',28);
//$pdf->Cell(10,10, "Price");
//$pdf->Ln(10);

$pdf->SetFont('Arial','',13);
$data=array("Closing Costs","$".number_format($property_closing_costs,2),
  "Project Costs","$".number_format($deal_cost,2),
  "Down Payment", "$".number_format($down_payment,2),
  "Loan Amount", "$".number_format($pv,2),
"Amortized Over", number_format($property_amortized), 
"Interest Rate", number_format($property_interest_rate,2)."%", 
"Monthly P/I", "$".number_format($loan_payment,2),
"Cash Required", "$".number_format($total_cash_needed,2));
//$pdf->BasicTable(100,2,$data);
$pdf->SetY(90);
$pdf->BasicTable(10,2,$data);

$data=array("Total\n Income", "Monthly Expenses", "(NOI)",
"$".number_format($property_rent),"$".number_format($monthly_expenses),"$".number_format($noi),"Monthly\n Cash Flow", "Down\n Payment", "Cash \non Cash",
"$".number_format($cashflow,2),"$".number_format($down_payment),number_format($cash_on_cash,2). "%");
$pdf->SetY(90);
$pdf->BasicTable2(100,3,$data);

$pdf->Line(10,170,200,170);



//set image of photo

$pdf->Image('images/'.$property_photo,120,20,70);

//pie charts
$pdf->Image('mypie.png',10,175,120);

$data=array("Electricity",number_format($property_electricity/12,2),
  "Water and Sewer",number_format($property_watersewer/12,2),
  "Insurance",number_format($property_insurance/12,2),
  "Garbage", number_format($property_garbage/12,2),
  "Property Taxes", number_format($property_taxes/12,2), 
  "P/I",number_format($loan_payment,2),
  "Vacancy",number_format($property_vacancy/100*$year_1_revenue/12,2),
  "PMI",number_format($property_pmi/12,2),
  "HOA", number_format($property_other_expense/12,2),
  "Management Fees",number_format($property_management/100*$year_1_revenue/12,2),
  "Property Repairs",number_format($property_repairs/100*$year_1_revenue/12,2)
);


$pdf->SetY(170);
$pdf->BasicTable3(130,2,$data);


$pdf->AddPage();

//set values
$pdf->revenue=$c1->revenue;
$pdf->totalexpenses =$c1->totalexpenses ;
$pdf->expenses=$c1->expenses;
$pdf->payment=$c1->payment;
$pdf->cashflow=$c1->cashflow;
$pdf->cashoncash=$c1->cashoncash;
$pdf->propertyvalue=$c1->propertyvalue;
$pdf->equity=$c1->equity;
$pdf->balance=$c1->balance;
$pdf->profit=$c1->profit;
$pdf->annualreturn=$c1->annualreturn;


$pdf->buildpdf();
$pdf->Image('loanBalance.png',50,210,110);
$pdf->Image('income.png',50,135,110);
$pdf->Output('F','out.pdf');


//print legends on chart
$data=array("Electricity","Water and Sewer", "Insurance","Garbage", "Property Taxes","Property Insurance", "P/I", "Vacancy", "PMI", "HOA", "Other Expense","Management Fees", "Property Repairs");


?>
<a href="out.pdf">file</a>
</body>
</html>