function atualizarHora() {
    var agora = new Date();
    var horas = agora.getHours().toString().padStart(2, '0');
    var minutos = agora.getMinutes().toString().padStart(2, '0');
    var segundos = agora.getSeconds().toString().padStart(2, '0');
    var horaFormatada = horas + ':' + minutos + ':' + segundos;

    document.getElementById('hora').value = horaFormatada;
}

atualizarHora(); 
setInterval(atualizarHora, 1000);

