<?php
$k = trim(fgets(STDIN)); $ko = explode(' ',$k); //var_dump($k);
$k = $ko[0];//var_dump($k);//$k = 4
$d = $ko[1];//var_dump($d);// $d = 1
 for ($q=0;$q<100;$q++)
 { $tyu = (fgets(STDIN));
     if(trim($tyu)!= "")
     {
     $dna[] = trim($tyu);//var_dump($dna);
     }
     
 }

//$s2 = trim(fgets(STDIN)); var_dump($s2);
//$s3 = trim(fgets(STDIN)); var_dump($s3);
//$s4 = trim(fgets(STDIN)); var_dump($s4);
//$s5 = trim(fgets(STDIN)); var_dump($s4);

//$k1 = CACTGATCGACTTATC
//CTCCGACTTACCCCAC
//GTCTATCCCTGATGGC
//CAGGGTTGTCTTGTCT;


  
    for ( $i = 0; $i < count($dna); $i++)
    {
        
        for ( $j = 0; $j < strlen($dna[$i]) - $k + 1; $j++)
        {
            $k_m = substr($dna[$i],$j, $k);
           $temp[] = $k_m;//pattern
          
        }
       $matr[] = $temp;//!!!!!
        unset($temp);
    }
//все варианты из к букв
  
     $symbols = "ACTG";
    $total_words_count = pow(strlen($symbols), $k);//число переборов
    $word = "";
    for ($i = 0; $i < $k; $i++)
    { 
        $word .= "A"; 
    }

    for ($i = 0; $i < $total_words_count; $i++)
    {
         $accum = $i;
        for ($j = strlen($word)- 1; $j >= 0; $j--)
        {
            $word[$j] = $symbols[$accum % strlen($symbols)];
            $accum /= strlen($symbols);
        }
        $vector[]= $word;//!!!
    }

   
    for ($index = 0; $index < count($vector); $index++)
    {
        $count_d_diff = 0;
        for ( $i = 0; $i < count($matr); $i++)///!!!count
        {
            $continue_flag = false;
            for ($j = 0; $j < count($matr[$i]); $j++)
            {
                if (count_($vector[$index], $matr[$i][$j]) <= $d)
                {
                    $continue_flag = true;
                    break;
                }
            }
            if($continue_flag) { $count_d_diff++; }
            else { break; }
        }
        if ($count_d_diff == count($matr)) { $result[] = $vector[$index]; }
    }

   
sort($result);
foreach($result as $results)
{
   fwrite(STDOUT,$results." "); 
}
//var_dump($result);
  
    



function count_($first, $second)
{
   // var_dump($first);
   // echo '///';
   // var_dump($second);
   // echo '----';

    $result = 0;;
    for ($i = 0; $i < strlen($first); $i++)
    {
       //echo $second[$i];
        if ($first[$i] != $second[$i]) { $result++; }
    }
   /// echo $result;
    return $result;
}



    
?>