// Seleciona o botão e o input de upload
const uploadBtn = document.querySelector('.upload-button button');
const uploadInput = document.getElementById('upload-input');

// Adiciona um evento de clique no botão
uploadBtn.addEventListener('click', function() {
    uploadInput.click(); // Simula o clique no input de upload
});
// Função para lidar com a alteração do input file
document.getElementById("upload-input").addEventListener("change", function(event) {
    const file = event.target.files[0]; // Pega o arquivo selecionado

    // Verifica se o arquivo é uma imagem
    if (file && file.type.startsWith("image")) {
        const reader = new FileReader(); // Cria um objeto FileReader

        // Função que é executada quando o arquivo é lido
        reader.onload = function(e) {
            const imgData = e.target.result; // Obtém os dados da imagem
            updateProfileImages(imgData); // Chama a função para atualizar as imagens do perfil
        }

        reader.readAsDataURL(file); // Lê o arquivo como URL de dados
    }
});

// Função para atualizar as imagens do perfil
function updateProfileImages(imgData) {
    // Atualiza a imagem do perfil grande
    const profileImgBig = document.querySelector(".profile-img2");
    profileImgBig.style.backgroundImage = `url('${imgData}')`;

    // Atualiza a imagem do perfil do menu
    const profileImgMenu = document.querySelector(".profile-img");
    profileImgMenu.style.backgroundImage = `url('${imgData}')`;
}
// Função para lidar com a alteração do input file
document.getElementById("upload-input").addEventListener("change", function(event) {
    const file = event.target.files[0]; // Pega o arquivo selecionado

    // Verifica se o arquivo é uma imagem
    if (file && file.type.startsWith("image")) {
        const reader = new FileReader(); // Cria um objeto FileReader

        // Função que é executada quando o arquivo é lido
        reader.onload = function(e) {
            const img = new Image();
            img.src = e.target.result;

            // Cria um canvas para redimensionar a imagem
            const canvas = document.createElement("canvas");
            const ctx = canvas.getContext("2d");

            // Define as dimensões do canvas de acordo com o tamanho desejado
            const maxSize = 160; // Tamanho máximo da imagem
            const targetSize = 90; // Tamanho alvo da imagem para o menu
            const scale = Math.min(maxSize / img.width, maxSize / img.height);
            const targetScale = targetSize / Math.max(img.width, img.height);
            const width = img.width * scale;
            const height = img.height * scale;

            canvas.width = width;
            canvas.height = height;

            // Desenha a imagem redimensionada no canvas
            ctx.drawImage(img, 0, 0, width, height);

            // Obtém os dados da imagem do canvas
            const imgData = canvas.toDataURL("image/jpeg");

            // Atualiza as imagens do perfil
            updateProfileImages(imgData);
        };

        reader.readAsDataURL(file); // Lê o arquivo como URL de dados
    }
});

// Função para atualizar as imagens do perfil
function updateProfileImages(imgData) {
    // Atualiza a imagem do perfil grande
    const profileImgBig = document.querySelector(".profile-img2");
    profileImgBig.style.backgroundImage = `url('${imgData}')`;

    // Atualiza a imagem do perfil do menu
    const profileImgMenu = document.querySelector(".profile-img");
    profileImgMenu.style.backgroundImage = `url('${imgData}')`;
}