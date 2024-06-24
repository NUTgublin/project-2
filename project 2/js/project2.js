var icon = document.getElementById('icon');
icon.onclick = function() {
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
        icon.src = '../Logos/sun.png';
        
    } else {
        icon.src = '../Logos/moon.png';
        
    }
  }
