<?php
$start = microtime(true);

require 'vendor/autoload.php';

$url = $argv[1];

$web = new \spekulatius\phpscraper();

$web->go($url);

// Loop through the links
$links = '';
foreach ($web->links as $link) {
    $links .= $link . "\n";
}


$host = parse_url($url, PHP_URL_HOST);
$time = round(microtime(true) - $start, 2);

if (file_put_contents('links.txt', $links)) {
    echo "Done getting " . count($web->links) . " links for $host in $time Seconds";
}
