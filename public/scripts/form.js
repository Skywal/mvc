$(document).ready(function () { // виконуватиметься тільки після повної загрузки html документу
    $('form').submit(function (event) { // звернення до всіх форм на сайті
        var json;
        event.preventDefault(); //відправка форми у браузері відмінена

        $.ajax({
            type: $(this).attr('method'), //тут буде POST бо у формі це вказано
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                json = jQuery.parseJSON(result);
                if(json.url){
                    window.location.href = json.url;
                } else {
                    alert(json.status + ' - ' + json.message);
                }
            },
        });
    });

});