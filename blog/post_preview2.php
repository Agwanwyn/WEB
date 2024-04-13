<div class="most-recent__unit">
    <a href="/post.php?postid=<?= $post2['post_id'] ?>" class="img__link">
        <img class="most-recent__image" src="<?= $post2['image_url'] ?>" alt="most recent" />
    </a>
    <div class="most-recent__content">
        <h3 class="most-recent__title">
            <a href="/post.php?postid=<?= $post2['post_id'] ?>" class="most-recent__link"><?= $post2['title'] ?></a>
        </h3>
        <p class="most-recent__subtitle"><?= $post2['subtitle'] ?></p>
    </div>
    <div class="most-recent__author">
        <img class="most-recent__photo" src="<?= $post2['author_url'] ?>" alt="author" />
        <p class="most-recent__name"><?= $post2['author'] ?></p>
        <p class="most-recent__data"><?= $post2['publish_date'] ?></p>
    </div>
</div>