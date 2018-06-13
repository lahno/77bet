<!-- Кнопка "Вверх" -->
<div class="top hvr-sink" title="Наверх">
    <i class="fal fa-chevron-double-up"></i>
</div>

<script src="{{asset('js/vendor.js')}}"></script>

<!-- Валидация -->
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>

<!-- График -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

<!--Кастомные скрипты -->
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

<style>
    input.error{
        border: 1px solid red;
    }
</style>
@if (session('save_settings'))
    <script>
        var modal_message = $('#modal_message');
        modal_message.find('h3').text("{{session('save_settings')}}");
        modal_message.find('.rate-description').remove();
        modal_message.modal('show');
    </script>
@endif
@if(Route::currentRouteName() == 'index')
<script>
    @if (session('show_login_form'))
        $('#modal_authorization').modal('show');
    @endif

    // Chart
    var ctx = document.getElementById("myChart").getContext('2d'),
        array = "{{$settings->graph}}";

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: array.split(", "),
            datasets: [{
                label: 'день, показатель',
                data: [5, 36, 46, 62, 72],
                backgroundColor: [
                    'rgba(124, 85, 226, .7)'
                ],
                borderColor: [
                    '#ECBF9B'
                ],
                borderWidth: 7,
                backdropColor:[
                    'rgba(124, 85, 226, .7)'
                ]
            }]
        },
        options: {
            tooltips: {
                mode: 'x'
                //axis: 'y'
            },
            legend: {
                display: false,
                labels: {
                    fontColor: 'rgb(0, 0, 0, 1)',
                    fontSize: 36
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

    function countF(){
        var persent = $('#persent span').html();
        var gain = $('#gain span').html();
        var number_bets = $('#number_bets span').html();
        var k = 0;
        function countFull(){
            if( persent < "{{($settings)?$settings->block_1_1:''}}" ) persent++;
            else{
                persent = "{{($settings)?$settings->block_1_1:''}}";
            }
            if( gain < "{{($settings)?$settings->block_1_2:''}}" )
            {
                k++;
                gain++;
            }
            else{
                gain = "{{($settings)?$settings->block_1_2:''}}";
                clearTimeout(timer);
            }
            if( number_bets < "{{($settings)?$settings->block_1_3:''}}" ) number_bets++;
            else{
                number_bets = "{{($settings)?$settings->block_1_3:''}}";
            }
            $('#persent span').html(persent);
            $('#gain span').html(gain);
            $('#number_bets span').html(number_bets);
        }
        var timer = setInterval(countFull, 10);
    }

    $("#confidence").waypoint( function(dir) {
        if ( dir === 'down' ){
            countF();
        }
    }, {offset: '80%'});

</script>
@endif