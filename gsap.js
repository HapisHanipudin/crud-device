// // // learn what all this code means at
// // // https://www.creativecodingclub.com/bundles/creative-coding-club
// // // unlock over 200 GSAP lessons today

// // const details = gsap.utils.toArray(".desktopContentSection:not(:first-child)");
// // const photos = gsap.utils.toArray(".desktopPhoto:not(:first-child)");

// // gsap.set(photos, { yPercent: 101 });

// // const allPhotos = gsap.utils.toArray(".desktopPhoto");

// // // create
// // let mm = gsap.matchMedia();

// // // add a media query. When it matches, the associated function will run
// // mm.add("(min-width: 600px)", () => {
// //   // this setup code only runs when viewport is at least 600px wide
// //   console.log("desktop");

// //   ScrollTrigger.create({
// //     trigger: ".gallery",
// //     start: "top top",
// //     end: "bottom bottom",
// //     pin: ".right",
// //   });

// //   //create scrolltrigger for each details section
// //   //trigger photo animation when headline of each details section
// //   //reaches 80% of window height
// //   details.forEach((detail, index) => {
// //     let headline = detail.querySelector("h1");
// //     let animation = gsap.timeline().to(photos[index], { yPercent: 0 }).set(allPhotos[index], { autoAlpha: 0 });
// //     ScrollTrigger.create({
// //       trigger: headline,
// //       start: "top 80%",
// //       end: "top 50%",
// //       animation: animation,
// //       scrub: true,
// //       markers: false,
// //     });
// //   });

// //   return () => {
// //     // optional
// //     // custom cleanup code here (runs when it STOPS matching)
// //     console.log("mobile");
// //   };
// // });

// /* ScrollTrigger Docs

// https://greensock.com/docs/v3/Plugins/ScrollTrigger

// */

// /*

// learn more GreenSock and ScrollTrigger

// https://www.creativeCodingClub.com

// new lessons weekly
// less than $1 per week

// */

// gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

// /* Main navigation */
// let panelsSection = document.querySelector("#panels"),
//   panelsContainer = document.querySelector("#panels-container"),
//   tween;
// document.querySelectorAll(".anchor").forEach((anchor) => {
//   anchor.addEventListener("click", function (e) {
//     e.preventDefault();
//     let targetElem = document.querySelector(e.target.getAttribute("href")),
//       y = targetElem;
//     if (targetElem && panelsContainer.isSameNode(targetElem.parentElement)) {
//       let totalScroll = tween.scrollTrigger.end - tween.scrollTrigger.start,
//         totalMovement = (panels.length - 1) * targetElem.offsetWidth;
//       y = Math.round(tween.scrollTrigger.start + (targetElem.offsetLeft / totalMovement) * totalScroll);
//     }
//     gsap.to(window, {
//       scrollTo: {
//         y: y,
//         autoKill: false,
//       },
//       duration: 1,
//     });
//   });
// });

// /* Panels */
// const panels = gsap.utils.toArray("#panels-container .panel");
// tween = gsap.to(panels, {
//   xPercent: -100 * (panels.length - 1),
//   ease: "none",
//   scrollTrigger: {
//     trigger: "#panels-container",
//     pin: true,
//     start: "top top",
//     scrub: 1,
//     snap: {
//       snapTo: 1 / (panels.length - 1),
//       inertia: false,
//       duration: { min: 0.1, max: 0.1 },
//     },
//     end: () => "+=" + (panelsContainer.offsetWidth - innerWidth),
//   },
// });

// // document.addEventListener("DOMContentLoaded", () => {
// //   const sections = gsap.utils.toArray(".section");

// //   let scrollTween = gsap.to(sections, {
// //     xPercent: -100 * (sections.length - 1),
// //     ease: "none",
// //     scrollTrigger: {
// //       trigger: ".wrapper",
// //       pin: true,
// //       scrub: 0.5,
// //       snap: 1 / (sections.length - 1),
// //       start: "top top",
// //       end: 3000,
// //     },
// //   });

// //   gsap.to(".line", {
// //     height: "10rem",
// //     scrollTrigger: {
// //       trigger: ".line",
// //       scrub: 0.5,
// //       start: "center center",
// //       end: 2000,
// //     },
// //   });

// //   document.querySelectorAll(".character").forEach((el) => {
// //     gsap.to(el.querySelector(".caption"), {
// //       x: 0,
// //       y: 0,
// //       scrollTrigger: {
// //         containerAnimation: scrollTween,
// //         trigger: el.querySelector(".caption"),
// //         start: "top bottom",
// //         end: "+=1000",
// //         scrub: 0.5,
// //       },
// //     });

// //     gsap.to(el.querySelector(".quote"), {
// //       y: 0,
// //       ease: "none",
// //       scrollTrigger: {
// //         containerAnimation: scrollTween,
// //         trigger: el.querySelector(".quote"),
// //         start: "top bottom",
// //         end: "+=20%",
// //         scrub: 0.5,
// //       },
// //     });

// //     gsap.to(el.querySelector(".nickname"), {
// //       y: 0,
// //       ease: "none",
// //       scrollTrigger: {
// //         containerAnimation: scrollTween,
// //         trigger: el.querySelector(".nickname"),
// //         start: "top bottom",
// //         end: "+=10%",
// //         scrub: 0.5,
// //       },
// //     });

// //     gsap.to(el.querySelector(".block"), {
// //       x: 0,
// //       ease: "none",
// //       scrollTrigger: {
// //         containerAnimation: scrollTween,
// //         trigger: el.querySelector(".block"),
// //         start: "top bottom",
// //         end: "+=" + window.innerWidth,
// //         scrub: 0.5,
// //       },
// //     });

// //     gsap.to(el.querySelector("img"), {
// //       y: 0,
// //       ease: "none",
// //       scrollTrigger: {
// //         containerAnimation: scrollTween,
// //         trigger: el.querySelector("img"),
// //         start: "top bottom",
// //         end: "+=50%",
// //         scrub: 0.5,
// //       },
// //     });

// //     gsap.to(el.querySelector(".huge-text"), {
// //       y: 0,
// //       ease: "none",
// //       scrollTrigger: {
// //         containerAnimation: scrollTween,
// //         trigger: el.querySelector(".huge-text"),
// //         start: "top bottom",
// //         end: "+=100%",
// //         scrub: 0.5,
// //       },
// //     });
// //   });
// // });

gsap.registerPlugin(ScrollTrigger);

gsap.set(".hero-bottom", {
  transformOrigin: "left center",
});

gsap.from(".toRight", {
  x: "-100%",
  duration: 1,
  scale: 1,
  ease: "ease",
  scrollTrigger: ".container-slider",
});

// gsap.to(".toRight", {
//   scale: 1.5, // Ukuran saat elemen terpasang
//   duration: 1,
//   ease: "ease",
//   scrollTrigger: {
//     trigger: ".container-slider",
//     start: "top 80%",
//     endTrigger: ".container-slider", // Trigger berakhir saat elemen .container-slider mencapai akhir
//     end: "bottom", // Akhir saat elemen .container-slider mencapai bagian bawah tampilan
//     scrub: true, // Aktifkan scrubbing
//   },
// });

// gsap.to(".hero-bottom", {
//   scrollTrigger: {
//     trigger: ".container-slider",
//     start: "top 80%",
//     end: "top 30%",
//     pin: ".hero-bottom",
//   },
// });

gsap.to(".hero-bottom", {
  scale: 1.5, // Skala yang diinginkan saat elemen terpasang
  scrollTrigger: {
    trigger: ".container-slider",
    start: "top 80%",
    end: "top 30%",
    pin: ".hero-bottom",
    scrub: true, // Aktifkan scrubbing
  },
});

document.addEventListener("DOMContentLoaded", () => {
  const sections = gsap.utils.toArray(".section");

  let scrollTween = gsap.to(sections, {
    xPercent: -100 * (sections.length - 1),
    ease: "none",
    scrollTrigger: {
      trigger: ".wrapper",
      pin: true,
      scrub: 0.5,
      snap: 1 / (sections.length - 1),
      start: "top top",
      end: 3000,
    },
  });

  gsap.to(".line", {
    height: "10rem",
    scrollTrigger: {
      trigger: ".line",
      scrub: 0.5,
      start: "center center",
      end: 2000,
    },
  });

  document.querySelectorAll(".character").forEach((el) => {
    gsap.to(el.querySelector(".caption"), {
      x: 0,
      y: 0,
      scrollTrigger: {
        containerAnimation: scrollTween,
        trigger: el.querySelector(".caption"),
        start: "top bottom",
        end: "+=1000",
        scrub: 0.5,
      },
    });

    gsap.to(el.querySelector(".quote"), {
      y: 0,
      ease: "none",
      scrollTrigger: {
        containerAnimation: scrollTween,
        trigger: el.querySelector(".quote"),
        start: "top bottom",
        end: "+=20%",
        scrub: 0.5,
      },
    });

    gsap.to(el.querySelector(".price"), {
      y: 0,
      ease: "none",
      scrollTrigger: {
        containerAnimation: scrollTween,
        trigger: el.querySelector(".quote"),
        start: "top bottom",
        end: "+=30%",
        scrub: 0.9,
      },
    });

    gsap.to(el.querySelector(".nickname"), {
      y: 0,
      ease: "none",
      scrollTrigger: {
        containerAnimation: scrollTween,
        trigger: el.querySelector(".nickname"),
        start: "top bottom",
        end: "+=10%",
        scrub: 0.5,
      },
    });

    gsap.to(el.querySelector(".block"), {
      x: 0,
      ease: "none",
      scrollTrigger: {
        containerAnimation: scrollTween,
        trigger: el.querySelector(".block"),
        start: "top bottom",
        end: "+=" + window.innerWidth,
        scrub: 0.5,
      },
    });

    gsap.to(el.querySelector("img"), {
      y: 0,
      ease: "none",
      scrollTrigger: {
        containerAnimation: scrollTween,
        trigger: el.querySelector("img"),
        start: "top bottom",
        end: "+=50%",
        scrub: 0.5,
      },
    });

    gsap.to(el.querySelector(".huge-text"), {
      y: 0,
      ease: "none",
      scrollTrigger: {
        containerAnimation: scrollTween,
        trigger: el.querySelector(".huge-text"),
        start: "top bottom",
        end: "+=100%",
        scrub: 0.5,
      },
    });
  });
});
