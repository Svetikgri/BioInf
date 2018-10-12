
<?php

    $s1 = "ACGTTGCATGTCGCATGATGCATGAGAGCT";
    $k = 4;
    $result = $ressts = array();

    for ($i = 0; $i < strlen($s1) - $k; $i++) {
        $copys1 = $s1;
        $s2 = substr($copys1, $i, $k);//4 символа - буквы
        $res[$i] = sub($s1, $s2);// массив числа повторений
        $resst[$i] = $s2;// массив комбинаций букв по 4
    }

    $maxind = max($res);//массив с индексами

    foreach($resst as $key =>  $ressts){

        if($res[$key] == $maxind)
        {
            if(in_array($ressts, $result)){
            }else{$result[] = $ressts;}

        }
    }

    var_dump($result);


    function sub($s1, $s2)
    {
        $count = 0;
        for ($i = 0; $i < strlen($s1); $i++) {
            $pos = substr($s1, $i, 4);
            if ($pos == $s2) {
                $count++;
            }
        }

        return $count;

    }


?>