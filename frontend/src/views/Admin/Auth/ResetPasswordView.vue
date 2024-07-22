<!-- <template>
  <div>
    <button
      class="btn btn-primary"
      type="button"
      data-bs-toggle="modal"
      data-bs-target="#resetPasswordModal"
    >
      Reset Password
    </button>
    <div
      class="modal fade"
      id="resetPasswordModal"
      tabindex="-1"
      aria-labelledby="resetPasswordModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body p-3">
            <form @submit.prevent="resetPassword">
              <fieldset class="flex flex-col gap-2">
                <div class="mb-3 w-full">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    v-model="formData.email"
                    required
                  />
                </div>
                <div class="mb-3 w-full">
                  <label for="token" class="form-label">Token</label>
                  <input
                    type="text"
                    class="form-control"
                    id="token"
                    v-model="formData.token"
                    required
                  />
                </div>
                <div class="mb-3 w-full">
                  <label for="password" class="form-label">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    v-model="formData.password"
                    required
                  />
                </div>
                <div class="mb-3 w-full">
                  <label for="confirmPassword" class="form-label">Confirm Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="confirmPassword"
                    v-model="formData.confirmPassword"
                    required
                  />
                </div>
                <div class="flex flex-col items-center mb-2 gap-4">
                  <button
                    type="submit"
                    class="btn text-white font-bold py-2 px-4 rounded"
                    style="
                      background-color: seagreen;
                      border: none;
                      margin-top: 15px;
                      height: 6vh;
                      margin-bottom: 12px;
                    "
                  >
                    Reset Password
                  </button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import axios from 'axios'
import bootstrap from 'bootstrap'

export default {
  setup() {
    const formData = ref({
      email: '',
      token: '',
      password: '',
      confirmPassword: ''
    })

    const resetPassword = async () => {
      if (formData.value.password !== formData.value.confirmPassword) {
        alert('Passwords do not match!')
        return
      }

      try {
        const response = await axios.post('http://127.0.0.1:8000/api/resetPassword', {
          email: formData.value.email,
          token: formData.value.token,
          password: formData.value.password,
          password_confirmation: formData.value.confirmPassword
        })

        // Handle successful password reset
        console.log(response)
        alert('Password reset successful!')

        // Clear the form
        formData.value.email = ''
        formData.value.token = ''
        formData.value.password = ''
        formData.value.confirmPassword = ''

        // Close the modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('resetPasswordModal'))
        modal.hide()
      } catch (error) {
        console.error(error)
        alert(error.response?.data?.message || 'An error occurred while resetting the password.')
      }
    }

    return {
      formData,
      resetPassword
    }
  }
}
</script>

<style scoped>
/* Add any additional styles if needed */
</style> -->
