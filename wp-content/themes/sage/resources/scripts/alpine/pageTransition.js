import gsap from 'gsap';
export default () => ({
  enter() {
    gsap.from('#app', {
      opacity: 0,
      duration: 0.6,
      ease: 'power2.out',
    });
  },
  leave(href) {
    gsap.to('#app', {
      opacity: 0,
      duration: 0.5,
      ease: 'power2.in',
      onComplete: () => {
        window.location.href = href;
      },
    });
  },
  clickHandler(e) {
    const link = e.target.closest('a');

    const isGallery = e.target.closest('.woocommerce-product-gallery');

    if (
      link &&
      link.hostname === window.location.hostname &&
      !link.hasAttribute('target') &&
      !isGallery
    ) {
      e.preventDefault();
      this.leave(link.href);
    }
  },
});
