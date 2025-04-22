<?php
session_start();
require_once('../config/db.php');

header('Content-Type: application/json');

// Authentication check
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

$user_id = $_SESSION['user_id'];

try {
  // Fetch workout logs with workout names (joined from workouts table)
  $stmt = $pdo->prepare("
    SELECT wl.log_id, 
           w.name AS workout_name,
           wl.date,
           wl.duration,
           wl.calories_burned,
           w.category
    FROM workout_log wl
    JOIN workouts w ON wl.workout_id = w.workout_id
    WHERE wl.user_id = :user_id
    ORDER BY wl.date DESC
  ");
  
  $stmt->execute(['user_id' => $user_id]);
  $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Return data with success flag
  echo json_encode([
    'success' => true,
    'data' => $logs ? $logs : []
  ]);

} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode([
    'success' => false,
    'message' => 'Failed to fetch workout logs: ' . $e->getMessage()
  ]);
}
?>