import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        this.setupSmoothScroll();
        this.setupScrollEvent();
    }

    setupSmoothScroll() {
        const navbarLinks = this.element.querySelectorAll('a[href^="#"]');

        navbarLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    const headerOffset = this.element.querySelector('.navbar').offsetHeight;
                    const elementPosition = targetElement.getBoundingClientRect().top + window.scrollY;
                    const offsetPosition = elementPosition - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth',
                    });
                }
            });
        });
    }

    setupScrollEvent() {
        const navbar = this.element.querySelector('.navbar');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.remove('opaque');
                navbar.classList.add('transparent');
            } else {
                navbar.classList.remove('transparent');
                navbar.classList.add('opaque');
            }
        });
    }
}
