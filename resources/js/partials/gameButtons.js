const gameButtons = {
    openCtaElt : document.querySelectorAll('.open-cta'),
    buttonConteneur : document.querySelectorAll('.activity-game-card-button-wrapper'),
    init(){
        this.showgameButtons()
    },

    showgameButtons(){
        for (let i = 0; i < this.openCtaElt.length; i++) {
            this.openCtaElt[i].addEventListener('click', () =>{
                this.buttonConteneur[i].classList.toggle('activity-cta-active')
                this.openCtaElt[i].classList.toggle('close-cta')
            })

        }
    }
}

export default gameButtons






