const gameGallery = {
    imgBigElt : document.querySelector('.gallerry-current-img'),
    imgThumbsAll : document.querySelectorAll('.gallery-thumb-img'),
    init(){
        console.log('HELLO WORLD CECI ETS UN TEST');
        this.changeImage()
    },

    changeImage(){
        for (let i = 0; i < this.imgThumbsAll.length; i++) {
            this.imgThumbsAll[i].addEventListener('click', () => {
                this.imgBigElt.src = this.imgThumbsAll[i].src
            })
        }
    }
}

export default gameGallery

