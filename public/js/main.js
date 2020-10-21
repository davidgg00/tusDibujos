$(document).ready(function () {
    $(".likeImagen").on("click", function (evento) {
        let id = $(this).attr('id');

        if ($(this).hasClass('likeFalse')) {
            $(this).fadeOut(250, function (evento) {
                //   $(this).attr('display', 'none');
                $(this).attr('src', '../images/like_1.svg');
                $(this).fadeIn(300);
            });

            let val = $(this).next().html();
            val++;
            $(this).next().html(val);

            $(this).removeClass('likeFalse');
            $(this).addClass('likeTrue');

            $.post("/likePost/" + id, data = { "_token": $(this).next().next().val() },
                function (dato_devuelto) {
                    console.log(dato_devuelto);
                }
            );

        } else if ($(this).hasClass('likeTrue')) {
            $(this).fadeOut(250, function (evento) {
                //   $(this).attr('display', 'none');
                $(this).attr('src', '../images/like_0.svg');
                $(this).fadeIn(300);
            });

            let val = $(this).next().html();
            val--;
            $(this).next().html(val);

            $(this).removeClass('likeTrue');
            $(this).addClass('likeFalse');

            $.post("/quitarlikePost/" + id, data = { "_token": $(this).next().next().val() },
                function (dato_devuelto) {
                    console.log(dato_devuelto);
                }
            );
        } else {
            Command: toastr["warning"]("Para poder dar like a publicaciones debes de haber iniciado sesión antes", "Debes iniciar sesión")

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }
    });


});