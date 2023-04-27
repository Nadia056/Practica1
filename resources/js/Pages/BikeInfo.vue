<template>
  <br>
  <h1 class="text-center text-xl font-bold scroll-pl-6  ">Bike's Info</h1>
  <table class="table-auto mx-auto ">
    <thead>
      <tr>
        <!-- <th class="px-4 py-2">#</th> -->
        <th class="px-4 py-2">Nombre</th>
        <th class="px-4 py-2 ">Año</th>
        <th class="px-4 py-2">Descripcion</th>
        <th class="px-4 py-2">*</th>
        <th class="px-4 py-2">*</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center" v-for="bike in bikes" :key="bike.id">
        <!--<td class="border px-4 py-2">{{ bike.id }}</td>-->
        <td class="border px-4 py-2">{{ bike.nombre }}</td>
        <td class="border px-4 py-2">{{ bike.año }}</td>
        <td class="border px-4 py-2">{{ bike.descripcion }}</td>
        <td class="border px-4 py-2">
          <button class="bg-indigo-500 hover:bg- hover:bg-blue-700 text-white 
              font-bold py-2 px-4 rounded-full" @click="showModal = bike.id">
            Editar
          </button>
        </td>
        <td class="border px-4 py-2">
          <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
            @click="deleteBike(bike.id)">
            Eliminar
          </button>
        </td>
      </tr>
    </tbody>
  </table>

  <div v-if="showModal" v-for="bike in bikes" v-bind:key="bike.id">

    <div v-if="bike.id === showModal" class="relative z-50 p-6 m-auto bg-white rounded-lg 
    fixed top-0 left-0 h-full w-full flex items-center justify-center">
      <form @submit="submitForm(bike.id)">
        <div class="mb-4 ">
          <label for="nombre" class="block text-gray-700 text-lg font-bold mb-2">Nombre</label>
          <input type="text" name="nombre" id="nombre"
            class=" shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="nombre" v-model="bike.nombre">
        </div>
        <div class="mb-4">

          <label for="año" class="block text-gray-700 text-lg font-bold mb-2">Año</label>
          <input type="text" name="año" id="año"
            class="shadow appearance-none border rounded w-full px-4 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="año" v-model="bike.año">
        </div>
        <div class="mb-4">
          <label for="descripcion" class="block text-gray-700 text-lg font-bold mb-2">Descripcion</label>
          <input type="text" name="descripcion" id="descripcion"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            placeholder="descripcion" v-model="bike.descripcion">
        </div>
        <div class="flex justify-end">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"  >Guardar</button>
          <button class="bg-red-500 text-white p-2 font-bold py-2 px-4 rounded-full"
            @click="showModal = false">Cerrar</button>

        </div>
      </form>

    </div>
    
  </div>
  <br>
  <div class="flex justify-center">
   <button class="bg-black text-white p-2 font-bold py-2 px-4 rounded-full center"
                        @click="back">Regresar</button>
      </div>
</template>
  
  
<script>

export default {
  props: {
    bikes: Array,
    showModal: false,
  },
  methods: {
    back() {
      this.$inertia.visit('/bikes')
    },
    async deleteBike(id) {
      await this.$inertia.delete(`/infobike/${id}`)
    },

    async submitForm(id) {
      
      try {
      
       
        // Make API call to update bike
        await this.$inertia.put(`/infobike`, 
        this.bikes.find(bike => bike.id === id)
        )
        

       
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
      }
    }
  }
}

</script>

<style>
.fixed {
  position: fixed;
}

.top-0 {
  top: 0;
}

.left-0 {
  left: 0;
}

.h-full {
  height: 100%;
}

.w-full {
  width: 100%;
}
</style>
  
