import ChatVue from '@/views/chat/ChatVue.vue'
const routes = [
    {
        path: '/admin/dashboard',
        name: 'dashboard',
        component: () => import('@/views/Admin/DashboardView.vue'),
        meta: {
            requiresAuth: true,
            role: 'admin'
        }
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('@/views/Admin/Auth/LoginView.vue')
    },
    {
        path: '/',
        name: 'home',
        component: () => import('@/views/Web/HomeView.vue')
    },

    {
        path: '/post',
        name: 'post',
        component: () => import('@/views/Web/Post/ListView.vue')
    },
    {
        path: '/register',
        name: 'register',
        component: () => import('@/views/Admin/Auth/RegisterView.vue')
    },
    {
        path: '/resetpassword',
        name: 'resetpassword',
        component: () => import('@/views/Admin/Auth/ResetPasswordView.vue')
    }

    ,
    {
        path: '/detail',
        name: 'detail',
        component: () => import('@/views/Web/FoodDetail/FoodDetail.vue')
    },
    {
        path: '/category',
        name: 'category',
        component: () => import('@/views/Web/Category/Category.vue')
    },
    {
        path: '/aboutus',
        name: 'aboutus',
        component: () => import('@/views/Web/AboutUs/ListView.vue')
    },
    {
        path: '/user',
        name: 'user',
        component: () => import('@/views/Web/User/Profile.vue')
    },
    {
        path: '/user/save',
        name: 'user/save',
        component: () => import('@/views/Web/User/SaveRecipes.vue')
    },
    {
        path: '/user/folder',
        name: 'user/folder',
        component: () => import('../views/Web/User/Folder.vue')
    },
    {
        path: '/user/edit',
        name: 'user/edit',
        component: () => import('@/views/Web/User/EditProfile.vue')
    }
    ,
    {
        path: '/chat',
        name: 'chat',
        component: ChatVue,
    },
    {
        path: '/aboutUsUpdateForm',
        name: 'aboutUsUpdate',
        component: () => import('@/views/Admin/Auth/AboutUs/AboutUsUpdateView.vue')
    }
]

export default routes;