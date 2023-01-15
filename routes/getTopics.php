<?php
if(!isset($topic)){
    require_once '../start.config.php';
}

$topics = $topic->getAllTopics();


foreach ($topics as $tempTopic) {
    echo '<li class="nav__item--dropdown-item"><a href="topic.php?topic_id=' . $tempTopic->id  . '">' . $tempTopic->title . ' (' . $tempTopic->postsCount . ')' . '</a></li>';
}