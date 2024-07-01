<template>
    <div class="register">
        <NavbarView></NavbarView>
        <div class="container d-flex" style="margin-top: 180px;">

            <div class="login-box">
                <h2 class="text-center text-success">បង្កើតគណនីថ្មី</h2>
                <form @submit.prevent="registerAccount">
                    <div class="input-group">
                        <label for="name">ឈ្មោះ:</label>
                        <input type="text" id="name" v-model="form.name" required />
                    </div>
                    <div class="input-group">
                        <label for="email">អុីមែល:</label>
                        <input type="email" id="email" v-model="form.email" required />
                    </div>
                    <div class="input-group">
                        <label for="password">លេខសម្ងាត់:</label>
                        <input type="password" id="password" v-model="form.password" required />
                    </div>
                    <div class="input-group">
                        <label for="confirmPassword">លេខកូដសម្ងាត់ថ្មី:</label>
                        <input type="password" id="confirmPassword" v-model="form.confirmPassword" required />
                    </div>
                    <div class="input-group">
                        <label for="dateOfBirth">ថ្ងៃខែកំណើត:</label>
                        <input type="date" id="dateOfBirth" v-model="form.dateOfBirth" required />
                    </div>
                    <div class="input-group">
                        <label for="gender">ភេទ:</label>
                        <div class="input-group">
                            <div class="gender">
                                <input type="radio" id="female" name="gender" value="female" v-model="form.gender">
                                <label for="female">ស្រី</label>
                            </div>
                            <div class="gender" style="margin-left: 40px;">
                                <input type="radio" id="male" name="gender" value="male" v-model="form.gender">
                                <label for="male">ប្រុស</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="phoneNumber">លេខទូរស័ព្ទ:</label>
                        <input type="text" id="phoneNumber" v-model="form.phoneNumber" required />
                    </div>
                    <div class="input-group">
                        <label for="address">អាស័យដ្ធាន:</label>
                        <input type="text" id="address" v-model="form.address" required />
                    </div>
                    <div class="input-group">
                        <label for="profile">រូបភាពផ្ទាល់ខ្លួន:</label>
                        <div class="input-group">

                            <input type="file" id="profile" @change="handleProfileChange" />
                            <img :src="form.profilePreview" alt="Profile Preview" v-if="form.profilePreview" class="profile-preview" />
                        </div>
                    </div>
                    <button type="submit">Register</button>
                    <div class="links">
                        <a href="/register">Free Registration</a>
                        <a href="/forgot-password">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
        <FooterView></FooterView>
    </div>
</template>

<script>
import NavbarView from '../../Web/Navbar/NavbarView.vue';
import FooterView from '../../Web/Footer/FooterView.vue';
import axios from 'axios';
import { useUserStore } from '../../../stores/userStore';

export default {
    name: "FormView",
    components: {
        NavbarView,
        FooterView
    },
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                confirmPassword: '',
                dateOfBirth: '',
                gender: '',
                phoneNumber: '',
                profile: null,
                profilePreview: null,
                address: ''
            }
        };
    },
    methods: {
        handleProfileChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.form.profile = file;
                this.form.profilePreview = URL.createObjectURL(file);
            }
        },
        async registerAccount() {
            const userStore = useUserStore();
            userStore.setUser(this.form);

            console.log(userStore.user);

            const formData = new FormData();
            formData.append('name', this.form.name);
            formData.append('email', this.form.email);
            formData.append('password', this.form.password);
            formData.append('confirmPassword', this.form.confirmPassword);
            formData.append('dateOfBirth', this.form.dateOfBirth);
            formData.append('gender', this.form.gender);
            formData.append('phoneNumber', this.form.phoneNumber);
            formData.append('profile', this.form.profile);
            formData.append('address', this.form.address);

            try {
                const response = await axios.post('http://127.0.0.1:8000/api/register', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                console.log(response.data);
                alert('Registration successful! You can now log in.');
                this.$router.push('/');
            } catch (error) {
                console.error(error);
                alert('Registration failed. Please try again.');
            }
        }
    }
}
</script>

<style scoped>
.register {
    background-color: rgb(239, 236, 236);
}

.banner {
    width: 50%;
    height: 100%;
    /* background-image: url('../../../assets/CategoryImages/7caf80c5e8b93f5a5307b4a089777047.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover; */
    background-color: teal;
}

.container {
    display: flex;
    width: 70%;
    height: 100%;
    /* background-color: rgb(220, 217, 217); */
    box-shadow: 0 0 20px rgba(66, 30, 91, 0.463);
}

.login-box {
    width: 100%;
    padding: 20px;
    box-shadow: 0 0 20px rgba(66, 30, 91, 0.463);
    background-color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

h2 {
    margin-bottom: 20px;
    color: #4b2e83;
}

.input-group {
    margin-bottom: 10px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="date"] {
    width: calc(100% - 20px);
    padding: 3px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="file"] {
    padding: 3px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4b2e83;
    border: none;
    border-radius: 100px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}

button:hover {
    background-color: #3a2267;
}

.links {
    margin-top: 20px;
}

.links a {
    color: #4b2e83;
    text-decoration: none;
    margin: 0 10px;
}

.links a:hover {
    text-decoration: underline;
}

.gender {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.gender label {
    margin-left: 5px;
}

.profile-preview {
    margin-top: 10px;
    max-width: 100%;
    max-height: 200px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
</style>
