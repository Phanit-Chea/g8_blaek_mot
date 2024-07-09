import { defineStore } from 'pinia';

function saveState(key, state) {
    localStorage.setItem(key, JSON.stringify(state));
}

function loadState(key) {
    const state = localStorage.getItem(key);
    return state ? JSON.parse(state) : null;
}

export const useAuthStore = defineStore('auth', {
    state: () => ({
        isAuthenticated: false,
        user: {
            profileImage: ''
        },
        remember_token: ''
    }),
    actions: {
      login(profileImage, access_token) {
        console.log('Logging in:', profileImage, access_token); // Log the login action
        this.isAuthenticated = true;
        this.user.profileImage = profileImage;
        this.remember_token = access_token;
        saveState('auth', this.$state);
    },
        logout() {
            this.isAuthenticated = false;
            this.user.profileImage = '';
            this.access_token = '';
            saveState('auth', this.$state);
        },
        loadAuthState() {
            const state = loadState('auth');
            if (state) {
                this.$patch(state);
            }
        }
    }
});