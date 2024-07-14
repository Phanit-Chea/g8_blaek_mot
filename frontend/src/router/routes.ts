import ChatVue from '@/views/chat/ChatVue.vue'
const routes = [
    {
        path: '/admin/dashboard',
        name: 'dashboard',
        component: () => import('@/views/Admin/DashboardView.vue'),
        meta: {
            requiresAuth: true,
            role: 'admin'
        },
    },
    {
        path: '/admin/category',
        name: '/admin/category',
        component: () => import('@/views/Admin/CategoryAdmin/CategoryVue.vue')
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
        path: '/detail/:id',
        name: 'food-detail',
        component: () => import('@/views/Web/FoodDetail/FoodDetail.vue'),
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
        path: '/aboutUsSlideForm',
        name: 'aboutUsSlide',
        component: () => import('@/views/Admin/Auth/AboutUs/AboutUsSlideView.vue')
    },
    {
        path: '/admin/user',
        name: '/admin/user',
        component: () => import('@/views/Admin/User/ListView.vue')
    },
    {
        path: '/admin/food',
        name: '/admin/food',
        component: () => import('@/views/Admin/Food/ListView.vue')
    },
    {
        path: '/admin/partnership',
        name: '/admin/partnership',
        component: () => import('@/views/Admin/Partnership/ListView.vue')
    },
    {
        path: '/admin/setting',
        name: '/admin/setting',
        component: () => import('@/views/Admin/Setting/ListView.vue')
    },
    {
        path: '/create/food',
        name: '/create/food',
        component: () => import('@/views/Admin/Food/FormAddFoodView.vue')
    },
    {
        path: '/food/edit/:id',
        name: 'edit-food',
        component: () => import('@/views/Admin/Food/Edit.vue')
    },
    {
        path: '/map',
        name: 'map',
        component: () => import('@/views/Map/GoogleMap.vue')
    },
    {
        path: '/detail',
        name: 'detail',
        component: () => import('../views/Web/FoodDetail/FoodDetail.vue')
    },



]

export default routes;