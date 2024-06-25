<template>
  <div>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createFoodModal">
      Create Food
    </button>
    
    <!-- Modal form for creating food -->
    <div class="modal fade" id="createFoodModal" tabindex="-1" aria-labelledby="createFoodModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title" id="createFoodModalLabel">Create Food</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-1.5">
                <label for="foodName" class="form-label">Food Name</label>
                <input type="text" class="form-control" id="foodName" v-model="foodName" required>
              </div>
              <div class="mb-1.5">
                <label for="foodImage" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="foodImage" required>
              </div>
              <div class="mb-1.5">
                <label for="videoUrl" class="form-label">Video URL</label>
                <input type="url" class="form-control" id="videoUrl" v-model="videoUrl" required>
              </div>
              <div class="mb-1.5">
                <label for="cookingTime" class="form-label">Cooking Time</label>
                <input type="text" class="form-control" id="cookingTime" v-model="cookingTime" required>
              </div>
              <div class="mb-1.5">
               <label for="Ingredient" class="form-label">Ingredient</label>
                <textarea class="form-control" id="Ingredient" v-model="Ingredient" rows="3" placeholder="Write ingredient" required></textarea>
              </div>
              <div class="mb-1.5">
                <label for="cookingInstructions" class="form-label">How to cook </label>
                <textarea class="form-control" id="cookingInstructions" v-model="howtocook" rows="3" placeholder="How to cook step-by-step" required></textarea>
              </div>
              <button type="SUBMIT" class="btn btn-success btn-lg w-35">SUBMIT</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
h1 {
  color: rgb(92, 181, 4);
}

.modal-header {
  border-bottom: 1px solid #dee2e6;
}

.modal-body {
  padding: 1.5rem;
}

.form-label {
  font-weight: bold;
}


.btn-success {
  text-align: center;
  background-color: #05b83b;
  border: none;
  padding: 0.5rem 1rem;
  font-size: 1rem;
  cursor: pointer;
}
</style>