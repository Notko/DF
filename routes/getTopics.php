<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($topic)){
    require_once '../start.config.php';
}

$topics = $topic->getAllTopics();


foreach ($topics as $topic) {
    echo '<li class="nav__item--dropdown-item"><a href="topic.php?topic_id=' . $topic->id  . '">' . $topic->title . ' (' . $topic->postsCount . ')' . '</a></li>';
}