<?php 

/* 
PHP file to do mathematical operations on roman numerals
*/

// Error/ Exception handling to be added

$romanKeyArray = array(
    'M' => 1000,
    'CM' => 900,
    'D' => 500,
    'CD' => 400,
    'C' => 100,
    'XC' => 90,
    'L' => 50,
    'XL' => 40,
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'I' => 1,
);

// Function to do mathematical operation on roman numerals
function romanOperation($roman1,$op,$roman2)
{
  $int1 = getIntVal($roman1);
  $int2 = getIntVal($roman2);
  switch($op)
  {
      case "+":
         $result = $int1 + $int2;
         break;
      case "-":
         $result = $int1 - $int2;
         break;
      case "*":
         $result = $int1 * $int2;
         break;
      case "/":
         $result = $int1 / $int2;
         break;
      default:
         echo "Did you use the right operator?";
         $result = -1;
         break;
  }
  return $result;
}

// Function to get the integer equivalent of roman numeral
function getIntVal($romanString)
{
  $result = 0;
  $romanKeyArray = $GLOBALS['romanKeyArray'];
    foreach ($romanKeyArray as $key => $value) 
    {
        while (strpos($romanString, $key) === 0) 
        {
            $result += $value;
            $romanString = substr($romanString, strlen($key));
        }
    }
   return $result;
}

// Function to get the roman numeral equivalent of an integer
function getRomanVal($integer)
{
    if($integer == -1)
      return '';
    $result = '';
    $romanKeyArray = $GLOBALS['romanKeyArray'];
    while($integer > 0)
    { 
        foreach($romanKeyArray as $key => $value) 
        { 
            if($integer >= $value) 
            { 
                $integer -= $value; 
                $result .= $key; 
                break; 
            } 
        } 
    } 
    return $result;
}

// Input
$roman1 = 'III';
$roman2 = 'I';
$op = '+';

// Integer value after operation
$OperatedIntVal = romanOperation($roman1,$op,$roman2);

// Roman value after operation
$finalResult = $OperatedIntVal? getRomanVal($OperatedIntVal): "Oops! Romans didnt know zero. Ask Aryabhatta may be!";

echo $finalResult;

?>