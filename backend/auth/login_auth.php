<?php
header('Content-Type: application/json');
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);

// Validate
if (!isset($data['email'], $data['password'])) {
  echo json_encode(['success' => false, 'message' => 'Missing email or password']);
  exit;
}

$email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
$password = $data['password'];

if (!$email) {
  echo json_encode(['success' => false, 'message' => 'Invalid email']);
  exit;
}

// Fetch user
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
  // You can also start a session or return a token here
  echo json_encode([
    'success' => true,
    'message' => 'Login successful',
    'user' => [
      'user_id' => $user['user_id'],
      'name' => $user['name'],
      'email' => $user['email']
    ]
  ]);
} else {
  echo json_encode(['success' => false, 'message' => 'Incorrect email or password']);
}
?>