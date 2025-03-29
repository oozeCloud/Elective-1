<!DOCTYPE html>
<html>
<head>
    <title>Asset Tracking System</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: pink;
            margin: 20px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            margin-right: 60%;
        }
        h1, button{
            display: inline-block;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input, textarea {
            padding: 10px;
            margin: 5px;
            width: 80%;
            max-width: 500px;
        }

        select {
            padding: 10px;
            margin: 5px;
            width: 17%;
            max-width: 500px;
        }

        button {
            padding: 10px;
            margin: 5px;
            width: 10%;
            max-width: 500px;
            background-color: #b8dfff;
            border: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: cyan;
        }

        td {
            padding: 10px;
            text-align: left;
            border: none;
        }
        tr {
            border: 1px solid #ddd;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
