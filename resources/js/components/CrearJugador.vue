<template>
    <div>
        <h1>Crear Jugador</h1>
        <form @submit.prevent="crearJugador">
            <div>
                <label for="nombre">Nombre del jugador:</label>
                <input type="text" v-model="jugador.nombre" id="nombre">
            </div>
            <div>
                <label for="equipo">Equipo:</label>

                <select v-model="jugador.equipo_id" id="equipo" style="width: 180px;">
                    <option value="0" disabled selected>Selecciona una equipo</option>
                    <option v-for="equipo in equipos" :key="equipo.id" :value="equipo.id">{{ equipo.name }}</option>
                </select>
            </div>
            <button type="submit">Crear Jugador</button>
        </form>
    </div>
</template>


<script>
export default {
    data() {
        return {
            jugador: {
                nombre: '',
                equipo_id: 0
            },
            equipos: []
        };
    },
    mounted() {
        this.obtenerEquipos();
    },
    methods: {
        obtenerEquipos() {
            axios.get('/api/equipos')
            .then(response => {
                    console.log(response);
                    this.equipos = response.data;
                })
                .catch(error => {
                    console.error('Error al obtener las equipos:', error);
                });
        },
        crearJugador() {
            axios.post('/jugador', {
                nombre: this.jugador.nombre,
                equipo_id: this.jugador.equipo_id
            })
            .then(response => {
                console.log('Jugador creado:', response.data);
                this.jugador.nombre = ""
                this.jugador.liga_id = "0"
            })
            .catch(error => {
                console.error('Error al crear el jugador:', error);
            });
        }
    }
};
</script>
