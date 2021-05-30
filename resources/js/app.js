// Imports
import gameGallery from './partials/gameGallery'

gameGallery.init()

const countCommentsElt = document.querySelectorAll('.feed-activity-comments');
const ListCommentsElt = document.querySelectorAll('.feed-activity-reply');

console.log(countCommentsElt);

for (let i = 0; i < countCommentsElt.length; i++) {
    countCommentsElt[i].addEventListener('click', () =>{
        console.log(countCommentsElt[i]);
        ListCommentsElt[i].classList.toggle('feed-activity-reply-disable')
    })

}


/* import Pusher from "pusher-js"

Pusher.logToConsole = true;

    var pusher = new Pusher('0fc865fa9d8073e60ca6', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('follows-notification', function(data) {
      alert(JSON.stringify(data));
    }); */
