<template>
    <nav class="row bg-white p-2 fixed-top">
        <div class="navLeft col-md-auto d-flex align-items-center text-green">
            <router-link to="/">
                <img src="../assets/ContainerImages/logo.png" alt="homeImage" width="70%" height="70px" />
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
        <div class="navRight col-md d-flex justify-content-end align-items-center gap-4 m-2">
            <router-link to="#"
                class="notification me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none">
                <i class="material-icons fs-1">chat</i>
            </router-link>
            <router-link to="#"
                class="notification me-3 rounded-circle d-flex p-1 justify-content-center align-items-center bg-white text-decoration-none">
                <i class="material-icons fs-1">notifications</i>
            </router-link>

            <label class="popup">
                <input type="checkbox" />
                <div tabindex="0" class="burger">
                    <div v-if="useAuth.isAuthenticated" class="account ">
                        <img :src="`http://127.0.0.1:8000/${userStore.user.profile}`" alt="login" width="45px" />
                    </div>
                    <div v-else>
                        <i class="material-icons fs-1 text-white">person</i>
                    </div>
                </div>

                <nav v-if="useAuth.isAuthenticated" class="popup-window">
                    <ul>

                        <li>
                            <nav-link>
                                <a href="/user">
                                    <button>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19 4v6.406l-3.753 3.741-6.463-6.462 3.7-3.685h6.516zm2-2h-12.388l1.497 1.5-4.171 4.167 9.291 9.291 4.161-4.193 1.61 1.623v-12.388zm-5 4c.552 0 1 .449 1 1s-.448 1-1 1-1-.449-1-1 .448-1 1-1zm0-1c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm6.708.292l-.708.708v3.097l2-2.065-1.292-1.74zm-12.675 9.294l-1.414 1.414h-2.619v2h-2v2h-2v-2.17l5.636-5.626-1.417-1.407-6.219 6.203v5h6v-2h2v-2h2l1.729-1.729-1.696-1.685z">
                                            </path>
                                        </svg>
                                        <span class="siemreap">ព័ត៍មានផ្ទាល់ខ្លួន</span>
                                    </button>
                                </a>
                            </nav-link>
                        </li>
                        <li>
                            <nav-link>
                                <a href="/logout">
                                    <button>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19 4v6.406l-3.753 3.741-6.463-6.462 3.7-3.685h6.516zm2-2h-12.388l1.497 1.5-4.171 4.167 9.291 9.291 4.161-4.193 1.61 1.623v-12.388zm-5 4c.552 0 1 .449 1 1s-.448 1-1 1-1-.449-1-1 .448-1 1-1zm0-1c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm6.708.292l-.708.708v3.097l2-2.065-1.292-1.74zm-12.675 9.294l-1.414 1.414h-2.619v2h-2v2h-2v-2.17l5.636-5.626-1.417-1.407-6.219 6.203v5h6v-2h2v-2h2l1.729-1.729-1.696-1.685z">
                                            </path>
                                        </svg>
                                        <span class="siemreap">ចេញពីគណនី</span>
                                    </button>
                                </a>
                            </nav-link>
                        </li>

                    </ul>
                </nav>

            </label>

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
</style>