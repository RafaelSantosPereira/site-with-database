document.addEventListener("DOMContentLoaded", function () {
    var formulario = document.querySelector("form");

    formulario.addEventListener("submit", function (event) {
        if (!validarFormulario()) {
            event.preventDefault(); // Impede o envio do formulário se a validação falhar
        }
    });

    function validarFormulario() {
        
        var placaVideoSelecionada = document.getElementById("placa_video");
        var fonteSelecionada = document.getElementById("fonte");

        
        var powerPlacaVideo = placaVideoSelecionada.options[placaVideoSelecionada.selectedIndex].getAttribute('data-valor');
        var powerFonte = fonteSelecionada.options[fonteSelecionada.selectedIndex].getAttribute('data-valor2');

        
        powerPlacaVideo = parseInt(powerPlacaVideo);
        powerFonte = parseInt(powerFonte);

        // Realizar a validação
        

       
        if (powerFonte < powerPlacaVideo) {
            alert("A fonte mínima recomendada é de " + powerPlacaVideo + "w, escolha uma equivalente ou superior.");
            return false;
        }

        
        return true;
    }
});