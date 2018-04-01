<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content{{ csrf_token() }}>
    <title>Application</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h3>Vue.js with Laravel 5.6 application</h3>
    </div>
    <section id="app"></section>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>