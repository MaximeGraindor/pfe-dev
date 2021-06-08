const gameGallery = {
    imgBigElt : document.querySelector('.gallerry-current-img'),
    imgThumbsAll : document.querySelectorAll('.gallery-thumb-img'),
    init(){
        this.changeImage()
    },

    changeImage(){
        if (this.imgThumbsAll) {
            for (let i = 0; i < this.imgThumbsAll.length; i++) {
                this.imgThumbsAll[i].addEventListener('click', () => {
                    this.imgBigElt.src = this.imgThumbsAll[i].src
                })
            }
        }
    }
}

export default gameGallery


