<?php
session_start();
require_once('../config/db.php');

header('Content-Type: application/json');

// Optional: You could still check if the user is logged in for security
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

try {
  // Fetch all predefined workouts (available to all users)
  $stmt = $pdo->query("
    SELECT workout_id, name, category, calories_per_hour
    FROM workout
    ORDER BY category, name ASC
  ");
  
  $workouts = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode([
    'success' => true,
    'data' => $workouts ?: []
  ]);

} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode([
    'success' => false,
    'message' => 'Failed to fetch workouts: ' . $e->getMessage()
  ]);
}
?>
