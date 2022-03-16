<?php
// Front Controller

require_once '../src/model.php';
require_once '../src/controllers.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ('/mvc-cl/public/index.php' === $uri) {
    list_action();
} elseif ('/mvc-cl/public/index.php/show' === $uri && isset($_GET['id'])) {
    show_action($_GET['id']);
} else {
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
