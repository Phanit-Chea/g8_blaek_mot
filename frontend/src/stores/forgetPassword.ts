// stores/userStore.js
import { defineStore } from 'pinia';
export const forgotPassword = defineStore('password_resets', {
    state: () => ({
        forgotPassword: {
            email: '',        
        }
    }),
    actions: {
        setUser(data: any) {
            this.forgotPassword = { ...data };
            console.log(this.forgotPassword);
        }
    }
});