<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Scripts -->
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="row mt-2">
            <div class="col-md-5 ms-1">
                <div class="card ml-2 mb-1">
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-md-4">
                                <h5>Room No</h5>
                            </div>
                            <div class="col-md-4">
                                <h5>Doctor Name</h5>
                            </div>
                            <div class="col-md-4">
                                <h5>Doctor Special</h5>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div id="latestQueue">

                </div>
                {{-- @foreach ($queues as $queue)
                <div class="card ml-2 mb-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center" style=" color: red;  font-size: 20px">
                                <b>{{$queue->room_no}}</b>
                            </div>
                            <div class="col-md-12 text-center" style=" color: red; font-size: 20px">
                                <b>{{$queue->doctor_name}}</b>
                            </div>
                            <div class="col-md-12 text-center" style=" color: red; font-size: 20px">
                                <b>{{$queue->doctor_special}}</b>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach --}}
            </div>
            <div class="col-md-7">
                <h1 class="text-center">
                    {{ now()->format('Y-m-d H:i:s') }}
                </h1>
                <div class="row mt-2">
                    <div class="col-md-11">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tgbNymZ7vqY"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () { 
            
            function fetchTableData() {
            $.get({
            url: '/get-queue',
            method: 'GET',
            success: function (response) {
            $("#latestQueue").html(response)
            },
            error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
            }
            });
            }
            
            fetchTableData();
            
            var refreshTime = 5000; 

            setInterval(function () {
                fetchTableData();
            }, refreshTime);
        });
    </script>
</body>

</html>