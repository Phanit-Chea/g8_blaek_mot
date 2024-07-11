import { defineStore } from 'pinia';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    profileImage: '',
    accessToken: '',
    isAuthenticated: false,
  }),
  actions: {
    login(profileImage: string, accessToken: string, isAuthenticated: boolean) {
      this.profileImage = profileImage;
      this.accessToken = accessToken;
      this.isAuthenticated = isAuthenticated;
    },
    logout() {
      this.profileImage = '';
      this.accessToken = '';
      this.isAuthenticated = false;
    },
  },
  persist: {
    enabled: true,
    strategies: [
      {
        key: 'auth',
        storage: localStorage,
      },
    ],
  },
});
