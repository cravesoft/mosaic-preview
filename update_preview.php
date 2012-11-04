<?php

$url = $_GET['url'];
$idx = $_GET['idx'];

$out = array();

/* remove old capture */
exec('rm -f img/capture'.$idx.'.png 2>&1', $out);
print_r($out);

/* run X client with a free server number and capture a WebKit's rendering of a web page */
exec('xvfb-run --auto-servernum --server-args="-screen 0, 1024x768x24" cutycapt --url='.$url.' --out=img/capture'.$idx.'.png --max-wait=2500 2>&1', $out);
print_r($out);

/* resize and crop captured image */
exec('convert -crop 800x500+0+0 -geometry 400x250! img/capture'.$idx.'.png img/preview'.$idx.'.png 2>&1', $out);
print_r($out);

?>
