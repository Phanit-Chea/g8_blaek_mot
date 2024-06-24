<template>
  <div>
    <!-- Your form content here -->
    <form ref="createForm">
      <input type="text" placeholder="Folder name">
      <button type="submit">Create</button>
    </form>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$root.$on('showCreateFolderPopup', () => {
      // Show the popup form here
      this.$refs.createForm.style.display = 'block';
    });
  }
}
</script>

<style scoped>
@import "../node_modules/@syncfusion/ej2-vue-popups/styles/material.css";
</style>