<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edumin - Bootstrap Admin Dashboard </title>
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
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

    {{-- Stock JS --}}
    <script>
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
            id = $(this).val()
            $.ajax({
                method: "GET",
                'url': `/api/get/subject/${id}`,
                success: function(success) {
                    // if (success.message == 'success') {

                    // $('#subject').html(success.data);
                    // console.log(success.data);
                    // }


                }
            })
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
                    $('#subject').html(success.html.subject);
                }
            })
        })
        $('.general').on('change keyup click', function() {
            $('#widget').addClass("col-xl-12 col-xxl-12 col-lg-12")
            $('#profile').hide()
        })
        $('.individual').on('change keyup click', function() {
            $('#widget').removeClass("col-xl-12 col-xxl-12 col-lg-12")
            $('#widget').addClass("col-xl-9 col-xxl-9 col-lg-9")
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

</body>

</html>
