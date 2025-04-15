<template>
    <div style="background: linear-gradient(to right, #0E849C, #5A189A);">
        <div class="" id="navbarToggleExternalContent" data-bs-theme="dark">
            <div class="p-8 grid grid-cols-2 gap-2 justify-around">
              <h5 class="text-body-emphasis mb-4 text-white text-2xl col-span-3">¡Bienvenido! <span :class="[cargar]"></span> {{name_gestor_session}}</h5>
              <a class="enlaces" @click="adminPage"><i class="fa-solid fa-gear"></i>  Configuracion Administrativa</a>
              <a href="/Actas_de_responsabilidad/Historial/MyDocuments" class="enlaces"><i class="fa-regular fa-folder-open"></i>  Mis actas</a>
              <a class="enlaces" @click="signOut"><i class="fa-solid fa-right-from-bracket"></i>  Cerrar Sesion</a>
            </div>
          </div>
          <nav class="navbar barra_nav mb-3">
            <div class="container-fluid">
              <button class="navbar-toggler color_barra" type="button" @click="mostrarNombre" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon color_barra" ></span>
            </button>
        </div>
        </nav>
    </div>
</template>

<style scoped>
.navbar{
    background-color: blueviolet;
}
.barra_nav{
    background-color: #982993;
}
.color_barra{
    background-color: white;
}
.color_nombre{
    color: aliceblue;
}
</style>

<script>
import { mapMutations, mapState } from 'vuex';
import Swal from 'sweetalert2';
import axios from 'axios';
import { Exception } from 'sass';

export default {
    data() {
        return {
            nombre_usuario:'',
            cargar:'',
        }
    },
    methods: {
        ...mapMutations(['getSession','getNameGestor']),
        mostrarNombre(){
            this.cargar = "fa-solid fa-spinner fa-spin"
            this.getNameGestor();
            this.cargar = '';
        },
        // Redirigir a la parte de administrador
        adminPage(){
            axios.get('/Actas_de_responsabilidad/Registro/Camps_y_gestores')
            .then(res=>{
                if(res.data){
                    window.location.href = '/Actas_de_responsabilidad/Registro/AdminPage'
                }else{
                    Swal.fire({
                        toast:true,
                        position:'top-end',
                        timer:3000,
                        title:'¡Ups!',
                        text:'No tienes permisos para acceder a configuracion',
                        icon:'info',
                        showConfirmButton:false,
                    })
                }
            })
        },
        // Cerrar la sesion voluntariamente
        signOut(){
            axios.get('/Actas_de_responsabilidad/Login/Destroy')
            .then(res=>{
                if(res.data){
                    window.location.href = '/Actas'
                    history.replaceState(null, '', '/Actas');
                }
            })
            .catch(err=>{
                console.log(err);
            });
        },
    },
    computed: {
        ...mapState(['usuario_session','botones','name_gestor_session']),
    },
    mounted() {
        this.mostrarNombre();
    },
}
</script>