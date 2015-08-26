$(document).ready(function(){

        // Карта проезда
        var map = new GMaps({
            div: '#map',
            lat: 55.646859,
            lng: 37.552295,
            zoom: 14,
            scaleControl: false,
            scrollwheel: false
        });

        map.addMarker({
            lat: 55.646859,
            lng: 37.552295,
            title: 'Цигун',
            infoWindow: {
                content: '<h3>Встреча пройдет по адресу:</h3><p>Москва, м. «Калужская», улица Введенского, дом 1.</p>'
            },
            icon: './assets/img/marker-mfua.png'
        });

        new WOW().init();

        // Форма регистрации
        $('.fancybox').fancybox();
        // $('form#register_form').submit(function(){
        //     $.ajax({
        //         method: "POST",
        //         url: "some.php",
        //         data: $('form#register_form').serialize()
        //     })
        //     .done(function( msg ) {
        //         alert( "Data Saved: " + msg );
        //     });
        // })

});