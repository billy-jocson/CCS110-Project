<?php
include('../backend/database.php');
$stmt = $conn->prepare('SELECT * FROM employees');
$stmt->execute();
$result = $stmt->get_result();
?>
<div>
    <table class="border">
        <thead class="border">
            <th>
            <td>Employee ID</td>
            <td>Department</td>
            <td>First Name</td>
            </th>
        </thead>
        <tbody class="border">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['employee_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['dept_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>