/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

document.addEventListener('DOMContentLoaded', function(){
  const body = document.getElementById('body');
  const themeSwitch = document.getElementById('theme-switcher');
  themeSwitch.addEventListener('click', function(){
    if (body.classList.contains('theme-light')){
      body.classList.remove('theme-light');
      body.classList.add('theme-dark');
    } else {
      body.classList.remove('theme-dark');
      body.classList.add('theme-light');
    }
  });
}); 