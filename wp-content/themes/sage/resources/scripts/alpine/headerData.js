export default () => ({
  lastScroll: 0,
  isScrollingDown: false,
  isHeaderFilled: false,
  isScrolled: false,
  count: 0,

  initHeader() {
    this.lastScroll = window.scrollY;
    window.addEventListener('scroll', () => this.handleScroll());
  },

  handleScroll() {
    const currentScroll = window.scrollY;
    console.log('Current:', currentScroll, 'Last:', this.lastScroll);

    if (currentScroll > 100) {
      this.isScrollingDown = currentScroll > this.lastScroll;
      this.isHeaderFilled = currentScroll >= 150;
      this.isScrolled = currentScroll >= 150;
    }
    this.lastScroll = currentScroll;
  },

  fetchCart() {
    fetch(ajax_object.ajax_url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({
        action: 'get_cart_count',
        security: ajax_object.ajax_nonce,
      }),
    })
      .then((res) => res.json())
      .then((data) => {
        const newCount = data.data.count || 0;

        if (newCount > 0 && this.count !== newCount) {
          this.isScrollingDown = false;
          this.isScrolled = true; // Reveal header
          this.isHeaderFilled = true;
          setTimeout(() => {
            this.triggerCartAnimation();
          }, 1000);
        }

        this.count = newCount;
      })
      .catch((err) => {
        console.error('Failed to fetch cart count:', err);
      });
  },

  triggerCartAnimation() {
    const cartEl = document.getElementById('cart-count');

    if (!cartEl) return;

    cartEl.classList.add('animate-cart-ping');

    // Remove class after animation ends (or after delay)
    setTimeout(() => {
      cartEl.classList.remove('animate-cart-ping');
    }, 1000); // Match this with your animation duration
  },
});
