import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        const savedTheme = localStorage.getItem('user-theme');
        if (savedTheme) {
            this.select(savedTheme);
        } else {
            const defaultTheme = document.documentElement.getAttribute('data-bs-theme') || 'light';
            this.select(defaultTheme);
        }
    }
    switch() {
        let currentTheme = localStorage.getItem('user-theme');
        if (!currentTheme) {
            currentTheme = document.documentElement.getAttribute('data-bs-theme');
        }

        const theme = currentTheme === 'dark' ? 'light' : 'dark';

        this.select(theme);
    }

    select (theme) {
        clearTimeout(this.timeout);

        this.element.setAttribute('data-switch', theme);
        localStorage.setItem('user-theme', theme);

        this.timeout = setTimeout(() => {
            /**
             * Small delay to allow CSS transitions during theme switch.
             */
            document.documentElement.setAttribute('data-bs-theme', theme);
        }, 250);
    }
}
