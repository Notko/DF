<?php

if (!isset($_GET['id'])) return;

if (!isset($comment)) {
    require_once '../start.config.php';
}

$comments = $comment->getComments(intval($_GET['id']));

echo
'
<div class="post-card__comments-wrapper" id="comment" data-comment-wrapper-id="' . $_GET['id'] . '">
    <h3>Komentáře (' . $comment->getCommentCount(intval($_GET['id'])) . ')</h3>
    '.
    (isset($_SESSION['username']) ? '<form class="post-card-comment-form">
        <label>
            <textarea class="post-card-comment-textarea" placeholder="Přidejte komentář" name="content"></textarea>
            <input type="hidden" name="id" value="0">
            <button type="submit" class="button" name="comment-submit">
                <i class="fa-regular fa-paper-plane"></i>
            </button>
        </label>
    </form>' : '') .
    '<div class="post-card-comment-wrapper">
';

foreach ($comments as $tempComment) {
    $replies = intval($comment->getRepliesCount($tempComment->id));

    echo '
    <div class="post-card__comment">
        <div class="post-card-comment__header">
            <div class="post-card-comment__info">
                <span class="post-card-comment__author">' . (($tempComment->username) ?: "Anonymní uživatel") . '</span>
                <span class="post-card-comment__date">' . date("d. m. Y", strtotime($tempComment->date_created)) . '</span>
            </div>
        </div>
        <div class="post-card-comment-content">
            ' . $tempComment->content . '
        </div>
        ' . (isset($_SESSION['username']) ? '        <form class="post-card-comment-form post-card-comment-form--reply">
            <label>
                <textarea class="post-card-comment-textarea" placeholder="Přidejte komentář" name="content"></textarea>
                <input type="hidden" name="comment-id" value="' . $tempComment->id . '">
                <button type="submit" class="button" name="comment-submit">
                    <i class="fa-regular fa-paper-plane"></i>
                </button>
            </label>
        </form>' : '') . '
        ' . ($replies > 0 ? '
        <button type="button" class="post-card-comment__show-replies" data-comment-id="' . $tempComment->id . '">
            <i class="fa-solid fa-chevron-down"></i>
            <span>Komentáře (' . $replies . ')</span>
        </button>
        ' : '') . '</div>';
}

echo '</div></div>';