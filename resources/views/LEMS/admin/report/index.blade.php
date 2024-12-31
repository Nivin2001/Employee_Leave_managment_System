
@extends('LEMS.admin.master')

@section('title', 'Leave Request Report')

@section('style')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')
<div class="container my-4">
    <h1 class="text-center">Leave Requests Report</h1>

 <!-- مكان عرض المخطط بحجم أصغر -->
 <div class="chart-container">
    <canvas id="leaveRequestsChart"></canvas>
</div>
</div>
<style>
    .chart-container {
    width: 600px;
    height: 600px;
    margin: auto;
}

    </style>


<script>
    const ctx = document.getElementById('leaveRequestsChart').getContext('2d');
    const data = @json($data);
     // حساب المجموع الكلي للطلبات
     const total = data.pending + data.approved + data.rejected;

    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Approved', 'Rejected'],
            datasets: [{
                label: 'Leave Requests',
                data: [data.pending, data.approved, data.rejected],
                backgroundColor: [
                    'rgba(255, 206, 86, 0.6)', // Pending (yellow)
                    'rgba(75, 192, 192, 0.6)', // Approved (green)
                    'rgba(255, 99, 132, 0.6)'  // Rejected (red)
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                const value = tooltipItem.raw; // قيمة كل حالة
                                const percentage = ((value / total) * 100).toFixed(2); // حساب النسبة المئوية
                                return `${tooltipItem.label}: ${percentage}% (${value})`;
                            }
                        }
                    },
                legend: {
                    position: 'top',
                },
            }
        }
    });
</script>
@endsection
