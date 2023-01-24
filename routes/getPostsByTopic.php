<?php
if(!isset($_GET['topic_id'])) return;

if(!isset($post)){
    require_once '../start.config.php';
}

$posts = $post->getPostsByTopic(intval($_GET['topic_id']));

foreach ($posts as $post) {
    echo '
        <article class="post-card" data-post-card-id="' . $post->post_id . '">
        <a href="post.php?id=' . $post->post_id . '" class="post-card__title"><h2>' . $post->heading . '</h2></a>
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
        <button type="button" class="post-card__reply" data-post-id="' . $post->post_id . '">
            <i class="fa-solid fa-chevron-down"></i>
            <span>Komentáře (' . $comment->getCommentCount(intval($post->post_id)) . ')</span>
        </button>
    </article>
    ';
}