<?php
session_start();
require_once('../config/db.php');

header('Content-Type: application/json');

// Optional: You could check if the user is an admin if needed here.

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
  exit;
}

// Extract and validate input
$name = trim($data['name'] ?? '');
$category = trim($data['category'] ?? '');
$calories_per_hour = $data['calories_per_hour'] ?? null;

if (!$name || !$category || !is_numeric($calories_per_hour)) {
  http_response_code(400);
  echo json_encode(['success' => false, 'message' => 'Missing or invalid data']);
  exit;
}

try {
  // Check for duplicate workout (by name and category)
  $check = $pdo->prepare("SELECT workout_id FROM workout WHERE name = :name AND category = :category");
  $check->execute(['name' => $name, 'category' => $category]);

  if ($check->fetch()) {
    http_response_code(409); // Conflict
    echo json_encode(['success' => false, 'message' => 'Workout with the same name and category already exists']);
    exit;
  }

  // Insert into workout table
  $stmt = $pdo->prepare("
    INSERT INTO workout (name, category, calories_per_hour)
    VALUES (:name, :category, :calories_per_hour)
  ");
  
  $stmt->execute([
    'name' => $name,
    'category' => $category,
    'calories_per_hour' => $calories_per_hour
  ]);

  echo json_encode(['success' => true, 'message' => 'Workout added successfully']);

} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
