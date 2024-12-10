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
                <div id="latestQueue">

                </div>

            </div>
            <div class="col-md-7">
                <h1 class="text-center" id="nowTime">

                </h1>
                <div class="row mt-2" id="getIframe">

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

        $(document).ready(function () {
        
        function fetchIframe() {
        $.get({
        url: '/get-iframe',
        method: 'GET',
        success: function (response) {
        $("#getIframe").html(response)
        },
        error: function(xhr, status, error) {
        console.error('Error fetching data:', error);
        }
        });
        }
        
        fetchIframe();
        
        // var refreshTime = 5000;
        
        // setInterval(function () {
        // fetchIframe();
        // }, refreshTime);

        });
    </script>

    <script>
        var refreshTime = 1000;
        
        // Function to update the current time
        function updateTime() {
       
            var currentTime = new Date(); // Get the current date and time
            
            // Extract date components
            var year = currentTime.getFullYear();
            var month = (currentTime.getMonth() + 1).toString().padStart(2, '0'); // Months are 0-based, so add 1
            var day = currentTime.getDate().toString().padStart(2, '0');
            
            // Extract time components
            var hours = currentTime.getHours().toString().padStart(2, '0');
            var minutes = currentTime.getMinutes().toString().padStart(2, '0');
            var seconds = currentTime.getSeconds().toString().padStart(2, '0');
            
            // Format date and time as "YYYY-MM-DD HH:MM:SS"
            var dateTimeString = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

        // Update the content of the #current-time element with the formatted time
        $('#nowTime').text(dateTimeString);
        }
        
        // Update the time every second (1000 milliseconds)
        setInterval(updateTime, 1000);
        
        // Initial time display when the page loads
        updateTime();
    </script>
</body>

</html>