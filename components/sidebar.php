<div class="flex flex-col gap-1 w-96 h-screen shadow-lg bg-zinc-900">
    <div class="flex flex-col h-48 p-8 text-zinc-50">
        <img src="../assets/PayFlow Logo.png" alt="PayFlow Logo" class="aspect-square object-cover w-20">
        <div class="flex flex-col">
            <h1 class="font-bold">Employee Payroll System</h1>
            <p>Group 6 Inc.</p>
        </div>
    </div>

    <div class="w-full bg-zinc-700 mx-auto mb-5" style="height: 0.1px"></div>

    <nav class="flex flex-col gap-2 cursor-pointer px-5 text-gray-50">
        <?php $_SESSION['username'] == "admin" ? include('adminSidePanel.php') : include('guestSidePanel.php') ?>
    </nav>

    <div class="mt-auto p-5 flex gap-4 items-center">
        <img src="../assets/DefaultPFP.png" alt="" class="rounded-full w-10 h-10 aspect-square object-cover">
        <div class="flex flex-col">
            <?php echo "<p class='text-slate-50 font-bold'>$_SESSION[username]</p>" ?>
        </div>
    </div>
</div>