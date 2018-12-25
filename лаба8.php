<?php
    
    
$tre = [57, 71, 87, 97, 99, 101, 103, 113, 114, 115, 128, 129, 131, 137, 147, 156, 163, 186];
$temp = (int)fgets(STDIN);

$array[0] = 1;
for ($i = 57; $i <= $temp; $i++)
{
    $array[$i]=0;//обнуление массива с 57 элемента
    for ($j=0; $j<18; $j++)
    {
        if (($i-$tre[$j]) >= 0) 
        {
            $array[$i] += $array[$i-$tre[$j]];
        }
    }
}
 fwrite(STDOUT,$array[$temp]);

?>