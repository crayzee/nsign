$(document).ready( function() {
    $('input[type=checkbox]').change( function(e){
        
        var numbers = {};	 
        numbers['data'] = [];
        
        $('input[type=checkbox]:checked').each( function() {
            numbers['data'].push($(this).val());
        });
        
        if ($('input[type=checkbox]:checked').length < 2) {
            $('#imessage').removeClass('alert-success').addClass('alert-warning');
            $('#imessage').html('Выберите больше ингредиентов');
            $('.appendHere').html('');
        } else if ($('input[type=checkbox]:checked').length > 5) {
            $('#imessage').removeClass('alert-success').addClass('alert-warning');
            $('#imessage').html('Выберите не более 5 ингредиентов');
            $(this).prop('checked', false);
        } else if ($('input[type=checkbox]:checked').length <= 5 && $('input[type=checkbox]:checked').length >=2){
            $('#imessage').html('');
            $('#imessage').removeClass('alert-warning').addClass('alert-success');
            $.ajax({
                method:'post',
                url:'/backend2/nsign/default/receive',		 
                data : numbers,
                beforeSend : function() {
                    console.log('Отправляем на сервер отмеченные ингредиенты: ');
                    console.log(numbers)
                },
                success : function( response ){
                    $('.appendHere').html('');
                    if(response == '') {
                        $('.appendHere').append( "<li class='list-group-item'><i class='glyphicon glyphicon-minus'></i> Ничего не найдено</li>" );
                    } else {
                        $('.appendHere').append(response);
                    }
                }
            });
        }
    })
});