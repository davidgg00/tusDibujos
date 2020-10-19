$(document).ready(function () {
    $(".likeImagen").on("click", function (evento) {
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
        }
    });
});