<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Controllers\NewsController;

require __DIR__ . '/../vendor/autoload.php';

$controller = new NewsController();

switch($_SERVER['REQUEST_URI'] && $_SERVER['REQUEST_METHOD']){
  case $_SERVER['REQUEST_URI'] === '/API_NOTICIAS/public/news' && $_SERVER['REQUEST_METHOD'] === 'GET':
    $controller->index();
    break;
  case $_SERVER['REQUEST_URI'] === '/API_NOTICIAS/public/news/send' && $_SERVER['REQUEST_METHOD'] === 'POST':
    $controller->send();
    break;
  case $_SERVER['REQUEST_URI'] === '/API_NOTICIAS/public/news/edit' && $_SERVER['REQUEST_METHOD'] === 'PUT':
    $controller->editNews();
    break;
}
