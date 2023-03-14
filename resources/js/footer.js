const body = document.body;
const element = document.documentElement;
const pageFooter = document.getElementById("pageFooter");
const colorSwitcher = document.getElementById("colorSwitcher");

/**
 * Toggle dark mode classes
 * 
 */
function changeColorMode()
{
    element.classList.toggle("dark");
}

// Split all cookie parameters
const cookies = document.cookie.split(';');

if (cookies != '')
{
    // Find colorMode parameter
    const colorMode = cookies.find((item) => item.trim().startsWith('colorMode='));

    if (colorMode !== undefined) {
        // Change to light mode if it's a light mode cookie
        if (colorMode.split('=')[1] == 'light') {
            colorSwitcher.innerText = "Switch to Dark Mode";
            changeColorMode();
        }
    }
}

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

if (colorSwitcher !== null)
{
    colorSwitcher.addEventListener("click", function(event) {
        event.preventDefault();
        // Set cookie age to one year
        const colorCookie = "max-age=31536000; secure;";
        // Create a light mode cookie if on dark mode or vice-versa
        if (element.classList.contains("dark")) {
            document.cookie = "colorMode=light;" + colorCookie;
            colorSwitcher.innerText = "Switch to Dark Mode";
        }
        else {
            document.cookie = "colorMode=dark;" + colorCookie;
            colorSwitcher.innerText = "Switch to Light Mode";
        }
        changeColorMode();
    });
}