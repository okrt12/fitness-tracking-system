<?php
require_once('../config/db.php');
header('Content-Type: application/json');

try {
  $stmt = $pdo->query("
  SELECT type, content
 FROM motivational_content
ORDER BY RAND();

  ");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode(['success' => true, 'data' => $results]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
