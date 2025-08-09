document.addEventListener('DOMContentLoaded', function() {
    const accordionBtns = document.querySelectorAll('.accordion-button');
    
    accordionBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        const targetId = this.dataset.accordion;
        const targetAccordion = document.getElementById(targetId);
        const arrowIcon = this.querySelector('.arrow img');

        btn.classList.toggle('open');
        targetAccordion.classList.toggle('hide');

        if (targetAccordion.classList.contains('hide')) {
          targetAccordion.style.maxHeight = "0";
        } else {
          targetAccordion.style.maxHeight = targetAccordion.scrollHeight + "px";
        }

        // Toggle rotation of the arrow
        arrowIcon.classList.toggle('rotate-180');
      });
    });

    // Mobile menu toggle functionality
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuSpans = mobileMenuToggle.querySelectorAll('span');
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            // Toggle menu visibility
            mobileMenu.classList.toggle('translate-x-full');
            
            // Animate hamburger to X
            menuSpans[0].classList.toggle('rotate-45');
            menuSpans[0].classList.toggle('translate-y-2');
            menuSpans[1].classList.toggle('opacity-0');
            menuSpans[2].classList.toggle('-rotate-45');
            menuSpans[2].classList.toggle('-translate-y-2');
        });

        // Close menu when clicking on menu items
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('translate-x-full');
                menuSpans[0].classList.remove('rotate-45', 'translate-y-2');
                menuSpans[1].classList.remove('opacity-0');
                menuSpans[2].classList.remove('-rotate-45', '-translate-y-2');
            });
        });

        // Close menu when clicking outside
        mobileMenu.addEventListener('click', function(e) {
            if (e.target === mobileMenu) {
                mobileMenu.classList.add('translate-x-full');
                menuSpans[0].classList.remove('rotate-45', 'translate-y-2');
                menuSpans[1].classList.remove('opacity-0');
                menuSpans[2].classList.remove('-rotate-45', '-translate-y-2');
            }
        });
    }
  });