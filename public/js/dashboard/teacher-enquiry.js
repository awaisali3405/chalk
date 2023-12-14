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
