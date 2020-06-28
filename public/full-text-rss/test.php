<?php
$json = 'https://ogledalo.mk/full-text-rss/makefulltextfeed.php?format=json&url=http://mistagogia.mk/feed/';
$result = file_get_contents($json);
$json = json_decode($result, true);

function displayArrayRecursive($json)
{
    if ($json) {
        foreach ($json as $key => $value) {
            if (is_array($value)) {
                displayArrayRecursive($value);
            } else {
                echo $key . '--' . $value . '<br>';
            }
        }
    }
}

displayArrayRecursive($json);
