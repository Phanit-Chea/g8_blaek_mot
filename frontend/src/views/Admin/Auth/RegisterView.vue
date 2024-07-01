<template>
    <div>
        <NavbarView></NavbarView>
        <div class="container mt-60" style="height: 100%;">
            <div class="sidebar">
                <div class="illustration">
                    <img src="../../../assets/ContainerImages/homePoster.png" alt="Illustration" />
                </div>
            </div>
            <div class="containerLeft d-flex ml-20">
                <div class="formLeft">
                    <div class="heading">
                        <h2>Add Your Profile</h2>
                    </div>
                    <div class="content">
                        <div class="hours">
                            <img v-if="form.profilePreview" :src="form.profilePreview" alt="Selected Image"
                                height="250px" />
                            <label for="fileInput" class="material-symbols-outlined">photo_camera</label>
                            <input type="file" id="fileInput" ref="fileInput" style="display: none;"
                                @change="handleProfileChange" accept="image/*">
                        </div>
                        <div class="location">
                            <h2>Add Your Address</h2>
                            <form @submit.prevent="registerAccount">
                                <div class="input-group">
                                    <label for="houseNumber">House Number:</label>
                                    <input type="text" id="houseNumber" v-model="form.houseNumber" required />
                                </div>
                                <div class="input-group">
                                    <label for="streetNumber">Street Number:</label>
                                    <input type="text" id="streetNumber" v-model="form.streetNumber" required />
                                </div>
                                <div class="input-group">
                                    <label for="streetName">Street Name:</label>
                                    <input type="text" id="streetName" v-model="form.streetName" required />
                                </div>
                                <div class="input-group">
                                    <label for="commune">Sangkat/Commune:</label>
                                    <input type="text" id="commune" v-model="form.commune" required />
                                </div>
                                <div class="input-group">
                                    <label for="district">Khan/District:</label>
                                    <input type="text" id="district" v-model="form.district" required />
                                </div>
                                <div class="input-group">
                                    <label for="province">City/Province:</label>
                                    <input type="text" id="province" v-model="form.province" required />
                                </div>
                                <button type="submit" class="btn btn-danger">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="login-box" style="height: 160vh;">
                    <h2>Register New Account</h2>
                    <form @submit.prevent="registerAccount">
                        <div class="input-group">
                            <label for="name">Username:</label>
                            <input type="text" id="name" v-model="form.name" required />
                        </div>
                        <div class="input-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" v-model="form.email" required />
                        </div>
                        <div class="input-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" v-model="form.password" required />
                        </div>
                        <div class="input-group">
                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" v-model="form.confirmPassword" required />
                        </div>
                        <div class="input-group">
                            <label for="dateOfBirth">Date of Birth:</label>
                            <input type="date" id="dateOfBirth" v-model="form.dateOfBirth" required />
                        </div>
                        <div class="input-group">
                            <label for="gender">Gender:</label>
                            <div class="gender">
                                <input type="radio" id="female" name="gender" value="female" v-model="form.gender">
                                <label for="female">Female</label>
                            </div>
                            <div class="gender" style="margin-left: 40px;">
                                <input type="radio" id="male" name="gender" value="male" v-model="form.gender">
                                <label for="male">Male</label>
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="phoneNumber">Phone number:</label>
                            <input type="text" id="phoneNumber" v-model="form.phoneNumber" required />
                        </div>
                        <button type="submit">Register</button>
                        <div class="links">
                            <a href="/register">Free Registration</a>
                            <a href="/forgot-password">Forgot password?</a>
                        </div>
                    </form>
                </div>
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
                houseNumber: '',
                streetNumber: '',
                streetName: '',
                commune: '',
                district: '',
                province: ''
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
            formData.append('houseNumber', this.form.houseNumber);
            formData.append('streetNumber', this.form.streetNumber);
            formData.append('streetName', this.form.streetName);
            formData.append('commune', this.form.commune);
            formData.append('district', this.form.district);
            formData.append('province', this.form.province);
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
            }
        }
    }
}
</script>



<style scoped>
body {
    height: 100vh;
    margin: 5%;
}

.logo {
    position: relative;
    display: inline-block;
}

.logo img {
    display: block;
}

.gender {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.gender label {
    margin-left: 5px;
}

.material-symbols-outlined {
    /* /* position: absolute;
    top: 100%;
    right: 42%;
    font-size: 24px;
    color: white;
    background-color: rgba(224, 51, 51, 0.5);
    border-radius: 50%; */
    padding: 5px;
}

.container {
    display: flex;
    flex-direction: column;
    height: 100%;

}

.sidebar {
    display: flex;
    justify-content: center;
    align-items: center;
    /* margin-bottom: 20px; */
    height: 100%;
}

.illustration {
    display: flex;
    margin-left: 10%;
    margin-right: 10%;
    width: 100%;
}

.sidebar .illustration img {
    width: 100%;
    height: 300px;
}

.login-box {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(66, 30, 91, 0.463);
    width: 50%;
    height: auto;
    margin-top: 10px;
}

.logo {
    display: flex;
    justify-content: center;
    width: 100%;
}

.logo img {
    display: flex;
    border-radius: 100%;
    justify-content: center;
    width: 20%;
}

h2 {
    margin-bottom: 20px;
    color: #4b2e83;
}

.input-group {
    margin-bottom: 0px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 2px;
    color: #333;
}

input {
    width: calc(100% - 20px);
    padding: 4px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.captcha-code {
    display: inline-block;
    margin-left: 10px;
    font-weight: bold;
    color: #4b2e83;
}

button {
    width: 97%;
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

.googleMap {
    margin-top: 20px;
    margin-bottom: 20px;
    width: 100%;
    height: 450px;
}

.map-container {
    box-shadow: 0 0 10px rgba(66, 30, 91, 0.463);
    position: relative;
    width: 100%;
    height: 60%;
    overflow: hidden;
    border-radius: 8px;
}

.map-container iframe {
    width: 100%;
    height: 100%;
    border: 0;
}

.containerLeft {
    display: flex;
}

.formLeft {
    display: flex;
    flex-direction: column;
    width: 30%;
    box-shadow: 0 0 20px rgba(66, 30, 91, 0.463);
    margin-top: 10px;
    margin-left: 5%;
    margin-right: 3%;
    border-radius: 8px;
    padding: 20px;
}

.hours,
.location {
    max-width: 500px;
    box-shadow: 0 0 20px rgba(66, 30, 91, 0.463);
    margin-top: 10px;
    border-radius: 8px;
    padding: 20px;
}

.hours {
    position: relative;
    width: 100%;
    /* Adjust this as needed */
    max-width: 500px;
    /* Adjust this as needed */
    display: inline-block;

}

.hours img {
    width: 100%;
    max-height: 500px;
    display: block;
}

.hours .material-symbols-outlined {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    color: white;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    padding: 5px;
}
</style>