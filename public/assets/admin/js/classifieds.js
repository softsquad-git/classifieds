$('.accept-classifieds').click(function () {
    var id = $(this).val();
    $.ajax({
        type: 'GET',
        url: '/admin/classifieds/accept/' + id,
        success: function (data) {
            $('#accept-' + id).removeClass('accept-classifieds btn-outline-success');
            $('#accept-' + id).addClass('btn-outline-danger modal-open');
            $('#accept-' + id).attr('id', 'ban-' + id);
        },
        error: function (data) {
            alert('nie ok')
        }
    })
});

$("#submitFormLock").click(function() {
   var _token = $('#_token').val();
   var id = $('#currentAdID').val();
   var type = $('#selectType').val();
   var description = $('#description').val();
   if (_token !== '' && id !== '' && type !== '' && description !== '')
   {
       $.ajax({
           type: 'POST',
           url: '/admin/classifieds/lock/' + id,
           data: {
               '_token': _token,
               'type': type,
               'description': description
           },
           success(data){
               $('#ban-'+id).removeClass('btn-outline-danger');
               $('#ban-'+id).addClass('btn-danger');
               $('#banClassifiedsModal').modal('hide');
           },
           error(data){
               $('#errINFO').show();
               $('#errINFO').innerText = 'Coś poszło nie tak. Spróbuj ponownie';
           }
       })
   }else {
       if (_token === ''){
           alert('Odśwież stronę i spróbuj ponownie (ERR TOKEN)')
       }else if (id === ''){
           alert('Odśwież stronę i spróbuj ponownie (ERR ID)')
       }else if (type === ''){
           alert('Wybierz typ zgłoszenia')
       }else if (description === '' || description.length < 10){
           alert('Uzupełnij opis zgłoszeia')
       }else {
           alert('Wystąpił problem. Spróbuj ponownie za chwilę')
       }
   }
});
