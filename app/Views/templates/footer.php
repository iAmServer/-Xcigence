</main>
</body>

<!-- scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/globalize/0.1.1/globalize.min.js"></script>
<script src="https://cdn3.devexpress.com/jslib/13.2.9/js/dx.chartjs.js"></script>
<script src="https://unpkg.com/chart.js@4"></script>
<script src="https://unpkg.com/chartjs-chart-geo@4"></script>

<script>
    $(document).ready(function () {
        $("#circularGaugeContainer").dxCircularGauge({
            rangeContainer: {
                offset: 0,
                ranges: [
                    { startValue: 0, endValue: 200, color: '#2DD700 ' },
                    { startValue: 201, endValue: 400, color: '#41A128' },
                    { startValue: 401, endValue: 600, color: '#F57921' },
                    { startValue: 601, endValue: 1000, color: '#CF010A' },
                ]
            },
            scale: {
                startValue: 0, endValue: 1000,
                majorTick: { tickInterval: 1000 },
                label: {
                    format: 'number'
                }
            },
            subvalueIndicator: {
                type: 'textCloud',
                format: 'thousands',
                text: {
                    format: 'number',
                    customizeText: function (arg) {
                        return arg.valueText;
                    }
                }
            },
            title: {
                text: '',
                subtitle: 'text',
                position: 'bottom-center'
            },
            tooltip: {
                enabled: false,
            },
            value: 750,
        });

        fetch('https://unpkg.com/us-atlas/states-10m.json').then((r) => r.json()).then((us) => {
            const nation = ChartGeo.topojson.feature(us, us.objects.nation).features[0];
            const states = ChartGeo.topojson.feature(us, us.objects.states).features;

            const chart = new Chart(document.getElementById("canvas").getContext("2d"), {
                type: 'choropleth',
                data: {
                    labels: states.map((d) => d.properties.name),
                    datasets: [{
                        label: 'States',
                        outline: nation,
                        data: states.map((d) => ({ feature: d, value: Math.random() * 10 })),
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                    },
                    scales: {
                        projection: {
                            axis: 'x',
                            projection: 'albersUsa'
                        },
                        color: {
                            axis: 'x',
                            quantize: 5,
                            legend: {
                                position: 'bottom-right',
                                align: 'bottom'
                            },
                        }
                    },
                }
            });
        });

        var data = {
            labels: ["Malicious IP", "SSL Expired", "Open TCP Port", "Co-Hosted Site", "Human Name", "Phone Number"],
            datasets: [
                {
                    label: "Threat Levels",
                    data: <?php
                    $threats = array($no_of_malacious_ip, $no_of_expired_ssl, $uniquePortCount, $no_of_cohosted_site, $no_of_human_name, $no_of_phone_number);
                    echo json_encode($threats);
                    // [1, 2, 3, 4, 5, 6]
                    ?>, // You can replace this with your actual data
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
                }
            ]
        };

        var ctx = document.getElementById('threatChart').getContext('2d');

        // Create the chart
        var threatChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });


</script>

</html>