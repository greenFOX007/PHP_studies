<div class="pagination">
<?php
for ($i = 1; $i <= $pagesCount; $i++){
    if ($i == $page){
        echo "<a class='pagination_link visit_link' href ='index.php?page=$i'>$i</a>";
    } else {
        ?>
<a class="pagination_link" href ="index.php?page=<?=$i?>"><?=$i?></a>
<?php
    }
}
?>
</div>