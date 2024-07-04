// stores/userStore.js
import { defineStore } from 'pinia';

export const useUserStore = defineStore('user', {
    state: () => ({
        user: {
            name: '',
            email: '',
            password: '',
            confirmPassword: '',
            dateOfBirth: '',
            gender: '',
            phoneNumber: '',
            profile: null,
            profilePreview: null,
            address: '',
        
        }
    }),
    actions: {
        setUser(data) {
            this.user = { ...data };
        }
    }
});