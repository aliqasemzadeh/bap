require('./bootstrap');

import Clipboard from "@ryangjchandler/alpine-clipboard";

Alpine.plugin(Clipboard.configure({
    onCopy: () => {
        Swal.fire('Copied.');
    }
}));


Alpine.plugin(Clipboard);
