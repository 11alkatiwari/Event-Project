<?php
include 'tp.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Name'];
    $email = $_POST['Email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO teet (Name, Email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Sign Up - Event Management</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* Background gradient */
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        /* Glass card */
        .card {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 20px;
            color: #fff;
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card-header {
            text-align: center;
            border-bottom: none;
            background: transparent;
            padding: 1.5rem 1rem;
        }

        .card-header h3 {
            font-weight: 700;
            letter-spacing: 1px;
        }

        .form-label {
            color: #fff;
            font-weight: 500;
        }

        .form-control {
            border-radius: 10px;
            border: none;
            padding: 12px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.4);
            color: #fff;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn-glow {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            padding: 12px;
            transition: all 0.4s ease;
            box-shadow: 0 0 10px rgba(102,126,234,0.5);
        }

        .btn-glow:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(102,126,234,0.8);
        }

        .text-muted a {
            color: #a8e6ff;
            text-decoration: none;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }

        footer {
            color: #f8f9fa;
            text-align: center;
            margin-top: 2rem;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <!-- Signup Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card p-4">
                    <div class="card-header">
                        <h3>Create Your Account</h3>
                        <p class="text-light-50 mb-0">Join our Event Management community</p>
                    </div>
                    <div class="card-body">
                        <form action="reg.php" method="post">
                            <div class="mb-3">
                                <label for="Name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-glow btn-lg">Sign Up</button>
                            </div>
                        </form>
                        <div class="mt-4 text-center text-muted">
                            Already have an account? <a href="login.php">Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2025 Event Management | Designed with 💜 by Alka Tiwari
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
