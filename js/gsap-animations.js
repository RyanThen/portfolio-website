// Home Text Animations Timeline
const homeTextTl = new TimelineLite();

homeTextTl.to([".intro"], 1, { y: 50, opacity: 1, ease: Back.easeOut });
homeTextTl.to([".intro-titles"], 1.25, { y: 40, opacity: 1, ease: Power1.easeOut }, "=-0.5");
homeTextTl.to([".cta-container"], 1.5, { y: 30, opacity: 1, ease: Power1.easeOut }, "=-0.75");


//CONTROLLER CREATED
const controller = new ScrollMagic.Controller();


// TIMELINE -- Home Text disappear on scroll
const homeTextDis = new TimelineLite();

homeTextDis.add(
    TweenLite.to(".intro", 0.3, { opacity: 0, transition: "300ms" })
    ).add(
    TweenLite.to(".intro-titles", 0.3, { opacity: 0, transition: "300ms" })
    ).add(
    TweenLite.to(".home-cta", 0.3, { opacity: 0, transition: "300ms" })
)

const sceneHtd = new ScrollMagic.Scene({
    triggerElement: ".intro",
    duration: "50%",
    triggerHook: 0.15
})
.setTween(homeTextDis)
.addTo(controller);


// TIMELINE -- Logo Animation
const logoAn = new TimelineLite();

logoAn.add(
    TweenLite.to(".rt-avatar", 0.4, { y: "-150px", ease: Power2.easeInOut })
);
logoAn.add(
    TweenLite.to(".rt-logo", 0.4, { y: "150px", ease: Power2.easeInOut })
);

const sceneLogo = new ScrollMagic.Scene({
    triggerElement: ".intro",
    triggerHook: 0.2
})
.setTween(logoAn)
.addTo(controller);


// TIMELINE -- Nav Bar Animations
const navAn = new TimelineLite();

navAn.add(
    TweenLite.to([".header-wrap" ], 0.2, { backgroundColor: "white", zIndex: 15, transition: "1s", boxShadow: "-5px -5px 10px black" })
);

const sceneNav = new ScrollMagic.Scene({
    triggerElement: ".cta-container",
    triggerHook: 0
})
.setTween(navAn)
.addTo(controller);


// TIMELINE -- About Animations
const aboutAn = new TimelineLite();

aboutAn.add(
    TweenLite.from(".about-avatar", 1, { opacity: 0, x:-300, ease: Expo.easeOut })
);
aboutAn.add(
    TweenLite.from(".about-text", 1, { opacity: 0, x:300, ease: Expo.easeOut, delay:"-1" })
);

const sceneAboutAn = new ScrollMagic.Scene({
    triggerElement: ".about-avatar",
    triggerHook: 1
})
.setTween(aboutAn)
.addTo(controller);


// TIMELINE -- Project Animations
const projectAn = new TimelineLite();

projectAn.add(
    TweenLite.from(".project-card-row", 1, { opacity: 0, y:200, ease: Expo.easeOut })
);

const sceneProjectAn = new ScrollMagic.Scene({
    triggerElement: ".project-card-row",
    triggerHook: 1
})
.setTween(projectAn)
.addTo(controller);


// TIMELINE -- Testimonial Animations
const testimonialAn = new TimelineLite();

testimonialAn.add(
    TweenLite.from([".quote-img-wrap", ".blockquote"], 1, { opacity: 0, y:200, ease: Expo.easeOut })
);

const sceneTestimonialAn = new ScrollMagic.Scene({
    triggerElement: ".quote-img",
    triggerHook: 1
})
.setTween(testimonialAn)
.addTo(controller);


// TIMELINE -- Flying Saucer Animation
const flyingSaucer = document.getElementsByClassName("flying-saucer");
const flyingSaucerContainer = document.getElementsByClassName("flying-saucer-container");
const saucerAn = new TimelineLite();

saucerAn.to(flyingSaucer, 2, {x: "925%" });

const sceneSaucerAn = new ScrollMagic.Scene({
    triggerElement: ".flying-saucer-container",
    duration: "200%",
    triggerHook: 0.4
})
.setTween(saucerAn)
.addTo(controller);