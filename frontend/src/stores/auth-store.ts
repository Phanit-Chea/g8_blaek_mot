import { defineStore } from 'pinia'

// import { ref } from 'vue'
function saveState(key: string, state: any) {
  localStorage.setItem(key, JSON.stringify(state));
}
function loadState(key: string) {
  const state = localStorage.getItem(key);
  return state ? JSON.parse(state) : null;
}``
export const useAuthStore = defineStore('auth', {
  state: () => ({
    isAuthenticated: false,
    user: {
      profileImage: ''
    }
  }),
  actions: {
    login(userProfileImage: string, token: string) {
      this.isAuthenticated = true;
      this.user.profileImage = userProfileImage;
      saveState('auth', this.$state);
    },
    logout() {
      this.isAuthenticated = false;
      this.user.profileImage = '';
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

// export const useAuthStore = defineStore('auth', () => {
//   const user = ref()
//   const isAuthenticated = ref()
//   const permissions = ref()
//   const roles = ref()

//   return {
//     user,
//     roles,
//     permissions,
//     isAuthenticated
//   }
// })