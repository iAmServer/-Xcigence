</main>
</body>

<!-- scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/globalize/0.1.1/globalize.min.js"></script>
<script src="https://cdn3.devexpress.com/jslib/13.2.9/js/dx.chartjs.js"></script>

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
    });


</script>

</html>