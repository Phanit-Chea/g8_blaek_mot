import { defineStore } from 'pinia'
// import { ref } from 'vue'
export const useAuthStore = defineStore('auth', {
  state: () => ({
    isAuthenticated: false,
    user: {
      profileImage: ''
    }
  }),
  actions: {
    login(userProfileImage: string) {
      this.isAuthenticated = true;
      this.user.profileImage = userProfileImage;
    },
    logout() {
      this.isAuthenticated = false;
      this.user.profileImage = '';
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
