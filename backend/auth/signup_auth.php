
<?php
header('Content-Type: application/json');
require '../config/db.php';

$data = json_decode(file_get_contents("php://input"), true);

// Validate
if (!isset($data['name'], $data['email'], $data['password'])) {
  echo json_encode(['success' => false, 'message' => 'Missing required fields']);
  exit;
}

$name = htmlspecialchars($data['name']);
$email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
$password = password_hash($data['password'], PASSWORD_DEFAULT); // Secure password
$age = ($data['age']);
$height = ($data['height']);
$weight = ($data['weight']);
$gender = ($data['gender']);
$goal = ($data['goal']);
$disease = ($data['disease']);

if (!$email) {
  echo json_encode(['success' => false, 'message' => 'Invalid email']);
  exit;
}

// Check if user exists
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->rowCount() > 0) {
  echo json_encode(['success' => false, 'message' => 'Email already registered']);
  exit;
}

// Insert new user
$stmt = $pdo->prepare("INSERT INTO users (name, email, password, age, gender, height, weight, goal, disease) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt->execute([$name, $email, $password,$age, $gender, $height, $weight, $goal, $disease])) {
  echo json_encode(['success' => true, 'message' => 'User registered successfully']);
} else {
  echo json_encode(['success' => false, 'message' => 'Registration failed']);
}
?>