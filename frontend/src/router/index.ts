import { createRouter, createWebHistory } from 'vue-router'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
import ChatVue from '@/views/chat/ChatVue.vue'
const simpleAcl = createAcl({})
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/admin/dashboard',
      name: 'dashboard',
      component: () => import('../views/Admin/DashboardView.vue'),
      meta: {
        requiresAuth: true,
        role: 'admin'
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/Admin/Auth/LoginView.vue')
    },
    {
      path: '/',
      name: 'home',
      component: () => import('../views/Web/HomeView.vue')
    },

    {
      path: '/post',
      name: 'post',
      component: () => import('../views/Web/Post/ListView.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/Admin/Auth/RegisterView.vue')
    },
    {
      path: '/resetpassword',
      name: 'resetpassword',
      component: () => import('../views/Admin/Auth/ResetPasswordView.vue')
    }

    ,
    {
      path: '/detail',
      name: 'detail',
      component: () => import('../views/Web/FoodDetail/FoodDetail.vue')
    },
    {
      path: '/category',
      name: 'category',
      component: () => import('../views/Web/Category/Category.vue')
    },
    {
      path: '/aboutus',
      name: 'aboutus',
      component: () => import('../views/Web/AboutUs/ListView.vue')
    },
    {
      path: '/user',
      name: 'user',
      component: () => import('../views/Web/User/Profile.vue')
    },
    {
      path: '/user/save',
      name: 'user/save',
      component: () => import('../views/Web/User/SaveRecipes.vue')
    },
    {
      path: '/user/folder',
      name: 'user/folder',
      component: () => import('../views/Web/User/Folder.vue')
    },
    {
      path: '/user/edit',
      name: 'user/edit',
      component: () => import('../views/Web/User/EditProfile.vue')
    },
    {
      path: '/admin/user',
      name: 'admin/user',
      component: () => import('../views/Admin/User/ListView.vue')
    },
    {
      path: '/admin/food',
      name: 'admin/food',
      component: () => import('../views/Admin/Food/ListView.vue')
    },
    {
      path: '/admin/partnership',
      name: 'admin/partnership',
      component: () => import('../views/Admin/Partnership/ListView.vue')
    },
    {
      path: '/admin/setting',
      name: 'admin/setting',
      component: () => import('../views/Admin/Setting/ListView.vue')
    },
    {
      path: '/form',
      name: 'form',
      component: () => import('../views/Admin/Food/FormAddFoodView.vue')
    },
  ]
})

// router.beforeEach(async (to, from, next) => {
//   const publicPages = ['/login']
//   const authRequired = !publicPages.includes(to.path)
//   const store = useAuthStore()

//   try {
//     const { data } = await axiosInstance.get('/me')

//     store.isAuthenticated = true
//     store.user = data.data

//     store.permissions = data.data.permissions.map((item: any) => item.name)
//     store.roles = data.data.roles.map((item: any) => item.name)

//     const rules = () =>
//       defineAclRules((setRule) => {
//         store.permissions.forEach((permission: string) => {
//           setRule(permission, () => true)
//         })
//       })

//     simpleAcl.rules = rules()
//   } catch (error) {
//     /* empty */
//   }

//   if (authRequired && !store.isAuthenticated) {
//     next('/login')
//   } else {
//     next()
//   }
// })

export default { router, simpleAcl }
