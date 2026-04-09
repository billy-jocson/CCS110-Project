<?php
include('../backend/database.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
} else {
    $username = $password = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../tailwindcss.js"></script>
    <title>Login page</title>
</head>

<body class="h-full">
    <div class="flex items-center justify-center min-h-screen w-full">
        <div class="w-full h-screen bg-zinc-900 flex flex-col justify-end p-10 px-15 pb-20">
            <h1 class="text-slate-50 font-bold text-3xl uppercase">Welcome Back!</h1>
            <h1 class="text-slate-50 font-thin text-5xl">Employee Payroll System</h1>
        </div>

        <div class="flex flex-col w-full bg-white h-screen rounded-xl shadow-lg justify-center px-48 my-auto">
            <h1 class="text-3xl font-bold">Login</h1>
            <p class=" mb-6 ">Sign Up to get started.</p>

            <form class="flex flex-col gap-4" action="" method="post" id="formLogin">
                <input type="text" placeholder="Enter username" name="username"
                    class="px-3 py-2 border rounded-lg focus:outline-blue-500" value="<?php echo $username; ?>">
                <input type="password" placeholder="Enter password" name="password"
                    class="px-3 py-2 border rounded-lg focus:outline-blue-500" value="<?php echo $password; ?>">
                <input type="submit" value="Login"
                    class="px-2 py-2 bg-blue-700 text-white hover:bg-blue-800 rounded-lg transition-all cursor-pointer font-semibold">
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = htmlspecialchars($_POST['username']);
                $password = $_POST['password'];

                if (isFilledOut($username, $password)) {
                    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
                    $stmt->bind_param("ss", $username, $password);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    if ($row) {
                        echo "<p class='text-green-500 mt-4 text-center'>You are logged in!</p>";
                        session_start();
                        $_SESSION['username'] = $row['username'];
                        header("Location: adminDashboard.php");
                        exit();
                    } else {
                        echo "<p class='text-red-500 mt-4 text-center'>Wrong credentials!</p>";
                    }
                }
            }

            function isFilledOut($username, $password)
            {
                if (empty($username) && empty($password)) {
                    echo "<p class='text-red-500 mt-4 text-center'>Please enter a username and password!</p>";
                    return false;
                }
                if (empty($username)) {
                    echo "<p class='text-red-500 mt-4 text-center'>Please enter a username!</p>";
                    return false;
                }
                if (empty($password)) {
                    echo "<p class='text-red-500 mt-4 text-center'>Please enter a password!</p>";
                    return false;
                }
                return true;
            }
            ?>
        </div>
    </div>
</body>

</html>