<?php

function maketable($a, $b)
{
	
	$out="<table class='table'>";
	$length=sizeof($a);


	for ($i=0;$i<$length;$i++)
		{


		if ($i % 2==0) $out=$out. "<tr><td>". $b[$i]. "</td><td>". number_format($a[$i],0). "</td>" ;

		if ($i % 2 ==1)
			{
			$out=$out. "<td>". $b[$i]. "</td><td>". number_format($a[$i],0). "</td></tr>" ;
			if ($length-($i+1)==0) break;
			}
		if ($length-($i+1)==0) 
			{ 
			$out=$out . "</td><td>&nbsp;</td></tr>";
			break;
			}
		}

return $out. "</table>";
}
?>
