$(document).ready(function () {
    function formatCEP(value) {
        // Remove qualquer caractere não numérico
        var cleanedValue = value.replace(/\D/g, '');

        // Garante que não há zeros à esquerda
        cleanedValue = cleanedValue.replace(/^0+/, '');

        // Limita o tamanho máximo a 8 caracteres
        cleanedValue = cleanedValue.substring(0, 8);

        // Aplica máscara para CEP
        return cleanedValue.replace(/(\d{5})(\d{3})/, '$1-$2');
    }

    // Adiciona evento de input ao campo CEP
    $("#cep").on('input', function () {
        var maskedValue = formatCEP($(this).val());
        $(this).val(maskedValue);
    });

    // Restante do código relacionado ao CEP
    var cepElement = document.getElementById('cep');
    if (cepElement) {
        cepElement.addEventListener('blur', buscarCep);
        var buscarCepBtn = document.getElementById('buscarCepBtn');
        if (buscarCepBtn) {
            buscarCepBtn.addEventListener('click', buscarCep);
        }
    }

    function buscarCep() {
        var cep = document.getElementById('cep').value;
        var url = `https://viacep.com.br/ws/${cep}/json/`;

        fetch(url)
            .then(response => response.json())
            .then(data => preencherFormulario(data))
            .catch(error => console.error('Erro ao buscar CEP:', error));
    }

    function preencherFormulario(data) {
        document.getElementById('logradouro').value = data.logradouro || '';
        document.getElementById('bairro').value = data.bairro || '';
        document.getElementById('cidade').value = data.localidade || '';
        document.getElementById('estado').value = data.uf || '';
        // Adicione os outros campos conforme necessário
    }
});
