<?php
if(!isset($_GET['id'])) return;

$topic = $topic->getTitleFromID($_GET['id']);

echo $topic[0]->title;
return $topic[0]->title;

//echo '<pre>' . json_encode($topic, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</pre>';