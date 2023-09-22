//Empty Season Form
$(".reset_user_form").click(function () {
    $('#user-modal-title').text("Add User");
    $("#user_form")[0].reset();
    $("#interests").val(null).trigger("change");
    $(".clear-error").html("");
});

function createOrUpdate() {
    const data = $("#user_form").serialize();
    const url = $("#user_form").attr("action");
    const type = $("#user_form").attr("method");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: url,
        method: type,
        data: data,
        beforeSend: function () {
            run_waitMe();
        },
        success: function (response) {
            if (response.status === 200) {
                toastr.success("" + response.message + "", "Success");
                $("#user_form")[0].reset();
                $("#user-modal").modal("hide");
                getUsers();
            } else {
                toastr.warning("" + response.message + "", "warning");
            }
        },
        error: function (reject) {
            var response = $.parseJSON(reject.responseText);
            $.each(response.errors, function (key, val) {
                $("#" + key + "_error").text(val[0]);
            });
        },
        complete: function () {
            hide_waitMe();
        }
    });
}

function findUser(url) {
    $(".clear-error").html("");
    $.ajax({
        url: url,
        method: "get",
        success: function (response) {
            if (response) {
                $('#user-modal-title').text("Update User");
            }
            const interestIds = response.interests.map(function(interest) {
                return interest.id;
            });

            $('#interests').val(null).trigger('change');
            interestIds.forEach(function(interestId) {
                $('#interests option[value="' + interestId + '"]').prop('selected', true);
            });

            $('#interests').trigger('change');

            $.each(response, function (index, value) {
                $("#" + index).val(value);
                $("#user_id").val(response.id);
            });

            $("#user-modal").modal("show");
        },

    });
}

function deleteUser(url) {
    Swal.fire({
        title: "Are you sure?",
        text: "Record will be deleted.",
        icon: "warning", // Use 'icon' instead of 'type'
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                method: "get",
                success: function (response) {
                    console.log(response);
                    if (response.status === 200) {
                        toastr.success("" + response.message + "", "Success");
                        getUsers();
                    } else {
                        toastr.warning("" + response.message + "", "Warning");
                    }
                },
            });
        }
    });
}

function getUsers() {
    $(".get_users").DataTable().clear().destroy();
    return $(".get_users").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: "/user/get",
        columns: [
            { data: "name", name: "name" },
            { data: "email", name: "email" },
            { data: "phone_no", name: "phone_no" },
            { data: "language", name: "language" },
            { data: "interest", name: "interest" },
            {
                data: "action",
                name: "action",
                orderable: true,
                searchable: true,
            },
        ],
    });
}

$(document).ready(function (){
    getUsers();
});
