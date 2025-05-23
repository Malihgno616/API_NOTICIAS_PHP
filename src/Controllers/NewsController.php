<?php 

namespace App\Controllers;

use Config\Conn;

use PDO;

class NewsController
{
  private $pdo;
  public function __construct() {
    $conn = new Conn();
    $this->pdo = $conn->conn();
  }
  public function index() 
  {
    
    $stmt = $this->pdo->query("SELECT * FROM noticias");
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $this->sendJsonResponse($news);
  }

  public function send() 
  {
   
  }
  private function sendJsonResponse($data, $statusCode = 200)
  {
      header('Content-Type: application/json');
      http_response_code($statusCode);
      echo json_encode($data);
      exit;
  }
}