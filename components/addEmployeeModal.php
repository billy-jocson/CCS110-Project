<?php
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
?>

<div class="<?php echo ($_SERVER['REQUEST_METHOD'] == 'POST') ? 'flex opacity-100' : 'hidden opacity-0'; ?> fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center transition-opacity duration-300"
    id="addEmployeeModal">

    <div class="w-96 rounded-lg bg-white p-5 shadow-2xl transform transition-all duration-300 <?php echo ($_SERVER['REQUEST_METHOD'] == 'POST') ? 'scale-100 opacity-100' : 'scale-95 opacity-0'; ?>"
        id="modalContent">

        <div class="flex justify-between items-center mb-5">
            <div class="flex flex-col">
                <h1 class="font-bold text-xl">Add employee</h1>
                <p class="text-gray-800 text-sm">Enter all details of the employee to add.</p>
            </div>
            <button id="closeIcon"
                class="text-gray-500 hover:text-black text-2xl cursor-pointer p-2 transition-all">&times;</button>
        </div>

        <form action="" method="post" class="flex flex-col gap-2" id="addEmployeeForm">
            <div>
                <h1 class="mb-1">Department</h1>
                <select name="department" class="w-full px-2 py-1 border-gray-400 border rounded-md">
                    <option value="1" <?php if ($dept_id == "1")
                        echo "selected"; ?>>Human Resources</option>
                    <option value="2" <?php if ($dept_id == "2")
                        echo "selected"; ?>>IT Department</option>
                    <option value="3" <?php if ($dept_id == "3")
                        echo "selected"; ?>>Finance</option>
                    <option value="4" <?php if ($dept_id == "4")
                        echo "selected"; ?>>Marketing</option>
                    <option value="5" <?php if ($dept_id == "5")
                        echo "selected"; ?>>Operations</option>
                </select>
            </div>

            <div class="flex gap-2">
                <div class="w-full">
                    <h1>First Name</h1>
                    <input type="text" name="first_name" placeholder="First name"
                        class="w-full px-2 py-1 border-gray-400 border rounded-md" value="<?php echo $first_name; ?>">
                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($first_name)): ?>
                        <p class='text-red-700 text-xs mt-1'>Please enter first name.</p>
                    <?php endif; ?>
                </div>
                <div class="w-full">
                    <h1>Last Name</h1>
                    <input type="text" name="last_name" placeholder="Last name"
                        class="w-full px-2 py-1 border-gray-400 border rounded-md" value="<?php echo $last_name; ?>">
                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($last_name)): ?>
                        <p class='text-red-700 text-xs mt-1'>Please enter last name.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="w-full">
                <h1>Position</h1>
                <input type="text" name="position" placeholder="Position"
                    class="w-full px-2 py-1 border-gray-400 border rounded-md" value="<?php echo $position; ?>">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($position)): ?>
                    <p class='text-red-700 text-xs mt-1'>Please enter position.</p>
                <?php endif; ?>
            </div>

            <div class="w-full">
                <h1>Contact Number</h1>
                <input type="tel" name="contact" placeholder="0999-999-9999"
                    class="w-full px-2 py-1 border-gray-400 border rounded-md" value="<?php echo $contact; ?>">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($contact)): ?>
                    <p class='text-red-700 text-xs mt-1'>Please enter contact number.</p>
                <?php endif; ?>
            </div>

            <div class="flex gap-1 mt-5">
                <input type="button" id="closeBtn" value="Cancel"
                    class="border-blue-700 border text-blue-700 hover:bg-blue-700 transition-all px-4 py-2 hover:text-white rounded-lg ms-auto cursor-pointer">
                <input type="submit" value="Add Employee" name="submit"
                    class="bg-blue-700 px-4 py-2 text-white rounded-lg cursor-pointer hover:bg-blue-800">
            </div>
        </form>
    </div>
</div>