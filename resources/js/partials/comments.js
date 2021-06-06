const comments = {
    countCommentsElt : document.querySelectorAll('.feed-activity-comments'),
    ListCommentsElt : document.querySelectorAll('.feed-activity-reply'),
    init(){
        this.showComments()
    },

    showComments(){
        for (let i = 0; i < this.countCommentsElt.length; i++) {
            this.countCommentsElt[i].addEventListener('click', () =>{
                this.ListCommentsElt[i].classList.toggle('feed-activity-reply-disable')
            })

        }
    }
}

export default comments






