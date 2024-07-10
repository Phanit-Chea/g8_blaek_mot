// stores/userStore.js
import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useAboutUsStore = defineStore('about_us_slides', {
    state: () => ({
        about_us_slides: ref({imageSlide: ref([])}),
    }),
    actions: {
        setUser(data: any) {
            this.about_us_slides = { ...data };
            console.log(this.about_us_slides);
        }
    }
});