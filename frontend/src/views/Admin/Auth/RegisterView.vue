<!-- <template>
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

</template> -->
<template>
    <NavbarView></NavbarView>


    <div class="container d-flex justify-content-center align-items-center mt-40 siemreap">
        <section class="registerForm">
            <header class="fw-bold text-success fs-3">បង្កើតគណនីថ្មី</header>
            <form class="form" @submit.prevent="registerAccount">
                <div class="input-box">
                    <label>ឈ្មោះ</label>
                    <input placeholder="សូមបញ្ចូលឈ្មោះរបស់អ្នក" type="text" v-model="form.name">
                </div>
                <div class="input-box">
                    <label>លេខកូដសម្ងាត់</label>
                    <input placeholder="សូមបញ្ចូលលេខកូដសម្ងាត់របស់អ្នក" type="password" v-model="form.password">
                </div>
                <div class="input-box">
                    <label>បញ្ជាក់លេខកូដសម្ងាត់</label>
                    <input placeholder="សូមបញ្ជាក់លេខកូដរបស់អ្នក" type="password" v-model="form.confirmPassword">
                </div>
                <div class="column">
                    <div class="input-box">
                        <label>អុីមែល</label>
                        <input placeholder="សូមបញ្ចូលអុីមែលរបស់អ្នក" type="email" v-model="form.email">
                    </div>
                    <div class="input-box">
                        <label>រូបភាពផ្ទាល់ខ្លួន</label>
                        <input type="file" @change="handleFileUpload">
                    </div>
                </div>
                <div class="column">
                    <div class="input-box">
                        <label>លេខទូរស័ព្ទ</label>
                        <input placeholder="Enter phone number" type="tel" v-model="form.phoneNumber">
                    </div>
                    <div class="input-box">
                        <label>ថ្ងៃខែកំណើត</label>
                        <input placeholder="Enter birth date" type="date" v-model="form.dateOfBirth">
                    </div>
                </div>
                <div class="gender-box">
                    <label>ភេទ</label>
                    <div class="gender-option">
                        <div class="gender">
                            <input name="gender" id="check-female" type="radio" v-model="form.gender" value="female">
                            <label for="check-female">ស្រី</label>
                        </div>
                        <div class="gender">
                            <input name="gender" id="check-male" type="radio" v-model="form.gender" value="male">
                            <label for="check-male">ប្រុស</label>
                        </div>
                    </div>
                </div>
                <div class="input-box address">
                    <label>អាស័យដ្ធាន</label>
                    <input placeholder="សូមបញ្ចូលអាស័យដ្ធានរបស់អ្នក" type="text" v-model="form.address">
                </div>
                <button type="submit">បង្កើតអាខោន</button>
            </form>
        </section>
    </div>




    <FooterView></FooterView>
</template>
<script lang="ts">
import NavbarView from '../../Web/Navbar/NavbarView.vue';
import FooterView from '../../Web/Footer/FooterView.vue';
import axios from 'axios';
import { useAuthStore } from '../../../stores/auth-store';
import { useUserStore } from '../../../stores/userStore';
import { useRouter } from 'vue-router';

export default {
    components: {
        NavbarView,
        FooterView,
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
                profile: '',
                address: ''
            }
        };
    },
    methods: {
        handleFileUpload(event) {
            const file = event.target.files[0];
            // this.form.profile = file.name;
            this.form.profile = file;

        },

        async registerAccount() {
            const userStore = useUserStore();
            const authStore = useAuthStore();

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

                // Assuming the response contains the user data and access token
                const user = response.data.user;
                const profileImage = user.profile;
                const accessToken = response.data.access_token; // Get access token from response

                // Store the profile image and access token in Pinia
                authStore.login(profileImage, accessToken);
                userStore.setUser(user);

                this.$router.push('/');
            } catch (error) {
                console.error(error);
                alert('Registration failed. Please try again.');
            }
        }
    }

}

</script>
<style>
.siemreap {
    font-family: 'Siemreap', cursive;
}

.registerForm {
    position: relative;
    max-width: 700px;
    width: 100%;
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

}

.registerFormheader {
    font-size: 1.2rem;
    color: #000;
    font-weight: 600;
    text-align: center;
}

.registerForm.form {
    margin-top: 15px;
}

.form .input-box {
    width: 100%;
    margin-top: 10px;
}

.input-box label {
    color: #000;
}

.form :where(.input-box input, .select-box) {
    position: relative;
    height: 35px;
    width: 100%;
    outline: none;
    font-size: 1rem;
    color: #808080;
    margin-top: 5px;
    border: px solid green;
    border-radius: 6px;
    padding: 0 15px;
    background: white;
}

.input-box input:focus {
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}

.form .column {
    display: flex;
    column-gap: 15px;
}

.form .gender-box {
    margin-top: 10px;
}

.form :where(.gender-option, .gender) {
    display: flex;
    align-items: center;
    column-gap: 50px;
    flex-wrap: wrap;
}

.form .gender {
    column-gap: 5px;
}

.gender input {
    accent-color: #EE4E34;
}

.form :where(.gender input, .gender label) {
    cursor: pointer;
}

.gender label {
    color: #000;
}

.address :where(input, .select-box) {
    margin-top: 10px;
}

.select-box select {
    height: 100%;
    width: 100%;
    outline: none;
    border: none;
    color: #808080;
    font-size: 1rem;
    background: #FCEDDA;
}

.form button {
    height: 40px;
    width: 100%;
    color: #000;
    font-size: 1rem;
    font-weight: 400;
    margin-top: 15px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
    background: white;
    border: 2px solid green;
}

.form button:hover {
    box-shadow: 2px 1px 1px 2px green;
    background-color: green;
    color: white;
}
</style>
