import ApexCharts from 'apexcharts';

document.addEventListener('DOMContentLoaded', () => {

    const networthChartData = window.networthChartData;
    const dateRanges = window.dateRanges;

    const networthChartOptions = {
        series: [
            {
                name: "Net Worth",
                data: networthChartData
            }
        ],
        chart: {
            id: 'area-datetime',
            type: 'area',
            height: 350,
            toolbar: {
                show: true,
                offsetX: 0,
                offsetY: 0,
            },
        },
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
            style: 'hollow',
        },
        xaxis: {
            type: 'datetime',
            tickAmount: 6,
            labels: {
                style: {
                    colors: '#808080'
                }
            },
        },
        yaxis: {
            labels: {
                style: {
                    colors: '#808080'
                }
            },
        },
        tooltip: {
            x: {
                format: 'dd MMM yyyy'
            }
        },
        colors: ['#808080'],
        fill: {
            type: 'gradient',
            gradient: {
                type: "vertical",
                opacityFrom: 0.9,
                opacityTo: 0,
                stops: [0, 100]
            }
        },
    };

    htmx.onLoad(function (content) {
        const networthChart = new ApexCharts(content.querySelector("#balanceChart"), networthChartOptions);
        networthChart.render();

        function resetCssClasses(event) {
            content.querySelector('#chart-buttons').querySelectorAll('button').forEach(button => {
                button.classList.remove('bg-gray-200/95', 'dark:bg-neutral-700/40', 'bg-transparent');
                button.classList.add('bg-transparent');
            });

            event.target.classList.remove('bg-transparent');
            event.target.classList.add('bg-gray-200/95', 'dark:bg-neutral-700/40');
        }

        function parseDate(dateString) {
            const parts = dateString.split(' ');
            const day = parts[0];
            const month = parts[1];
            const year = parts[2];
            const date = new Date(`${year}-${month}-${day}`);
            if (isNaN(date.getTime())) {
                console.error('Invalid date:', dateString);
                return null;
            }
            return date.getTime();
        }

        function zoomChart(range) {
            const startDate = parseDate(range[0]);
            const endDate = parseDate(range[1]);
            if (startDate && endDate) {
                networthChart.zoomX(startDate, endDate);
            } else {
                console.error('Invalid date range:', range);
            }
        }

        content.querySelectorAll('#chart-buttons .bg-transparent').forEach(button => {
            button.addEventListener('click', function (e) {
                resetCssClasses(e);
                const range = dateRanges[e.target.id];
                zoomChart(range);
            });
        });
    });

});
