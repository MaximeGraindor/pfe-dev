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

window.onload = function(){
    if(Laravel.userId) {
        $.get('/notifications', function (data) {
            addNotifications(data, "#notifications");
        });
    }
}
