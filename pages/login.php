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
    <script src="../daisyUI.js"></script>

    <title>Login page</title>
</head>

<body class="h-screen overflow-hidden bg-gray-50">
    <span class="loading loading-spinner loading-md"></span>
    <div class="hidden fixed inset-0 flex flex-col items-center justify-center z-50 bg-white/10" id="loading">
        <p>Loading...</p>
    </div>

    <div class="flex items-center justify-center h-full p-5 gap-5">
        <div
            class="flex-1 h-full bg-[url('../assets/buildings.jpg')] bg-cover flex flex-col rounded-xl overflow-hidden">
            <div class="h-full w-full bg-black/50 flex justify-end flex-col p-15 backdrop-blur-sm">
                <h1 class="text-slate-50 text-5xl mb-3 font-semibold">PayFlow</h1>
                <p class="text-slate-50 font-thin text-sm leading-relaxed">
                    Smart Payroll, Simplified. An end-to-end software service that eliminates manual errors by
                    automating complex salary structures and tax calculations in real-time.
                </p>
            </div>
        </div>

        <div class="flex-1 flex flex-col justify-center px-20 gap-5">
            <div>
                <img src="../assets/PayFlow Logo.png" alt="PayFlow Logo" class="w-20 h-36 object-center object-cover">
                <h1 class="text-3xl font-bold mb-1">Login</h1>
                <p>Welcome to PayFlow — Login to Get Started.</p>
            </div>
            <hr class="text-zinc-300">
            <form class="flex flex-col gap-2" id="formLogin">
                <label class="font-semibold text-zinc-500">Username</label>
                <input type="text" placeholder="Enter username" name="username"
                    class="px-3 py-2 border border-zinc-500 rounded-lg focus:outline-blue-500" required>
                <label class="font-semibold text-zinc-500">Password</label>
                <input type="password" placeholder="Enter password" name="password"
                    class="px-3 py-2 border rounded-lg border-zinc-500 focus:outline-blue-500" required>
                <input type="submit" value="Login"
                    class="mt-5 px-2 py-2 bg-blue-700 text-white hover:bg-blue-800 rounded-lg transition-all cursor-pointer font-semibold">
            </form>
        </div>
    </div>

    <script>
        document.getElementById('formLogin').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            fetchData();

            async function fetchData() {
                document.querySelector('#loading').classList.remove('hidden');
                await fetch('loginValidate.php', { method: "POST", body: formData })
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector('#loading').classList.add('hidden');
                        if (data.status === "success") {
                            window.location.href = './adminDashboard.php';
                        } else {
                            alert('Incorrect credentials');
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("Something went wrong with the connection.");
                    });
            }
        });
    </script>
</body>

</html>