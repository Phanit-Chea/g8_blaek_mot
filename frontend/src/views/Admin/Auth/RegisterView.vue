<template>
    <div>
        <!-- Button trigger modal -->
        <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrationModal">Registration</button> -->

        <!-- Modal -->
        <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Change modal size here -->
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="d-flex justify-content-between align-items-center border-b p-2">
                            <h3 class="text-success m-0">Registration</h3>
                            <p class="fs-17 m-0 text-dark">Already have an account? <a href="#" class="text-success">Login to your account</a></p>
                        </div>
                        <div class="p-3">
                            <form >
                                <fieldset class="grid grid-cols-2 gap-2">
                                    <div class="col-span-2 mb-2">
                                        <label for="fullName" class="block text-sm font-medium text-success">Full Name</label>
                                        <input type="text" id="fullName"
                                            class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500">
                                    </div>
                                    <div class="col-span-2 mb-2">
                                        <label for="email" class="block text-sm font-medium text-success">Email address</label>
                                        <input type="email" id="email"
                                            class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500">
                                    </div>
                                    <div class="mb-2">
                                        <label for="password" class="block text-sm font-medium text-success">Password</label>
                                        <input type="password" id="password"
                                            class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500">
                                    </div>
                                    <div class="mb-2">
                                        <label for="phone" class="block text-sm font-medium text-success">Phone</label>
                                        <input type="number" id="phone"
                                            class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500">
                                    </div>
                                    <div class="mb-2">
                                        <label for="gender" class="block text-sm font-medium text-success">Gender</label>
                                        <select id="gender"
                                            class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500"
                                            style="height: 4.5vh;">
                                            <option value="" selected></option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="age" class="block text-sm font-medium text-success">Age</label>
                                        <input type="number" id="age"
                                            class="mt-1 block w-full rounded-md border-black border-1 shadow-sm focus:ring-indigo-500">
                                    </div>
                                    <div class="col-span-2 mb-2">
                                        <label for="province" class="block text-sm font-medium text-success">Province</label>
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
                                        <button type="submit"
                                            class="hover:bg-blue-700 text-white font-bold py-0.6 px-4 rounded"
                                            style="background-color: seagreen; border: none;">Sign Up</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
};
</script>

<style scoped>
/* Add any additional styles here */
</style>
