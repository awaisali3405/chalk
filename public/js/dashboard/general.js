
$('.uppercase').on('keyup', function () {
    $(this).val($(this).val().toUpperCase());
});

$('#filter').on('click', function () {
    $('#filter-form').removeClass('d-none');
})

$('#check_all_agreemnet').on('change keyup', function () {
    $('input:checkbox').prop('checked', this.checked);
})
// $(document).ready(function() {
//     $('.select').select2();
// });
$('#add-subject').on('click', function () {
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
            success: function (success) {
                console.log(success);
                x = `  <tr>
                                <td>
                                    <a href="javascript:void(0);">${success.data.lesson_type.name}</a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);">${success.data.subject.name}</a>
                                </td>
                                <td>${success.data.board ? success.data.board.name : '-'}</td>
                                <td>${success.data.paper ? success.data.paper.name : "-"}</td>
                                <td>${success.data.science_type ? success.data.science_type.name : '-'}</td>
                                <td>£${success.data.rate_per_hr}</td>
                                <td>${success.data.no_hr_weekly}</td>
                                <td>£${success.data.amount}</td>

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
            error: function (e) {
                console.log(e)
            }

        });
    }
});
$('#add-parent').on('click', function () {
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
$(document).on("click", ".delete-subject", function () {
    // $('.delete-subject').on('click', function() {
    id = $(this).parent().children('.id').val();
    // $(this).parent().parent().remove()

    console.log(id, $(this).parent().parent());
    $.ajax({
        method: "GET",
        'url': `/api/enquiry/subject/delete/${id}`,
        success: function (success) {
            // if (success.message == 'success') {
            console.log(success, $(this).parent().parent());
            // }
            price = parseFloat($('#annual_resource_fee').val() - +success.data.rate).toFixed(2)
            if (price && price < 0) {

                $('#annual_resource_fee').val(0)
            } else {
                $('#annual_resource_fee').val(price)
            }
            e_price = parseFloat($('#exercise_book').val() - +success.data.book_rate).toFixed(2)
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
$(document).on("click", ".deactivate-subject", function () {
    // $('.delete-subject').on('click', function() {
    id = $(this).parent().children('.id').val();
    // $(this).parent().parent().remove()

    console.log(id, $(this).parent().parent());
    $.ajax({
        method: "GET",
        'url': `/api/enquiry/subject/deactivate/${id}`,
        success: function (success) {
            // if (success.message == 'success') {
            console.log(success, $(this).parent().parent());
            // }
            price = parseFloat($('#annual_resource_fee').val() - +success.data.rate).toFixed(2)
            if (price && price < 0) {

                $('#annual_resource_fee').val(0)
            } else {
                $('#annual_resource_fee').val(price)
            }
            e_price = parseFloat($('#exercise_book').val() - +success.data.book_rate).toFixed(2)
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
            fee_tax = calculateFeeTax(total, $('.tax').val())
            $('.fee-tax').val(fee_tax);
            monthly = parseFloat((parseFloat($('.fee-total').val()) * 52) / 12).toFixed(2);
            $('.monthly-fee').val(monthly)

        }
    })

    $(this).parent().parent().remove()
});
$(document).on("click", ".remove-parent", function () {



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

$(function () {
    $('#upload').change(function () {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" ||
            ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#img').attr('src', "{{ asset('/assets/image/1.png') }}");

        }
    });

});
$('#discount').add('#late_fee').on('change keyup', function () {
    discount = $('#discount').val();
    late = $('#late_fee').val();
    amount = $('#actual_amount').val()
    pay = (amount - discount) + +late
    $('.pay_amount').val(pay)
    $('.pay_amount').attr('max', pay)
})

$('.keyStage').on('change keyup', function () {
    id = $(this).val()
    $.ajax({
        method: "GET",
        'url': `/api/get/year/${id}`,
        success: function (success) {
            // if (success.message == 'success') {
            console.log(success.data)
            $('.year_student').html(success.data);
            $('.year_student_branch').html(success.data);
            // }


        }
    })
})
$('.keyStage').on('change keyup', function () {
    id = $(this).val()
    $.ajax({
        method: "GET",
        'url': `/api/get/year/${id}`,
        success: function (success) {
            // if (success.message == 'success') {
            $('.year_student').html(success.data);
            $('.year').html(success.data);
            // }


        }
    })
})
$('.year').on('change keyup', function () {
    year = $(this).val()
    branch = $("#branch_id").val()
    $.ajax({
        method: "GET",
        'url': `/api/get/subject/${year}`,
        success: function (success) {
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
            success: function (success) {
                $('.product').html(success.data)
            }
        })
    }
})
$('.branch').on('change keyup', function () {
    $('.year').html('');
    $('.product').html('');
    // $('.keyStage').html();
    // $('.').html();
})

$('.year_student').on('change keyup', function () {
    id = $(this).val()
    $.ajax({
        method: "GET",
        'url': `/api/get/student/${id}`,
        success: function (success) {
            // if (success.message == 'success') {

            $('.student').html(success.data);
            $('.book-student').html(success.data);
            // console.log(success.data);
            // }


        }
    })
})
$('.rate').on('change keyup', function () {
    rate = $('.rate').val()
    quantity = $('.quantity').val()
    $('.amount').val((rate * quantity).toFixed(0))
})

$('.student').on('change keyup', function () {

    id = $(this).val()
    console.log(id)
    $.ajax({
        method: "GET",
        'url': `/api/get/student1/data1/${id}`,
        success: function (success) {

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
$('.general').on('change keyup click', function () {
    $('#widget').addClass("col-xl-12 col-xxl-12 col-lg-12")
    $('#profile').hide()
})
$('.individual').on('change keyup click', function () {
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
$('#check_all').on('click change', function () {
    value = $(this).val()
    console.log(value);
    $('input:checkbox').prop('checked', this.checked);
})

$('#p_select').on('change keyup', function () {
    id = $(this).val()
    $.ajax({
        method: "GET",
        'url': `/api/get/parent/data/${id}`,
        success: function (success) {
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

