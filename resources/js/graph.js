import { Chart } from 'chart.js/auto';

export function transformAccumulated(data) {
    for (let i = 1; i < data.length; i++)
        data[i] += data[i - 1];
}

export default function drawLineChart(element, labels, data, legend, isAccumulated) {
    isAccumulated && transformAccumulated(data);
    const dom = document.getElementById(element)

    new Chart(
        dom,
        {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: legend,
                        data
                    }
                ]
            }
        }
    )
}
