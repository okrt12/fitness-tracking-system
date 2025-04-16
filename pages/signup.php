<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTrack+ | Signup</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="../assets/css/general.css" />
    <link rel="stylesheet" href="../assets/css/signup.css" />
</head>
<body>
    <main class="signup-section">
        <div class="container">
            <div class="signup-container">
                <div class="signup-card cards">
                    <h2 class="heading-secondary">Create Your <span class="heading-color">FitTrack+</span> Account</h2>
                    <p class="cards-description">Join thousands of users transforming their health and fitness journey.</p>
                    
                    <form class="signup-form">
                        <div class="form-group">
                            <label for="fullname" class="input__label">Full Name</label>
                            <input type="text" id="fullname" class="input" placeholder="Enter your full name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="input__label">Email Address</label>
                            <input type="email" id="email" class="input" placeholder="Enter your email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="input__label">Password</label>
                            <input type="password" id="password" class="input" placeholder="Create a password" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="age" class="input__label">Age</label>
                            <input type="number" id="age" class="input" placeholder="Enter your age" min="12" max="120" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="height" class="input__label">Height (cm)</label>
                            <input type="number" id="height" class="input" placeholder="Enter your height" min="100" max="250" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="weight" class="input__label">Weight (kg)</label>
                            <input type="number" id="weight" class="input" placeholder="Enter your weight" min="30" max="300" step="0.1" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="fitness-goal" class="input__label">Fitness Goal</label>
                            <select id="fitness-goal" class="input" required>
                                <option value="" disabled selected>Select your goal</option>
                                <option value="lose-weight">Lose Weight</option>
                                <option value="gain-muscle">Gain Muscle</option>
                                <option value="maintain">Maintain Fitness</option>
                                <option value="improve-endurance">Improve Endurance</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="input__label">Gender</label>
                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" name="gender" value="male" required>
                                    <span>Male</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="gender" value="female">
                                    <span>Female</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="gender" value="other">
                                    <span>Other</span>
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn signup-btn">Create Account</button>
                        
                        <div class="login-link">
                            <p>Already have an account? <a href="/pages/login.php" class="text-link">Log in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
</body>
</html>