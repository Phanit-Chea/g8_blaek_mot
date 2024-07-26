<template>
  <nav class="row bg-white p-2 fixed-top">
    <div class="navLeft col-md-auto d-flex align-items-center text-green">
      <router-link to="/">
        <img src="../../../assets/ContainerImages/logo.png" alt="homeImage" width="90%" height="90px" />
      </router-link>

    </div>
    <div class="navCenter col-md d-flex align-items-center"
      style="width:55%; margin-left: 3%; margin-top: 10px; margin-bottom: 10px">
      <div class="input-group w-240">
        <button class="input-group-text border border-success border-end-0">
          <i class="material-icons">search</i>
        </button>
        <input type="text" class="form-control p-2 border border-success border-end-0 shadow-none"
          placeholder="What would you like to eat?" aria-label="Search" />
        <button class="text-light input-group-text border border-success border-start-0"
          style="background-color: rgba(62, 160, 9, 0.942); width: 90px; justify-content: center">
          Search
        </button>
      </div>
    </div>
    <div class="navPages row text-red mt-3">
      <div class="pages col d-flex" style="gap: 20px; margin-left: 20px">

        <router-link to="/"
          class="pagesLink text-green-700 fs-5 text-decoration-none nav-link siemreap">ទំព័រដើម</router-link>
        <router-link to="/category"
          class="pagesLink text-green-700 fs-5 text-decoration-none nav-link">ប្រភេទអាហារ</router-link>
        <router-link to="/aboutUs" class="pagesLink text-green-700 fs-5 text-decoration-none nav-link">
          អំពីពួកយើង
        </router-link>

      </div>
    </div>
  </nav>

</template>

<script setup lang="ts">
import { useAuthStore } from '@/stores/auth-store.ts';
import { useUserStore } from '@/stores/userStore';


const useAuth = useAuthStore();
const userStore = useUserStore();


</script>

<style scoped>
.favoriteIcon,
.notification,
.account {
  transition: transform 0.3s ease, border 0.3s ease;
  border: 2px solid rgba(62, 160, 9, 0.942);
  color: rgba(62, 160, 9, 0.942);
}


.chat {
  font-size: 3rem;
  color: #66b64a;
  cursor: pointer;
  transition: transform 0.5s;
}

.chat:hover {
  transform: scale(1.05) rotate(-5deg);
  color: #62cd3c;
}

.login {
  display: flex;
  color: white;
  background: none;
  border: none;
}

.favoriteIcon:hover,
.notification:hover,
.account:hover {
  z-index: 10;
  border-color: rgba(62, 160, 9, 0.942);
}

/* The design is inspired from Galahhad*/

.popup {
  --burger-line-width: 1.125em;
  --burger-line-height: 0.125em;
  --burger-offset: 0.625em;
  --burger-bg: green;
  --burger-color: #333;
  --burger-line-border-radius: 0.1875em;
  --burger-diameter: 3.125em;
  --burger-btn-border-radius: calc(var(--burger-diameter) / 2);
  --burger-line-transition: 0.3s;
  --burger-transition: all 0.1s ease-in-out;
  --burger-hover-scale: 1.1;
  --burger-active-scale: 0.95;
  --burger-enable-outline-color: var(--burger-bg);
  --burger-enable-outline-width: 0.125em;
  --burger-enable-outline-offset: var(--burger-enable-outline-width);
  /* nav */
  --nav-padding-x: 0.25em;
  --nav-padding-y: 0.625em;
  --nav-border-radius: 0.375em;
  --nav-border-color: #ccc;
  --nav-border-width: 0.0625em;
  --nav-shadow-color: rgba(0, 0, 0, 0.2);
  --nav-shadow-width: 0 1px 5px;
  --nav-bg: #eee;
  --nav-font-family: "Poppins", sans-serif;
  --nav-default-scale: 0.8;
  --nav-active-scale: 1;
  --nav-position-left: -102px;
  --nav-position-right: unset;
  /* if you want to change sides just switch one property */
  /* from properties to "unset" and the other to 0 */
  /* title */
  --nav-title-size: 0.625em;
  --nav-title-color: #777;
  --nav-title-padding-x: 1rem;
  --nav-title-padding-y: 0.25em;
  /* nav button */
  --nav-button-padding-x: 1rem;
  --nav-button-padding-y: 0.375em;
  --nav-button-border-radius: 0.375em;
  --nav-button-font-size: 17px;
  --nav-button-hover-bg: green;
  --nav-button-hover-text-color: #fff;
  --nav-button-distance: 0.875em;
  /* underline */
  --underline-border-width: 0.0625em;
  --underline-border-color: #ccc;
  --underline-margin-y: 0.3125em;
}



.popup {
  display: inline-block;
  text-rendering: optimizeLegibility;
  position: relative;
}

.popup input {
  display: none;
}

.burger {
  display: flex;
  position: relative;
  align-items: center;
  justify-content: center;
  background: var(--burger-bg);
  width: var(--burger-diameter);
  height: var(--burger-diameter);
  border-radius: var(--burger-btn-border-radius);
  border: none;
  cursor: pointer;
  overflow: hidden;
  transition: var(--burger-transition);
  outline: var(--burger-enable-outline-width) solid transparent;
  outline-offset: 0;
}

.popup-window {
  transform: scale(var(--nav-default-scale));
  visibility: hidden;
  opacity: 0;
  position: absolute;
  padding: var(--nav-padding-y) var(--nav-padding-x);
  background: var(--nav-bg);
  font-family: var(--nav-font-family);
  color: var(--nav-text-color);
  border-radius: var(--nav-border-radius);
  box-shadow: var(--nav-shadow-width) var(--nav-shadow-color);
  border: var(--nav-border-width) solid var(--nav-border-color);
  top: calc(var(--burger-diameter) + var(--burger-enable-outline-width) + var(--burger-enable-outline-offset));
  left: var(--nav-position-left);
  right: var(--nav-position-right);
  transition: var(--burger-transition);
  margin-top: 10px;
}

.popup-window legend {
  padding: var(--nav-title-padding-y) var(--nav-title-padding-x);
  margin: 0;
  color: var(--nav-title-color);
  font-size: var(--nav-title-size);
  text-transform: uppercase;
}

.popup-window ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

.popup-window ul button {
  outline: none;
  width: 100%;
  border: none;
  background: none;
  display: flex;
  align-items: center;
  color: var(--burger-color);
  font-size: var(--nav-button-font-size);
  padding: var(--nav-button-padding-y) var(--nav-button-padding-x);
  white-space: nowrap;
  border-radius: var(--nav-button-border-radius);
  cursor: pointer;
  column-gap: var(--nav-button-distance);
}

.popup-window ul li:nth-child(1) svg,
.popup-window ul li:nth-child(2) svg {
  color: green;
}

.popup-window ul li:nth-child(4) svg,
.popup-window ul li:nth-child(5) svg {
  color: rgb(153, 153, 153);
}

.popup-window ul li:nth-child(7) svg {
  color: red;
}

.popup-window hr {
  margin: var(--underline-margin-y) 0;
  border: none;
  border-bottom: var(--underline-border-width) solid var(--underline-border-color);
}

/* actions */

.popup-window ul button:hover,
.popup-window ul button:focus-visible,
.popup-window ul button:hover svg,
.popup-window ul button:focus-visible svg {
  color: var(--nav-button-hover-text-color);
  background: var(--nav-button-hover-bg);
}

.burger:hover {
  transform: scale(var(--burger-hover-scale));
}

.burger:active {
  transform: scale(var(--burger-active-scale));
}

.burger:focus:not(:hover) {
  outline-color: var(--burger-enable-outline-color);
  outline-offset: var(--burger-enable-outline-offset);
}

.popup input:checked+.burger span:nth-child(1) {
  top: 50%;
  transform: translateY(-50%) rotate(45deg);
}

.popup input:checked+.burger span:nth-child(2) {
  bottom: 50%;
  transform: translateY(50%) rotate(-45deg);
}

.popup input:checked+.burger span:nth-child(3) {
  transform: translateX(calc(var(--burger-diameter) * -1 - var(--burger-line-width)));
}

.popup input:checked~nav {
  transform: scale(var(--nav-active-scale));
  visibility: visible;
  opacity: 1;
}

.siemreap {
  font-family: 'Siemreap', cursive;
}

/* //=====tablet======// */

@media screen and (max-width: 768px) {
    .input-group{
      margin-right: 220px;  
    }

img{
  width: 130%;
  height: 50px;

}   
.form-control{
  width: 20%;
  height: 30px;
  
}
.input-group-text{
  width: 10%;
  height: 30px;
}

.navRight>.favoriteIcon>.material-icons{
  width: 33px;
  height: 32px;
  
}

.navRight>.notification>.material-icons{
  width: 30px;
  height: 28px;
}

.navRight>.account>.src>.material-icons{
  width: 10px;
  height: 10px;
  
}
.navRight{

  position: fixed;
  top: 0;
  left: 0px;
  display: flex;
  
}
/* //=========smartphone=========// */

@media screen and (max-width: 428px) {
  img{
      width: 80%;
      height: 40px;

  } 
  .input-group{
      margin-right:0px; 
      margin-left:0px ; 
      margin-top :-50px;
      
    }
  .form-control{
      height: 20px;
      
}
  .input-group-text{
      width: 20%;
      height: 20px;
      
  } 

  }
 
}

</style>