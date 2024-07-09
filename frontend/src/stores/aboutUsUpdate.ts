// stores/userStore.js
import { defineStore } from 'pinia';

export const useAboutUsStore = defineStore('about_us', {
    state: () => ({
        about_us: {
            imageDetail: [],
            description: '',
            recommentFood: '',
            ourMission: '',
            ourVision: ''
        
        }
    }),
    actions: {
        setUser(data: any) {
            this.about_us = { ...data };
            console.log(this.about_us);
        }
    }
});