import ApexCharts from 'apexcharts';


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

function initializeChart() {
    var spendingChart = new ApexCharts(document.querySelector("#categories-chart"), spendingChartOptions);
    spendingChart.render();
}

document.addEventListener('initializeSpendingChart', (event) => {
    initializeChart();
});

document.addEventListener('DOMContentLoaded', () => {
    initializeChart();
});
