import './bootstrap';

const modal =document.querySelector(".modal");
const showModal =document.querySelector(".show-modal");
const closeModal =document.querySelector(".close-modal");

const modalUpdate =document.querySelector(".modal-update");
const showModalUpdate =document.querySelectorAll(".show-modal-update");

const modalAlert =document.querySelector(".modal-alert");
const showModalAlert =document.querySelector(".show-modal-alert");
const closeModalAlert =document.querySelector(".close-modal-alert");

showModal.addEventListener('click' , function () {
    const page = document.querySelector(".page");
    modal.classList.remove('hidden');
})

closeModal.addEventListener('click' , function () {
    const page = document.querySelector(".page");
    modal.classList.add('hidden');
})
//alert script
/* showModalAlert.addEventListener('click' , function () {
    console.log("kugj")
    modalAlert.classList.remove('hidden');
})

closeModalAlert.addEventListener('click' , function () {
    modalAlert.classList.add('hidden');
}) */
 

/* showModalUpdate.addEventListener('click' , function () {
    modalUpdate.classList.remove('hidden');
})
 */
/* closeModalUpdate.addEventListener('click' , function () {
    const page = document.querySelector(".page");
    modal.classList.add('hidden');
}) */
