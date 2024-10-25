$(document).ready(function () {
    $("#skills .edit-control").click(function () {
        $("#skills .btns-toggle").toggleClass("d-none");
    });
    
    $("#projects .edit-control").click(function () {
        $("#projects .btns-toggle").toggleClass("d-none");
    });

    $(".delete-btn").click(function () {
        const url = $(this).data("url");
        const csrf = $(this).data("csrf");

        Swal.fire({
            title: "Hapus?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya hapus",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": csrf,
                    },
                    success: function (resp) {
                        window.location.reload();
                    },
                });
            }
        });
    });

    $(".edit-skill-btn").click(function () {
        const name = $(this).data("name");
        const id = $(this).data("id");

        $("#skill_name").val(name);
        $("#skill_id").val(id);
        $("#edit-skill-modal").modal("show");
    });

    $(".edit-project-btn").click(function () {
        const id = $(this).data("id");
        const name = $(this).data("name");
        const link = $(this).data("link");
        const description = $(this).data("description");

        $("#project_id").val(id);
        $("#project_name").val(name);
        $("#project_link").val(link);
        $("#project_description").val(description);

        $("#edit-project-modal").modal("show");
    });

    $('.owl-carousel').owlCarousel({
        items: 3, // default for large screens
        autoplay: true,
        autoplayTimeout: 6000, // 6 seconds
        dots: false,
        nav: false,
        loop: true,
        responsive: {
            0: {
                items: 1 // Small screens
            },
            768: {
                items: 2 // Medium screens
            },
            1024: {
                items: 3 // Large screens
            }
        }
    });
    
});
