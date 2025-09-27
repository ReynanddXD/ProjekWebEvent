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
  <h1>TES ADMIN</h1>
    <div>
       <h1> @yield('title') </h1>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>
