// get all elements with class "clickbox"
const clickboxes = document.querySelectorAll(".clickbox,.clickboxed");
const anchors = document.querySelectorAll(".clickbox a,.clickboxed a");

// attach click event listener to each clickbox element
clickboxes?.forEach((clickbox) => {
    clickbox?.addEventListener("click", () => {
        // find the first <a> element within the clickbox element
        const anchor = clickbox?.querySelector("a");
        // check if an <a> element was found
        if (anchor) {
            // open URL in a new tab
            location.href = anchor.href;
        }
    });
});

// prevent clicking of a element to prevent doublehref
anchors?.forEach((anchor) => {
    anchor?.addEventListener("click", function (e) {
        e.preventDefault();
    });
});
