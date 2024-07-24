<script>
import HeaderMenu from '../../../../src/Components/HeaderMenu.vue'
import ChatVue from '@/views/chat/ChatVue.vue';
import NavbarAdmin from '@/Components/NavbarAdmin.vue';

export default {
    name: 'list-food',
    components: {
        HeaderMenu,
        NavbarAdmin,
        ChatVue
    },
}
</script>
<template>
    <NavbarAdmin></NavbarAdmin>
    <div class="container-fluid" style="margin-top: 6%;">
        <div class="row flex-nowrap">
            <header-menu />
            <div class="container h-100" style="width: 70.8%;margin-top: -130px; background-color: red;">
                <ChatVue class="chat-vue"></ChatVue>
            </div>
        </div>
    </div>

</template>
<style scoped>
.chat-vue{
    width: 100%;
    margin-right: 50px;
}
</style>