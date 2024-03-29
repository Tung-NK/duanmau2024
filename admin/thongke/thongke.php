<style>
    .row {
        margin-left: 10px;
        margin-right: 10px;
    }
</style>

<div class="row">
    <div class="row titleAdmin">
        <!-- <h2>Biểu đồ thống kê</h2> -->
    </div>
    <div class="row formcontent">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart', 'bar']
            });
            google.charts.setOnLoadCallback(drawStuff);

            function drawStuff() {

                var button = document.getElementById('change-chart');
                var chartDiv = document.getElementById('chart_div');

                var data = google.visualization.arrayToDataTable([
                    ['Tên Danh Mục', 'Số lượng sản phâm'],
                    <?php
                    foreach ($listthongke as $thongke) {
                        echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "],";
                    }
                    ?>

                    // ['Galaxy', 'Distance', 'Brightness'],
                    // ['Canis Major Dwarf', 8000, 23.3],
                    // ['Sagittarius Dwarf', 24000, 4.5],
                    // ['Ursa Major II Dwarf', 30000, 14.3],
                    // ['Lg. Magellanic Cloud', 50000, 0.9],
                    // ['Bootes I', 60000, 13.1]
                ]);

                var materialOptions = {
                    width: 1200,
                    // chart: {
                    //   title: 'Nearby galaxies',
                    //   subtitle: 'distance on the left, brightness on the right'
                    // },
                    series: {
                        0: {
                            axis: 'distance'
                        }, // Bind series 0 to an axis named 'distance'.
                        1: {
                            axis: 'brightness'
                        } // Bind series 1 to an axis named 'brightness'.
                    },
                    axes: {
                        y: {
                            distance: {
                                label: 'parsecs'
                            }, // Left y-axis.
                            brightness: {
                                side: 'right',
                                label: 'apparent magnitude'
                            } // Right y-axis.
                        }
                    }
                };

                var classicOptions = {
                    width: 900,
                    series: {
                        0: {
                            targetAxisIndex: 0
                        },
                        1: {
                            targetAxisIndex: 1
                        }
                    },
                    title: 'Nearby galaxies - distance on the left, brightness on the right',
                    vAxes: {
                        // Adds titles to each axis.
                        0: {
                            title: 'parsecs'
                        },
                        1: {
                            title: 'apparent magnitude'
                        }
                    }
                };

                function drawMaterialChart() {
                    var materialChart = new google.charts.Bar(chartDiv);
                    materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
                    button.innerText = 'Change to Classic';
                    button.onclick = drawClassicChart;
                }

                function drawClassicChart() {
                    var classicChart = new google.visualization.ColumnChart(chartDiv);
                    classicChart.draw(data, classicOptions);
                    button.innerText = 'Change to Material';
                    button.onclick = drawMaterialChart;
                }

                drawMaterialChart();
            };
        </script>
        </head>

        <body>
        <br><br>
        <div id="chart_div" style="width: 600px; height: 500px; "></div>
        </body>

    </div>

</div>