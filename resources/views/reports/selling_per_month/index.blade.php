@extends('layouts.app')

@section('styles')
    {{-- Selectize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.min.css"
        integrity="sha512-VL5zQAJyFw5RL9wN3a5nF508dBqgOAYOZeww5RuEq8A8JQLiWy20iG2lLyiTuF6bv7gz48UGMcxuMlUycoHfJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ventas por mes</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleFormControlInput1">Seleccionar Año</label>
                <select class="form-control" name="year" id="year">
                    <option value="">-</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                </select>
            </div>

        </div>

        <div class="card-body">

            <canvas id="myChart" width="1400" height="650"></canvas>

        </div>
    </div>
@endsection

@section('scripts')
    <!-- Chart Js-->
    <script src="{{ asset('js/chartjs/chart.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.min.js"
        integrity="sha512-JFjt3Gb92wFay5Pu6b0UCH9JIOkOGEfjIi7yykNWUwj55DBBp79VIJ9EPUzNimZ6FvX41jlTHpWFUQjog8P/sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script></script>
    <script>
        $(document).ready(function() {

            $("#year").selectize({
                hideSelected: true,
                onChange: function(value, isOnInitialize) {
                    if (value !== '') {
                        createReport(value);
                    }
                }
            }, );

            const createReport = (year) => {


                $.ajax({
                    type: 'get',
                    url: '{{ url('report-selling-month') }}/' + year,
                    beforeSend: function() {
                        $("#loading").show();
                    },
                    success: function(response) {

                        //console.log( response);
                        response = response[0];
                        console.log( response);

                        const { labels , resultsCompleted } = response;

                        console.log(year)
                        let ctx = document.getElementById('myChart').getContext("2d");;


                        if (window.myChart instanceof Chart) {
                            myChart.destroy()
                        }

                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Total en ventas',
                                data: resultsCompleted,
                                backgroundColor: [
                                    'rgba(78, 115, 223, 2)'
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 2)',

                                ],
                                //borderWidth: 2
                            }]
                        };


                        const config = {
                            type: 'bar',
                            data: data,
                            options: {
                                legend: { display: true },
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: false,
                                        text: 'Chart.js Bar Chart'
                                    }
                                },

                            },
                        };

                        myChart = new Chart(ctx, config);




                    },
                    error: function() {
                        $("#loading").hide();
                    }
                });



            }
        });
    </script>
@endsection
