import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default function () {
  let resizeTimeout;

  const initializeAnimation = () => {
    const wrappers = document.querySelectorAll('[data-block-parallax="wrap"]');

    console.log(wrappers);
    if (!wrappers) return;

    ScrollTrigger.getAll()
      .filter((trigger) => trigger.vars.id === 'block-parallax')
      .forEach((trigger) => trigger.kill());

    // First, kill all active ScrollTriggers to avoid them lingering when layout changes
    wrappers.forEach((wrapper) => {
      const products = wrapper.querySelectorAll(
        '[data-block-parallax="product"]'
      );
      const items = wrapper.querySelectorAll('[data-block-parallax="item"]');

      if (products.length > 0) {
        // Get the number of columns based on the current screen width
        const numColumns =
          window.innerWidth <= 640 ? 1 : window.innerWidth <= 1024 ? 2 : 3; // Mobile (1), Tablet (2), Desktop (3)

        // Clear previous GSAP transformations
        gsap.set(products, { clearProps: 'all' }); // This clears all GSAP styles

        // Disable animation for 1-column layout
        if (numColumns === 1) {
          return; // Exit early if on mobile
        }

        products.forEach((block, index) => {
          // Apply animation only to the 2nd item in each row
          const isSecondInRow = index % numColumns === 1; // Adjusted to handle 2 or 3 columns

          if (isSecondInRow) {
            gsap.set(block, { yPercent: -20 });

            let tl = gsap.timeline({
              scrollTrigger: {
                id: 'block-parallax',
                trigger: wrapper,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true,
              },
            });

            tl.to(block, {
              yPercent: 0,
              ease: 'linear',
              overwrite: true,
            });
          }
        });
      }

      if (items.length > 0) {
        // Get the number of columns based on the current screen width
        const numColumns =
          window.innerWidth <= 640 ? 1 : window.innerWidth <= 1024 ? 2 : 3; // Mobile (1), Tablet (2), Desktop (3)

        // Clear previous GSAP transformations
        gsap.set(items, { clearProps: 'all' }); // This clears all GSAP styles

        // Disable animation for 1-column layout
        if (numColumns === 1) {
          return; // Exit early if on mobile
        }

        items.forEach((block) => {
          let tl = gsap.timeline({
            scrollTrigger: {
              id: 'block-parallax',
              trigger: wrapper,
              start: 'top bottom',
              end: 'bottom top',
              scrub: true,
            },
          });

          tl.to(block, {
            yPercent: 20,
            ease: 'linear',
            overwrite: true,
          });
        });
      }
    });
  };

  initializeAnimation();

  window.addEventListener('resize', () => {
    // Clear any previous timeout to avoid too many re-renders
    clearTimeout(resizeTimeout);

    // Set timeout to re-initialize animation after resizing stops
    resizeTimeout = setTimeout(() => {
      initializeAnimation();
    }, 150); // 150ms debounce time
  });
}
