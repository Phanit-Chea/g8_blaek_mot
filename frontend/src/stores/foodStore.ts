// stores/userStore.js
import { defineStore } from 'pinia';

export const useFoodStore = defineStore('food', {
    state: () => ({
        food: {
        category_id: '',
        name: '',
        image: '',
        video_url: '',
        cooking_time: '',
        ingredients: ''
        }
    }),
    actions: {
        setFood(data) {
            this.food = { ...data };
        }
    }
});
