<!DOCTYPE html>
<html>
<head>
    <title>Money Breakdown</title>
</head>
<body>
    <h1>Money Breakdown</h1>
    <p>Original Amount: <span style="color: {{ $money % 2 == 0 ? 'red' : 'green' }};">{{ $money }}</span></p>
    <h2>Denominations:</h2>
    <ul>
        @foreach ($denominations as $denomination => $count)
            <li>{{ $denomination }}: {{ $count }}</li>
        @endforeach
    </ul>
    <h2>In Words:</h2>
    <p>{{ $words }}</p>
</body>
</html>