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

    <?php include('../components/addEmployeeModal.php'); ?>

    <?php if (isset($_GET['success'])): ?>
        <div id="successModal" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-[60] flex items-center justify-center">
            <div class="bg-white p-8 rounded-2xl shadow-2xl text-center w-80">
                <h2 class="text-2xl font-bold">Success!</h2>
                <p class="text-gray-600 mt-2">Employee added successfully.</p>
                <button onclick="closeSuccessModal()"
                    class="mt-6 w-full bg-green-600 text-white py-2 rounded-lg">Continue</button>
            </div>
        </div>
    <?php endif; ?>

    <script src="../script.js"></script>
</body>

</html>