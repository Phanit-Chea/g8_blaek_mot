<template>
    <div>
        <!-- Button trigger modal -->
        <button class="btn-primary" @click="isModalOpen = true">Registration</button>

        <!-- Modal -->
        <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-xl w-full">
                <div class="header" style="display: flex; justify-content: end; margin-right: 15px;">
                    <button class="text-gray-400 hover:text-gray-900 border-none" @click="isModalOpen = false">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 8.586l4.95-4.95a1 1 0 111.414 1.414L11.414 10l4.95 4.95a1 1 0 01-1.414 1.414L10 11.414l-4.95 4.95a1 1 0 01-1.414-1.414L8.586 10 3.636 5.05a1 1 0 111.414-1.414L10 8.586z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center justify-between p-2 border-b" style="margin-left: 15px; margin-right: 15px;">
                    <h3 class="text-success">Registration</h3>
                    <p class="fs-15" style="margin-top: 12px;">Already have an account? <a href="#" class="text-reset, text-success">Login to your account</a></p>
                </div>
                <div class="p-3" style="margin-left: 15px; margin-right: 15px;">
                    <form @submit.prevent="handleSubmit">
                        <fieldset class="grid grid-cols-2 gap-2">
                            <div class="col-span-2 mb-2">
                                <label for="fullName" class="block text-sm font-medium">Full Name</label>
                                <input type="text" id="fullName"
                                    class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500">
                            </div>
                            <div class="col-span-2 mb-2">
                                <label for="email" class="block text-sm font-medium">Email address</label>
                                <input type="email" id="email"
                                    class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500">
                            </div>
                            <div class="mb-2">
                                <label for="password" class="block text-sm font-medium">Password</label>
                                <input type="password" id="password"
                                    class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500">
                            </div>
                            <div class="mb-2">
                                <label for="phone" class="block text-sm font-medium">Phone</label>
                                <input type="number" id="phone"
                                    class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500">
                            </div>
                            <div class="mb-2">
                                <label for="gender" class="block text-sm font-medium">Gender</label>
                                <select id="gender"
                                    class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500"
                                    style="height: 4.5vh;">
                                    <option value="" selected></option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="age" class="block text-sm font-medium">Age</label>
                                <input type="number" id="age"
                                    class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500">
                            </div>
                            <div class="col-span-2 mb-2">
                                <label for="province" class="block text-sm font-medium">Province</label>
                                <select id="province"
                                    class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500"
                                    style="height: 4.5vh;">
                                    <option value="province" selected>Province</option>
                                    <option value="banteayMeanchey">Banteay Meanchey</option>
                                    <option value="battambang">Battambang</option>
                                    <option value="kampongCham">Kampong cham</option>
                                    <option value="kampongChhnamg">Kampong Chhnamg</option>
                                    <option value="kampongSpeu">Kampong Speu</option>
                                    <option value="kampongThom">Kampong Thom</option>
                                    <option value="kampot">Kampot</option>
                                    <option value="kandal">Kandal</option>
                                    <option value="kep">Kep</option>
                                    <option value="kohKong">Koh Kong</option>
                                    <option value="kratie">Kratie</option>
                                    <option value="mondulkiri">Mondulkiri</option>
                                    <option value="oddarMeanchey">Oddar Meanchey</option>
                                    <option value="pailin">Pailin</option>
                                    <option value="phnomPenh">Phnom Penh</option>
                                    <option value="preahSihanouk">Preah Sihanouk</option>
                                    <option value="preahVihear">Preah Vihear</option>
                                    <option value="preyVeng">Prey Veng</option>
                                    <option value="pursat">Pursat</option>
                                    <option value="ratanakiri">Ratanakiri</option>
                                    <option value="siemReap">Siem Reap</option>
                                    <option value="stungTreng">Stung Treng</option>
                                    <option value="svayRieng">Svay Rieng</option>
                                    <option value="takeo">Takeo</option>
                                    <option value="tboungKhmum">Tboung Khmum</option>
                                </select>
                            </div>
                            <div class="col-span-2 flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="terms" class="form-checkbox text-blue-600">
                                    <label for="terms" class="ml-2 text-sm">Accept all terms & condition</label>
                                </div>
                                <button type="submit" class="hover:bg-blue-700 text-white font-bold py-0.6 px-4 rounded"
                                    style="background-color: seagreen; border: none;">Sign Up</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isModalOpen: false
        };
    },
    methods: {
        handleSubmit() {
            this.isModalOpen = false;
            // Handle the form submission here
        }
    }
};
</script>

<style scoped>
/* Add any additional styles here */
</style>
