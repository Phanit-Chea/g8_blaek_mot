import { createRouter, createWebHistory } from 'vue-router'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'
import routes from './routes'
// import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
// import ChatVue from '@/views/chat/ChatVue.vue'
const simpleAcl = createAcl({})
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

router.beforeEach(async (to, from, next) => {
  const publicPages = ['/','/register','/login','/admin/dashboard',]
  const authRequired = !publicPages.includes(to.path)
  const store = useAuthStore()

  try {
    const { data } = await axiosInstance.get('/me')

    store.isAuthenticated = true
    store.user = data.data

    store.permissions = data.data.permissions.map((item: any) => item.name)
    store.roles = data.data.roles.map((item: any) => item.name)

    const rules = () =>
      defineAclRules((setRule) => {
        store.permissions.forEach((permission: string) => {
          setRule(permission, () => true)
        })
      })

    simpleAcl.rules = rules()
  } catch (error) {
    /* empty */
  }

  if (authRequired && !store.isAuthenticated) {
    next('/login')
  } else {
    next()
  }
})

export default { router, simpleAcl }
