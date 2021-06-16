const reply = {
    RepliesButtonSpanElt : document.querySelectorAll('.reply-item-bottom-form'),
    formRepliesElt : document.querySelectorAll('.reply-form-disable'),
    init(){
        this.showReplies()
        console.log(this.RepliesButtonSpanElt);
        console.log(this.formRepliesElt);
    },

    showReplies(){
        for (let i = 0; i < this.RepliesButtonSpanElt.length; i++) {
            this.RepliesButtonSpanElt[i].addEventListener('click', () =>{
                this.formRepliesElt[i].classList.toggle('reply-form-active')
            })

        }
    }
}

export default reply






