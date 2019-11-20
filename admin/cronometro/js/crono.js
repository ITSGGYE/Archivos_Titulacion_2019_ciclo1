$(document).ready(function(){

    var tiempo = {
        hora: 0,
        minuto: 0,
        segundo: 0
    };

    var 
    running_time = null;

    $(".start").click(function(){
        if ($(this).text() == 'Start' || $(this).text() == 'Restart')
        {
            $(this).text('Pause');
            $(this).parent().addClass('active-btn');         
            
            running_time = setInterval(function(){
                // Segundos
                tiempo.segundo++;
                if(tiempo.segundo >= 60)
                {
                    tiempo.segundo = 0;
                    tiempo.minuto++;
                }      

                // Minutos
                if(tiempo.minuto >= 60)
                {
                    tiempo.minuto = 0;
                    tiempo.hora++;
                }

                $("#hour").text(tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora);
                $("#minute").text(tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto);
                $("#second").text(tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo);
            }, 1000);
        }
        else 
        {
            $(this).text('Restart');
            $(this).parent().removeClass('active-btn');
            clearInterval(running_time);
        }
    });
    $('.stop').click(function(){
        location.reload();
    });
});