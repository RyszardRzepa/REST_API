
/*
$(document).ready(function(){

    var $url = "http://date.jsontest.com/";
    var $context= $('.content');
    $.ajax({url: $url,context: $context})
        .done(function(data){
       // $(this).text(data.date);
            $.each(data, function(key,value){
                $('.content').append('<tr><td>'+key+ '</td><td>'+value+'</td></tr>');
            });
           // $(this).text(data);
    });
});




    $('.button').click(function(){
        $.getJSON('http://date.jsontest.com/', function (obj){
            $.each(obj, function (key,value) {
                $('ul').append('<li>' + value.name)+'</li>';
                
            });
        });
    });
});
 ?php

 $colors = [];

 $color = [
 'name'=> 'blue',
 'favorite'=> 'true'
 ];
 $colors []= $color;

 $color = [
 'name'=> 'red',
 'favorite'=> 'false',

 ];

 //$colors+=$color;
 //var_dump($colors);

 echo "Zmiwniam na Json";

 $colorsJson = json_encode($colors);
 //header('Content-type: application/json'); // header- to co wyswietla strona jest typu Json.
 echo "$colorsJson";
 ?>
 */
