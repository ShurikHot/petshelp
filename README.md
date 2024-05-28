# PetsHelp

<div>Resource for helping homeless animals.</div>
<div>Can be used by any shelter or volunteer organization.</div>

<div><b>Stack:</b> Laravel 9, PHP 8.1, Redis, Docker, JavaScript, jQuery, HTML, CSS, MySQL, API, OOP</div>
<br>

<li>Implemented the ability to build the development environment and run the application using  <b>Docker</b> (based on <b>Laravel Sail</b>)</li>
<li>Сonvenient admin part for managing users, pets, slides on the main page, and newsletters for subscribers (login: admin@admin.com, password - 111)</li>
<li>Full text search using <b>MeiliSearch</b> (based on the <b>Laravel Scout</b>)</li>
<li>Additional search options using <b>MeiliSearch</b> (by gender, vaccination status, other special features) </li>
<li>Caching frequent queries and some parts of pages using <b>Redis</b></li>
<li>Pet <b>rating system</b> (depending on the number of views of the pet’s personal page)</li>
<li>Operations for sending messages to subscribers are implemented through a <b>queue</b></li>
<br>

<div><b>Some API requests have been implemented:</b></div>
<div>Information:</div>
<li>api/count/all - number of all animals</li>
<li>api/count/adopted - number of animals that have found a home</li>

<div>CRUD operations:</div>
<li>GET     api/pets - pets.index</li>
<li>POST    api/pets - pets.store</li>
<li>GET     api/pets/{pet} - pets.show</li>
<li>PUT     api/pets/{pet} - pets.update</li>
<li>DELETE  api/pets/{pet} - pets.destroy</li>

## Sample pages
<img src="https://i.postimg.cc/q75dZ17q/02.jpg" alt="">
<img src="https://i.postimg.cc/httBgR68/ph1.jpg" alt="">
<img src="https://i.postimg.cc/hjpY2X4H/ph2.jpg" alt="">
<img src="https://i.postimg.cc/g0JWDCm1/01.jpg" alt="">

## Admin Panel
<img src="https://i.postimg.cc/HW5CB41W/06.jpg" alt="">
<img src="https://i.postimg.cc/RhrxvqKz/03.jpg" alt="">
<img src="https://i.postimg.cc/prDbrxJ5/04.jpg" alt="">
<img src="https://i.postimg.cc/G2T10vBQ/05.jpg" alt="">

