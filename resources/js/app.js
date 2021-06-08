// Imports
import Echo from "laravel-echo";
window.Pusher = require('pusher-js');

import gameGallery from './partials/gameGallery'
import responsiveMenu from './partials/responsiveMenu'
import notifications from './partials/notifications'
import comments from './partials/comments'
import password from './partials/password'

gameGallery.init()
responsiveMenu.init()
notifications.init()
comments.init()
password.init()

window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
const token = document.head.querySelector('meta[name="csrf-token"]')
if (token) {
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        forceTLS: true,
        wsHost: window.location.hostname,
        wsPort: 6001,
        disableStats: true,
        auth: {
            headers: {
                Authorization: 'Bearer ' + token.content
            },
        },
    });

    window.Echo.private('App.Models.User.2')
    .notification((notification) => {
        console.log(notification, 'new notification on realtime');
    });
}




