<?php
session_start();
require_once('../config/db.php'); // Ensure this path is correct

header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

$user_id = $_SESSION['user_id'];

try {
  // Fetch meal logs with meal names (joining with meals table)
  $stmt = $pdo->prepare("
    SELECT m.name, ml.quantity, ml.calories, ml.log_date
    FROM meal_log ml
    JOIN meals m ON ml.meal_id = m.meal_id
    WHERE ml.user_id = :user_id
    ORDER BY ml.log_date DESC
  ");
  $stmt->execute(['user_id' => $user_id]);
  $mealLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Return data or empty array
  echo json_encode([
    'success' => true,
    'data' => $mealLogs ? $mealLogs : []
  ]);

} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode([
    'success' => false,
    'message' => 'Failed to fetch meal logs: ' . $e->getMessage()
  ]);
}
?>