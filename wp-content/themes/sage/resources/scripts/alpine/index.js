import Alpine from 'alpinejs';
import pageTransition from './pageTransition';
import headerData from './headerData';
import quantityData from './quantityData';
export default function () {
  window.Alpine = Alpine;

  Alpine.plugin(focus);
  Alpine.data('pageTransition', pageTransition);
  Alpine.data('headerData', headerData);
  Alpine.data('quantityData', quantityData);

  Alpine.start();
}
