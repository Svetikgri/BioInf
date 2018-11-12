<?php

$s1 = trim(fgets(STDIN));
$s2 = trim(fgets(STDIN));

//$s1 = "ATAT";
//$s2 = "GATATATGCATATACTT";


function main($s1, $s2)
{
    $count = 0;
    //echo $s1;
    // echo $s2;
    ///var_dump(strlen($s1)); echo '---';
    //var_dump(strlen($s2));echo '---';
    $ras = strlen($s2)-strlen($s1)+1;
    // echo $ras;echo '---';
    for ($i=0; $i<$ras; $i++)
    { //echo $i;
        $pos = substr($s2, $i,strlen($s1));
        if($pos == trim($s1)){
            $count ++;
        }
    }
    fwrite(STDOUT,(int)$count);
    // $count = fgets(STDOUT);

}

main($s1, $s2);

?>
