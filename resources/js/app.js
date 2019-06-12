/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


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
  console.log('Now populating localstorage with a theme preference setting.');
  localStorage.setItem('theme', 'theme-light');
}

function updateThemeSetting(pref) {
  console.log('Updating theme setting in localstorage.');
  localStorage.setItem('theme', pref);
}

function loadThemeSetting() {
  const body = document.getElementById('body');
  var currentThemePref = localStorage.getItem('theme');
  console.log('currentThemePref: ' + currentThemePref);
  if (body.classList.contains('theme-light')){
    console.log('DOM is set to light theme.');
    if (currentThemePref == 'theme-light'){
      console.log('Theme preference in storage is the same as in DOM.');
    } else if (currentThemePref == 'theme-dark'){
      console.log('LocalStorage theme preference and DOM theme are different. Altering DOM to correct theme.');
      body.classList.add(currentThemePref);
      body.classList.remove('theme-light');
    }
  } else if (body.classList.contains('theme-dark')) {
    console.log('DOM is set to light theme');
    if (currentThemePref == 'theme-light'){
      console.log('LocalStorage theme preference and DOM theme are different. Altering DOM to correct theme.');
      body.classList.add(currentThemePref);
      body.classList.remove('theme-dark');
    } else if (currentThemePref == 'theme-dark'){
      console.log('Theme preference in storage is the same as in DOM.');
    }
  }
}