<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('attendance/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('attendance/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--====================================
        ===========================================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('attendance/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('attendance/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('attendance/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('attendance/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('attendance/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('attendance/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="contact1">
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                <img src="{{ asset('attendance/images/img-01.png') }}" alt="IMG">
            </div>

            <form class="contact1-form validate-form" action="/create-attendances-store" method="POST">
                <span class="contact1-form-title">
                    Get Attendances
                </span>

                <div class="wrap-input1 validate-input" data-validate="NIP is required">
                    <input class="input1" type="text" name="nip" placeholder="NIP">
                    <span class="shadow-input1"></span>
                </div>

                <div class="wrap-input1 validate-input col-md-6">

                    <div id="my_camera"></div>

                    <br />

                    <input type=button class="form-control" value="Take Snapshot" onClick="take_snapshot()">

                    <input type="hidden" name="bukti_kehadiran" class="image-tag">

                </div>

                <div class="col-md-12">

                    <div id="results">Your captured image will appear here!</div>

                </div>

                @csrf
                <div class="container-contact1-form-btn mt-4">
                    <button class="contact1-form-btn" type="submit">
                        <span>
                            Submit
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="{{ asset('attendance/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('attendance/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('attendance/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('attendance/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('attendance/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script language="JavaScript">
        Webcam.set({

            width: 490,

            height: 350,

            image_format: 'jpeg',

            jpeg_quality: 90

        });



        Webcam.attach('#my_camera');



        function take_snapshot() {

            Webcam.snap(function(data_uri) {

                $(".image-tag").val(data_uri);

                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';

            });

        }
    </script>

    <!--===============================================================================================-->
    <script src="{{ asset('attendance/js/main.js') }}"></script>

</body>

</html>
