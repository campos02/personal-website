const backTopLink = document.getElementById("backTopLink");

if (backTopLink !== null)
{
    // Scroll to top on click
    backTopLink.addEventListener("click", function(event) {
        event.preventDefault();
        document.documentElement.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

const wrapper = document.getElementById("vhWrapper");

// Show footer links only if the page overflows
if (wrapper.scrollHeight > wrapper.clientHeight) {
    const footerLinks = document.getElementsByClassName("footer-links");
    Array.from(footerLinks).forEach(footerLinksElement => {
        footerLinksElement.classList.add("visible-footer-links");
    });
}