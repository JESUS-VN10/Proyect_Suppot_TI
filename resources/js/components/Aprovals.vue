<template>
    <div class="card shadow-lg p-5">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-3">
            <section>
              <article>
                <button :class="botones" @click="cargarFormulario"><i class="fa-solid fa-rotate-right"></i> Cargar formulario</button>
              </article>
            </section>
          
              <section class="sm:grid grid-cols-3 mt-1 p-5 border-2 gap-8 justify-center items-center">
                <article class="text-2xl text-white col-span-3 p-2 text-center"
                         style="background: linear-gradient(to right, #0E849C, #5A189A);">
                  Solicitud de Aprobación
                </article>

                <article>
                    <label for="nombre_envia" class="form-label">Nombre de quien envía:</label>
                    <input type="text" id="nombre_envia" :class="inputs" v-model="form.nombre_envia" disabled>
                </article>

                <article>
                  <label for="cargo_envia" class="form-label">Cargo de quien envía:</label>
                  <select id="cargo_envia" :class="inputs" v-model="form.cargo_envia" required>
                    <option disabled value="">Selecciona un cargo</option>
                    <option value="JEFE DE OPERACION">Jefe de Operación TI</option>
                    <option value="DIRECTOR DE OPERACIONES">Director de Operaciones</option>
                    <option value="COORDINADOR DE OPERACION">Coordinador de Operación</option>
                    <option value="GERENTE DE OPERACION">Gerente de Operación</option>
                    <option value="JEFE DE SOPORTE">Jefe de Soporte</option>
                    <option value="GESTOR TIMAC">Gestor de tecnología</option>
                    <option value="COORDINADOR DE SOPORTE">Coordinador de Soporte</option>
                  </select>
                </article>


                <article>
                  <label for="campana" class="form-label">Campaña:</label>
                  <select id="campana" :class="inputs" v-model="form.campana" required>
                    <option disabled value="">Selecciona una campaña</option>
                    <option v-for="cam in lista_operaciones" :key="cam.id" :value="cam.nombre_camp">
                      {{ cam.nombre_camp.toUpperCase() }}
                    </option>
                  </select>
                </article>

                <article>
                  <label for="piso" class="form-label">Seleccione el piso:</label>
                  <select id="piso" :class="inputs" v-model="form.piso" required>
                    <option disabled value="">Selecciona un piso</option>
                    <!-- Opciones para Carvajal -->
                    <option v-for="piso in ['1', '2', '3', '4']" :key="piso" :value="'Carvajal piso ' + piso">
                      Carvajal piso {{ piso }}
                    </option>
                    <!-- Opción independiente para Cali Sitio -->
                    <option value="Cali Sitio">Cali Sitio</option> 
                  </select>
                </article>


                <article>
                  <label for="nombre_destinatario" class="form-label">Nombre del destinatario:</label>
                  <select id="nombre_destinatario" :class="inputs" v-model="form.nombre_destinatario" @change="autocompletarCorreo" required>
                    <option disabled value="">Selecciona un destinatario</option>
                    <option v-for="directivo in lista_directivos" :key="directivo.id" :value="directivo.nombre">
                      {{ directivo.nombre }}
                    </option>
                  </select>
                </article>

                <article>
                  <label for="correo_destinatario" class="form-label">Correo del destinatario:</label>
                  <input type="email" id="correo_destinatario" :class="inputs" v-model="form.correo_destinatario" required readonly>
                </article>

                <article class="col-span-3">
                  <label for="archivoUrl" class="form-label">URL del archivo en OneDrive:</label>
                  <input type="text" id="archivoUrl" :class="inputs" v-model="form.archivoUrl" placeholder="Pega aquí la URL del archivo" required>
                </article>
              </section>
            </div>
          </div>

          <div class="flex justify-center mt-4">
            <button @click.prevent="enviarSolicitud" class="bg-fuchsia-950 hover:bg-fuchsia-900 text-white font-bold px-4 py-2 rounded">
              Enviar
            </button>
        </div>
      </div>
    </div>
  </template>

<script>
import { mapState } from 'vuex';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      form: {
        nombre_envia: '',
        cargo_envia: '',
        campana: '',
        piso: '',
        nombre_destinatario: '',
        correo_destinatario: '',
        archivoUrl: ''
      },
      inputs: 'border p-2 w-full'
    };
  },
  computed: {
    ...mapState(['lista_operaciones', 'lista_directivos', 'name_gestor_session', 'botones'])
  },
  methods: {
    autocompletarCorreo() {
      const directivo = this.lista_directivos.find(d => d.nombre === this.form.nombre_destinatario);
      this.form.correo_destinatario = directivo ? directivo.correo : '';
    },

    // Restablece el formulario para ingresar nueva información sin borrar el nombre del usuario logueado
    cargarFormulario() {
      this.form = {
        nombre_envia: this.form.nombre_envia, // Mantiene el nombre del usuario logueado
        cargo_envia: '',
        campana: '',
        piso: '',
        nombre_destinatario: '',
        correo_destinatario: '',
        archivoUrl: ''
      };
    },

    validarFormulario() {
      for (const [campo, valor] of Object.entries(this.form)) {
        if (valor.trim() === '') {
          return `El campo "${campo.replace('_', ' ')}" es obligatorio.`;
        }
      }
      return null; // Todo está bien
    },

    async enviarSolicitud() {
      try {
        const errorMsg = this.validarFormulario();
        if (errorMsg) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: errorMsg,
          });
          return;
        }

        const response = await fetch('https://prod-137.westus.logic.azure.com:443/workflows/8608169e99f542958f18ac281d59727d/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=kKUeT-gXHya6ApwNf-Z-b7Dik5lI0lEFgG9WS3-yZRY', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(this.form),
        });

        if (!response.ok) {
          throw new Error(`Error HTTP ${response.status}`);
        }

        Swal.fire({
          icon: 'success',
          title: '¡Enviado!',
          text: 'La solicitud fue enviada correctamente.',
        });

        this.cargarFormulario(); // Limpiar el formulario tras el envío
      } catch (error) {
        Swal.fire({
          icon: 'error',
          title: 'Error al enviar',
          text: `Hubo un problema: ${error.message}`,
        });
      }
    }
  },
  created() {
    this.$store.dispatch('cargarDirectivos');
    this.$store.dispatch('cargarOperaciones');
  },
  mounted() {
    this.$store.dispatch('getSession');
    this.$store.dispatch('getNameGestor');

    this.$nextTick(() => {
      this.form.nombre_envia = this.name_gestor_session ? this.name_gestor_session.toUpperCase() : '';
    });
  }
};
</script>








