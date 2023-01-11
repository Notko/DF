<?php
if(!isset($_GET['id'])) return;

require_once "controllers/topicController.class.php";
$topic = new topicController();
$topic = $topic->getTitleFromID($_GET['id']);

echo $topic[0]->title;
return $topic[0]->title;

//echo '<pre>' . json_encode($topic, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</pre>';