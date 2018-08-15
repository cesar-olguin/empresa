
$('#registro').click(function(){

  var form = $('#formulario_altas').serialize();

  $.ajax({
    method: 'POST',
    url: '../../controller/agregarAltas.php',
    data: form,
    success: function(res){

    }
  });

});
