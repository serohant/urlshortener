<?php
include './URLShortener.class.php';
$datafile = file_get_contents('urls.json');
$datafile = json_decode($datafile,true);
$urls = new URLShortener($datafile);
if($urls->checkName($_GET['q'])){
    header('Location: '.$urls->getUrls()[$_GET['q']][$_GET['q']]);
}else{
    header('Location: '.$urls->getUrls()[$_GET['q']]);
}

?>