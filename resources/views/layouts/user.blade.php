<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/f.png') }}" type="">

    <title>Festori</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    @include('partials.style')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        /* Gaya tambahan untuk warna tombol */
        .btn-custom {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        div.tiket {
            max-width: 1350px;
            margin: 0 auto;
            overflow: hidden
            }

        .upcomming {
            font-size: 45px;
            text-transform: uppercase;
            border-left: 14px solid rgba(255, 235, 59, 0.78);
            padding-left: 12px;
            margin: 18px 8px;
        }

        .tiket .item {
            width: 48%;
            float: left;
            padding: 0 20px;
            background: #ddd;
            overflow: hidden;
            margin: 10px
        }

        .tiket .item-right,
        .tiket .item-left {
            float: left;
            padding: 20px
        }

        .tiket .item-right {
            padding: 79px 50px;
            margin-right: 20px;
            width: 25%;
            position: relative;
            height: 286px
        }

        .tiket .item-right .up-border,
        .tiket .item-right .down-border {
            padding: 14px 15px;
            background-color: #fff;
            border-radius: 50%;
            position: absolute
        }

        .tiket .item-right .up-border {
            top: -8px;
            right: -35px;
        }

        .tiket .item-right .down-border {
            bottom: -13px;
            right: -35px;
        }

        .tiket .item-right .num {
            font-size: 60px;
            text-align: center;
            color: #111
        }

        .tiket .item-right .day,
        .tiket .item-left .event {
            color: #555;
            font-size: 20px;
            margin-bottom: 9px;
        }

        .tiket .item-right .day {
            text-align: center;
            font-size: 25px;
        }

        .tiket .item-left {
            width: 71%;
            padding: 34px 0px 19px 46px;
            border-left: 3px dotted #999;
        }

        .tiket .item-left .title {
            color: #111;
            font-size: 34px;
            margin-bottom: 12px
        }

        .tiket .item-left .sce {
            margin-top: 5px;
            display: block
        }

        .tiket .item-left .sce .icon,
        .tiket .item-left .sce p,
        .tiket .item-left .loc .icon,
        .tiket .item-left .loc p {
            float: left;
            word-spacing: 5px;
            letter-spacing: 1px;
            color: #888;
            margin-bottom: 10px;
        }

        .tiket .item-left .sce .icon,
        .tiket .item-left .loc .icon {
            margin-right: 10px;
            font-size: 20px;
            color: #666
        }

        .tiket .item-left .loc {
            display: block
        }

        .fix {
            clear: both
        }

        .tiket .item .booked {
            background: #3D71E9
        }

        .tiket .item .cancel {
            background: #DF5454
        }

        .linethrough {
            text-decoration: line-through
        }

        @media only screen and (max-width: 1150px) {
            .tiket .item {
                width: 100%;
                margin-right: 20px
            }

            div.tiket {
                margin: 0 20px auto
            }
        }
    </style>

</head>

<body class="">
    @include('components.header')
    @yield('content')

    @include('components.footer')

    @include('partials.script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdown = document.getElementById('userDropdown');
            var dropdownContent = document.getElementById('dropdownContent');

            dropdown.addEventListener('click', function(event) {
                event.stopPropagation(); // Menghentikan penyebaran event ke window

                if (dropdownContent.style.display === 'block') {
                    dropdownContent.style.display = 'none';
                } else {
                    dropdownContent.style.display = 'block';
                }
            });

            window.addEventListener('click', function() {
                if (dropdownContent.style.display === 'block') {
                    dropdownContent.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
