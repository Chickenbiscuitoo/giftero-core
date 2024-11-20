const swiperSection = document.querySelectorAll(".swiper-section");
swiperSection?.forEach(function (section) {
    // swiper
    const swiper = section.querySelector(".l-section-h");
    swiper?.classList.add("swiper");

    // wrapper
    const swiperWrapper = swiper?.querySelector(".l-section-h > .g-cols");
    swiperWrapper?.classList.add("swiper-wrapper");

    // slides
    const swiperSlides = swiperWrapper?.querySelectorAll(
        ".l-section-h > .g-cols > .vc_column_container"
    );
    swiperSlides?.forEach(function (slide) {
        slide?.classList.add("swiper-slide");
    });

    // scrollbar (data-scrollbar)
    const hasScrollbar = section.getAttribute("data-scrollbar");
    if (hasScrollbar) {
        const scrollbar = document.createElement("div");
        scrollbar.classList.add("swiper-scrollbar");
        swiper?.appendChild(scrollbar);
    }

    // name
    const name = section.getAttribute("data-name");
    if (name) {
        swiper.classList.add(name);
    }
});
