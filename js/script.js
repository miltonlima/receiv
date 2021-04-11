$(document).click(function () {
  //$("#info[1]").mask("999.999.999-99");
  //console.log('teste')
  //input = document.getElementsByName(dado)
  //console.log(Object.keys('dados[1]').value)
  //input = document.getElementsByName('info[]');
  //console.log('1'+input[1].value)
  //$(input[1]).mask("999.999.999-99");
  //console.log()
  // $('input').keyup(function(){
  //   $('#cpf').mask("999.999.999-99");
  //   console.log('a')
  // })

  $('.cpf').mask('000.000.000-00');
  $('.data').mask('00/00/0000');
  $('.valor').mask("#.##0,00", {reverse: true});

});

