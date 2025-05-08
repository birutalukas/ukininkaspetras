import domReady from '@roots/sage/client/dom-ready';
import alpineData from './alpine/index';
import { smoothScroll } from './animation/smoothScroll';
import imageParallax from './animation/imageParallax';
import ajaxAddToCart from './modules/ajaxAddToCart';
import checkout from './modules/checkout';
import blockParallax from './animation/blockParallax';
/**
 * Application entrypoint
 */
domReady(async () => {
  alpineData();
  imageParallax();
  blockParallax();
  smoothScroll();
  ajaxAddToCart();
  checkout();
  console.log('v1.0.0');
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
