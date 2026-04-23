<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require('../inc/link.php'); ?>
    <style>
        div.login-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;

        }
    </style>
</head>
<body>
    <div class="bg-light">
        <div class="login-form text-center rounded bg-white shadow overflow-none">
                <form action="">
            <h4 class="bg-dark text-white p-3 rounded-top">Admin Login</h4>
            <div class="p-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control shadow-none"  placeholder="Admin name">
            </div>
            <div class="p-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control shadow-none"  placeholder="password">
            </div>
            <button type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button>
        </form>
        </div>

    </div>
    <?php require('../inc/scripts.php'); ?>
</body>
</html>