<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

    <h1>Страница <?=$page?></h1>

        <?php 
            foreach($pageData as $item){
               echo text_info($item);
            }
        ?>
   
   <div>
        <?php
        for ($i = 1; $i <= $pagesCount; $i++){
            if ($i == $page){
                echo "$i";
            } else {
                ?>
        <a href ="index.php?page=<?=$i?>"><?=$i?></a>
        <?php
            }
        }
        ?>
    </div>
    

</body>
</html>