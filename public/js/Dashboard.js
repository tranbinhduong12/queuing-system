var options = {
    chart: {
        height: 350,
        type: "area",
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: "smooth"
    },
    series: [{
        name: "series1",
        data: [31, 40, 28, 51, 42, 109, 100]
    }],
    xaxis: {
        type: "datetime",
        categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00",
            "2018-09-19T04:30:00",
            "2018-09-19T05:30:00", "2018-09-19T06:30:00"
        ],
    },
    tooltip: {
        x: {
            format: "dd/MM/yy HH:mm"
        },
    }
};

var chart = new ApexCharts(
    document.querySelector("#apexcharts-area"),
    options
);
chart.render();