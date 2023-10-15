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

    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
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

    <!-- Demo scripts -->
    <!-- Demo scripts -->
    <script src="{{ asset('js/dashboard/dashboard-2.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ asset('js/plugins-init/summernote-init.js') }}"></script>

    <!-- Svganimation scripts -->
    <script src="{{ asset('vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('vendor/svganimation/svg.animation.js') }}"></script>
    {{-- <script src="{{ asset('js/styleSwitcher.js') }}"></script> --}}

    <!-- Datatable -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.getaddress.io/scripts/getaddress-autocomplete-1.1.3.min.js"></script>

    <!-- after your form -->
    <script>
        getAddress.autocomplete('formatted_address_0', 'uIIn_5Plkk2X3bCt-L3Cjw40707');
    </script>
    {{-- Stock JS --}}
    <script>
        $('#check_all_agreemnet').on('change keyup', function() {
            $('input:checkbox').prop('checked', this.checked);
        })
        $(document).ready(function() {
            $('.select').select2();
        });
        $('#add-subject').on('click', function() {
            subject = $('#subject_id').val();
            paper = $('#paper_id').val();
            board = $('#board_id').val();
            scienceType = $('#science_type_id').val();
            enquiry = $('#enquiry_id').val();

            var name = '';
            var data = {
                "_token": "{{ csrf_token() }}",
                'subject_id': subject,
                'paper_id': paper,
                'board_id': board,
                'science_type_id': scienceType,

            }
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

                                            <a href="javascript:void(0);">${success.data.subject.name}</a>
                                        </td>
                                        <td>${success.data.board? success.data.board.name:'-'}</td>
                                        <td>${success.data.paper? success.data.paper.name:"-"}</td>
                                        <td>${success.data.science_type?success.data.science_type.name:'-'}</td>

                                        <td>

                                            <input type="hidden" value="${success.data.id}"  class="id"  name="enquiry_subject[]" >
                                            <a class="delete-subject" href="javascript:void(0);"><i class=" fa fa-close color-danger"></i></a>
                                        </td>
                                    </tr>`;
                        console.log(x);
                        $('#subject').append(x);
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
        $('#discount').on('change keyup', function() {
            discount = $('#discount').val();
            late = $('#late_fee').val();
            amount = $('#actual_amount').val()
            pay = (amount - discount) + +late
            $('#pay_amount').val(pay)
        })
        $('#late_fee').on('change keyup', function() {
            discount = $('#discount').val();
            late = $('#late_fee').val();
            amount = $('#actual_amount').val()
            pay = (amount - discount) + +late
            $('#pay_amount').val(pay)
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
            branch = $(".branch").val()
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
        $('.add-resource').on('click', function() {
            id = $('.student').val();
            $.ajax({
                method: "GET",
                'url': `/api/get/student/data/${id}`,
                success: function(success) {
                    x = `  <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Resource</label>
                                                                    <div class="input-group mb-2">
                                                                        <select name="product_id[]"
                                                                            class="form-control subject">
                                                                            ${success.html}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Quantiy</label>
                                                                    <div class="input-group mb-2">
                                                                        <input type="text" name="quantity[]"
                                                                            class="form-control quantity">


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Rate</label>
                                                                    <div class="input-group mb-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">£</div>
                                                                        </div>
                                                                        <input name="rate[]"
                                                                            class="form-control rate">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">Amount</label>
                                                                    <div class="input-group mb-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">£</div>
                                                                        </div>
                                                                        <input name="amount[]"
                                                                            class="form-control amount">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1 col-md-3 col-sm-12 pt-4">
                                                                <div class="form-group">
                                                                    <span class="remove-resource btn btn-danger">-</span>
                                                                </div>
                                                            </div>

                                                        </div>`;
                    $('.subject-resource').append(x);
                }

            })
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
</body>

</html>
