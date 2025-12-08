// CONTROLE DO MODAL DE ADICIONAR PLANTA
var modal = document.getElementById("modal")
var btnCloseModal = document.getElementById("cancel-new-plant-btn")
var btnOpenModal = document.getElementById("add-plant-btn")

// funções
btnCloseModal.onclick = function() {
    modal.style.display = "none"
}

btnOpenModal.onclick = function(){
    modal.style.display = "block"
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none"
    }
    isModalOpen = !isModalOpen
}