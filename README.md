# About ArachniCMS v1.3.3

ArachniCMS is a Content Management System, designed for small businesses, organizations, or individuals who want simple yet effective blogging and website features. This version of ArachniCMS was built with Laravel 5.8, Tailwind CSS, and a number of the Spatie Laravel packages, being a traditional, server-side rendered web application.

ArachniCMS was created by Dave VanderWeele of [ArachniDev LLC](https://arachni.dev). 

---

## Features

If videos are more your thing, here's a recent video tour of the software:

<a href="http://www.youtube.com/watch?feature=player_embedded&v=pIgI5VkQEy8
" target="_blank"><img src="http://img.youtube.com/vi/pIgI5VkQEy8/0.jpg" 
alt="YouTube Thumbnail of Video Tour of ArachniCMS" width="240" height="180" border="10" /></a>

+ Smart Light & Dark Theme Switcher in site header that, when clicked by user, will save preference of that user in web browser so user's prefernece is remembered on every page for every visit.
+ Dynamic Sitewide Color Scheme Options, covering practically every color of the rainbow, with each one being compatible with the Smart Light & Dark Theme Switcher.
+ Full Blogging experience with WYSIWYG Editor and even a font picker.
+ Blog Comment System with full comment-moderation system (note that IP Address tracking for comments may not function properly if this software is deployed behind a reverse-proxy or load balancer).
+ Easily upload your own Hero Image, Title, and Subtitle for landing page.
+ Add Testimonials to landing page with links to favorable reviews and mentions elsewhere on the web.
+ Easily upload your own Logo for Navigation/Header area.
+ Backup system, if you wish to use it, which nightly creates a zip file containing a dump of your database and uploaded images (i.e. all the user generated content).
+ Sitemap that regularly updates itself as you continue to blog and add pages to your website.
+ Integration with Mailchimp so you can collect email addresses on your landing page and after each blog post. Start building your Newsletter!
+ Public Contact Form that (like all public-facing forms on the site) is protected from spambots by a smart honeypot system. Integrates with Transactional Mail Providers like Mailgun, etc.
+ Easily add logo/icon links in the footer of your site that point to your various social media profiles around the web.
+ Easily add links to your Patreon and/or Liberapay profiles, and logo links to those pages will automatically generate on your landing page and at end of each blog post.
+ An RSS Feed for your blog posts is automatically generated and updated regularly.
+ A content-security policy handily protects your website from XSS vulnerabilities. It has the added bonus of blocking ads on youtube videos that you embed.
+ A clever system allows you to manage a vault of uploaded images, that you can reference dynamically from as many blog posts as you desire. This means you only have to upload each image once, and it can be used an unlimited amount of times on your blog. This helps save space on your web server.
+ Embedding Youtube Videos has never been easier. Instead of copying and pasting complicated iframe embed code, you can just copy and paste the video code for the video itself one time, and after that you can embed it as many times as you want in blog posts with just the click of a button.
---

## Licensing

ArachniCMS is free to use and licensed under Creative Commons [Attribution-ShareAlike 4.0](https://creativecommons.org/licenses/by-sa/4.0/). For the attribution requirement, I'd like you to leave the link in the footer that says "Made with Love by ArachniDev LLC" with a link to the ArachniDev LLC website. 

---

## Deployment Guide

You will need to understand the basics of deploying a web application to a VPS provider such as Digital Ocean, Linode, etc. This application should not be used on a Shared Host as many features will be broken, but I'm not stopping you. Additionally, you will also need to know the specifics of [deploying a Laravel application](https://laravel.com/docs/5.8).

I'm not going to go over the details of all of that, as there are many different ways for you to configure your application. However, there are some specific deployment details that are relevant to this application that I will go over.

TO BE CONTINUED...