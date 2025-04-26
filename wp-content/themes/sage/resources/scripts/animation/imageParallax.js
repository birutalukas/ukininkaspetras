import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default function () {
  const imageWraps = document.querySelectorAll('[data-image-parallax="wrap"]');

  if (!imageWraps.length) return;

  imageWraps.forEach((wrap) => {
    const images = wrap.querySelectorAll('img');
    let heroImage = false;

    if (wrap.classList.contains('js-hero')) {
      heroImage = true;
    }
    if (!images.length) return;

    images.forEach((img) => {
      gsap.set(img, { yPercent: -20 });
    });

    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: wrap,
        start: heroImage ? `top +=${wrap.offsetHeight}px` : 'top bottom',
        end: 'bottom top',
        scrub: true,
      },
    });

    tl.to(images, {
      yPercent: 0,
      ease: 'linear',
      overwrite: true,
    });
  });
}
