<?php 

namespace Config;

use PDO, PDOException;

class Conn {
  
  private const DB_HOST = 'localhost';
  private const DB_NAME = 'noticias_transito';
  private const DB_USER = 'root';
  private const DB_PASS = '';

  public function conn(): ?PDO
  {
    try {
      $pdo = new PDO(
        "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=utf8mb4",
        self::DB_USER,
        self::DB_PASS
      );
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;      
    } catch (PDOException $e) {
      echo "Erro: " . $e->getMessage();
      return null;
    }
  }
}
