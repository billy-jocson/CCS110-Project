<?php
session_start();
include('../backend/database.php');

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit();
}

$dept_id = $first_name = $last_name = $position = $contact = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $dept_id = $_POST['department'];
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $position = htmlspecialchars($_POST['position']);
    $contact = htmlspecialchars($_POST['contact']);

    if (!empty($dept_id) && !empty($first_name) && !empty($last_name) && !empty($position) && !empty($contact)) {
        $stmt = $conn->prepare("INSERT INTO employees(dept_id, first_name, last_name, employee_position, employee_contact) VALUES(?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $dept_id, $first_name, $last_name, $position, $contact);

        if ($stmt->execute()) {
            header("Location: adminDashboard.php?success=1");
            exit();
        }
    }
}

$countResult = $conn->query("SELECT COUNT(*) as total FROM employees");
$totalEmployees = $countResult->fetch_assoc()['total'];
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

            <div class="p-10 bg-blue-800 rounded-lg shadow-lg inline-block text-white">
                <h1 class="text-xl">Total Employees</h1>
                <p class="text-4xl font-bold">
                    <?php echo $totalEmployees; ?>
                </p>
            </div>
        </main>
    </div>
    Z
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
</body>

</html>