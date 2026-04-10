<?php
session_start();
include('../backend/database.php');

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../tailwindcss.js"></script>
    <title><?php echo $_SESSION['username'] ?> Dashboard</title>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <?php include('../components/sidebar.php'); ?>

        <main class="p-10 w-full">
            <h1 class="text-3xl mb-5">
                <?php
                $hour = (int) date("H");

                echo ($hour < 12) ? "Good Morning, " :
                    (($hour < 18) ? "Good Afternoon, " : "Good Evening, ");
                ?>

                <?php echo $_SESSION['username']; ?>
            </h1>
        </main>
    </div>
</body>

</html>