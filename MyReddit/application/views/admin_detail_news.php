<div class="news_container">
    <div class='news_post'>
        <h2 class='news_post_title'><?=$data['theme']?></h2>
            <?php
                if(!empty($data['pictureLink'])){ ?>
                    <img class='news_img' width='100%' height='100%' src=<?='/upload/'.$data['pictureLink'] ?> />
              <?php  }
            ?>
            <p class='news_post_text'><?=$data['textContent']?></p>
            <div class='news_post_meta'>
                <div class='news_post_usename'>Автор: <?=$data['name']?></div>
                <div class='news_post_create'>Опубликовано: <?=$data['createDate']?></div> 
            </div>    
    </div>
</div>