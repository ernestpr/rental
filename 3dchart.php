<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');
require_once ('jpgraph/jpgraph_pie3d.php');

// Some data
$data = array($property_watersewer/12,$property_watersewer/12,$property_garbage/12,$property_insurance/12,$property_pmi,$property_hoa,$property_taxes/12,$property_other_expense/12);
$data=array(1,2,3,4,5,4,4,4);
// Create the Pie Graph. 
$graph = new PieGraph(350,250);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Property Expenses");

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();

?>