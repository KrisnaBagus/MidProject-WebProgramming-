<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Krisna Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: radial-gradient(circle at top right, #1f2833, #0b0c10);
        }
        .login-card {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            padding: 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            text-align: center;
        }
        .login-card h2 {
            color: var(--white);
            font-size: 32px;
            margin-bottom: 30px;
            letter-spacing: 2px;
        }
        .login-card h2 span {
            color: var(--primary-color);
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            color: var(--text-color);
            margin-bottom: 8px;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            color: var(--white);
            outline: none;
            transition: 0.3s;
        }
        .form-group input:focus {
            border-color: var(--primary-color);
            background: rgba(255,255,255,0.1);
            box-shadow: 0 0 10px rgba(102, 252, 241, 0.2);
        }
        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-color);
            font-size: 14px;
            margin-bottom: 25px;
            cursor: pointer;
        }
        .remember-me input {
            width: auto;
            cursor: pointer;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background: var(--primary-color);
            color: var(--bg-color);
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn-login:hover {
            box-shadow: 0 0 20px var(--primary-color);
            transform: translateY(-2px);
        }
        .error-message {
            color: #ff4d4d;
            background: rgba(255, 77, 77, 0.1);
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 3px solid #ff4d4d;
        }
        .back-home {
            margin-top: 20px;
            display: inline-block;
            color: var(--secondary-color);
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }
        .back-home:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h2>ADMIN<span>LOGIN</span></h2>
            
            @if($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.authenticate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter password">
                </div>
                <label class="remember-me">
                    <input type="checkbox" name="remember"> Remember Me
                </label>
                <button type="submit" class="btn-login">Login</button>
            </form>

            <a href="{{ route('home') }}" class="back-home"><i class="fas fa-arrow-left"></i> Back to Portfolio</a>
        </div>
    </div>
</body>
</html>
