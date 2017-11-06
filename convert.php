<?php
include "engine.php";
$link=$_GET['link'];
$fetch=new Download($link);
$data=$fetch->get($fetch->fetch);
parse_str($data,$info);
$info=json_decode(json_encode($info));
if(!$info->status==="ok") die("There was an error in fetching video");
$fetch->primary($info->title,$info->author,$info->length_seconds,$info->view_count);
if (!isset($info->url_encoded_fmt_stream_map)) {
    die('No data found');
}
$streamFormats = explode(",", $info->url_encoded_fmt_stream_map);
if (isset($info->adaptive_fmts)) {
    $streamSFormats = explode(",", $info->adaptive_fmts);
    $pStreams = $fetch->parseStream($streamSFormats);
}
$cStreams = $fetch->parseStream($streamFormats);
include "final.php" ; ?>
