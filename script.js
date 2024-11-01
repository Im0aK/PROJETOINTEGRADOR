// CODIGO DO ZAP
function sendWhatsAppMessage(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    // Obtém os valores do formulário
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    // Número de telefone para o qual a mensagem será enviada
    const phoneNumber = "5516988152273"; // Substitua pelo número de destino, no formato com código do país

    // Monta a URL do WhatsApp com a mensagem
    const whatsappURL = `https://wa.me/${phoneNumber}?text=Olá, meu nome é ${encodeURIComponent(name)}. Meu e-mail é ${encodeURIComponent(email)}. %0A%0AMensagem: ${encodeURIComponent(message)}`;

    // Abre o link do WhatsApp em uma nova aba
    window.open(whatsappURL, "_blank");
}



// Mostrar ou esconder o botão "Voltar ao Topo"
window.onscroll = function() {
    const button = document.getElementById('backToTop');
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        button.style.display = "block"; // Mostrar o botão
    } else {
        button.style.display = "none"; // Esconder o botão
    }
};

// Voltar ao topo ao clicar no botão
document.getElementById('backToTop').onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' }); // Rolagem suave
};


// captura de tela

function expandImage(img) {
    const modal = document.querySelector(".modal");
    const modalImg = document.getElementById("expandedImg");
    modal.style.display = "block";
    modalImg.src = img.querySelector("img").src;
}

function closeModal() {
    document.querySelector(".modal").style.display = "none";
}
