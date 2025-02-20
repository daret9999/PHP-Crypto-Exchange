import _ from 'lodash';
window._ = _;
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

import * as Popper from '@popperjs/core';
window.Popper = Popper;

// import Popper from 'Popper';
//
//
// try {
//     // window.Popper = require('popper.js').default;
//     window.Popper = Popper.default;
//     window.$ = window.jQuery = require('jquery');
// } catch (e) {
// }

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
//
// if (process.env.MIX_BROADCAST_DRIVER === 'pusher') {
//     window.Pusher = Pusher;
//     // window.Pusher = require('pusher-js');
//
//     window.Echo = new Echo({
//         broadcaster: 'pusher',
//         key: process.env.MIX_PUSHER_APP_KEY,
//         cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//         encrypted: true
//     });
// } else if (process.env.MIX_BROADCAST_DRIVER === 'redis') {
//     window.io = require('socket.io-client');
//
//     window.Echo = new Echo({
//         broadcaster: 'socket.io',
//         host: window.location.hostname + ':' + process.env.MIX_BROADCAST_PORT
//     });
// }
