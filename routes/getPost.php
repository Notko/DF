<?php
if(!isset($_GET['id'])) return;

if(!isset($post)){
    require_once '../start.config.php';
}
$posts = $post->getPost(intval($_GET['id']));

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
                <a class="post-card__label" href="topic.php?topic_id=' . $post->topics_id . '">' . (($post->topic_title) ?: "") . '</a>
            </div>
        </div>
        <div class="post-card__content">' . $post->content . '</div>
        <a href="#" class="post-card__reply">
            <i class="fa-solid fa-comment"></i>
            <span>Komentáře</span>
        </a>
    </article>
    ';
}