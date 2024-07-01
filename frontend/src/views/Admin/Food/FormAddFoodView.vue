<template>
    <div class="formAddFood">
      <div class="container shadow w-100">
        <div class="col-8 m-auto p-3">
          <div class="card mb-3">
            <img src="../../../assets/FoodDetail/food3.jpg" class="card-img-top" alt="Food Image" style="height: 40vh; object-fit: cover;">
            <div class="card-body">
              <h3 class="card-title text-success m-2">Create Food</h3>
              <form class="addFood" id="addForm" style="margin-left: 13px; margin-right: 13px;">
                <div class="food-name row g-5" style="margin-bottom: 3px;">
                  <div class="col-md-6">
                    <label for="inputName" class="form-label">Food Name</label>
                    <input type="text" class="form-control" id="inputName" required>
                  </div>
                  <div class="col-md-6">
                    <label for="inputCookingTime" class="form-label">Cooking Time</label>
                    <input type="text" class="form-control" id="inputCookingTime" required>
                  </div>
                </div>
                <div class="food-image row g-5" style="margin-bottom: 5px;">
                  <div class="col-md-6">
                    <label for="formFile" class="form-label">Upload Image</label>
                    <input class="form-control" type="file" id="formFile" required>
                  </div>
                  <div class="col-md-6">
                    <label for="videoUrl" class="form-label">Video URL</label>
                    <input class="form-control" type="url" id="videoUrl" required>
                  </div>
                </div>
                <div class="nutrition row g-5" style="margin-bottom: 5px;">
                  <div class="col-md-6">
                    <label for="inputNutrition" class="form-label">Nutrition</label>
                    <input type="text" class="form-control" id="inputNutrition" required>
                  </div>
                  <div class="col-md-6">
                    <label for="inputIngredient" class="form-label">Ingredient</label>
                    <input type="text" class="form-control" id="inputIngredient" required>
                  </div>
                </div>
                <div class="howToCook row g-3" style="margin-right: 3px;">
                  <label for="inputHowToCook" class="form-label">How To Cook</label>
                  <input type="text" class="form-control" id="inputHowToCook" style="margin-left: 10px;" required>
                </div>
                <div class="buttonAdd">
                    <button type="submit" id="btn_create" class="btn btn-danger my-3 w-24">Cancel</button>
                    <button type="submit" id="btn_create" class="btn btn-success my-3">Create Food</button>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'FormAddFood',
  }
  </script>
  
  <style scoped>
  .formAddFood {
    background-color: white;
  }
  
  .formAddFood>h4 {
    color: #256c0b;
    position: relative;
    left: 20px;
  }
  
  .container {
    background: rgba(227, 227, 227, 0.74);
    width: 100%;
  }
  
  .image-food img {
    margin: 0;
    display: block;
    width: 100%;
    height: 400px;
  }
  
  .steps-container {
    display: flex;
    flex-direction: column;
  }
  
  .card {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    margin-bottom: 1px;
  }
  
  .form-control {
    margin-top: 5px;
  }
  
  .add-step-button {
    margin-top: 5px;
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px;
    background: #13b499;
    border-radius: 5px;
    border: none;
    color: #dee2e6;
  }
  
  #btn_create {
    margin: 20px;
  }
  .buttonAdd {
    display: flex;
    justify-content: end;
  }
  </style>
  