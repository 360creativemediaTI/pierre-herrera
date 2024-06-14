<template>
    <div>
        <h1>Crear Equipo</h1>
        <form @submit.prevent="crearEquipo">
            <div>
                <label for="nombre">Nombre del Equipo:</label>
                <input type="text" v-model="equipo.nombre" id="nombre">
            </div>
            <div>
                <label for="liga">Liga:</label>

                <select v-model="equipo.liga_id" id="liga" style="width: 180px;">
                    <option value="0" disabled selected>Selecciona una liga</option>
                    <option v-for="liga in ligas" :key="liga.id" :value="liga.id">{{ liga.name }}</option>
                </select>
            </div>
            <button type="submit">Crear Equipo</button>
        </form>
    </div>
</template>


<script>
export default {
    data() {
        return {
            equipo: {
                nombre: '',
                liga_id: 0
            },
            ligas: []
        };
    },
    mounted() {

        this.obtenerLigas();
    },
    methods: {
        obtenerLigas() {
            axios.get('/api/ligas')
            .then(response => {
                    console.log(response);
                    this.ligas = response.data;
                })
                .catch(error => {
                    console.error('Error al obtener las ligas:', error);
                });
        },
        crearEquipo() {
            axios.post('/equipos', {
                nombre: this.equipo.nombre,
                liga_id: this.equipo.liga_id
            })
            .then(response => {
                console.log('Equipo creado:', response.data);
                this.equipo.nombre = ""
                this.equipo.liga_id = "0"
            })
            .catch(error => {
                console.error('Error al crear el equipo:', error);
            });
        }
    }
};
</script>
