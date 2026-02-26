<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - NextGen Mobile Care</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen">
    <div class="bg-gray-800 p-10 rounded-lg shadow-lg w-96">
        <h1 class="text-3xl font-bold text-blue-500 mb-6 text-center">Admin Login</h1>

        <?php if(isset($data['error'])): ?>
            <p class="text-red-500 mb-4 text-center"><?php echo $data['error']; ?></p>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-4">
            <input type="text" name="username" placeholder="Username" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
            <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
            <button type="submit" class="w-full bg-blue-600 py-2 rounded hover:bg-blue-700 transition">Login</button>
        </form>
    </div>
</body>
</html>