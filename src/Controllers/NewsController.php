<?php 

namespace App\Controllers;

use Config\Conn;

use PDO;
use PDOException;

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
   
    if($_SERVER['REQUEST_METHOD'] !== 'POST') {
      return $this->sendJsonResponse(['Error: ' => 'Método não permitido'], 405);
    }
    
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    try {
      $stmt = $this->pdo->prepare("INSERT INTO noticias (manchete, subtitulo, lide) VALUES (:manchete, :subtitulo, :lide)");

      $success = $stmt->execute([
        ':manchete' => $data['manchete'],
        ':subtitulo' => $data['subtitulo'] ?? null,
        ':lide' => $data['lide'] ?? null
      ]);

      if($success) {
        $id = $this->pdo->lastInsertId();
        return $this->sendJsonResponse(['success' => true, 'id' => $id, 'message' => 'Notícia criada com sucesso'], 201);
      }
      return $this->sendJsonResponse(['error' => 'Falha ao inserir noticia'], 500);
    } catch(PDOException $e) {
      return $this->sendJsonResponse(['error' => 'Erro no banco de dados', 'details' => $e->getMessage()], 500);
    }

  }

  public function editNews()
  {

      if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
          return $this->sendJsonResponse(['error' => 'Método não permitido'], 405);
      }

      $json = file_get_contents('php://input');
      $data = json_decode($json, true);

      if (empty($data['id'])) {
          return $this->sendJsonResponse(['error' => 'ID da notícia é obrigatório'], 400);
      }

      try {
          // Prepara a query de atualização
          $stmt = $this->pdo->prepare("UPDATE noticias SET 
                                      manchete = COALESCE(:manchete, manchete),
                                      subtitulo = COALESCE(:subtitulo, subtitulo),
                                      lide = COALESCE(:lide, lide)
                                      WHERE id = :id");

          // Executa a query
          $success = $stmt->execute([
              ':id' => $data['id'],
              ':manchete' => $data['manchete'] ?? null,
              ':subtitulo' => $data['subtitulo'] ?? null,
              ':lide' => $data['lide'] ?? null
          ]);

          if ($success && $stmt->rowCount() > 0) {
              return $this->sendJsonResponse([
                  'success' => true,
                  'message' => 'Notícia atualizada com sucesso'
              ]);
          }
          
          return $this->sendJsonResponse(['error' => 'Nenhuma notícia foi atualizada'], 404);
          
      } catch (PDOException $e) {
          return $this->sendJsonResponse([
              'error' => 'Erro no banco de dados',
              'details' => $e->getMessage()
          ], 500);
      }
  }

  public function deleteNews(): void
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