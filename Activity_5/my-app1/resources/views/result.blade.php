<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Result</title>
    <style>
        .result-box {
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            display: inline-block;
            margin: 5px;
        }
        .green { background-color: green; color: white; }
        .blue { background-color: blue; color: white; }
        .red { background-color: red; color: white; }
        .orange { background-color: orange; color: white; }
    </style>
</head>
<body>

    <h2>Activity 5: BOYS</h2>
    <h2>Ken Jedrick Alburo De Guzman</h2>
    <h2>3rd Year</h2>
    <h2>Section A</h2>

    <!-- Unang Operasyon -->
    <p>
        <strong>Value 1:</strong> 
        <span style="color: {{ $num1 % 2 == 0 ? 'orange' : 'blue' }};">{{ $num1 }}</span>
    </p>
    <p>
        <strong>Value 2:</strong> 
        <span style="color: {{ $num2 % 2 == 0 ? 'orange' : 'blue' }};">{{ $num2 }}</span>
    </p>
    <p><strong>Operator:</strong> {{ $operation1 }}</p>

    @if(is_array($result1) && isset($result1['error']))
        <p><strong>Resulta:</strong> 
            <span class="result-box red">{{ $result1['error'] }}</span>
        </p>
    @else
        @php
            $class1 = is_float($result1) ? 'orange' : ($result1 % 2 == 0 ? 'green' : 'blue');
        @endphp
        <p><strong>Resulta:</strong> 
            <span class="result-box {{ $class1 }}">{{ $result1 }}</span>
        </p>
    @endif

    <hr>

    <!-- Pangalawang Operasyon -->
    <p>
        <strong>Value 1:</strong> 
        <span style="color: {{ $num3 % 2 == 0 ? 'orange' : 'blue' }};">{{ $num3 }}</span>
    </p>
    <p>
        <strong>Value 2:</strong> 
        <span style="color: {{ $num4 % 2 == 0 ? 'orange' : 'blue' }};">{{ $num4 }}</span>
    </p>
    <p><strong>Operator:</strong> {{ $operation2 }}</p>

    @if(is_array($result2) && isset($result2['error']))
        <p><strong>Resulta:</strong> 
            <span class="result-box red">{{ $result2['error'] }}</span>
        </p>
    @else
        @php
            $class2 = is_float($result2) ? 'orange' : ($result2 % 2 == 0 ? 'green' : 'blue');
        @endphp
        <p><strong>Resulta:</strong> 
            <span class="result-box {{ $class2 }}">{{ $result2 }}</span>
        </p>
    @endif

</body>
</html>
