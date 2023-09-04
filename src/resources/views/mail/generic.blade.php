<html>
<head>
    @vite(['resources/css/mail.css'])
</head>
<body>
<div>
    <div class="min-h-screen bg-gray-100">
        <div class="container mx-auto">
            <main class="pt-6">
                <div class="bg-white p-6 shadow-sm">
                    <p>Hello, {{ $name }}!</p>
                    <p class="my-6">{{ $text }}</p>
                    <p>Sincerely, <br> {{ config('app.name') }}</p>
                </div>
            </main>
        </div>
    </div>
</div>
</body>
</html>
