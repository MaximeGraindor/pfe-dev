const password = {
    spanElt : document.querySelector('.password-action'),
    inputPasswordElt : document.querySelector('.password-wrapper-show input'),
    init(){
        this.showPassword()
    },

    showPassword(){
        if (this.spanElt) {
            this.spanElt.addEventListener('click', () => {
                this.spanElt.classList.toggle('hide-password')
                if (this.inputPasswordElt.type === "password") {
                    this.inputPasswordElt.attributes["type"].value = "text"
                }else if(this.inputPasswordElt.type === "text"){
                    this.inputPasswordElt.attributes["type"].value = "password"
                }
            })
        }
    }
}

export default password


