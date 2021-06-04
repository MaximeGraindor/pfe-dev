// Imports
import Echo from "laravel-echo";
window.Pusher = require('pusher-js');

import gameGallery from './partials/gameGallery'
import responsiveMenu from './partials/responsiveMenu'
import notifications from './partials/notifications'

gameGallery.init()
responsiveMenu.init()
notifications.init()

const countCommentsElt = document.querySelectorAll('.feed-activity-comments');
const ListCommentsElt = document.querySelectorAll('.feed-activity-reply');

console.log(countCommentsElt);

for (let i = 0; i < countCommentsElt.length; i++) {
    countCommentsElt[i].addEventListener('click', () =>{
        console.log(countCommentsElt[i]);
        ListCommentsElt[i].classList.toggle('feed-activity-reply-disable')
    })

}

/* window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: false,
    wsHost: window.location.hostname,
    wsPort: 6001,
});

window.Echo.private('App.Models.User.1')
    .notification((notification) => {
        console.log(notification.message);
    }); */
