<template>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <header-menu />
      <div class="col">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <h1 class="navbar-brand fs-1">ប្រភេទមុខម្ហូប</h1>
            <button
              type="button"
              class="btn btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#createModal"
            >
              បង្កើតថ្មី
            </button>
          </div>
        </nav>
        <div class="table-container px-1 mt-4">
          <table id="categoryTable" class="table table-striped table-bordered" style="width: 100%">
            <thead>
              <tr>
                <th class="text-center">ប្រភេទមុខម្ហូប</th>
                <th class="text-center">ប្រភេទ</th>
                <th class="text-center">ព័ណ៌មានលំអិត</th>
                <th class="text-center">សកម្មភាព</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="category in categories" :key="category.id">
                <td class="text-center">{{ category.name }}</td>
                <td class="text-center">{{ category.title }}</td>
                <td class="text-center">{{ category.description }}</td>
                <td class="text-center">
                  <div class="btn-group" role="group">
                    <button
                      type="button"
                      class="btn btn-primary"
                      data-bs-toggle="modal"
                      data-bs-target="#staticBackdrop"
                      @click="openEditModal(category)"
                    >
                      កែសម្រួល
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger"
                      @click="deleteCategory(category.id)"
                    >
                      លុប
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Modal - Create Category -->
        <div
          class="modal fade"
          id="createModal"
          tabindex="-1"
          aria-labelledby="createModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <form @submit.prevent="createCategory">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="createModalLabel">បង្កើតប្រភេទមុខម្ហូប</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="title" class="form-label">ប្រភេទមុខម្ហូប</label>
                    <input
                      type="text"
                      class="form-control"
                      id="title"
                      v-model="newCategory.title"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">ឈ្មោះមុខម្ហូប</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      v-model="newCategory.name"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">រូបភាព</label>
                    <input
                      type="file"
                      class="form-control"
                      id="image"
                      @change="onFileChange"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">ព័ណ៌មានលំអិត</label>
                    <textarea
                      class="form-control"
                      id="description"
                      v-model="newCategory.description"
                      rows="3"
                      required
                    ></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    បោះបង់
                  </button>
                  <button type="submit" class="btn btn-primary">បង្កើតប្រភេទមុខម្ហូប</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal edite-->
  <div
    class="modal fade"
    id="editModal"
    tabindex="-1"
    aria-labelledby="editModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <form @submit.prevent="updateCategory" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="title" class="form-label">Category Title:</label>
                <input type="text" class="form-control" v-model="editCategory.title" id="title" required />
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Category Name:</label>
                <input type="text" class="form-control" v-model="editCategory.name" id="name" required />
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Category Description:</label>
                <textarea class="form-control" v-model="editCategory.description" id="description" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Category Image:</label>
                <input type="file" class="form-control" @change="onFileChange" id="editImageInput" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update Category</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</template>
  
<script setup lang="ts">
import HeaderMenu from '@/Components/HeaderMenu.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

// Define the Category interface
interface Category {
  id: number;
  title: string;
  name: string;
  description: string;
  image: string;
}

// Reactive references
const categories = ref<Category[]>([]);
const newCategory = ref<Category>({
  id: 0,
  title: '',
  name: '',
  description: '',
  image: ''
});
const editCategory = ref<Category>({
  id: 0,
  title: '',
  name: '',
  description: '',
  image: ''
});
let selectedFile: File | null = null;

// Function to handle file change for edit modal
const onFileChange = (event: Event) => {
  const input = event.target as HTMLInputElement;
  if (input.files?.length) {
    selectedFile = input.files[0];
  }
};

// const onFileChange = (event) => {
//   const input = event.target;
//   if (input.files.length > 0) {
//     selectedFile = input.files[0];
//   }
// };

// Fetch categories from the API
const fetchCategories = async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/category/list');
    categories.value = response.data.data;
  } catch (error) {
    console.error('Error fetching categories:', error);
  }
};

// Create a new category
const createCategory = async () => {
  try {
    const formData = new FormData();
    formData.append('title', newCategory.value.title);
    formData.append('name', newCategory.value.name);
    formData.append('description', newCategory.value.description);
    if (selectedFile) {
      formData.append('image', selectedFile);
    }

    const response = await axios.post('http://127.0.0.1:8000/api/category/create', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });

    categories.value.push(response.data); // Assuming response.data contains the new category object
    newCategory.value = { id: 0, title: '', name: '', description: '', image: '' }; // Reset newCategory after successful creation
    fetchCategories(); // Refresh category list
    location.reload();
  } catch (error) {
    console.error('Error creating category:', error);
  }
};

// Function to update category
const updateCategory = async () => {
  try {
    const formData = new FormData();
    formData.append('title', editCategory.value.title);
    formData.append('name', editCategory.value.name);
    formData.append('description', editCategory.value.description);
    if (selectedFile) {
      formData.append('image', selectedFile, selectedFile.name);
    }

    const response = await axios.post(
      `http://127.0.0.1:8000/api/category/update/${editCategory.value.id}`,
      formData,
      {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }
    );

    if (response.data.success) {
      console.log('Category updated successfully:', response.data.data);
      // Handle successful update, e.g., notify user, refresh data, etc.
      fetchCategories(); // Refresh category list
      $('#editModal').modal('hide'); // Hide modal after successful update
    } else {
      console.error('Failed to update category:', response.data.message);
    }
  } catch (error) {
    console.error('Error updating category:', error);
  }
  // location.reload();
};

// Delete a category
const deleteCategory = async (id: number) => {
  try {
    await axios.delete(`http://127.0.0.1:8000/api/category/delete/${id}`);
    categories.value = categories.value.filter((c) => c.id !== id);
  } catch (error) {
    console.error('Error deleting category:', error);
  }
};

// Open edit modal and populate data
const openEditModal = (category: Category) => {
  editCategory.value = { ...category }; // Copy category data to editCategory
  $('#editModal').modal('show'); // Show edit modal
};

// Fetch categories when the component is mounted
onMounted(() => {
  fetchCategories();
});
</script>
  
<style scoped>
/* @import 'datatables.net-dt'; */
.b-action {
  display: flex;
  gap: 15px;
}
.top-cat {
  background: #000;
}
</style>
  