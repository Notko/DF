<?php
if(!isset($_GET['id'])) return;

require_once "../controllers/postController.class.php";
$posts = new postController();
$posts = $posts->getPost(intval($_GET['id']));

//echo '<pre>' . json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</pre>';

foreach ($posts as $post) {
    echo '
        <article class="post-card">
        <a href="#" class="post-card__title"><h2>' . $post->heading . '</h2></a>
        <div class="post-card__header">
            <div class="post-card__info">
                <span class="post-card__author">' . (($post->username) ?: "Anonymní uživatel") . '</span>
                <span class="post-card__date">' . date("d. m. Y", strtotime($post->date_created)) . '</span>
            </div>
            <div>
                <span class="post-card__label">' . (($post->topic_title) ?: "") . '</span>
            </div>
        </div>
        <div class="post-card__content">' . $post->content . '</div>
        <a href="#" class="post-card__reply">
            <i class="fa-solid fa-comment"></i>
            <span>Odpovědět</span>
        </a>
    </article>
    ';
}