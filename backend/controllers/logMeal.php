<?php
session_start();
require_once('../config/db.php');

header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

// Read JSON input from form submission
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
  exit;
}

// Extract and sanitize input
$user_id = $_SESSION['user_id'];
$meal_id = $data['meal_id'] ?? null;
$quantity = $data['quantity'] ?? null;
$calories = $data['calories'] ?? null;
$date = $data['date'] ?? null;


try {
  // Insert into meal_log table
  $stmt = $pdo->prepare("
    INSERT INTO meal_log (user_id, meal_id, date, quantity, calories)
    VALUES (:user_id, :meal_id, :date, :quantity, :calories)
  ");
  
  $stmt->execute([
    'user_id' => $user_id,
    'meal_id' => $meal_id,
    'date' => $date,
    'quantity' => $quantity,
    'calories' => $calories
  ]);

  echo json_encode(['success' => true, 'message' => 'Meal logged successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>