$('#from_date').add('#to_date').on('keyup change', function () {
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
            success: function (success) {
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
    function () {
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
