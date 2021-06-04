// Imports
import Echo from "laravel-echo";

import gameGallery from './partials/gameGallery'
import responsiveMenu from './partials/responsiveMenu'

gameGallery.init()
responsiveMenu.init()

const countCommentsElt = document.querySelectorAll('.feed-activity-comments');
const ListCommentsElt = document.querySelectorAll('.feed-activity-reply');

console.log(countCommentsElt);

for (let i = 0; i < countCommentsElt.length; i++) {
    countCommentsElt[i].addEventListener('click', () =>{
        console.log(countCommentsElt[i]);
        ListCommentsElt[i].classList.toggle('feed-activity-reply-disable')
    })

}

window.Echo.private('App.Models.User.1')
    .notification((notification) => {
        console.log(notification.message);
    });
