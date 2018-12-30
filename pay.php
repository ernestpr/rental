<?php

//payment

function payment($interest, $periods, $pv)
{
	
	$amount = $interest * -$pv * pow((1 + $interest), $periods) / (1 - pow((1 + $interest), $periods));
       return $amount;

	}


function loanBalance($interest,$periods,$pv,$payment)
{

	$balance=$pv*pow((1+$interest),$periods) - 
	$payment*(pow((1+$interest),$periods)-1)/$interest;
return $balance;
}

$interest=5.8/100;
$periods=12;
$loanamount=100000;
$payment=870;

//echo $loanbalance=loanbalance($interest,$periods, $loanamount,$payment);
?>