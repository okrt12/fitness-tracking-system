<?php
require_once('../config/db.php');
header('Content-Type: application/json');

try {
  $stmt = $pdo->query("
(
  SELECT 'quote' AS type, content
  FROM motivational_content
  WHERE type = 'quote'
  ORDER BY RAND()
  LIMIT 1
)
UNION
(
  SELECT 'fact' AS type, content
  FROM motivational_content
  WHERE type = 'fact'
  ORDER BY RAND()
  LIMIT 1
)

  ");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode(['success' => true, 'data' => $results]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
