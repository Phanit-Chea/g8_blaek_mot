<script setup lang="ts">
</script>
<template>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Battambang' rel='stylesheet'>
  <div id="contain" class="contain navbar navbar-light bg-white navbar-expand-md px-3">
    <a href="#" class="navbar-brand">
      <img id="image" src="../../src/assets/Group 70.png" alt="" width="120px" height="70px" />
    </a>
    <div class="search w-50">
      <div class="input-icons position-relative">
        <i class="bi bi-search position-absolute translate-bottom mt-2 ms-2 ps-1  text-secondary"></i>
        <input class="form-control" id="searchInput" placeholder=" What would you like to eat? " type="text">
      </div>
    </div>
    <button class="text-white">Search</button>
    <div class="navbar-collapse collapse" id="menu">
      <ul class="navbar-nav ms-auto" style="list-style:none;">
        <li class="nav-item mx-3">
          <a href="#" class="nav-link position-relative"><i class="bi-person-circle fs-1"></i></a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link position-relative"><i class="bi bi-bell fs-1"></i><span id="chatNotif" class="position-absolute top-2 start-50 translate-bottom badge rounded-pill bg-danger">99<sup>+</sup></span></a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link"><i class="bi bi-heart fs-1"></i></a>
        </li>
      </ul>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light m-0">
    <ul class="navbar-nav" style="list-style:none;">
        <li class="nav-item mx-3">  
          <a href="/" class="">Home</a>
        </li>
        <li class="nav-item mx-3">
          <a href="#" class="">Category</a>
        </li>
        <li class="nav-item mx-3">
          <a href="#" class="">About Us</a>
        </li>
    </ul>
  </nav>
</template>
<style>
body {
    font-family: 'Khmer';
  }

  #contain{
    display: flex;
    align-items: center;
  }

  .contain > a > h2{
    color: #66B64A;
  }

  .contain > button{
    border-radius: 0px 5px 5px 0px;
    background: #66B64A;
    border: none;
    padding: 10px;
    position: relative;
    right: 60px;
  }

  .search > .input-icons > input{
    padding: 10px 40px 10px 40px;
    border: 1px solid #66B64A;
  }
  .search > .input-icons > i{
    font-size: 20px;
  }

  ul > li > a > i{
    color: #66B64A;
    cursor: pointer;
  }

  ul > li > a > i:hover{
    color: #62cd3c;
    cursor: pointer;
    transition: color 0.2s;
  }

  nav {
    border-bottom: 1px solid rgb(186, 186, 186);
  }

  nav ul li {
    position: relative;
  }

  nav ul li a {
    text-decoration: none;
    color: #535353;
    display: block;
    padding: 10px;
    transition: color 0.3s, border-bottom 0.3s;
  }

  nav ul li a::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #66B64A;
    transition: width 0.3s;
    position: absolute;
    bottom: -8px;
    left: 0;
  }

  nav ul li a:hover::after {
    width: 100%;
  }

  nav ul li a:hover {
    color: #66B64A;
  }
</style>
