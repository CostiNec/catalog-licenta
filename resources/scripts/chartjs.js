var barChart = document.getElementById('barChart').getContext('2d');
var lineChart = document.getElementById('lineChart').getContext('2d');
var pieChart = document.getElementById('pieChart').getContext('2d');

if (barChart) {
    var dataChartObj = {
        datasets: [{
            label: 'Note',
            data: values,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };

    var barChartObj = new Chart(barChart, {
        type: 'bar',
        data: dataChartObj,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

if (lineChart) {
    var lineChartObj = new Chart(lineChart, {
        type: 'line',
        data: {
            datasets: [{
                label: 'Note',
                data: values,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

if (pieChart) {
    var pieChartObj = new Chart(pieChart, {
        type: 'pie',
        data: {
            labels: ["Promovat", "Nepromovat"],
            datasets: [{
                data: [promoted.promoted, promoted.unPromoted],
                backgroundColor: [
                    "#4ACAB4",
                    "#FF8153",
                ]
            }]
        }
    });
}


let coursesChart = $('#coursesChart');

if (coursesChart.length) {
    coursesChart.on('select2:select', changeChart);

    coursesChart.on('select2:unselect', changeChart);

    function changeChart() {
        let courseIds = coursesChart.val();

        $.ajax({
            method: "GET",
            url: "/getStatistics",
            data: { courseIds: courseIds }
        })
            .done(function( response ) {
                let data = JSON.parse(response);
                barChartObj.data.datasets[0].data = data.values;
                barChartObj.update();

                lineChartObj.data.datasets[0].data = data.values;
                lineChartObj.update();

                pieChartObj.data.datasets[0].data = [data.promoted.promoted, data.promoted.unPromoted];
                pieChartObj.update();
            });
    }
}
