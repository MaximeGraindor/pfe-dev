
const countCommentsElt = document.querySelectorAll('.feed-activity-comments');
const ListCommentsElt = document.querySelectorAll('.feed-activity-reply');

console.log(countCommentsElt);

for (let i = 0; i < countCommentsElt.length; i++) {
    countCommentsElt[i].addEventListener('click', () =>{
        console.log(countCommentsElt[i]);
        ListCommentsElt[i].classList.toggle('feed-activity-reply-disable')
    })

}
