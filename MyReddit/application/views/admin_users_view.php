<div class="news_container">
    <?php 
        if(is_array($data)){
            extract($data);
        }

        if(empty($users)){
            echo "<h1>Пользователи</h1>";
            echo "<div class='no_news'>Нет пользователей...</div>";
        }else{
            echo "<h1>Пользователи</h1>"; ?>
            
            <div class="news_meta_admin">
                <button class="news_id_admin_zag">ID</button>
                <button class="news_category_admin_zag">Имя</button>
                <button class="news_title_admin_zag">Email</button>
                <button class="news_create_admin_zag">Пол</button>
                <button class="news_status_admin_zag">Группа пользователей</button>
                <button class="news_status_admin_zag">Дата регистрации</button>
            </div>
            
            <?php
            foreach($users as $row)
            {   ?>
                <div class="news_container_admin">
                    <div class="news_meta_admin">
                        <div class="news_id_admin"><?=$row['idUser']?></div>
                        <div class="news_category_admin"><?=$row['name']?></div>
                        <div class="news_title_admin"><?=$row['email']?></div>
                        <div class="news_create_admin"><?=$row['gender']?></div>
                        <div class="news_status_admin"><?=$row['groupName']?></div>
                        <div class="news_status_admin"><?=$row['registrationDate']?></div>
                    </div>
                    <div class="news_controls_btns">
                        <a class="control_btn_admin" href="">Редактировать</a>
                        <a class="control_btn_admin" href="">Удалить</a>
                    </div>
                </div>
                    
            <?php }
        
    }
    ?>
    <div class="pagination">
        <?php
        for ($i = 1; $i <= $pagesCount; $i++){
            if ($i == (isset($_GET['p'])?$_GET['p']:1)){
                echo "<a class='pagination_link visit_link' href ='/admin/users/?p=$i'>$i</a>";
            } else {
                ?>
        <a class="pagination_link" href ="/admin/users/?p=<?=$i?>"><?=$i?></a>
        <?php
            }
        }
        ?>
    </div>
</div>