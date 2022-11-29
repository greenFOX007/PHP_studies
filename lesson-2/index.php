<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        border: 1px solid black;
    }

    td {
        border: 1px solid black;
    }
</style>
<body>
    <!-- Задание 1.1 -->

    <h2> Задание 1.1 </h2>

    <?php 
       $row = rand(1,15);
    ?>
    
    <table  cellspacing='0' >
        <tr>
            <td>Номер</td>
            <td>Число</td>
        </tr>
        <?php
            for($i=1;$i<=$row;$i++){
                $random_number = rand($row,50);
                
                if($i%3 == 1){
                    $color = 'red';
                } elseif($i%3 == 2){
                    $color = 'yellow';
                }elseif($i%3 == 0){
                    $color = 'green';
                }
        ?>
                
            <tr > 
                <td style='background-color:<?=$color?>;' > <?=$i ?> </td> 
                <td style='background-color:<?=$color?>;'> <?=$random_number ?></td> 
            </tr>
        <?php } ?>
            
    </table>

            

    <!-- Задание 1.2 -->

    <h2> Задание 1.2 </h2>

    <?php 

    $row1 = rand(1,20);
    $k = 5;

    ?>

    <table cellspacing='0' >
        <tr>
            <td>Номер</td>
            <td colspan=<?=$k ?>>Число</td>
        </tr>
        <?php
            for($i = 1; $i <= $row; $i++){

                if($i%3 == 1){
                    $color = 'red';
                } elseif($i%3 == 2){
                    $color = 'yellow';
                }elseif($i%3 == 0){
                    $color = 'green';
                }
        ?>

        <tr > 
            <td style='background:<?=$color?>;' > <?=$i ?> </td> 
            
            <?php 
                for($j = 1; $j <= $k; $j++){ 
                    $random_number1 = rand(1,50);  
            ?>
                <td style='background-color:<?=$color?>;'> <?=$random_number1 ?></td>
                    
            <?php }  ?>                     
        </tr>
        <?php } ?>
            
    </table>


    <!-- Задание 2 -->

    <h2> Задание 2 </h2>   
    
    <?php 
        
    ?>

    <table cellspacing='0' >
        <?php 
            $rand_row = rand(5,30);       
            $step =  round(255/$rand_row) ;          
            $iter_color = 0;

            for($i=0;$i<=$rand_row;$i++){ 
                $rgb = $iter_color + $i*$step; 
                $full_color = "$rgb,$rgb,$rgb";   
        ?>    
             <tr>
                <td style="width:20px; height:10px; background-color: rgb(<?= $full_color ?>);"></td>
            </tr> 
            <?php } ?>
               

    </table>




</body>
</html>