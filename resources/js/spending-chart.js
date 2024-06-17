import ApexCharts from 'apexcharts';

document.addEventListener('DOMContentLoaded', () => {
    const spendingChartData = window.spendingChartData;
    const spendingChartLabels = window.spendingChartLabels;

    var spendingChartOptions = {
        series: [{
            name: 'Money spent',
            data: spendingChartData
        }],
        chart: {
            height: 500,
            type: 'bar',
            toolbar: {
                tools: {
                    download: false,
                    reset: false,
                }
            },
        },
        plotOptions: {
            bar: {
                borderRadius: 5,
                columnWidth: '50%',
                distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 0
        },
        xaxis: {
            labels: {
                rotate: -45,
                style: {
                    colors: '#808080'
                }
            },
            categories: spendingChartLabels,
            tickPlacement: 'on'
        },
        yaxis: {
            labels: {
                style: {
                    colors: '#808080'
                }
            },
        },
        legend: {
            show: false
        },
        theme: {
            mode: 'light',
            palette: 'palette1',
            monochrome: {
                enabled: false,
                color: '#6bd1ad',
                shadeTo: 'dark',
                shadeIntensity: 0.1
            },
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "horizontal",
                shadeIntensity: 0.25,
                inverseColors: true,
                opacityFrom: .85,
                opacityTo: 0.8,
                stops: [50, 0, 100],
            },
        }
    };

    htmx.onLoad(function (content) {
        var spendingChart = new ApexCharts(content.querySelector("#categories-chart"), spendingChartOptions);
        spendingChart.render();
    });
});
