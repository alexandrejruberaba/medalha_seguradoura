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

    function formatTelefone(value) {
        // Remove qualquer caractere não numérico
        var cleanedValue = value.replace(/\D/g, '');

        // Limita o tamanho máximo a 11 caracteres
        cleanedValue = cleanedValue.substring(0, 11);

        // Verifica se é um telefone celular ou fixo
        if (cleanedValue.length === 11) {
            // Aplica máscara para telefone celular
            return cleanedValue.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        } else {
            // Aplica máscara para telefone fixo
            return cleanedValue.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
        }
    }

    $("#cpfCnpj").on('input', function() {
        var maskedValue = formatCPFCNPJ($(this).val());
        $(this).val(maskedValue);
    });

    $("#telefone").on('input', function() {
        var maskedValue = formatTelefone($(this).val());
        $(this).val(maskedValue);
    });

    $("#celular").on('input', function() {
        var maskedValue = formatTelefone($(this).val());
        $(this).val(maskedValue);
    });



});
