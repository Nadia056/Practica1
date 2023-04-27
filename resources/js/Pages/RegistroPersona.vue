<template>
  <div>

    <div div class="mx-auto w-1/2 ">
      <br>
      <h1 class="text-center text-xl">Registro Personas</h1>
      <form @submit.prevent="Formmm" class="pt-4">
        <div class="mb-3">
          <label for="nombre" class="block  font-medium mb-2 ">Personas</label>
          <input v-model="form.nombre" id="nombre" type="text" class="w-full border border-gray-400 p-2 rounded-lg"
            required>
          <p class="text-red-500" v-if="errors.nombre">{{ errors.nombre[0] }}</p>
        </div>
        <div class="mb-3">
          <label for="apellido" class="block  font-medium mb-2 ">Apellido</label>
          <input v-model="form.apellido" id="apellido" type="text" class="w-full border border-gray-400 p-2 rounded-lg"
            required>
          <p class="text-red-500" v-if="errors.apellido">{{ errors.apellido[0] }}</p>
        </div>
        <div class="mb-3">
          <label for="email" class="block  font-medium mb-2 ">Email</label>
          <input v-model="form.email" id="email" type="email" class="w-full border border-gray-400 p-2 rounded-lg"
            required>
          <p class="text-red-500" v-if="errors.email">{{ errors.email[0] }}</p>
        </div>
        <div class="mt-3">
          <label for="bikes" class="block font-medium mb-2">Select a Bike:</label>
          <select v-model="form.bike_id" id="bike_id" class="w-full border border-gray-400 p-2 rounded-lg">
            <option v-for="bike in bikes" :key="bike.id" :value="bike.id">
              {{ bike.nombre }}
            </option>
          </select>
        </div>


        <div class="pt-4">
          <button class="bg-emerald-500 text-white rounded-lg p-2 " type="submit">Enviar</button>
          <button @click="goToRegister" class="bg-blue-500 hover:bg-blue-700 rounded-lg p-2  ml-2 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          >Personas</button>
          <button @click="goToBikes" class="bg-pink-500 hover:bg-pink-700 rounded-lg p-2  ml-2 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          >Registrar Bike</button>
        </div>
      </form>
    </div>
  </div>
</template>
 
<script>
import { Inertia } from '@inertiajs/inertia'

export default {

  data() {

    return {
      form: {
        nombre: '',
        apellido: '',
        email: '',
         bike_id: parseInt(this.bike_id),
      },
      errors: {},
      bikes: [],

    }
  },
  methods: {
    async Formmm() {
      try {
        await this.$inertia.post('/registroPersona', this.form)

        // Handle success
        this.form = {
          nombre: '',
          apellido: '',
          email: '',
          bike_id: '',
        }
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
      }

    },
    goToBikes() {
      this.$inertia.visit('/bikes')
    },
    goToRegister() {
      this.$inertia.visit('/infopersona')
    },
    
    
  },
  mounted() {
    this.bikes = this.$page.props.bikes
  }
}

</script>