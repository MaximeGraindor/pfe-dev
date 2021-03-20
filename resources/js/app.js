const selectbox = document.querySelectorAll('.selectBox')
const checkboxesEl = document.querySelector('.checkboxes')

console.log(selectbox);

for (let i = 0; i < selectbox.length; i++) {

    console.log(
        selectbox[i]
    );

    selectbox[i].addEventListener('click', () => {
        checkboxesEl.classList.toggle('checkboxesEl-on')
        console.log(
            selectbox[i]
        );
    })



}


