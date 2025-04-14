<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="/assets/css/login.css" />
    <link rel="stylesheet" href="/assets/css/general.css" />


    <title>FitTrack+ | Login</title>
</head>
<body>
    
<body>
    <main class="login-section">
        <div class="container">
            <div class="login-container">
                <div class="login-card cards">
                    <div class="login-header">
                        <h2 class="heading-secondary">Welcome Back to <span class="heading-color">FitTrack+</span></h2>
                        <p class="cards-description">Log in to continue your fitness journey and track your progress.</p>
                    </div>
                    
                    <form class="login-form" id="loginForm">
                        <div class="form-group cards">
                            <label for="email" class="cards-description">Email Address</label>
                            <input type="email" id="email" class="input" placeholder="Enter your email" required>
                        </div>
                        
                        <div class="form-group cards">
                            <label for="password" class="cards-description">Password</label>
                            <input type="password" id="password" class="input" placeholder="Enter your password" required>
                            <div id="attempts" class="attempts-message">Attempts remaining: 2</div>
                        </div>                        
                        <button type="submit" class="btn login-btn">Log In</button>
                        
                        <div class="signup-link">
                            <p class="cards-description">Don't have an account? <a href="#" class="text-link">Sign up</a></p>
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
