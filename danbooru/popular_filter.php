<?php
include_once('../simple_html_dom.php');
$url = $_GET['url'];
$html = file_get_html("$url");

// echo $html;

foreach($html->find('ul[class=character-tag-list] > li') as $element){
    $tag[] = $element->getAttribute('data-tag-name');
}

foreach($html->find('ul[class=copyright-tag-list] > li') as $element){
    $tag[] = $element->getAttribute('data-tag-name');
}

//jika aktor gambar kosong, buat array
if(!isset($tag)){$tag[] = '';}


foreach($html->find('picture > img') as $element){
    $url_gambar = $element->src;
}

require 'vendor/autoload.php';


\Cloudinary::config([ 
  "cloud_name" => "jbr-foundation", 
  "api_key" => "826495999593532", 
  "api_secret" => "Nh1K-Z6G-fre_EyfaJhzc0N2Vls", 
  "secure" => true]);
  
$img = \Cloudinary\Uploader::upload("$url_gambar");

#echo "http://localhost/hinata18/antre.php?url=".$img['secure_url']."&judul=".implode(" ",$tag_judul_gambar)."&aktor=".implode(" ",$tag_aktor_gambar)."&callback=".$_GET['callback'];

$url_antre = "http://hinata18.is-best.net/antre.php?url=".$img['secure_url']."&tag=".implode(" ",$tag)."&callback=".base64_encode($_GET['callback']);

header("Location: $url_antre");
die();
