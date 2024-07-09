<template>
  <div class="col py-3">
    <div class="container mx-auto mt-4">
      <div class="row d-flex">
          <div class="card ms-4" style=" width:22.5%" v-for="food in foods" :key="food.id" >
            <img  :src="`http://127.0.0.1:8000/${food.image}`" class="card-img" alt="..." />
            <div class="card-body d-flex justify-content-between px-0">
              <h4 class="card-title text-dark ">{{food.name}}</h4>
              <router-link :to="{ name: 'food-detail', params: { id: food.id } }" class="btn " style="background-color: #54983c">Detail</router-link>
            </div>
          </div>
          
        </div>
      </div>
    </div>
</template>

<script>
export default {
  props: {
    foods: {
      type: Array,
      required: true,
    },
  },
  // other component options
}
</script>

<style scoped>
.card {
  background: white;
  /* border: 1px solid white; */
  color: rgba(250, 250, 250, 0.8);
  margin-bottom: 2rem;
  transition: transform 0.3s ease;
}

.card {
    transition: box-shadow 0.3s ease-in-out;
  }

  .card:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
  }

img {
  height: 220px;
  padding-top: 10px;
}
</style>