// Função para remover os ícones de usuário dos perfis quando uma nova imagem for selecionada
function removeUserIcons() {
    const userIcons = document.querySelectorAll(".profile-img i");
    userIcons.forEach(function(icon) {
        icon.parentNode.removeChild(icon);
    });
}
function removeUserIcons2() {
    const userIcons = document.querySelectorAll(".profile-img2 i");
    userIcons.forEach(function(icon) {
        icon.parentNode.removeChild(icon);
    });
}

// Função para abrir o seletor de arquivo ao clicar no botão
document.querySelector(".upload-button button").addEventListener("click", function() {
    document.getElementById("upload-input").click();
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
            resizeAndSetProfileImages(imgData); // Chama a função para redimensionar e definir as imagens do perfil
        };

        reader.readAsDataURL(file); // Lê o arquivo como URL de dados
    }
});

// Função para redimensionar e definir as imagens do perfil
function resizeAndSetProfileImages(imgData) {
    // Redimensiona a imagem para 90x90 para o perfil do menu
    resizeImage(imgData, 90, 90, function(resizedImgDataMenu) {
        // Atualiza a imagem do perfil do menu
        const profileImgMenu = document.querySelector(".profile-img");
        profileImgMenu.style.backgroundImage = `url('${resizedImgDataMenu}')`;
        profileImgMenu.style.backgroundSize = "cover"; // Evita a repetição da imagem
        centerImage(profileImgMenu); // Re-centraliza a imagem dentro da div
    });

    // Redimensiona a imagem para 160x160 para o perfil grande
    resizeImage(imgData, 160, 160, function(resizedImgDataBig) {
        // Atualiza a imagem do perfil grande
        const profileImgBig = document.querySelector(".profile-img2");
        profileImgBig.style.backgroundImage = `url('${resizedImgDataBig}')`;
        profileImgBig.style.backgroundSize = "cover"; // Evita a repetição da imagem
        centerImage(profileImgBig); // Re-centraliza a imagem dentro da div

        removeUserIcons(); // Remove os ícones de usuário dos perfis
        removeUserIcons2(); // Remove os ícones de usuário dos perfis
    });
}


// Função para redimensionar uma imagem para um tamanho máximo mantendo a proporção
function resizeImage(imgData, maxWidth, maxHeight, callback) {
    const img = new Image();
    img.onload = function() {
        let width = img.width;
        let height = img.height;

        // Verifica se a imagem excede a largura ou a altura máxima
        if (width > maxWidth || height > maxHeight) {
            // Calcula as proporções para redimensionamento proporcional
            const ratio = Math.min(maxWidth / width, maxHeight / height);
            width *= ratio;
            height *= ratio;
        }

        // Cria um canvas para desenhar a imagem redimensionada
        const canvas = document.createElement("canvas");
        const ctx = canvas.getContext("2d");
        canvas.width = width;
        canvas.height = height;

        // Desenha a imagem redimensionada no canvas
        ctx.drawImage(img, 0, 0, width, height);

        // Converte o canvas para dados de imagem e chama a função de retorno
        callback(canvas.toDataURL("image/jpeg"));
    };
    img.src = imgData;
}

// Função para centralizar uma imagem dentro de uma div
function centerImage(element) {
    const bgImg = element.style.backgroundImage;
    if (bgImg) {
        const img = new Image();
        img.onload = function() {
            const widthDiff = element.offsetWidth - img.width;
            const heightDiff = element.offsetHeight - img.height;
            const leftOffset = widthDiff > 0 ? widthDiff / 2 + "px" : "0";
            const topOffset = heightDiff > 0 ? heightDiff / 2 + "px" : "0";
            element.style.backgroundPosition = leftOffset + " " + topOffset;
        };
        img.src = bgImg.slice(5, -2); // Remove 'url(' and ')'
    }
}