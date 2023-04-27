<template>
    <br>
    <h1 class="text-center text-xl font-bold scroll-pl-6  ">Personas Info</h1>
    <table class="table-auto mx-auto ">
        <thead>
            <tr> <!-- <th class="px-4 py-2">#</th> -->
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2 ">Apellido</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Bike</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center" v-for="persona in personas" :key="persona.id">
                <!--<td class="border px-4 py-2">{{ bike.id }}</td>-->
                <td class="border px-4 py-2">{{ persona.nombre }}</td>
                <td class="border px-4 py-2">{{ persona.apellido }}</td>
                <td class="border px-4 py-2">{{ persona.email }}</td>
                <td class="border px-4 py-2">{{getBikeName(persona.bike_id)}}</td>
                <td class="border px-4 py-2">
                    <button class="bg-indigo-500 hover:bg- hover:bg-blue-700 text-white 
            font-bold py-2 px-4 rounded-full" @click="showModal = persona.id">
                        Editar
                    </button>
                </td>
                <td class="border px-4 py-2">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
                        @click="deletePersona(persona.id)">
                        Eliminar
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <div v-if="showModal" v-for="persona in personas" v-bind:key="persona.id">
        <div v-if="persona.id === showModal" class="relative z-50 p-6 m-auto bg-white rounded-lg 
            fixed top-0 left-0 h-full w-full flex items-center justify-center">
            <form @submit="submitForm(persona.id)">
                <div class="mb-4 ">
                    <label for="nombre" class="block text-gray-700 text-lg font-bold mb-2">Nombre</label>
                    <input type="text" name="nombre" id="nombre"
                        class=" shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="nombre" v-model="persona.nombre">
                </div>
                <div class="mb-4">

                    <label for="apellido" class="block text-gray-700 text-lg font-bold mb-2">Apellido</label>
                    <input type="text" name="apellido" id="apellido"
                        class="shadow appearance-none border rounded w-full px-4 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="apellido" v-model="persona.apellido">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-lg font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="email" v-model="persona.email">
                </div>
                <div class="mb-4">
                    <label for="bike_id" class="block text-gray-700 text-lg font-bold mb-2">Bike</label>
                    <select name="bike_id" id="bike_id"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        v-model="persona.bike_id">
                        <option v-for="bike in bikes" :key="bike.id" :value="bike.id">{{ bike.nombre }}</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Guardar</button>
                    <button class="bg-red-500 text-white p-2 font-bold py-2 px-4 rounded-full"
                        @click="showModal = false">Cerrar</button>

                </div>
            </form>

        </div>
    </div>
    <br>
    <div class="flex justify-center">
        <button class="bg-black text-white p-2 font-bold py-2 px-4 rounded-full center" @click="back">Regresar</button>
    </div>

</template>

<script>

export default {
    props: {
        personas: [],
        bikes: [],
        showModal: false,
    },
    data() {
        return {

            nombre: '',
            apellido: '',
            email: '',
            bike_id: '',
        };
    },
    methods: {
        getBikeName(id) {
            let bike = this.bikes.find(bike => bike.id === id)
            return bike ? bike.nombre : ''
        },
        back() {
            this.$inertia.visit('/registroPersona')
        },
        async deletePersona(id) {
            await this.$inertia.delete(`/infopersona/${id}`)
        },

        async submitForm(id) {

            try {


                // Make API call to update bike
                const persona = this.personas.find(p => p.id === id);
                await this.$inertia.put(`/infopersona`, persona)


                // Handle success

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
  


