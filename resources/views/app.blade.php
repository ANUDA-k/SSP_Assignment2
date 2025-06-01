<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @livewireStyles
</head>
<body>
    <div class="container mx-auto px-4 py-6">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>