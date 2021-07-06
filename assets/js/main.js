const CHART = document.getElementById("lineChart");
console.log(CHART);
let lineChart = new Chart(CHART, {
    type: 'line',
    data: data,
    options: options
});

type: 'line',
data: = {
        labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July"
        ],
        datasets: [{
            label: "My First Dataset",
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: "rgb(75, 192, 192)",
            lineTension: 0.1
        }]
    },
 