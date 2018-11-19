"use strict";

$(function(){
    //если есть фильтр по цене, то сделаем ползунок
    if($('#slider-range').length){
        //фильтр по цене
        var $form = $('#slider-range').closest('form'),
            url = $form.attr('action'),
            result_url = url,
            current_min = $('#p_min').val(),
            current_max = $('#p_max').val(),
            range_min   = $('#p_min').data('extremum'),
            range_max   = $('#p_max').data('extremum');

        $( "#slider-range" ).slider({
        	range: true,
        	min: range_min,
        	max: range_max,
        	values: [current_min, current_max],
        	slide: function( event, ui ) {
                //изменение видимых значений при движении ползунка
            	$('#selected_prices_min').html( ui.values[ 0 ] );
                $('#selected_prices_max').html( ui.values[ 1 ] );
            	$( "#p_min" ).val( ui.values[ 0 ] );
            	$( "#p_max" ).val( ui.values[ 1 ] );
        	},
            stop: function( event, ui ){
                //изменение видимых значений после остановки ползунка
                $('#selected_prices_min').html( ui.values[ 0 ] );
                $('#selected_prices_max').html( ui.values[ 1 ] );
                $( "#p_min" ).val( ui.values[ 0 ] );
            	$( "#p_max" ).val( ui.values[ 1 ] );
                result_url = url;
            	if($( "#p_min" ).val() != $( "#p_min" ).data('extremum')){
                    result_url += '/price-min=' + $( "#p_min" ).val();
                }
                if($( "#p_max" ).val() != $( "#p_max" ).data('extremum')){
                    result_url += '/price-max=' + $( "#p_max" ).val();
                }
                window.location = result_url;
            }
    	});
    }
});