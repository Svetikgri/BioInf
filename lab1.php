
<?php

$s1 = "GATATATGCATATACTT";
$s2 = "ATAT";

function main($s1, $s2)
{
    $count = 0;
    for ($i=0; $i<strlen($s1); $i++)
    {
        $pos = substr($s1, $i,4);
        if($pos == $s2){
            $count ++;
        }
    }
    echo $count;
    return $count;

}

main($s1, $s2);

?>