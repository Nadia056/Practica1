<template>
  <div>
   
    <div div class="mx-auto w-1/2 ">
      <br>
      <h1 class="text-center text-xl font-bold">Registro Motocicletas</h1>
      <form @submit.prevent="submitForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
          <label for="nombre" class="block text-gray-700 text-md font-bold mb-2">Motocicleta</label>
          <input v-model="form.nombre" id="nombre" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            required>
          <p class="text-red-500" v-if="errors.nombre">{{ errors.nombre[0] }}</p>
        </div>
        <div class="mb-3">
          <label for="descripcion" class="block text-gray-700 text-md font-bold mb-2">Descripcion</label>
          <input v-model="form.descripcion" id="descripcion" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
           required>
          <p class="text-red-500" v-if="errors.descripcion">{{ errors.descripcion[0] }}</p>
        </div>
        <div class="mb-3">
          <label for="año" class="block text-gray-700 text-md font-bold mb-2">Año</label>
          <input v-model="form.año" id="año" type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            required>
          <p class="text-red-500" v-if="errors.año">{{ errors.año[0] }}</p>
        </div>
        <div class="pt-4">
          <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 rounded-lg p-2  ml-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Enviar</button>
          <button @click="goToBikes" class="bg-blue-500 hover:bg-blue-700 rounded-lg p-2  ml-2 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          >Motocicleta</button>
          <button @click="goToRegister" class="bg-pink-500 hover:bg-pink-700 rounded-lg p-2  ml-2 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          >Registrar Personas</button>
        </div>
      </form>
     

    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        nombre: '',
        descripcion: '',
        año: ''
      },
      errors: {}
    }
  },
  
  methods: {
    goToBikes() {
      this.$inertia.visit('/infobike')
    },
    goToRegister() {
      this.$inertia.visit('/registroPersona')
    },
    async submitForm() {
      try {
        // Make API call to create bike
        await this.$inertia.post('/bikes', this.form)

        // Handle success
        this.form = {
          nombre: '',
          descripcion: '',
          año: ''
        }
        
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
      }
    }
  }
}
</script>