require('./bootstrap');

import Alpine from 'alpinejs';
import Persist from '@alpinejs/persist';
import Clipboard from "@ryangjchandler/alpine-clipboard";

Alpine.plugin(Clipboard.configure({
    onCopy: () => {
        Swal.fire('Copied.');
    }
}))

Alpine.plugin(Persist);
Alpine.plugin(Clipboard);
window.Alpine = Alpine;

Alpine.start();
