<?php
session_start();
require_once('../config/db.php');

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'User not logged in']);
  exit;
}

$user_id = $_SESSION['user_id'];

try {
  // Fetch most recent workout log per day (for 7 days), no timestamp
  $stmt = $pdo->prepare("
    SELECT wl.*
    FROM workout_log wl
    JOIN (
        SELECT DATE(date) AS log_date, MAX(date) AS max_datetime
        FROM workout_log
        WHERE user_id = :user_id
        GROUP BY log_date
        ORDER BY max_datetime DESC
        LIMIT 7
    ) recent_logs
    ON DATE(wl.date) = recent_logs.log_date AND wl.date = recent_logs.max_datetime
    WHERE wl.user_id = :user_id
    ORDER BY wl.date DESC
  ");

  $stmt->execute(['user_id' => $user_id]);
  $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Format 'date' as 'Apr 28'
  foreach ($logs as &$log) {
    $log['date'] = date('M j', strtotime($log['date'])); // e.g., "Apr 28"
    unset($log['date']); // Optional: remove original date if not needed
  }

  echo json_encode(['success' => true, 'data' => $logs]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
