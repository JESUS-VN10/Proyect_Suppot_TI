<template>
    <div>
        <button type="button" :class="botones" data-bs-toggle="modal" data-bs-target="#modal-directivos" data-bs-whatever="@mdo">
            <span class="fas fa-user"></span> Registrar Directivo
        </button>

        <div class="modal fade" id="modal-directivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Directivos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="">N° Documento:</label>
                                <input type="text" class="outline-none ring-0 focus:ring-purple-500 transition duration-300 focus:ring-2 bg-opacity-80 text-purple-600" v-model="datos_directivo.cedula">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nombre del Directivo:</label>
                                <input type="text" class="outline-none ring-0 focus:ring-purple-500 transition duration-300 focus:ring-2 bg-opacity-80 text-purple-600 p-2"
                                    v-model="datos_directivo.nombre">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Correo del Directivo:</label>
                                <input type="email" class="outline-none ring-0 focus:ring-purple-500 transition duration-300 focus:ring-2 bg-opacity-80 text-purple-600" v-model="datos_directivo.correo">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" :class="botones" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" :class="botones" @click="registrarDirectivo"><span :class="[cargar]"></span> Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import { mapState } from 'vuex';

export default {
    data() {
        return {
            datos_directivo: {
                cedula: '',
                nombre: '',
                correo: ''
            },
            cargar: 'fas fa-user-tie',
        };
    },
    methods: {
        // Registrar directivo en la base de datos
        registrarDirectivo: async function() {
            this.cargar = 'spinner-border spinner-border-sm';
            // Validar que todos los campos estén diligenciados
            if (this.validarDirectivo()) {
                try {
                    const response = await axios.post('/Actas_de_responsabilidad/Directivos/Registro', this.datos_directivo);
                    if (response.data) {
                        this.notificaciones(1); // Notificación de éxito
                        // Limpiar los campos después de registrar
                        this.datos_directivo = { cedula: '', nombre: '', correo: '' };
                    } else {
                        this.notificaciones(3); // Notificación de que ya existe el directivo
                    }
                } catch (error) {
                    this.notificaciones(2); // Notificación de error en el servidor
                    console.error(error);
                }
            } else {
                this.notificaciones(4); // Notificación de campos vacíos
            }
            this.cargar = 'fas fa-user-tie';
        },
        
        // Validar que todos los campos del formulario estén completos
        validarDirectivo() {
            return this.datos_directivo.nombre !== '' && this.datos_directivo.correo !== '' && this.datos_directivo.cedula !== '';
        },

        // Notificaciones usando SweetAlert
        notificaciones(opcion) {
            const mensajes = {
                1: ['¡Exitoso!', `El directivo ${this.datos_directivo.nombre.toUpperCase()} ha sido registrado correctamente`],
                2: ['¡Ups!', 'No fue posible registrar al directivo'],
                3: ['¡Ups!', '¡Ya existe este directivo!'],
                4: ['¡Ups!', '¡Llene todos los campos!']
            };
            Swal.fire({
                icon: opcion === 1 ? 'success' : 'warning',
                title: mensajes[opcion][0],
                text: mensajes[opcion][1]
            });
        },
    },
    computed: {
        ...mapState(['botones']),
    },
}
</script>


<style scoped>
.morado_boton {
    border-color: #982993;
    border: none;
    color: #982993;
    transition: transform 0.1s ease-in;
}
.morado_boton:hover {
    background-color: white;
    color: #915c8e;
    transform: scale(1.10);
}
.morado_boton:active {
    background-color: white;
    color: #915c8e;
}
</style>
