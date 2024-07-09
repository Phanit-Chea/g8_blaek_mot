<template>

  <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td class="siemreap text-center">{{ user.name }}</td>
    <td class="siemreap text-center">{{ user.email }}</td>
    <td class="text-center">{{ user.phoneNumber }}</td>
    <th class="siemreap text-center">{{ genderInKhmer }}</th>
    <th class="siemreap text-center align-middle"><button class="btn btn-success">ទទួល</button></th>
    <td class="siemreap text-center">{{ user.address }}</td>

    <td>
      <button class="btn btn-danger btn-xs text-center align-middle" @click="deleteUser">
        <span class="glyphicon glyphicon-trash siemreap">លុប</span>
      </button>
    </td>
  </tr>

</template>
<script>
export default{
  props:{
    user:Object
  },
  computed: {
    genderInKhmer() {
      return this.user.gender === 'female' ? 'ស្រី' : 'ប្រុស';
    }
  },
  methods: {
    deleteUser() {
      this.$emit('deleteUser', this.user.id);
    },
  }
}
</script>