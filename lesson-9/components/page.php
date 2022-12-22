<h1>Страница <?=$page?></h1>

<?php 
    foreach($data as $item){
    echo "
    <div style='border:1px solid black; margin-bottom:10px; width:500px'>
        <span>{$item['id']}. </span>
        <span style='font-weight:bold; font-size:20px;'>{$item['user']}</span>
        <span style='font-weight:normal; font-size:14px;'>{$item['user_email']}</span>
        <p>{$item['message_text']}</p>  
        <p>{$item['message_time']}</p>   
    
    </div>";
    }
?>
<br />
