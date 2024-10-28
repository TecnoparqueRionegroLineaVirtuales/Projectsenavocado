<div class="mt-500 pt-200">
    @push('script')
        <script type="module">
            const x_labels = Object.values(@json($data['dates']));
            const var0 = Object.values(@json($data['var0']));
            const var1 = Object.values(@json($data['var1']));
            const var2 = Object.values(@json($data['var2']));
            const var3 = Object.values(@json($data['var3']));

            const data = {
                labels: x_labels,
                datasets: [{
                    spanGaps: false,
                    data: var0,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    plugins: {
                        title: {
                            text: 'testing time scale',
                            display: true,
                        }
                    },
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day',
                                parser: 'dd-MM-yyyy HH:mm:ss',
                                // TODO: min, max not working....
                                min: '27-10-2024 00:00:00',
                                max: '28-10-2024',
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'value'
                            }
                        }
                    }
                }
            };
            const ctx = document.getElementById('myChart');
            new Chart(ctx, config);
        </script>
    @endpush

    <br>
    <br>
    <h1>hi there...</h1>
    <h2>testing firebase...</h2>
    {{-- <div class="container sm"> --}}
    <div style="width:800px ; height:800px">
        <canvas id="myChart"></canvas>
    </div>

    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
</div>
