<template>
  <div>
    <!-- Button trigger modal -->
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#resetPasswordModal">Reset Password</button>

    <!-- Modal -->
    <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="display: flex; justify-content: end;">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-3" style="margin-left: 15px; margin-right: 15px;">
            <div class="d-flex justify-content-center border-b mb-3">
              <h3 class="text-success">Reset Password</h3>
            </div>
            <form>
              <fieldset class="flex flex-col gap-2">
                <div class="mb-3 w-full">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control w-full" id="password">
                </div>
                <div class="mb-3 w-full">
                  <label for="confirmPassword" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control w-full" id="confirmPassword">
                </div>
                <div class="flex flex-col items-center mb-2 gap-4">
                  <button type="submit" class="btn text-white font-bold py-2 px-4 rounded"
                    style="background-color: seagreen; border: none; margin-top: 15px; height: 6vh; margin-bottom: 12px;">Reset Password</button>
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
export default {
};
</script>

<style scoped>
/* Add any additional styles here */
</style>
