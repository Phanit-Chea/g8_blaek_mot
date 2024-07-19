import { defineStore } from 'pinia'

export const useFolderStore = defineStore('folder', {
  state: () => ({
    food:[]
  })
})