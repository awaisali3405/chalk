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
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
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
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>

    <!-- Chart sparkline plugin files -->
    <script src="{{ asset('vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/sparkline-init.js') }}"></script>

    <!-- Chart Morris plugin files -->
    <script src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendor/morris/morris.min.js') }}"></script>

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



    {{-- Upper Case  --}}
    <script>
        $('.uppercase').on('keyup', function() {
            $(this).val($(this).val().toUpperCase());
        });
    </script>


    {{-- Filter --}}
    <script>
        $('#filter').on('click', function() {
            $('#filter-form').removeClass('d-none');
        })
    </script>

    {{-- Student --}}
    <script>
        $('#check_all_agreemnet').on('change keyup', function() {
            $('input:checkbox').prop('checked', this.checked);
        })
        // $(document).ready(function() {
        //     $('.select').select2();
        // });
        $('#add-subject').on('click', function() {
            lessonType = $('#lesson_type_id').val();
            subject = $('#subject_id').val();
            paper = $('#paper_id').val();
            board = $('#board_id').val();
            rate = parseFloat($('#rate').val());
            hours = parseFloat($('#hours').val());
            amount = parseFloat($('#amount').val());
            scienceType = $('#science_type_id').val();
            enquiry = $('#enquiry_id').val();

            var name = '';
            var data = {
                "_token": "{{ csrf_token() }}",
                'subject_id': subject,
                'paper_id': paper,
                'board_id': board,
                'science_type_id': scienceType,
                'lesson_type_id': lessonType,
                'rate_per_hr': rate,
                'no_hr_weekly': hours,
                'amount': amount

            }
            console.log(data)
            if (!enquiry) {
                data['student_id'] = $('#student_id').val()
            } else {
                data['enquiry_id'] = $('#enquiry_id').val()

            }
            if (subject) {



                console.log(data);
                $.ajax({
                    method: "POST",
                    'url': `/api/enquiry/subject/create`,
                    data: data,
                    success: function(success) {
                        console.log(success);
                        x = `  <tr>
                                        <td>
                                            <a href="javascript:void(0);">${success.data.lesson_type.name}</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);">${success.data.subject.name}</a>
                                        </td>
                                        <td>${success.data.board? success.data.board.name:'-'}</td>
                                        <td>${success.data.paper? success.data.paper.name:"-"}</td>
                                        <td>${success.data.science_type?success.data.science_type.name:'-'}</td>
                                        <td>${success.data.rate_per_hr}</td>
                                        <td>${success.data.no_hr_weekly}</td>
                                        <td>${success.data.amount}</td>

                                        <td>

                                            <input type="hidden" value="${success.data.id}"  class="id"  name="enquiry_subject[]" >
                                            <a class="delete-subject" href="javascript:void(0);"><i class=" fa fa-close color-danger"></i></a>
                                        </td>
                                    </tr>`;


                        // total = parseFloat($('.fee-total').val());

                        discount = parseFloat($('#fee_discount').val());
                        total = parseFloat($('.fee').val());
                        $('.fee-total').val(parseFloat((total + parseFloat(success.data.amount)) -
                            discount).toFixed(2))
                        $('.fee').val(parseFloat(total + +success.data.amount).toFixed(2))

                        total = parseFloat($('.fee-total').val()).toFixed(2)
                        fee_tax = calculateFeeTax(total, $('.tax').val())
                        $('.fee-tax').val(fee_tax);
                        console.log(x);
                        // if (success.data.lesson_type_id == 1) {

                        price = parseFloat(parseFloat($("#annual_resource_fee").val()) + parseFloat(
                            success.data
                            .subject
                            .rate)).toFixed(2)
                        e_price = parseFloat(parseFloat($("#exercise_book").val()) + parseFloat(success
                            .data
                            .subject
                            .book_rate)).toFixed(2)
                        console.log(price, e_price);
                        $('#annual_resource_fee').val(price)
                        $('#exercise_book').val(e_price)
                        // }
                        $('#subject').append(x);
                        monthly = parseFloat((parseFloat($('.fee-total').val()) * 52) / 12).toFixed(2);
                        $('.monthly-fee').val(monthly)
                    },
                    error: function(e) {
                        console.log(e)
                    }

                });
            }
        });
        $('#add-parent').on('click', function() {
            x = ` <div class="row">



<div class="col-lg-3 col-md-6 col-sm-12">
    <div class="form-group">
        <label class="form-label">RelationShip</label>
        <select class="form-control select2" style="width: 100%;" name="relationship[]">
            <option value="Father">Father</option>
            <option value="Mother">Mother</option>
            <option value="Brother">Brother</option>
            <option value="Other">Other</option>
        </select>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" name="first_name1[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" name="last_name1[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Contact</label>
                                                <input type="text" class="form-control" name="contact[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email1[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Occupation</label>
                                                <input type="text" class="form-control" name="occupation[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Post Code</label>
                                                <input type="text" class="form-control" name="post_code1[]">
                                            </div>
                                        </div>
<div class="col-1">
    <div class="form-group pt-4">

        <label class="form-label"></label>
          <span type="button" class="btn btn-primary remove-parent">-
        </span>
    </div>
</div>
</div>`;
            $('#parent').append(x);
        });
        $(document).on("click", ".delete-subject", function() {
            // $('.delete-subject').on('click', function() {
            id = $(this).parent().children('.id').val();
            // $(this).parent().parent().remove()

            console.log(id, $(this).parent().parent());
            $.ajax({
                method: "GET",
                'url': `/api/enquiry/subject/delete/${id}`,
                success: function(success) {
                    // if (success.message == 'success') {
                    console.log(success, $(this).parent().parent());
                    // }
                    price = parseFloat($('#annual_resource_fee').val()).toFixed(2) - +success.data.rate
                    if (price && price < 0) {

                        $('#annual_resource_fee').val(0)
                    } else {
                        $('#annual_resource_fee').val(price)
                    }
                    e_price = parseFloat($('#exercise_book').val()).toFixed(2) - +success.data.book_rate
                    console.log(e_price);
                    if (e_price && e_price < 0) {

                        $('#exercise_book').val(0)
                    } else {

                        $('#exercise_book').val(e_price)
                    }
                    // total = parseFloat($('.fee-total').val());
                    discount = parseFloat($('#fee_discount').val()).toFixed(2);
                    total = parseFloat($('.fee').val()).toFixed(2);
                    $('.fee').val(parseFloat(total - +success.enquiry.amount).toFixed(2))
                    $('.fee-total').val(parseFloat((total - parseFloat(success.enquiry.amount)) -
                        discount).toFixed(2))
                    total = parseFloat($('.fee-total').val()).toFixed(2)
                    fee_tax = calculateFeeTax(total, $('.tax').val()).toFixed(2)
                    $('.fee-tax').val(fee_tax);
                    monthly = parseFloat((parseFloat($('.fee-total').val()) * 52) / 12).toFixed(2);
                    $('.monthly-fee').val(monthly)

                }
            })

            $(this).parent().parent().remove()
        });
        $(document).on("click", ".remove-parent", function() {



            $(this).parent().parent().parent().remove()
        });

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        $(function() {
            $('#upload').change(function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" ||
                        ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#img').attr('src', "{{ asset('/assets/image/1.png') }}");

                }
            });

        });
        $('#discount').add('#late_fee').on('change keyup', function() {
            discount = $('#discount').val();
            late = $('#late_fee').val();
            amount = $('#actual_amount').val()
            pay = (amount - discount) + +late
            $('.pay_amount').val(pay)
        })

        $('.keyStage').on('change keyup', function() {
            id = $(this).val()
            $.ajax({
                method: "GET",
                'url': `/api/get/year/${id}`,
                success: function(success) {
                    // if (success.message == 'success') {
                    console.log(success.data)
                    $('.year_student').html(success.data);
                    // }


                }
            })
        })
        $('.keyStage').on('change keyup', function() {
            id = $(this).val()
            $.ajax({
                method: "GET",
                'url': `/api/get/year/${id}`,
                success: function(success) {
                    // if (success.message == 'success') {
                    $('.year_student').html(success.data);
                    $('.year').html(success.data);
                    // }


                }
            })
        })
        $('.year').on('change keyup', function() {
            year = $(this).val()
            branch = $("#branch_id").val()
            $.ajax({
                method: "GET",
                'url': `/api/get/subject/${year}`,
                success: function(success) {
                    // if (success.message == 'success') {

                    $('.subject').html(success.data);
                    // console.log(success.data);
                    // }


                }
            })
            console.log(year, branch);
            if (year && branch) {
                $.ajax({
                    method: "GET",
                    'url': `/api/get/product/${year}/${branch}`,
                    success: function(success) {
                        $('.product').html(success.data)
                    }
                })
            }
        })
        $('.branch').on('change keyup', function() {
            $('.year').html('');
            $('.product').html('');
            // $('.keyStage').html();
            // $('.').html();
        })

        $('.year_student').on('change keyup', function() {
            id = $(this).val()
            $.ajax({
                method: "GET",
                'url': `/api/get/student/${id}`,
                success: function(success) {
                    // if (success.message == 'success') {

                    $('.student').html(success.data);
                    // console.log(success.data);
                    // }


                }
            })
        })
        $('.rate').on('change keyup', function() {
            rate = $('.rate').val()
            quantity = $('.quantity').val()
            $('.amount').val((rate * quantity).toFixed(0))
        })
        $('.quantity').on('change keyup', function() {
            rate = $('.rate').val()
            quantity = $('.quantity').val()

            $('.amount').val((rate * quantity).toFixed(0))
        })
        $('.student').on('change keyup', function() {

            id = $(this).val()
            console.log(id)
            $.ajax({
                method: "GET",
                'url': `/api/get/student/data/${id}`,
                success: function(success) {

                    image = "http://" + $(location).attr('host') + "/" + success.data.profile_pic
                    $('#p_name').html(`${success.data.first_name} ${success.data.last_name}`)
                    $('#p_image').attr('src', image)
                    $('#p_roll').html(success.data.id)
                    $('#p_year').html(success.data.year.name)
                    $('#payment').html(success.data.payment_period)
                    $('#p_branch').html(success.data.branch.name)
                    $('#tax').html(success.data.tax)
                    $('.subject').html(success.html);
                    console.log(success);
                }
            })
        })
        $('.general').on('change keyup click', function() {
            $('#widget').addClass("col-xl-12 col-xxl-12 col-lg-12")
            $('#profile').hide()
        })
        $('.individual').on('change keyup click', function() {
            $('#widget').removeClass("col-xl-12 col-xxl-12 col-lg-12")
            $('#widget').addClass("col-xl-9 col-xxl-8 col-lg-8")
            $('#profile').show()
            image = "http://" + $(location).attr('host') + "/images/1.jpg"
            $('#p_name').html()
            $('#p_image').attr('src', image)
            $('#p_roll').html('')
            $('#p_year').html('')
            $('#payment').html('')
            $('#p_branch').html('')
            $('.student').html('')
            $('.year_student').html('')
        })
        $('#check_all').on('click change', function() {
            value = $(this).val()
            console.log(value);
            $('input:checkbox').prop('checked', this.checked);
        })
    </script>



    <script>
        $('#p_select').on('change keyup', function() {
            id = $(this).val()
            $.ajax({
                method: "GET",
                'url': `/api/get/parent/data/${id}`,
                success: function(success) {
                    console.log(success);
                    $('#p_first_name').val(success.data.first_name)
                    $('#p_last_name').val(success.data.last_name)
                    $('#p_given_name').val(success.data.given_name)
                    if (success.data.gender == 'male') {

                        $('#p_male').prop('checked', true);
                    } else if (success.data.gender == 'female') {
                        $('#p_female').prop('checked', true);

                    } else {
                        $('#p_other').prop('checked', true);

                    }
                    $('#p_relation').val(success.data.relationship)
                    $('#p_emp_status').val(success.data.emp_status)
                    $('#p_company_name').val(success.data.company_name)
                    $('#p_work').val(success.data.work_phone_name)
                    $('#p_email').val(success.data.email)
                    $('#p_mobile').val(success.data.mobile_number)
                    $('#formatted_address_0').val(success.data.res_address)
                    $('#formatted_address_1').val(success.data.res_second_address)
                    $('#formatted_address_2').val(success.data.res_third_address)
                    $('#town_or_city').val(success.data.res_town)
                    $('#county').val(success.data.res_country)
                    $('#postcode').val(success.data.res_postal_code)
                }
            })
        })
    </script>
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
    <script>
        $('#rate').on('keyup', function() {
            let rate = parseFloat($('#rate').val()).toFixed(2) || 0;
            let hours = parseFloat($('#hours').val()).toFixed(2) || 0;
            $('#amount').val(rate * hours);
        })
        $('#hours').on('keyup', function() {
            let rate = parseFloat($('#rate').val()).toFixed(2) || 0;
            let hours = parseFloat($('#hours').val()).toFixed(2) || 0;
            $('#amount').val(rate * hours);
        })
    </script>



    {{-- Addition Invoice --}}
    <script>
        $('.addition-subject').on('click', function() {
            // var subject = '';
            subject_id = $(".subject option:selected").val()
            subject = $(".subject option:selected").text()
            hours = parseFloat($(".hours").val()).toFixed(2)
            rate = parseFloat($(".rate").val()).toFixed(2)
            amount = parseFloat($("#amount").val()).toFixed(2)
            console.log(subject, hours, rate, amount)
            if (subject && hours && rate && amount) {
                x = `<tr>
                                        <td>
                                            ${subject}
                                            <input type="hidden" name="subject[]" value="${subject_id}">
                                            </td>
                                            <td>
                                                ${hours}
                                                <input type="hidden" name="hours[]" value="${hours}">
                                                </td>
                                                <td>${rate}
                                                    <input type="hidden" name="rate[]" value="${rate}">
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="amount[]" value="${amount}">
                                                        ${amount}</td>

                                        <td>

                                            <a class="delete-addition-subject" href="javascript:void(0);"><i class=" fa fa-close color-danger"></i></a>
                                        </td>
                                    </tr>
                    `;
                $('.addition-subject-add').append(x);
                $('.additional-invoice-btn').attr('disabled', false);
            }


            // }
            // })
        })
        $('.addition-subject-add').on('click', '.delete-addition-subject', function() {
            console.log('sdasas');
            $(this).parent().parent().remove();
        })

        // Student Adittion sum rate and hr
        $('.rate').on('change keyup', function() {
            console.log('asasdsadas')
            rate = parseFloat($(this).val()) || 0;
            hour = parseFloat($(this).closest('.hours').val()) || 0;
            $(this).closest('.amount').val(rate * hour)
        })
        $('.hours').on('change keyup', function() {
            hour = parseFloat($(this).val()) || 0;
            rate = parseFloat($(this).closest('.rate').val()) || 0;
            $(this).closest('.amount').val(rate * hour)
        })
    </script>

    {{-- Sale Product --}}

    <script>
        // Get Product
        // getProduct() {
        //     branch = $('#branch_id').val();
        //     year = $('.year').val
        //     $.ajax({
        //         method: "GET",
        //         'url': `/api/get/product/${year}/${branch}`,
        //         success: function(success) {
        //             $('.product').html(success.data)
        //         }
        //     })
        // }

        $('.add-resource').on('click', function() {
            product = $('.product option:selected').text();
            product_id = $('.product').val();
            quantity = $('.quantity').val();
            rate = $('.rate').val();
            amount = $('.amount').val();
            console.log(product, quantity, rate, amount);
            if (product && quantity && rate && amount) {
                x = `<tr>
                                        <td>
                                            ${product}
                                            <input type="hidden" name="product[]" value="${product_id}">
                                            </td>
                                            <td>
                                                ${quantity}
                                                <input type="hidden" name="quantity[]" value="${quantity}">
                                                </td>
                                                <td>${rate}
                                                    <input type="hidden" name="rate[]" value="${rate}">
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="amount[]"  value="${amount}">
                                                        ${amount}</td>

                                        <td>

                                            <a class="delete-resource" href="javascript:void(0);"><i class=" fa fa-close color-danger"></i></a>
                                        </td>
                                    </tr>
                    `;

                $('.subject-resource').append(x);
            }




        })

        $('.subject-resource').on('click', '.delete-resource', function() {
            $(this).closest('tr').remove();
        })
    </script>





    {{-- Enquiry  --}}
    <script>
        $('.year_enquiry').on('change', function() {
            var year = $(this).val();
            $.ajax({
                method: "GET",
                'url': `/api/get/subject/${year}/value`,
                success: function(success) {
                    // if (success.message == 'success') {

                    $('.subject').html(success.data);
                    $('.checkbox').html('');
                    success.data.forEach(element => {
                        x = `     <div class="col-lg-2 col-md-2 col-sm-6">
                                                    <input type="checkbox" name="subject[]" value="${element.name}" id="">
                                                    <label class="">${element.name}</label>
                                                </div>`;
                        $('.checkbox').append(x);
                    });
                    // console.log(success.data);
                    // }


                }
            })
        })
        $('#veiw-enquiry-list').on('click', function() {

            if ($(this).text() == 'Hide Subject') {
                $('.enquiry-subject-list').addClass('d-none');
                $(this).text('View Subject');

            } else {
                $('.enquiry-subject-list').removeClass('d-none');
                $(this).text('Hide Subject');
            }
        })
    </script>



    {{-- Teacher Enquiry --}}
    <script>
        $('.teacher-subject-add').on('click', function() {
            var subject_id = $('.subject').val();
            var subject = $('.subject option:selected').text();
            console.log(subject, subject_id);
            x = `<tr>
                                                            <input type="hidden" name="subject[]" value='${subject_id}'>

                                                            <td>${subject}</td>
                                                            <td><span
                                                                    class="delete-teacher-subject btn btn-primary">x</span>
                                                            </td>
                                                        </tr>`;
            $('.teacher_subject').append(x);
        })
        $('.teacher_subject').on('click', '.delete-teacher-subject', function() {
            $(this).parent().parent().remove();
        });
    </script>




















    {{-- Branch --}}
    <script>
        $('#tax_type').on('click ready', function() {
            tax_type = $(this).val()
            if (tax_type == 'vat') {
                $('.tax').show();
                $('.tax-input').val(0);
            } else if (tax_type == 'flat') {

                $('.tax').show();
                $('.tax-input').val(0);
            } else {
                $('.tax').hide();
                $('.tax-input').val(0);
            }
        });

        $('.branch_student').on('change', function() {
            branch_id = $(this).val();

            $.ajax({
                url: `/api/get/branch/${branch_id}`,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    $('.tax').val(data.data.tax)
                    total = parseFloat($('.fee-total').val()).toFixed(2)
                    fee_tax = calculateFeeTax(total, $('.tax').val())
                    $('.fee-tax').val(fee_tax);
                    reg_total = parseFloat($('#registration_fee').val()).toFixed(2)
                    reg_tax = calculateFeeTax(reg_total, $('.tax').val())
                    $('#reg_tax').val(reg_tax)
                    monthly = parseFloat($('.fee-total').val() * 52 / 12).toFixed(2);
                    $('.monthly-fee').val(monthly)
                }

            })
        })

        function calculateFeeTax(total, tax) {
            return parseFloat(total - parseFloat(total / (100 + parseFloat(tax))) *
                100).toFixed(2);
        }
        $(document).ready(function() {
            total = parseFloat($('.fee-total').val()).toFixed(2)
            fee_tax = calculateFeeTax(total, $('.tax').val())
            $('.fee-tax').val(fee_tax);
            reg_total = parseFloat($('#registration_fee').val()).toFixed(2)
            reg_tax = calculateFeeTax(reg_total, $('.tax').val())
            $('#reg_tax').val(reg_tax)
        })
        $('.tax').add('#registration_fee').add('#fee_discount').on('change keyup', function() {
            total = parseFloat($('.fee-total').val()).toFixed(2)
            fee_tax = calculateFeeTax(total, $('.tax').val())
            $('.fee-tax').val(fee_tax);
            reg_total = parseFloat($('#registration_fee').val()).toFixed(2)
            reg_tax = calculateFeeTax(reg_total, $('.tax').val())
            $('#reg_tax').val(reg_tax)
            discount = parseFloat($("#fee_discount").val()).toFixed(2)
            fee = parseFloat($('.fee').val()).toFixed(2)
            $('.fee-total').val(parseFloat(fee - discount))
            monthly = parseFloat($('.fee-total').val() * 52 / 12).toFixed(2);
            $('.monthly-fee').val(monthly)

        })
        // $('#registration_fee').on('change keyup', function() {
        //     reg_total = $("#registration_fee").val()
        //     reg_tax = calculateFeeTax(reg_total, $('.tax').val())
        //     $('#reg_tax').val(reg_tax)
        // })
        // $('#fee_discount').on('change keyup', function() {
        //     discount = parseFloat($("#fee_discount").val())
        //     fee = parseFloat($('.fee').val())
        //     $('.fee-total').val(parseFloat(fee - discount))
        //     $('.monthly-fee').val(parseFloat(fee - discount))
        //     total = parseFloat($('.fee-total').val())
        //     fee_tax = calculateFeeTax(total, $('.tax').val())
        //     $('.fee-tax').val(fee_tax);

        // })
        $('#payment-type').on('keyup change', function() {
            type = $("#payment-type").val();
            console.log(type)
            if (type != 'Weekly') {
                $('#monthly-fee').removeClass('d-none')
            } else {
                $('#monthly-fee').addClass('d-none')
                // $('.monthly-fee').val();
            }
        })

        function calculateMonthly() {

        }
        // function branch() {

        // }
    </script>


    <script type="text/javascript" src="https://www.codehim.com/demo/jquery-printthis/printThis.js"></script>

    {{-- Invoice --}}
    <script>
        $('.print-btn').on('click', function() {
            id = $(this).data('id');
            console.log(id);
            print_div = `#print-${id}`;
            html = $(print_div).html();
            $(print_div).printThis({
                importStyle: $(this).hasClass('importStyle')
            });
        })
    </script>



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
    <script>
        $('#from_date').add('#to_date').on('keyup change', function() {
            var from = $('#from_date').val();
            var to = $('#to_date').val();
            var staff = $('#staff_id').val();
            console.log(staff);
            if (from && to) {
                $.ajax({
                    url: '/api/get/salary',
                    type: "POST",
                    data: {
                        staff: staff,
                        from: from,
                        to: to,
                    },
                    success: function(success) {
                        console.log(success);
                        $('#salary').val(success.salary);
                        var salary = $('#salary').val();

                        var tax = $("#tax").val() == "" ? 0 : $("#tax").val();
                        var ssp = $("#ssp").val() == "" ? 0 : $("#ssp").val();
                        var ni = $("#ni").val() == "" ? 0 : $("#ni").val();
                        var dbs = $("#dbs").val() == "" ? 0 : $("#dbs").val();
                        var bonus = $("#bonus").val() == "" ? 0 : $("#bonus").val();
                        var pension = $("#pension").val() == "" ? 0 : $("#pension").val();
                        var deduction = $("#deduction").val() == "" ? 0 : $("#deduction").val();
                        var loan = $("#loan").val() == "" ? 0 : parseFloat($("#loan").val()).toFixed(2);
                        var net = (parseFloat(salary) + parseFloat(ssp) + parseFloat(bonus)) - (
                            parseFloat(deduction) +
                            parseFloat(loan) +
                            parseFloat(ni) + parseFloat(dbs) + parseFloat(tax) + parseFloat(pension)
                        );
                        $('#total').val(net);
                        $('#hour').html(success.paid_hour)
                    }

                })
            }
        })
        $('#deduction').add('#tax').add("#ssp").add("#ni").add("#dbs").add("#bonus").add('#pension').add("#loan").on(
            'change keyup',
            function() {
                var salary = $('#salary').val();

                var tax = $("#tax").val() == "" ? 0 : $("#tax").val();
                var ssp = $("#ssp").val() == "" ? 0 : $("#ssp").val();
                var ni = $("#ni").val() == "" ? 0 : $("#ni").val();
                var dbs = $("#dbs").val() == "" ? 0 : $("#dbs").val();
                var bonus = $("#bonus").val() == "" ? 0 : $("#bonus").val();
                var pension = $("#pension").val() == "" ? 0 : $("#pension").val();
                var deduction = $("#deduction").val() == "" ? 0 : $("#deduction").val();
                var loan = $("#loan").val() == "" ? 0 : parseFloat($("#loan").val()).toFixed(2);
                var net = (parseFloat(salary) + parseFloat(ssp) + parseFloat(bonus)) - (parseFloat(deduction) +
                    parseFloat(loan) +
                    parseFloat(ni) + parseFloat(dbs) + parseFloat(tax) + parseFloat(pension));
                $('#total').val(net);
            })
    </script>


    {{-- Staff Loan --}}
    <script>
        $('#staff_branch').on('change keyup ready', function() {
            branch = $(this).val();
            // alert(branch);
            $.ajax({
                method: "GET",
                url: `/api/get/staff/${branch}`,
                success: function(success) {
                    $('#staff').html(success.html);
                }
            })
        })
    </script>
    {{-- Amount --}}
    <script>
        $('#amount').add('#partition').on('change keyup ready', function() {
            amount = $('#amount').val() == '' ? 0 : $('#amount').val();
            patition = $("#partition").val() == '' ? 0 : $("#partition").val();
            console.log(amount, patition);
            total = parseFloat(amount) / parseFloat(patition).toFixed(2);

            $('#installment').val(total);
        });
    </script>


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

    {{--
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}

    <!-- Summernote -->
    <script src="{{ asset('vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ asset('js/plugins-init/summernote-init.js') }}"></script>


    <!-- Required vendors -->
    {{-- <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script> --}}
    {{-- <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script> --}}

    <!-- Svganimation scripts -->
    {{-- <script src="{{ asset('vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('vendor/svganimation/svg.animation.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script> --}}

    <script src="{{ asset('vendor/jqueryui/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/fullcalendar-init.js') }}"></script>
</body>


</html>
