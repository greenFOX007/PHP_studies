<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- Задание 1 -->

   <h2>Задание 1</h2>

   <?php 
        $random_range = rand(10,20);

        for($i=0;$i<=$random_range;$i++){
            $arr1[$i] = rand(1,25);
        };
    
        $myArr = array_values(array_unique($arr1));
    
        $resArr = print_r($myArr,true);
    
        $min = min($arr1);
    
        $max = max($arr1);
    
        $index_min = array_search($min,$myArr);

        $index_max = array_search($max,$myArr);
    
        if($index_max > $index_min){
             $s = 1;
             for($i=$index_min+1; $i<$index_max; $i++){
                 $s = $s*$myArr[$i];
             }
        }else{
             $s = 1;
             for($i=$index_max+1; $i<$index_min; $i++){
                 $s = $s*$myArr[$i];
             }
        }
    
        echo "<p>Исходный массив $resArr</p>";
        echo "<p>Минимальное значение: $min ; индекс минимального: $index_min</p>";
        echo "<p>Максимальное значение: $max ; индекс максимального: $index_max</p>";
        echo "<p>Результат произведения $s</p>";
   ?>

   <!-- Задание 2 -->

   <h2>Задание 2</h2>

   <?php 
        $random_range1 = rand(10,20);

        for($i=0;$i<=$random_range1;$i++){
            $arr2[$i] = rand(1,25);
        };
    
        $myArr1 = array_values(array_unique($arr2));
    
        $resArr1 = print_r($myArr1,true);

        for($j=0; $j<=$random_range1-1; $j++){
            if(($j+1)%2==0){
                $arr_even[] = $myArr1[$j];
            }else{
                $arr_odd[] = $myArr1[$j];
            };
        };

        $res_arr_even = print_r($arr_even,true);

        $res_arr_odd = print_r($arr_odd,true);

        $result = array_merge($arr_odd ,$arr_even);

        $print_result = print_r($result,true);

        echo "<p>Исходный массив $resArr1</p>";
        echo "<p>Массив нечетных $res_arr_odd</p>";
        echo "<p>Массив четных $res_arr_even</p>";
        echo "<p>Объединенный массив $print_result</p>";

   ?>

</body>
</html>