<?php include('validate.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
<div class="header">
    <h2>New User Registration</h2>
</div>
<table>
    <form method="post" action="signup.php">
        <div class="input-group">
            <tr>
                <th>
                    <label>Username</label></th>
                <th>
                    <input type="text" name="username" value="<?php echo $username; ?>"></th>
            </tr>
        </div>
        <div class="input-group">
            <tr>
                <th>
                    <label>Email</label></th>
                <th>
                    <input type="email" name="email" value="<?php echo $email; ?>"></th>
            </tr>
        </div>
        <div class="input-group">
            <tr>
                <th>
                    <label>Password</label></th>
                <th>
                    <input type="password" name="password_1"></th>
            </tr>
        </div>
        <div class="input-group">
            <tr>
                <th>
                    <label>Confirm password</label></th>
                <th>
                    <input type="password" name="password_2"></th>
            </tr>
        </div>
        <div class="input-group">
            <tr>
                <th>
                    <label>Semester Enrolled</label></th>
                <th>
                    <input type="text" name="semester"></th>
            </tr>
        </div>
        <div class="input-group">
            <tr>
                <th>
                    <label>Track</label></th>
                <th>
                    <select id="track" name="track">
                        <option value="Data Science">Data Science</option>
                        <option value="Intelligent Systems">Intelligent Systems</option>
                        <option value="Software Engineering">Software Engineering</option>
                        <option value="Networks and Telecommunications">Networks and Telecommunications</option>
                        <option value="Traditional CS">Traditional CS</option>
                        <option value="Information Assurance">Information Assurance</option>
                    </select></th>
            </tr>
        </div>
        <div class="input-group">
            <tr></tr>
            <tr>
                <th></th>
                <th>
                    <button type="submit" class="btn" name="reg_user">Register</button>
                </th>
        </div>
        <tr></tr>

        <tr>
            <th></th>
            <th>
                <p>
                    Already a member? <a href="index.php">Sign in</a>
                </p>
    </form>
</table>
</body>
</html>