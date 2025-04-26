import TomSelect from 'tom-select';

export default function () {
  const observer = new MutationObserver(() => {
    const billingCountry = document.querySelector('#billing-country');

    if (billingCountry && !billingCountry.classList.contains('ts-wrapper')) {
      new TomSelect(billingCountry, {
        placeholder: 'Pasirinkite šalį...',
        allowEmptyOption: false,
        create: false,
      });

      // Once initialized, stop observing
      observer.disconnect();
    }
  });

  observer.observe(document.body, {
    childList: true,
    subtree: true,
  });
}
