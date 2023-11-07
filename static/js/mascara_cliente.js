$(document).ready(function() {
    function formatCPFCNPJ(value) {
        // Remove qualquer caractere não numérico
        var cleanedValue = value.replace(/\D/g, '');

        // Limita o tamanho máximo a 14 caracteres
        cleanedValue = cleanedValue.substring(0, 14);

        // Verifica o tamanho do valor para determinar se é CPF ou CNPJ
        if (cleanedValue.length <= 11) {
            // Aplica máscara para CPF
            return cleanedValue.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        } else {
            // Aplica máscara para CNPJ
            return cleanedValue.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
        }
    }

    $("#cpfCnpj").on('input', function() {
        var maskedValue = formatCPFCNPJ($(this).val());
        $(this).val(maskedValue);
    });

    // Verifica se a biblioteca jQuery Mask está carregada antes de usar
    if (typeof $.fn.mask !== 'undefined') {
        // Máscaras para Telefone e Celular
        $("#telefone").mask("(00) 0000-0000");
        $("#celular").mask("(00) 00000-0000");

        // Restante do código relacionado às máscaras
        $('.date').mask('00/00/0000');
        // ... outras máscaras
    } else {
        console.error('jQuery Mask não está carregado corretamente.');
    }
});
