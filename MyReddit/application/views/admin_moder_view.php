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
            <button onclick="sortAdmin('sortModerationNews')" data-sort="idNews" class="news_id_admin_zag">ID</button>
                <button onclick="sortAdmin('sortModerationNews')" class="news_category_admin_zag" data-sort="categoryName">Категория</button>
                <button onclick="sortAdmin('sortModerationNews')" class="news_title_admin_zag" data-sort="theme">Название</button>
                <button onclick="sortAdmin('sortModerationNews')" class="news_create_admin_zag" data-sort="createDate">Дата публикации</button>
                <button onclick="sortAdmin('sortModerationNews')" class="news_status_admin_zag" data-sort="moderationStatus">Активность</button>
            </div>
            
            <?php
            foreach($news as $row)
            {   ?>
                <div class="news_container_admin">
                    <div class="news_meta_admin">
                        <div class="news_id_admin"><?=$row['idNews']?></div>
                        <div class="news_category_admin"><?=$row['categoryName']?></div>
                        <div class="news_title_admin">
                            <p class="news_title_admin_p"><?=trim($row['theme'],"\"") ?></p>
                        </div>
                        <div class="news_create_admin"><?=$row['createDate']?></div>
                        <div class="news_status_admin"><?=$row['moderationStatus']==1?'Опубликовано':'Не опубликовано'?></div>
                    </div>
                    <div class="news_controls_btns">
                        <a class="control_btn_admin" href="/admin/detailNews/?idNews=<?=$row['idNews']?>" data-id="<?=$row['idNews']?>" >Просмотреть</a>
                        <a class="control_btn_admin" href="">Комментарии</a>
                        <a class="control_btn_admin" href="/admin/editNews/?idNews=<?=$row['idNews']?>" data-id="<?=$row['idNews']?>" >Редактировать</a>
                        <button onclick="publishNews()" class="control_btn_admin" data-id="<?=$row['idNews']?>" >Опубликовать</button>
                        <button onclick="deleteNews()" class="control_btn_admin" data-id="<?=$row['idNews']?>" >Удалить</button>
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
            if ($i == (isset($_GET['p'])?$_GET['p']:1)){?>
                 <a class="pagination_link visit_link" href ="<?='/admin/moderation/'.$url.$i?>"><?=$i?></a>
                <!-- echo "<a class='pagination_link visit_link' href ='/admin/allNews/?p=$i'>$i</a>"; -->
        <?php    } else {
                ?>
            <a class="pagination_link" href ="<?='/admin/moderation/'.$url.$i?>"><?=$i?></a>
        <?php
            }
        }
        ?>
    </div>
</div>