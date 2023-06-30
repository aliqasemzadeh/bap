window._ = require('lodash');	import '@popperjs/core';

/**	import axios from 'axios';
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support	window.axios = axios;
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

import '@popperjs/core'

const bootstrap = require('bootstrap')

window.bootstrap = bootstrap;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.Chart = require('chart.js');	import Chart from 'chart.js/auto';

import Swal from 'sweetalert2';

window.Swal = require('sweetalert2');	import '../../vendor/aliqasemzadeh/livewire-bootstrap-modal/resources/js/modals';

require('../../vendor/aliqasemzadeh/livewire-bootstrap-modal/resources/js/modals');
