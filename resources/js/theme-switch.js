document.addEventListener('DOMContentLoaded', function(){
    themeSwitchClicker();
    if(!localStorage.getItem('theme')) {
      populateStorage();
    }
    loadThemeSetting();
  }); 
  
  function themeSwitchClicker(){
    const body = document.getElementById('body');
    const themeSwitch = document.getElementById('theme-switcher');
    themeSwitch.addEventListener('click', function(){
      if (body.classList.contains('theme-light')){
        body.classList.remove('theme-light');
        body.classList.add('theme-dark');
        updateThemeSetting('theme-dark');
      } else {
        body.classList.remove('theme-dark');
        body.classList.add('theme-light');
        updateThemeSetting('theme-light');
      }
    });
  }
  
  function populateStorage() {
    localStorage.setItem('theme', 'theme-light');
  }
  
  function updateThemeSetting(pref) {
    localStorage.setItem('theme', pref);
  }
  
  function loadThemeSetting() {
    const body = document.getElementById('body');
    var currentThemePref = localStorage.getItem('theme');
    if (body.classList.contains('theme-light')){
      if (currentThemePref == 'theme-light'){
      } else if (currentThemePref == 'theme-dark'){
        body.classList.add(currentThemePref);
        body.classList.remove('theme-light');
      }
    } else if (body.classList.contains('theme-dark')) {
      if (currentThemePref == 'theme-light'){
        body.classList.add(currentThemePref);
        body.classList.remove('theme-dark');
      } else if (currentThemePref == 'theme-dark'){
      }
    }
  }