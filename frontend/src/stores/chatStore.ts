import { defineStore } from 'pinia';

export const useChatStore = defineStore({
  id: 'chat',
  state: () => ({
    active: false,
  }),
  actions: {
    setActive(activeStatus) {
      this.active = activeStatus;
    },
    clearActive() {
      this.active = false;
    },
  },
  persist: {
    enabled: true,
    strategies: [
      {
        key: 'chat-active',
        storage: localStorage,
      },
    ],
  },
});
