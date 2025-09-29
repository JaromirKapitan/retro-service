import Notify from 'simple-notify'
import 'simple-notify/dist/simple-notify.css'

export default class Notification {
    constructor(){
        document.addEventListener('livewire:init', () => {
            Livewire.on('notify', event => {
                this.notify(event[0], event[1]);
            });
        });

        if (window.notifications !== undefined && window.notifications.length > 0) {
            window.notifications.forEach(notification => {
                this.notify(notification.message, notification.type);
            })
        }
    }

    notify (message, type = "success") {
        this[type](message);
    }

    info (message) {
        new Notify({
            status: 'info',
            title: message,
            speed: 300,
            autoclose: true,
            autotimeout: 5000,
            // position: 'right bottom'
        })
    }

    success(message) {
        new Notify({
            status: 'success',
            title: message,
            speed: 300,
            autoclose: true,
            autotimeout: 3000,
            // position: 'right bottom'
        })
    }

    warning(message) {
        new Notify({
            status: 'warning',
            title: message,
            autoclose: false,
            // position: 'right bottom'
        })
    }

    error(message) {
        new Notify({
            status: 'error',
            title: message,
            autoclose: false,
            // position: 'right bottom'
        })
    }
}
