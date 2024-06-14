<style>
/* Estilos para la tabla */
table {
    border-collapse: collapse;
    width: 100%; /* O ajusta el ancho según tus necesidades */
    border: 2px solid #ddd; /* Borde de la tabla */
}

/* Estilos para las celdas del cuerpo de la tabla */
td, th {
    border: 1px solid #ddd; /* Borde de las celdas */
    padding: 8px; /* Espacio interno dentro de las celdas */
    text-align: center; /* Centrar el texto horizontalmente en las celdas */
}

/* Estilos para las celdas del encabezado de la tabla */
th {
    background-color: #f2f2f2; /* Fondo del encabezado de la tabla */
}
</style>

<template>
    <div>
        <h1>Listado de Ligas</h1>
        <table>
            <thead>
                <tr>
                    <th style="text-align: center; ">ID</th>
                    <th style="text-align: center">Nombre de la liga</th>
                    <th style="text-align: center">Fecha de inicio</th>
                    <th style="text-align: center">Fecha de fin</th>
                    <th style="text-align: center">Cantidad de fechas a jugar</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="liga in ligas" :key="liga.id">
                    <td style="text-align: center">{{ liga.id }}</td>
                    <td style="text-align: center">{{ liga.name }}</td>
                    <td style="text-align: center">{{ liga.start_date }}</td>
                    <td style="text-align: center">{{ liga.end_date }}</td>
                    <td style="text-align: center">{{ liga.quantity }}</td>
                    <td>
                        <!-- <button @click="mostrarEquipos(liga.id)">Mostrar Equipos</button> -->
                        <a :href="'/api/ligas/' + liga.id + '/equipos'" target="_blank">Mostrar Equipos</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    data() {
        return {
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
                    this.ligas = response.data;
                })
                .catch(error => {
                    console.error('Error al obtener las ligas:', error);
                });
        },
        mostrarEquipos(idLiga) {
            // Realizar una solicitud HTTP para obtener los equipos de la liga
            axios.get(`/api/ligas/${idLiga}/equipos`)
                .then(response => {
                    // Manejar la respuesta, por ejemplo, mostrar los equipos en una lista
                    console.log('Equipos de la liga:', response.data);
                })
                .catch(error => {
                    console.error('Error al obtener los equipos de la liga:', error);
                });
        }
    }
}
</script>
