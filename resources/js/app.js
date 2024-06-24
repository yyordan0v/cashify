import './bootstrap';
import Alpine from 'alpinejs';
import ApexCharts from 'apexcharts';

import.meta.glob([
    '../images/**'
]);

window.Alpine = Alpine;
window.ApexCharts = ApexCharts;

Alpine.start();
