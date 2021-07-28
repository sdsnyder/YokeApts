// this one is jut to wait for the page to load
document.addEventListener('DOMContentLoaded', () => {
    const themeStylesheet = document.getElementById('theme');
    const storedTheme = localStorage.getItem('theme');
	//const logo = document.getElementById("logo");
    if(storedTheme){
        themeStylesheet.href = storedTheme;
    }
    const themeToggle = document.getElementById('modeswitch');
    themeToggle.addEventListener('click', () => {
        // if it's light -> go dark
        if(themeStylesheet.href.includes('light')){
            themeStylesheet.href = '../css/dark-theme.css';
            themeToggle.innerText = 'Switch to light mode';
			document.getElementById("logo").src = "../assets/site/darkmode_logo.png";
            document.getElementById("donut").src = "../assets/promo/night_donut.png";
        } else {
            // if it's dark -> go light
            themeStylesheet.href = '../css/light-theme.css';
            themeToggle.innerText = 'Switch to dark mode';
			document.getElementById("logo").src = "../assets/site/lightmode_logo.png";
            document.getElementById("donut").src = "../assets/promo/monpastry_rescale.png";
        }
        // save the preference to localStorage
        localStorage.setItem('theme',themeStylesheet.href);
    })
})