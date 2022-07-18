@extends('layouts.app')

@section('styles')
    {{-- Picker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Más Vendidos</h6>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="exampleFormControlInput1">Seleccionar Mes</label>
                <input type="text" id="month" name="month">
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>


    <script>
        $(document).ready(function() {

            flatpickr("#month", {
                // defaultDate: "today",
                plugins: [
                    new monthSelectPlugin({
                        shorthand: false, //defaults to false
                        dateFormat: "F Y", //defaults to "F Y"
                        altFormat: "F Y", //defaults to "F Y"
                        theme: "light" // defaults to "light"
                    })
                ],
                onClose: function(selectedDates, dateStr, instance) {
                    createReport(selectedDates)
                },
            });


            const createReport = (year) => {
                const monthYear = year[0];
                dateFrom = moment(monthYear).startOf('month').format('YYYY-MM-DD');
                dateTo = moment(monthYear).endOf('month').format('YYYY-MM-DD');

                $.ajax({
                    type: 'get',
                    url: '{{ url('report-most-sell') }}/' + dateFrom + '/' + dateTo,
                    beforeSend: function() {
                        $("#loading").show();
                    },
                    success: function(response) {
                        // console.log( response);

                        let labels = [];
                        let values = [];
                        for (i = 0; i < response.length; i++) {
                            labels.push(response[i].name);
                            values.push(response[i].Total);
                        }

                        let ctx = document.getElementById('myChart').getContext("2d");;

                        if (window.myChart instanceof Chart) {
                            myChart.destroy()
                        }

                        const data = {
                            labels: labels,
                            datasets: [{
                                data: values,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 2)',
                                    'rgba(54, 162, 235, 2)',
                                    'rgba(255, 206, 86, 2)',
                                    'rgba(75, 192, 192, 2)',
                                    'rgba(153, 102, 255, 2)',
                                    'rgba(255, 159, 64, 2)'
                                ],
                                //borderWidth: 2
                            }]
                        };


                        const config = {
                            type: 'doughnut',
                            data: data,
                            options: {
                                responsive: false,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: 'Productos más vendidos'
                                    }
                                }
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
