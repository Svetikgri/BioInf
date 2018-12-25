<?php

    $k = trim(fgets(STDIN));//var_dump($k);
    for ($q=0;$q<100;$q++)
     { $tyu = (fgets(STDIN));
         if(trim($tyu)!= "")
         {
         $dna[] = trim($tyu);
         }
     }//var_dump($dna);


   $matr = getmatr($dna, $k);
     $list = getwords($k); 
   $mdist = 10000000000;
    for ($i = 0; $i <  count( $list); $i++)
    {
        $cdist = dist( $list[$i], $matr);
         if ($mdist > $cdist)
        {
           $mdist = $cdist;
            $mdistres =  $list[$i];
        }
    }
 fwrite(STDOUT,$mdistres." "); 


function hamdist($first, $second)
{
    $result = 0;;
    for ($i = 0; $i < strlen($first); $i++)
    {
        if ($first[$i] != $second[$i]) 
        { 
            $result++; 
        }

    }
    return $result;

}

function dist($pat, $matr)
{

   $result = 0;
    for ($i = 0; $i < count($matr); $i++)
    {
        for ($j = 0; $j < count($matr[$i]); $j++)
        {
          $listham[] = hamdist($matr[$i][$j], $pat);//!!!
        }

        $result += min($listham);

        unset($listham);
    }
    return $result;
}


function getwords($length)//+++
{
    $sym = "ACTG";
    $wcount = pow(strlen($sym), $length);
    $word = "";
    for ($i = 0; $i < $length; $i++) 
    { 
        $word .= "A"; 
    }
    for ($i = 0; $i < $wcount; $i++)
    {
        $a = $i;
        for ($j = strlen($word)- 1; $j >= 0; $j--)///!
        {
            $word[$j] = $sym[$a % strlen($sym)];
            $a /= strlen($sym);
        }
        $list[] = $word;
       
    }
    return  $list;
}

function getmatr($dna, $length)///++
{

    for ($i = 0; $i < count($dna); $i++)
    {
    
        for ($j = 0; $j < strlen($dna[$i]) - $length + 1; $j++)
        {
             $kmo = substr($dna[$i],$j,$length);
             $temp[] = $kmo;
         }
        $matr[] = $temp;
        unset($temp);//!!!??
      
    }
    return  $matr;
}
?>