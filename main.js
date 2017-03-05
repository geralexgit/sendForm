$(document).ready(function() {
    var sendOk = function() {
        $('form').css('text-align', 'center');
        $('form').css('background', 'rgba(255,255,255,0.8)');
        $('form').css('padding', '15px');
        $('form').css('border-radius', '15px');
        $('#five h4').css('display', 'none');
        $('form').html('<h3>Ваша заявка на регистрацию отправлена!</h3>');
    }
    $('.send_btn').on('click', function() {
        var ready2sent = true;
        if (!$("input[name='name']").val()) {
            $("input[name='name']").css("border-color", "#ff0000");
            ready2sent = false;
        } else
            $("input[name='name']").css("border-color", "#ffffff");

        if (!$("input[name='phone']").val()) {
            $("input[name='phone']").css("border-color", "#ff0000");
            ready2sent = false;
        } else
            $("input[name='phone']").css("border-color", "#ffffff");

        if (ready2sent) {
            var msg = $('#send_form').serialize();
            //console.log(msg);
            $.ajax({
                type: "post",
                url: "sendmail.php",
                data: msg,
                cache: false,
                success: sendOk()
            });
        }
        return false;
    });
});