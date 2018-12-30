<?php // content="text/plain; charset=utf-8"
class Graphprep
{



public $a=array();
public $b=array();
//public $property_item;
//public $property_item_name;

function checkit ($property_item,$property_item_name)

    {
      
      if($property_item>0 && !($property_item==null))
        {
        
        array_push($this->a, $property_item/12);
        array_push($this->b, $property_item_name);
        var_dump($this->a);
        }
        
        return $this;
    }

}


//
$c1= new Graphprep();
$c1->checkit($property_electricity, "Electricity");
$c1->checkit($property_watersewer, "Water and Sewer");
$c1->checkit($property_insurance, "Insurance");
$c1->checkit($property_garbage,"Garbage");
$c1->checkit($property_hoa,"HOA");
$c1->checkit($property_taxes,"Property Taxes");
$c1->checkit($property_other_expense,"Other \n Expenses");
$c1->checkit($loan_payment, "P/I");


?>


