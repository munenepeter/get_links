<?php
$start = microtime(true);

require 'vendor/autoload.php';

$short_options = "u:w::";
$long_options = ["url:", "keyword::"];
$options = getopt($short_options, $long_options);


if (isset($options["u"]) || isset($options["url"])) {
    $url = isset($options["u"]) ? $options["u"] : $options["url"];

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
        echo "Done getting " . count($web->links) . " links for $host in $time Seconds" . PHP_EOL;
    }
}

if (isset($options["w"]) || isset($options["keyword"])) {

    $keyword = strtolower(isset($options["w"]) ? $options["w"] : $options["keyword"]);

    $count = 0;

    foreach ($web->paragraphs as $paragraph) {

        if (strpos(strtolower($paragraph), $keyword) !== false) {
            $count++;
        } else {
            $count--;
        }
    }
    if ($count >= 1) {
        echo "Found $count results for {$keyword}" . PHP_EOL;
    } else {
        echo "No results for {$keyword}" . PHP_EOL;
    }
}
