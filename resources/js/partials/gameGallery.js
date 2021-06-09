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
                    if(this.imgThumbsAll[i].classList.contains('gallery-thumb-active')){
                        this.imgThumbsAll[i].classList.remove('gallery-thumb-active')
                    };
                    this.imgThumbsAll[i].classList.add('gallery-thumb-active')
                    this.imgBigElt.src = this.imgThumbsAll[i].src


                })
            }
        }
    }
}

export default gameGallery


