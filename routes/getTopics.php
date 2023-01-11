<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "controllers/topicController.class.php";
$topics = new topicController();
$topics = $topics->getAllTopics();

//echo '<pre>' . json_encode($topics, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</pre>';

foreach ($topics as $topic) {
    echo '<li class="nav__item--dropdown-item"><a href="topic.php?topic_id=' . $topic->id  . '">' . $topic->title . ' (' . $topic->postsCount . ')' . '</a></li>';
}