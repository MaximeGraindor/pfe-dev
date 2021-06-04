const responsiveMenu = {
    imgElt : document.querySelector('.dashboard-top-menu-responsive img'),
    sidebarElt : document.querySelector('.dashboard-sidebar'),
    init(){
        this.showSidebar()
    },

    showSidebar(){
        this.imgElt.addEventListener('click', () => {
            this.sidebarElt.classList.toggle('sidebar-menu-responsive')
        })
    }
}

export default responsiveMenu


