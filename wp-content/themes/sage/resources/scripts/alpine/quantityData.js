export default () => ({
  qty: 1,

  init() {
    const input = this.$refs.input;

    if (!input) return;

    this.qty = parseInt(input.value) || 1;

    input.addEventListener('input', () => {
      this.qty = parseInt(input.value) || 1;
    });
  },

  increment() {
    const input = this.$refs.input;
    if (!input) return;

    const max = parseInt(input.max) || Infinity;
    const step = parseInt(input.step) || 1;

    if (this.qty + step <= max) {
      this.qty += step;
      input.value = this.qty;
      input.dispatchEvent(new Event('change', { bubbles: true }));
    }
  },

  decrement() {
    const input = this.$refs.input;
    if (!input) return;

    const min = parseInt(input.min) || 1;
    const step = parseInt(input.step) || 1;

    if (this.qty - step >= min) {
      this.qty -= step;
      input.value = this.qty;
      input.dispatchEvent(new Event('change', { bubbles: true }));
    }
  },
});
