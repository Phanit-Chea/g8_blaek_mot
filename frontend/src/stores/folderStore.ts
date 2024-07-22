import { defineStore } from 'pinia';

export const useFolderStore = defineStore('folder', {
  state: () => ({
    folderId: null,
  }),
  actions: {
    setFolderId(id) {
      this.folderId = id;
    },
  },
});