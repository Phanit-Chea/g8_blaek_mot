import { defineStore } from 'pinia';

export const useUserStore = defineStore('user', {
  state: () => ({
    user: null,
    token:null,
  }),
  actions: {
    setUser(user: any) {
      this.user = user;
    },
    setToken(token) {
      this.token = token;
    },
    clearUser() {
      this.user = null;
      this.token = null;
    },
  },
  persist: {
    enabled: true,
    strategies: [
      {
        key: 'user',
        storage: localStorage,
      },
    ],
  },
});
