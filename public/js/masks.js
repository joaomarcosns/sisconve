$(document).ready(function(){
    $('.phone').mask('0 00000-0000');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.uf').mask('AA');
    $('.numero').mask('00000');
    $('.cep').mask('00000-000');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.rg').mask('00.000.000-0', {reverse: true});
    $('.ddd').mask('00');
});