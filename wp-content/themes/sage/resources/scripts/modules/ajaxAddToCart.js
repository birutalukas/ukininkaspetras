export default function () {
  document.querySelectorAll('.ajax-add-to-cart').forEach((button) => {
    button.addEventListener('click', async (e) => {
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
        // Send the request to the AJAX handler
        const response = await fetch(ajax_object.ajax_url, {
          method: 'POST',
          body: formData,
        });

        // Parse the response as JSON
        const data = await response.json();

        if (data.success) {
          const { product_id } = data.data;

          button.classList.remove('loading'); // Done loading
          button.classList.add('added'); // Done loading

          // Optionally trigger custom event to handle feedback
          window.dispatchEvent(
            new CustomEvent('added_to_cart', {
              detail: { button: button },
            })
          );
        }
      } catch (error) {
        console.error('AJAX Add to Cart Error:', error);
        button.classList.remove('loading'); // Done loading
      }
    });
  });

  // // Optional: Provide feedback on button click
  window.addEventListener('added_to_cart', (e) => {
    const { button } = e.detail;
    button.innerText = 'Pridėta!';

    setTimeout(() => {
      button.innerText = 'Į krepšelį';
    }, 2000);
  });
}
