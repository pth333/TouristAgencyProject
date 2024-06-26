$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".edit").on("click", function (e) {
        e.preventDefault();
        var url = $(this).data("url");
        // console.log(url)
        editOrderTour(url);
    });

    function editOrderTour(url) {
        $("#edit-modal").modal("show");
        $.ajax({
            type: "GET",
            url: url,
            success: function (res) {
                if (res.code == 200) {
                    $("#total_price").val(res.order.total_price);
                    $("#total_deposit").val(res.order.total_deposit);
                    $("#total_person").val(res.order.total_person);
                    $("#orderId").val(res.order.id);
                }
            },
        });
    }
});
