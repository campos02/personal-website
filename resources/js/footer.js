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