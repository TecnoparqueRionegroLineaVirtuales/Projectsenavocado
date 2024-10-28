require('./bootstrap');

import Alpine from 'alpinejs';
import { Chart } from 'chart.js/auto';
import 'chartjs-adapter-luxon';

window.Alpine = Alpine;
window.Chart = Chart;

Alpine.start();
