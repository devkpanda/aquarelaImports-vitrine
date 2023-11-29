<?php
print_r($_SESSION);

$url = parse_url($_SERVER['REQUEST_URI']);
$uriPath = $url['path'];

if ($uriPath == '/test') {
    print_r($_SESSION);
}
?>