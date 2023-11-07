document.addEventListener("DOMContentLoaded", function () {
    var cepElement = document.getElementById('cep');
    if (cepElement) {
        // Adicionando a função buscarCep ao evento blur do campo CEP
        cepElement.addEventListener('blur', buscarCep);

        // Associando a função buscarCep ao clique do botão
        var buscarCepBtn = document.getElementById('buscarCepBtn');
        if (buscarCepBtn) {
            buscarCepBtn.addEventListener('click', buscarCep);
        }
    }
});

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
