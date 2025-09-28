<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />


     @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>

    <div>
       @include('partial.adminSidebar')
    </div>
    <div class="sm:ml-64">
        <nav>
            @include ('partial.navbarAdmin')
        </nav>
       <h1 class="p-1"> @yield('title') </h1>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js">

    </script>
<script>
function validateFileSize() {
    const fileInput = document.getElementById('file');
    const maxSize = 50 * 1024 * 1024; // 50MB in bytes

    if (fileInput.files[0] && fileInput.files[0].size > maxSize) {
        alert('File size must be less than 50MB');
        return false;
    }
    return true;
}
</script>
</body>
</html>
