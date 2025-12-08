// CONTROLE DO MODAL DE APAGAR PLANTA
console.log("rodou")
var btnOpenModal = document.getElementById("delete-modal-btn")
var modal = document.getElementById("modal")
var btnCloseModal = document.getElementById("cancel-new-plant-btn")

// listeners
btnOpenModal.onclick = function () {
    modal.style.display = "block"
}

btnCloseModal.onclick = function () {
    modal.style.display = "none"
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none"
    }
    isModalOpen = !isModalOpen
}