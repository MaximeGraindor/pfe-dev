const password = {
    spanElt : document.querySelectorAll('.password-action'),
    inputPasswordElt : document.querySelectorAll('.password-wrapper-show input'),
    init(){
        this.showPassword()
        console.log(this.spanElt);
    },

    showPassword(){
        if (this.spanElt) {
            for (let i = 0; i < this.spanElt.length; i++) {
                this.spanElt[i].addEventListener('click', () => {
                    this.spanElt[i].classList.toggle('hide-password')
                    if (this.inputPasswordElt[i].type === "password") {
                        this.inputPasswordElt[i].attributes["type"].value = "text"
                    }else if(this.inputPasswordElt[i].type === "text"){
                        this.inputPasswordElt[i].attributes["type"].value = "password"
                    }
                })
            }

        }
    }
}

export default password


