import { defineStore } from 'pinia';

export const useFoodStore = defineStore('food', {
  state: () => ({
    foodId: null,
  }),
  actions: {
    setFoodId(id) {
      this.foodId = id;
    },
  },
});
