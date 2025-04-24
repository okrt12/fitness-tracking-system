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

$user_id = $_SESSION['user_id'];

try {
  // Fetch all workouts for the logged-in user
  $stmt = $pdo->prepare("
    SELECT workout_id, name, category, calories_per_hour, workout_day_name
    FROM workouts
    WHERE user_id = :user_id
    ORDER BY name ASC
  ");
  
  $stmt->execute(['user_id' => $user_id]);
  $workouts = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode([
    'success' => true,
    'data' => $workouts ? $workouts : []
  ]);

} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode([
    'success' => false,
    'message' => 'Failed to fetch workouts: ' . $e->getMessage()
  ]);
}
?>