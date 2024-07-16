import { defineStore } from 'pinia';

export const chatStore = defineStore({
  id: 'chat',
  state: () => ({
    active: false, // Initial state for active status
  }),
  actions: {
    setActive(activeStatus: boolean) {
      this.active = activeStatus;
    },
    clearActive() {
      this.active = false; // Reset active status
    },
  },
  persist: {
    enabled: true,
    strategies: [
      {
        key: 'chat-active',
        storage: localStorage, // Store active status in localStorage
      },
    ],
  },
});