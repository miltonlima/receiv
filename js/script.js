$(document).click(function () {
  $('.cpf').mask('000.000.000-00');
  $('.data').mask('00/00/0000');
  $('.valor').mask("#.##0,00", {reverse: true});

});

