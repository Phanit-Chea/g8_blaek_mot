import { defineStore } from 'pinia';

function saveUserState(key, state) {
    localStorage.setItem(key, JSON.stringify(state));
}

function loadUserState(key) {
    const state = localStorage.getItem(key);
    return state ? JSON.parse(state) : null;
}

export const useUserStore = defineStore('user', {
    state: () => ({
        user: {
            // name: '',
            // email: '',
            // password: '',
            // confirmPassword: '',
            // dateOfBirth: '',
            // gender: '',
            // phoneNumber: '',
            // profile: '',
            // profilePreview: '',
            // address: '',
        }
    }),
    actions: {
        setUser(user) {
            this.user = (...user);
        },
        loadUserState() {
            const state = loadUserState('user');
            if (state) {
                this.$patch(state);
            }
        },
        clearUserState() {
            this.$reset();
            localStorage.removeItem('user');
        }
    }
});
