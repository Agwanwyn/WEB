<div class="features-posts__unit">
    <img class="features-posts__background" src="<?= $post1['image_url'] ?>" alt="features posts" />
    <h3 class="features-postss__title">
        <a class="features-posts__link" href="/post.php?postid=<?= $post1['post_id'] ?>"><?= $post1['title'] ?></a>
    </h3>
    <p class="features-posts__subtitle"><?= $post1['subtitle'] ?></p>
    <div class="features-posts__author">
        <img class="features-posts__photo" src="<?= $post1['author_url'] ?>" alt="author" />
        <p class="features-posts__name"><?= $post1['author'] ?></p>
        <p class="features-posts__data"><?= $post1['publish_date'] ?></p>
    </div> 
</div>

