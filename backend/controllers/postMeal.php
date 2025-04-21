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
$name = $data['name'] ?? null;
$calories = $data['calories'] ?? null;
$carbs = $data['carbs'] ?? null;
$fats = $data['fats'] ?? null;
$protein = $data['protein'] ?? null;
$category = $data['category'] ?? null; // Optional field


try {
  // Insert into meals table
  $stmt = $pdo->prepare("
    INSERT INTO meals (user_id, name, category, calories, protein, carbs, fats)
    VALUES (:user_id, :name, :category, :calories, :protein, :carbs, :fats)
  ");
  
  $stmt->execute([
    'user_id' => $user_id,
    'name' => $name,
    'category' => $category,
    'calories' => $calories,
    'protein' => $protein,
    'carbs' => $carbs,
    'fats' => $fats
  ]);

  echo json_encode(['success' => true, 'message' => 'Meal added successfully']);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>