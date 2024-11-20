import Swiper, { Scrollbar } from "swiper";
import "swiper/css";
import "swiper/css/scrollbar";

const columnsSwiper = new Swiper(".gf-columns-swiper", {
    direction: "horizontal",
    slidesPerView: "auto",

    speed: 400,
    spaceBetween: 20,

    // at 961px and above
    breakpoints: {
        961: {
            spaceBetween: 40,
        },
    },

    scrollbar: {
        el: ".swiper-scrollbar",
        hide: false,
        draggable: true,
    },

    modules: [Scrollbar],
});
