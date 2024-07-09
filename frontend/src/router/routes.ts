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
    },
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
        path: '/category/:id',
        name: 'category-list',
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
        path: '/admin/userList',
        name: 'user/list',
        component: () => import('@/views/Admin/User/ListView.vue')
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
    },
    {
        path: '/create/food',
        name: '/create/food',
        component: () => import('@/views/Admin/Food/FormAddFoodView.vue')
    },
    {
        path: '/food/list',
        name: '/food/list',
        component: () => import('@/views/Admin/Food/ListView.vue')
    },
    {
        path: '/food/edit/:id',
        name: 'edit-food',
        component: () => import('@/views/Admin/Food/Edit.vue')
    },



]

export default routes;