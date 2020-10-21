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

            

            $.post("/likePost/" + id, data= {"_token": $(this).next().next().val()},
                function (dato_devuelto) {
                    console.log(dato_devuelto);
                }
            );

        } else {
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

            $.post("/quitarlikePost/" + id, data= {"_token": $(this).next().next().val()},
                function (dato_devuelto) {
                    console.log(dato_devuelto);
                }
            );
        }
    });


});