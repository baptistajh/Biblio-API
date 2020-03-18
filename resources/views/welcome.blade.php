<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<script src="https://kit.fontawesome.com/e1de0b548e.js" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <navbar></navbar>
        <login></login>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>