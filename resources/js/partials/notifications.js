const notifications = {
    iconNotifsElt : document.querySelector('.icon-notifications'),
    wrapperNotifsElt : document.querySelector('.notifications-wrapper'),
    init(){
        this.showNotifs()
    },

    showNotifs(){
        this.iconNotifsElt.addEventListener('click', () => {
            this.wrapperNotifsElt.classList.toggle('notifications-wrapper-active')
        })
    }
}

export default notifications


