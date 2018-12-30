<?php // content="text/plain; charset=utf-8"




class Graphprep
{
 // Sales cost percentage 
public $salesexpenses=11;
//how much cash needed to close deal
public $cashneeded;

public $propertyvalue=array();
public $a=array();
public $b=array();
public $revenue=array();
public $expenses=array();
public $cashflow=array();
public $cashoncash=array();
public $balance=array();
public $totalexpenses=array();
public $payment;
public $equity=array();
public $pv;
public $equitystart;
public $purchaseprice;
public $interest;
public $noi=array();
public $profit=array();
public $annualreturn=array();

//public $property_item;
//public $property_item_name;
var $periods;

//build table method




//downpayment
//purchase price
//interest rate
//periods
function __construct($downpay,$purchaseprice,$interest,$periods)

{
  $this->salesexpenses=0;
  $this->cashneeded=59000;
  $this->pv=$purchaseprice*(1-$downpay/100);
  $this->equitystart=$purchaseprice-$this->pv;
  $this->periods=$periods;
  $this->purchaseprice=$purchaseprice;
  $this->interest=$interest;
  $interest=$interest/1200;
  $this->payment = $interest * -$this->pv * pow((1 + $interest), $this->periods*12) / (1 - pow((1 + $interest), $this->periods*12));
  
 
  

}

function buildit()
{

  $h="<table class='table'>";
  $c=array("Year 1","Year 2", "Year 5", "Year 10", "Year 15", "Year 20", "Year 30");
  $b=array(" ","Total Annual Income","Total Annual Expenses","Operating Expenses","Mortgage Payment","Total Annual Cashflow","Cash on Cash ROI","Property Value","Equity","Loan Balance","Total Profit if Sold *","Annualized Total Return");
  $a=array(0,1,4,9,14,19,29);

  for ($i=0;$i<12;$i++)
  {
    $h=$h. "<tr><td>" . $b[$i]. "</td>";
    foreach($a as $key=>$k)
      
    {
    if ($i==0) $value=$c[$key];  
    if ($i==1) $value=$this->revenue[$k];
    if ($i==2) $value=$this->totalexpenses[$k];
    if ($i==3) $value=$this->expenses[$k];
    if ($i==4) $value=$this->payment*12;
    if ($i==5) $value=$this->cashflow[$k];
    if ($i==6) $value=$this->cashoncash[$k];
    if ($i==7) $value=$this->propertyvalue[$k];
    if ($i==8) $value=$this->equity[$k];
    if ($i==9) $value=$this->balance[$k];
    if ($i==10)$value=$this->profit[$k];
    if ($i==11)$value=$this->annualreturn[$k];
    
    

    if ($i>0)$h=$h . "<td class='text-right'>" . "$". number_format($value,2)   ."</td>" ;
    
      if ($i==0)
        {$h=$h . "<td>" .  $value  ."</td>" ;
      
    }
    }
    $h=$h. "</tr>";

  }
  echo $h. "</table>";
}


//growth in property value

//growth in expenses
//expense start

//growth in revenue
//revenue start

function compute($propertygrowth, $expensegrowth,$revenuegrowth,$expensestart,$revenuestart)
{
  $accumcash=0;
  //find loan balance over the period
  $this->loanBalance($this->interest,$this->pv);

for ($i=0;$i<=$this->periods;$i++)
      {
        array_push($this->revenue, $revenuestart* pow(1+$revenuegrowth/100,$i));
        array_push($this->expenses, $expensestart* pow(1+$expensegrowth/100,$i));
        array_push($this->totalexpenses, $this->expenses[$i]+$this->payment*12);
        array_push($this->propertyvalue, $this->purchaseprice* pow(1+$propertygrowth/100,$i));
//
        array_push($this->cashflow, $this->revenue[$i]-$this->expenses[$i]-$this->payment*12);
        $accumcash=$accumcash+$this->cashflow[$i];
       

        array_push($this->noi, $this->revenue[$i]-$this->expenses[$i]);
        array_push($this->cashoncash, ($this->revenue[$i]-$this->totalexpenses[$i])/$this->cashneeded*100);
        array_push($this->profit, ($this->propertyvalue[$i] - 170000 + $accumcash + $this->pv- $this->balance[$i]-8000 ));

        array_push($this->equity, $this->equitystart+$this->pv-$this->balance[$i]);
       //annual return
       
        array_push($this->annualreturn, 100*(pow(1+$this->profit[$i]/$this->cashneeded,1/($i+1))-1));
        echo $i . "-" . $this->profit[$i] ;
      }


}

function checkit ($property_item,$property_item_name)

    {
      
      if($property_item>0 && !($property_item==null))
        {
        
        array_push($this->a, $property_item/12);
        array_push($this->b, $property_item_name);
        
        }
        
        return $this;
    }












function loanBalance($interest,$pv)
{

 $interest=$interest/1200;

for ($i=11;$i<=$this->periods*12;$i++)
      {
         //push array for every 12 months;
         if($i % 12 ==0)
         array_push($this->balance, $pv*pow((1+$interest),$i) - 
  $this->payment*(pow((1+$interest),$i)-1)/$interest);

      }


}



}



?>



