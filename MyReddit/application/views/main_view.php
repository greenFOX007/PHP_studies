<div class="news_container">
    <?php 
        if(is_array($data)){
            extract($data);
        }

        if(empty($news)){
            echo "<h1>Все новости</h1>";
            echo "<div class='no_news'>Нет новостей...</div>";
        }else{
            echo "<h1>Все новости</h1>";
            foreach($news as $row)
            {   ?>
                <div class='news_post'>
                    <h2 class='news_post_title'><?=$row['theme']?></h2>
                        <?php
                            if(!empty($row['pictureLink'])){ ?>
                                <img class='news_img' width='100%' height='100%' src=<?='/upload/'.$row['pictureLink'] ?> />
                          <?php  }
                        ?>
                        <p class='news_post_text'><?=$row['textContent']?></p>
                        <div class='news_post_meta'>
                            <div class='news_post_usename'>Автор: <?=$row['name']?></div>
                            <div class='news_post_create'>Опубликовано: <?=$row['createDate']?></div> 
                        </div>  
                    </div> 
            <?php }
        
    }
    ?>
    <div class="pagination">
        <?php
        for ($i = 1; $i <= $pagesCount; $i++){
            if ($i == (isset($_GET['p'])?$_GET['p']:1)){
                echo "<a class='pagination_link visit_link' href ='/main/page/?p=$i'>$i</a>";
            } else {
                ?>
        <a class="pagination_link" href ="/main/page/?p=<?=$i?>"><?=$i?></a>
        <?php
            }
        }
        ?>
    </div>
</div>


