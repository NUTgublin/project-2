
  function setDarkMode() {
    if (localStorage.getItem('dark-mode') === 'true') {
        document.body.classList.add('dark-mode');
        icon.src = '../Logos/sun.png';
    } else {
        document.body.classList.remove('dark-mode');
        icon.src = '../Logos/moon.png';
    }
}
window.onload = function() {
    setDarkMode();
};

var icon = document.getElementById('icon');
icon.onclick = function() {
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('dark-mode', 'true');
        icon.src = '../Logos/sun.png';
    } else {
        localStorage.setItem('dark-mode', 'false');
        icon.src = '../Logos/moon.png';
    }
};