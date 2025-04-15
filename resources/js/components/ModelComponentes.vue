<template>
    <div>
        <button type="button" :class="botones" data-bs-toggle="modal" data-bs-target="#modal-componente" data-bs-whatever="@mdo"><i class="fa-solid fa-computer"></i>   Registrar Componente</button>

        <div class="modal fade" id="modal-componente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de campañas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                <form action="#">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre componente:</label>
                        <input type="text" :class="inputs" id="recipient-name" v-model="datos_componente.nombre_componente">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" :class="botones" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" :class="botones" @click="registrarComponente"><span :class="[cargar]"></span>    Registrar Componente</button>
            </div>
            </div>
        </div>
        </div>
    </div> 
</template>

<script> 
import axios from 'axios';
import Swal from 'sweetalert2';
import { mapState, mapMutations } from 'vuex';

export default {
    data() {
        return {
            cargar:'fa-solid fa-computer',
            datos_componente:{
                nombre_componente:''
            },
            datos_componente_recibido:[], 
        }
    },
    methods: {
        validarCampo(){
            if(this.datos_componente.nombre_componente !== ''){
                return true
            }
            return false
        },
        registrarComponente: async function(){
            // Validar si el campo esta lleno
            if(this.validarCampo()){
                this.cargar = 'spinner-border spinner-border-sm';
                await axios.post('/Actas_de_responsabilidad/Componentes/Agregar_com',this.datos_componente)
                .then(respuesta=>{
                    // Validar si la respuesta de laravel fue exitosa respecto al registro
                    if(!respuesta.data){
                        this.notificaciones(1);
                    }else{
                        this.notificaciones(3); 
                        
                    }
                })
                .catch(error=>{
                    this.notificaciones(2);
                });
                this.cargar = 'fa-solid fa-computer';
                this.datos_componente.nombre_componente = '';
            }else{
                this.notificaciones(4);
            }
        },
        // Notificaciones de swwetalert2
        notificaciones(opcion){
            switch (opcion) {
                case 1:
                    Swal.fire({
                        icon:'success',
                        title:'¡Exitoso!',
                        text:`El componente ${this.datos_componente.nombre_componente.toUpperCase()} ha sido registrado correctamente`,
                    });
                    break;
            
                case 2:
                    Swal.fire({
                        icon:'error',
                        title:'¡Ups!',
                        text:`No fue posible registrar el componente ${this.datos_componente.nombre_componente.toUpperCase()}`,
                    });
                    break;
                case 3:
                    Swal.fire({
                        icon:'info',
                        title:'¡Ups!',
                        text:`¡El componente ${this.datos_componente.nombre_componente.toUpperCase()} ya esta registrado!`,
                    });
                    break;
                case 4:
                    Swal.fire({
                        icon:'warning',
                        title:'¡Ups!',
                        text:`¡Llene los campos!`,
                    });
                    break;
            }
        },

    },
    computed: {
        ...mapState(['botones','inputs']),
    },
}
</script>

<style scoped>
.morado_boton{
    border-color: #982993;
    border:none;
    color: #982993;
    transition: transform 0.1s ease-in;
}
.morado_boton:hover{
    background-color: white;
    color: #915c8e;
    transform: scale(1.10);
}
.morado_boton:active{
    background-color: white;
    color: #915c8e;
}
</style>