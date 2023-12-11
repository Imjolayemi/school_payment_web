<?php
// // Include your database connection file
// include "connect_database.php";

// // Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // Get username and password from the form
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     // Get the selected user type (admin or parent)
//     $user_type = $_POST["user_type"];

//     // Validate the user
//     $query = "SELECT * FROM $user_type WHERE username = '$username' AND password = '$password'";
//     $result = mysqli_query($connect, $query);

//     if ($result) {
//         // Check if a matching user is found
//         if (mysqli_num_rows($result) > 0) {
//             // Redirect based on the selected user type
//             if ($user_type === "admin") {
//                 header("Location: admin_dashboard.php");
//                 exit();
//             } elseif ($user_type === "parent") {
//                 header("Location: parent_dashboard.php");
//                 exit();
//             }
//         } else {
//             $error_message = "Invalid username or password.";
//         }
//     } else {
//         $error_message = "Error: " . mysqli_error($connect);
//     }
// }

if (isset($_POST['login']))
{
    header("Location: admin.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="style.css">
    <style>
    .error-message {
        color: red;
        margin-top: 10px;
    }
</style>
</head>
<body>

<!-- <header>
    <h1>School Name</h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Payments</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">News</a>
                    <a class="dropdown-item" href="#">About Us</a>
                    <a class="dropdown-item" href="#">Contact</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login
                </a>
                <div class="dropdown-menu" aria-labelledby="loginDropdown">
                    <a class="dropdown-item" href="#" onclick="setUserType('admin')">Admin</a>
                    <a class="dropdown-item" href="#" onclick="setUserType('parent')">Parent</a>
                </div>
            </li>
        </ul>
    </nav>
</header> -->

<?php include "header.html"; ?>

<div class="login-container">
    <h2>Login</h2>
    <form class="login-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="user_type" id="user_type" value="">
        <div class="input-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" name="login" class="login-btn">Login</button>
        <?php if (isset($error_message)) { ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
    </form>
</div>


<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>
    function setUserType(type) {
        document.getElementById('user_type').value = type;
    }
</script>
</body>
</html>
