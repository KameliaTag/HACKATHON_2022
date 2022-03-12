/**
 * @Class
 */
const ChartConfig = function () {
};

ChartConfig.load = (type, data) => {
    switch (type) {
        case 'pie' :
            return ChartConfig.pie(data[0]);
        case 'bar' :
            return ChartConfig.bar(data[0]);
        case 'line' :
            return ChartConfig.line(data[0]);
        case 'radar' :
            return ChartConfig.radar(data[0]);
        case 'pie2' :
            return ChartConfig.pie2(data[0]);
    }
}

ChartConfig.pie = (data) => {
    const config = {
        type: 'pie',
        data: {
            labels: data.labels,
            datasets: [{
                label: data.title,
                data: data.values,
                backgroundColor: generateArrayRandomColor(data.values.length),
                hoverOffset: 4
            }]
        }
    };

    return config;
};

ChartConfig.bar = (data) => {
    const config = {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: [{
                label: data.title,
                data: data.values,
                backgroundColor: generateArrayRandomColor(data.values.length),
            }]
        }
    };

    return config;
};

ChartConfig.radar = (data) => {
    const config = {
        type: 'radar',
        data: {
            labels: data.labels,
            datasets: [{
                label: data.title,
                data: data.values,
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            }, {
                label: data.title,
                data: data.values,
                fill: true,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgb(54, 162, 235)',
                pointBackgroundColor: 'rgb(54, 162, 235)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(54, 162, 235)'
            }]
        },
        options: {
            elements: {
                line: {
                    borderWidth: 3
                }
            }
        },
    };

    return config;
};

ChartConfig.line = (data) => {
    const config = {
        type: 'line',
        data: {
            labels: data.labels,
            datasets: [
                {
                    label: data.title,
                    data: data.values,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }
            ]
        }
    };

    return config;
};

ChartConfig.pie2 = (data) => {
    const config = {
        type: 'pie',
        data: {
            labels: data.labels,
            datasets: [{
                label: data.title,
                data: data.values,
                backgroundColor: generateArrayRandomColor(data.values.length),
                hoverOffset: 4
            }]
        }
    };

    return config;
};

/**
 * Retourne un array de valeurs RGB aléatoires
 * @param {number|null} s Size of Array
 * @returns {Array}
 */
function generateArrayRandomColor(s) {
    return Array.from({length:s??6},()=> 'rgba(' + Math.floor(Math.random()*255) + ', ' + Math.floor(Math.random()*255) + ', ' + Math.floor(Math.random()*255) + ', 1)');
}

export default ChartConfig;
