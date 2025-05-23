<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Monthly Report</h2>
    <canvas id="myChart" width="200" height="50"></canvas>

    <script>
        const labels = @json($labels);
        const data = {
            labels: labels,
            datasets: [{
                label: 'Monthly Sales',
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgb(54, 162, 235)',
                data: @json($data),
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>
