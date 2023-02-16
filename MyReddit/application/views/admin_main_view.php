<?php session_start() ?>
<div class="news_container">
    <?php 
        if(is_array($data)){
            extract($data);
        }

        if(empty($news)){
            echo "<h1>Все новости</h1>";
            echo "<div class='no_news'>Нет новостей...</div>";
        }else{
            echo "<h1>Все новости</h1>"; ?>
            
            <div class="news_meta_admin">
                <button class="news_id_admin_zag">ID</button>
                <button class="news_category_admin_zag">Категория</button>
                <button class="news_title_admin_zag">Название</button>
                <button class="news_create_admin_zag">Дата публикации</button>
                <button class="news_status_admin_zag">Активность</button>
            </div>
            
            <?php
            foreach($news as $row)
            {   ?>
                <div class="news_container_admin">
                    <div class="news_meta_admin">
                        <div class="news_id_admin"><?=$row['idNews']?></div>
                        <div class="news_category_admin"><?=$row['categoryName']?></div>
                        <div class="news_title_admin"><?=$row['theme']?></div>
                        <div class="news_create_admin"><?=$row['createDate']?></div>
                        <div class="news_status_admin"><?=$row['moderationStatus']==1?'Опубликовано':'Не опубликовано'?></div>
                    </div>
                    <div class="news_controls_btns">
                        <a class="control_btn_admin" href="">Просмотреть</a>
                        <a class="control_btn_admin" href="">Комментарии</a>
                        <a class="control_btn_admin" href="">Редактировать</a>
                        <a class="control_btn_admin" href="">Опубликовать</a>
                        <a class="control_btn_admin" href="">Удалить</a>
                    </div>
                </div>
                    
            <?php }

        
    }
    ?>
     <div class="pagination">
        <?php
        if(isset($_SESSION['url'])){
            $url = '?'.$_SESSION['url'].'&p=';
        }else{
            $url = '?p=';
        }
        for ($i = 1; $i <= $pagesCount; $i++){
            if (($i == (isset($_GET['p'])?$_GET['p']:1))){?>
                <a class="pagination_link visit_link" href ="<?='/admin/allNews/'.$url.$i?>"><?=$i?></a>
           <?php } else {
                ?>
        <a class="pagination_link" href ="<?='/admin/allNews/'.$url.$i?>"><?=$i?></a>
        <?php
            }
        }
        ?>
    </div>
</div>