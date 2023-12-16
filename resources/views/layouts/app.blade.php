<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Chalk 'n' Duster </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jqvmap/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <!-- Summernote -->
    <link href="{{ asset('vendor/summernote/summernote.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin-3.css') }}">
    <!-- Datatable -->
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- Toaster -->
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.min.css') }}">

    {{-- Full Calender --}}
    <link href="{{ asset('vendor/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet">
    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<style>
    /* Print Invoice */
    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
        background-color: white; // Choose your own color here
    }

    .table-striped>tbody>tr:nth-child(even)>td,
    .table-striped>tbody>tr:nth-child(even)>th {
        background-color: #EEEEEE; // Choose your own color here
    }

    .text-blue {
        color: #5d9cec;
    }

    .text-align-end {
        text-align: end !important;
    }

    .border-black {
        border: 2px solid black !important;
    }

    .border-black-top-none {
        border-top-style: none !important;
    }

    .border-grey {
        border: 3px solid #EEEEEE;
    }

    .table-print {
        width: 100%;
    }

    b {
        padding-left: 2px;
    }

    .table-2 {
        width: 100%;

        border-collapse: collapse;
    }


    .table-2 thead tr {
        background-color: rgb(127, 127, 127);
        color: white;
        text-align: center;

    }

    .bg-grey {
        background-color: #EEEEEE !important;
    }

    .text-grey {
        color: #EEEEEE !important;
    }

    tr.border-x-black td {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    /* Print End */


    .modal-dialog {
        /* Width */
        max-width: 50%;
    }

    .unselectable {
        background-color: #f2f2f2;
        cursor: not-allowed;
    }

    .border {
        border: 1px solid black;
    }

    .border td {
        border: 1px solid black;
    }

    .hr-lines:before {
        content: " ";
        display: block;
        height: 1px;
        width: 35%;
        position: absolute;
        top: 50%;
        left: 0;
        background: rgb(0, 0, 0);
    }

    .hr-lines {
        position: relative;
        /*  new lines  */
        max-width: 500px;
        text-align: center;
    }

    .hr-lines:after {
        content: " ";
        height: 1px;
        width: 35%;
        background: rgb(0, 0, 0);
        display: block;
        position: absolute;
        top: 50%;
        right: 0;
    }

    @media print {
        .no-printme {
            display: none;
        }

        .printme {
            display: block;
        }
    }
</style>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader" class="no-print">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @if (!str_contains(url()->current(), 'login'))
            <div class="nav-header" style="background-color:white;">
                <a href="{{ route('home') }}" class="brand-logo">
                    {{-- <img class="logo-abbr" src="{{ asset('images/logo-white-3.png') }}" alt=""> --}}
                    <img class="logo-compact" src="{{ asset('images/logo.png') }}" alt="">
                    <img class="brand-title" src="{{ asset('images/logo.png') }}" alt="">
                </a>

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>
        @endif
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @if (!str_contains(url()->current(), 'login'))
            @include('component.header')
        @endif
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
            ***********************************-->
        @if (!str_contains(url()->current(), 'login'))
            @include('component.sidebar')
        @endif
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('component.footer')
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/select2-init.js') }}"></script>
    {{-- <!-- Chart sparkline plugin files -->
        <script src="{{ asset('vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('js/plugins-init/sparkline-init.js') }}"></script>

        <!-- Chart Morris plugin files -->
        <script src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('vendor/morris/morris.min.js') }}"></script> --}}

    <!-- Init file -->
    <script src="{{ asset('js/plugins-init/widgets-script-init.js') }}"></script>


    {{-- Toaster --}}
    <script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                // "rtl": isEnableRtl,
                "closeButton": true
            }
            if ("{!! session()->has('success') !!}") {
                toastr.success("{!! session()->get('success') !!}", 'Success')
            }
            if ("{!! session()->has('error') !!}") {
                toastr.error("{!! session()->get('error') !!}", 'Error')
            }
            if ("{!! session()->has('info') !!}") {
                toastr.info("{!! session()->get('info') !!}", 'Info')
            }
            if ("{!! session()->has('warning') !!}") {
                toastr.warning("{!! session()->get('warning') !!}", 'Warning')
            }
        })
    </script>
    {{-- Branch --}}
    <script src="{{ asset('js/dashboard/branch.js') }}"></script>
    {{-- Invoice --}}
    <script src="{{ asset('js/dashboard/invoice.js') }}"></script>
    {{-- Addition Invoice --}}
    <script src="{{ asset('js/dashboard/addition-invoice.js') }}"></script>

    {{-- Sale Product --}}

    <script src="{{ asset('js/dashboard/sale-product.js') }}"></script>


    {{-- branch and year change --}}
    <script src="{{ asset('js/dashboard/branch-year-api.js') }}"></script>


    {{-- Enquiry  --}}
    <script src="{{ asset('js/dashboard/enquiry.js') }}"></script>



    {{-- Teacher Enquiry --}}
    <script src="{{ asset('js/dashboard/teacher-enquiry.js') }}"></script>
    <script src="{{ asset('js/dashboard/sale.js') }}"></script>
    {{-- Purhcase --}}
    <script src="{{ asset('js/dashboard/purchase.js') }}"></script>
    {{-- Receipt Js --}}
    <script src="{{ asset('js/dashboard/receipt.js') }}"></script>

    {{-- Addition book invoice --}}
    <script src="{{ asset('js/dashboard/addtional-book-invoice.js') }}"></script>
    <!-- Demo scripts -->
    <!-- Demo scripts -->
    <script src="{{ asset('js/dashboard/dashboard-2.js') }}"></script>



    <!-- Svganimation scripts -->
    <script src="{{ asset('vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('vendor/svganimation/svg.animation.js') }}"></script>
    {{-- <script src="{{ asset('js/styleSwitcher.js') }}"></script> --}}

    <!-- Datatable -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

    {{-- Calender --}}
    {{-- <script src="{{ asset('js/plugins-init/fullcalendar-init.js') }}"></script> --}}
    <script src="https://cdn.getaddress.io/scripts/getaddress-autocomplete-1.1.3.min.js"></script>

    <!-- after your form -->
    <script>
        getAddress.autocomplete('formatted_address_0', 'uIIn_5Plkk2X3bCt-L3Cjw40707');
    </script>
    {{-- Stock JS --}}


    <script src="{{ asset('js/dashboard/general.js') }}"></script>
    {{-- Datepicker --}}
    <!-- ✅ load jQuery ✅ -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- ✅ load jquery UI ✅ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            function allowMondayDate(date) {
                // Allow Mondays, Saturdays, the first day, and the last day of the month
                return (date.getDay() === 1);
            }

            function allowFirstDate(date) {
                return (date.getDate() === 1);
            }

            function allowLastDate(date) {
                return (new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate() === date.getDate());
            }

            function allowSundayDate(date) {
                // Allow Mondays, Saturdays, the first day, and the last day of the month
                return (date.getDay() === 0);
            }
            var payment = $(".payment").val()
            $('.payment').on('change keyup', function() {
                payment = $(this).val()
            })
            console.log(payment)
            $(".start_date").datepicker({
                format: 'yyyy-mm-dd',
                beforeShowDay: function(date) {
                    if (payment == "Weekly") {

                        var cssClass = allowMondayDate(date) ? 'selectable' : 'unselectable';
                        return [allowMondayDate(date), cssClass];
                    } else {
                        var cssClass = allowFirstDate(date) ? 'selectable' : 'unselectable';
                        return [allowFirstDate(date), cssClass];

                    }
                }
            });
            $(".end_date").datepicker({
                format: 'yyyy-mm-dd',
                beforeShowDay: function(date) {
                    if (payment == "Weekly") {

                        var cssClass = allowSundayDate(date) ? 'selectable' : 'unselectable';
                        return [allowSundayDate(date), cssClass];
                    } else {
                        var cssClass = allowLastDate(date) ? 'selectable' : 'unselectable';
                        return [allowLastDate(date), cssClass];

                    }
                }
            });

        });
        // $('#start_date').on('change keyup', function() {

        // })
    </script>


    {{-- Student Subject Amount --}}
    <script src="{{ asset('js/dashboard/student-subject.js') }}"></script>


























    <script type="text/javascript" src="https://www.codehim.com/demo/jquery-printthis/printThis.js"></script>





    {{-- File Format --}}
    <script>
        function upload_check() {
            var upl = document.getElementById("file");
            var max = 2048000;
            console.log(upl.files[0].size);

            if (upl.files[0].size > max) {
                alert("File Should be less then 2MB");
                upl.value = "";
            }
        };
    </script>


    {{-- Receiving Amount --}}

    <script>
        $("#receiving_cash").keyup(function() {
            let total = parseFloat($("#total").val()).toFixed(2);
            let receive = parseFloat($(this).val()).toFixed(2);
            let change = parseFloat(total - receive).toFixed(2);
            $("#change").val(isNaN(change) ? "" : change);
        });
    </script>




    {{-- Staff Pay --}}
    <script src="{{ asset('js/dashboard/staff-pay.js') }}"></script>


    {{-- Staff Loan --}}
    <script src="{{ asset('js/dashboard/staff-loan.js') }}"></script>


    {{-- Transfer Product --}}
    <script>
        $('#t-quantity').add('#t-rate').on('keyup change', function() {
            quantity = $('#t-quantity').val() == '' ? 0 : $("#t-quantity").val();
            rate = $("#t-rate").val() == '' ? 0 : $("#t-rate").val();
            total = parseFloat(parseFloat(quantity) * parseFloat(rate)).toFixed(2);
            $('#t-total').val(total);
        })
    </script>



    {{-- General Notification --}}
    <script>
        $('#people').on('change keyup', function() {
            people = $(this).val();
            if (people >= 1) {
                $.ajax({
                    method: 'GET',
                    url: `/api/get/people/${people}`,
                    success: function(success) {
                        $('#people-list').html(success.html);

                    }

                })
            }
        });
    </script>

    {{-- Invocie Print --}}
    <script>
        if ("{!! session()->has('action') !!}") {
            window.open("{!! session()->get('action') !!}", '_blank');
        }
    </script>



    <!-- Summernote -->
    <script src="{{ asset('vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ asset('js/plugins-init/summernote-init.js') }}"></script>


    <script src="{{ asset('vendor/jqueryui/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/fullcalendar-init.js') }}"></script>


</body>



</html>
