<template>
    <NavbarView></NavbarView>
    <div class="container mt-60 " style="height: 100%;">
        <div class="sidebar">
            <div class="illustration">
                <img src="../../../assets/ContainerImages/homePoster.png" alt="Illustration" />
            </div>
        </div>
        <div class="containerLeft d-flex ml-20 ">
            <div class="formLeft">
                <div class="heading">
                    <h2>Add Your Profile</h2>
                </div>
                <div class="content">
                    <div class="hours" @click="handleImageClick">
                        <img ref="image" src="../../../assets/ContainerImages/phanit.jpg" alt="Edge Gallery Logo"
                            height="250px" />
                        <span class="material-symbols-outlined">photo_camera</span>
                        <input type="file" ref="fileInput" style="display: none;" @change="handleImageChange"
                            accept="image/*">
                    </div>
                    <div class="location">
                        <h2>Add Your Address</h2>
                        <form @submit.prevent="handleSubmit">
                            <div class="input-group">
                                <label for="username">House Number:</label>
                                <input type="text" id="username" v-model="username" required />
                            </div>
                            <div class="input-group">
                                <label for="Street">Street Number:</label>
                                <input type="text" v-model="password" required />
                            </div>
                            <div class="input-group">
                                <label for="street name">Street Name:</label>
                                <input type="text" v-model="password" required />
                            </div>
                            <div class="input-group">
                                <label for="password">Sangkat/Commune:</label>
                                <input type="password" v-model="password" required />
                            </div>
                            <div class="input-group">
                                <label for="password">Khan/District:</label>
                                <input type="password" v-model="password" required />
                            </div>
                            <div class="input-group">
                                <label for="password">City/Province:</label>
                                <input type="password" v-model="password" required />
                            </div>
                            <button class=" btn btn-danger">Pin on map</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="login-box" style="height: 160vh;">
                <h2>Register New Account</h2>
                <form>
                    <div class="input-group">
                        <label for="username">Username </label>
                        <input type="text" id="username" v-model="username" required />
                    </div>
                    <div class="input-group">
                        <label for="email">Email </label>
                        <input type="email" id="email" v-model="email" required />
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" v-model="password" required />
                    </div>
                    <div class="input-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" v-model="password" required />
                    </div>
                    <div class="input-group">
                        <label for="captcha">Date of birth</label>
                        <input type="date" id="date" v-model="date" required />
                    </div>
                    <div class="input-group">
                        <label for="gender">Gender:</label><br>
                        <div class="input-group ">
                            <div class="gender">
                                <input type="radio" id="male" name="gender" value="male">
                                <label for="male">Female</label>

                            </div>
                            <div class="gender " style="margin-left: 40px;">
                                <input type="radio" id="male" name="gender" value="male">
                                <label for="male">Male</label>

                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="captcha">Phone number</label>
                        <input type="text" id="date" v-model="date" required />
                    </div>


                    <button type="submit">Log In</button>
                    <div class="links">
                        <a href="/register">Free Registration</a>
                        <a href="/forgot-password">Forgot password?</a>
                    </div>
                </form>

                <div class="googleMap">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2072142.8891111037!2d104.49797514186897!3d12.565679435349416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095137e50f30b1%3A0x8c46a30fd8f40a27!2sCambodia!5e0!3m2!1sen!2sus!4v1624942392507!5m2!1sen!2sus"
                            width="100%" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <FooterView></FooterView>
</template>

<script>
import NavbarView from '../../Web/Navbar/NavbarView.vue';
import FooterView from '../../Web/Footer/FooterView.vue';
import axios from 'axios';

export default {
    name: "FormView",
    components: {
        NavbarView,
        FooterView
    },
    data() {
        return {
            form: {
                username: '',
                email: '',
                password: '',
                confirmPassword: '',
                dateOfBirth: '',
                gender: '',
                phoneNumber: ''
            },
            address: {
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
        handleImageClick() {
            // Trigger the file input dialog
            this.$refs.fileInput.click();
        },
        handleImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    // Update the image src with the selected file's data URL
                    this.$refs.image.src = reader.result;
                };
                reader.readAsDataURL(file);
            }
        },
        handlePinOnMap() {
            // Handle the logic for pinning the address on the map
            // You can use the collected address data here
            console.log(this.address);
        },
        async registerAccount() {
            try {
                const response = await axios.post('http://localhost:8000/api/register', this.form);
                // Handle successful registration (e.g., navigate to a different page or show a success message)
                console.log(response.data);
            } catch (error) {
                // Handle errors (e.g., show an error message)
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