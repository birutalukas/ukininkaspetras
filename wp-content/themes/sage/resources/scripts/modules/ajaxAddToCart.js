export default function () {
  document.addEventListener('click', async (e) => {
    const button = e.target.closest('.ajax-add-to-cart');
    const isCartPage = e.target.closest('.woocommerce-cart');

    if (!button) return; // Not a cart button, ignore

    e.preventDefault();

    const productID = button.value || button.getAttribute('data-product_id');

    if (!productID) {
      console.error('Product ID is missing!');
      return;
    }

    const quantityInput = button.closest('form')?.querySelector('input.qty');
    const quantity = quantityInput ? parseInt(quantityInput.value) || 1 : 1;

    button.innerHTML = '';
    button.classList.add('loading'); // Woo adds spinner via CSS

    const formData = new FormData();
    formData.append('action', 'ajax_add_to_cart');
    formData.append('product_id', productID);
    formData.append('quantity', quantity);
    formData.append('security', ajax_object.ajax_nonce);

    try {
      const response = await fetch(ajax_object.ajax_url, {
        method: 'POST',
        body: formData,
      });

      const data = await response.json();

      if (data.success) {
        button.classList.remove('loading');
        button.classList.add('added');

        window.dispatchEvent(
          new CustomEvent('added_to_cart', {
            detail: { button },
          })
        );

        if (isCartPage) {
          jQuery(document.body).trigger('added_to_cart');
          jQuery(document.body).trigger('wc_fragment_refresh');
        }
      }
    } catch (error) {
      console.error('AJAX Add to Cart Error:', error);
      button.classList.remove('loading');
    }
  });

  // Feedback after add to cart
  window.addEventListener('added_to_cart', (e) => {
    const { button } = e.detail;
    button.innerText = 'Pridėta!';

    setTimeout(() => {
      button.innerText = 'Į krepšelį';
    }, 2000);
  });
}
