<template>
  <div style="max-width: 540px;">
    <div class="relative">
      <canvas
      id="signature-pad"
      ref="signaturePad"
      width="540"
      :height="height"
      :style="{ height: height + 'px' }"
    ></canvas>
    <button @click="ExpandSignature()" class="absolute top-0 right-0 m-3 cursor-pointer bg-gray-200 text-lg xl:text-sm p-1.5 rounded hover:bg-gray-300 disabled:cursor-not-allowed" :disabled="!isCanvasEmpty">
      <i :class="icon"></i>
    </button>
    </div>
    <h6 :class="[color_label,'mb-1', 'text-wrap']">{{firma_d}}: <b>{{Nombre_de_quien_entrega ? Nombre_de_quien_entrega.toUpperCase() : ''}}</b></h6>
    <p v-if="cargo_persona !== ''" :class="color_label">Cargo: <b>{{cargo_persona}}</b></p>
    <button type="button" @click="clearSignature" :class="botones">Borrar</button>
  </div>
</template>
  
  <script>
import { mapState,mapMutations } from 'vuex';

  

export default {
  props: ["firma_d", "Nombre_de_quien_entrega",'cargo_persona'],
  data() {
    return {
      drawing: false,
      ctx: null,
      height: 100,
      is_active: false,
      icon:'fa-solid fa-up-right-and-down-left-from-center',
      isCanvasEmpty: true,
    };
  },
  mounted() {
    const canvas = this.$refs.signaturePad;
    this.ctx = canvas.getContext("2d");
    canvas.addEventListener("mousedown", this.startDrawing);
    canvas.addEventListener("mousemove", this.draw);
    canvas.addEventListener("mouseup", this.stopDrawing);
    canvas.addEventListener("mouseout", this.stopDrawing);
    canvas.addEventListener("touchstart", this.startDrawing);
    canvas.addEventListener("touchmove", this.draw);
    canvas.addEventListener("touchend", this.stopDrawing);
    canvas.addEventListener("touchcancel", this.stopDrawing);
  },
  methods: {
    checkIfCanvasIsEmpty() {
    const canvas = this.$refs.signaturePad;
    if (!this.ctx) {
        this.ctx = canvas.getContext('2d');
    }
    const imageData = this.ctx.getImageData(0, 0, canvas.width, canvas.height);
    const data = imageData.data;
    // Verifica si hay píxeles no transparentes
    this.isCanvasEmpty = !data.some((value, index) => index % 4 === 3 && value !== 0);
  },
    // Metodo para expandir la firma
    ExpandSignature(){
      this.is_active = !this.is_active;
      if(this.is_active){
        this.icon = 'fa-solid fa-down-left-and-up-right-to-center'
        this.height = 300;
      }else{
        this.icon = 'fa-solid fa-up-right-and-down-left-from-center'
        this.height = 100;       
      }
    },
    
    getPointerPos(evt) {
      const canvas = this.$refs.signaturePad;
      const rect = canvas.getBoundingClientRect();
      const clientX = evt.clientX || evt.touches[0].clientX;
      const clientY = evt.clientY || evt.touches[0].clientY;
      return {
        x: clientX - rect.left,
        y: clientY - rect.top,
      };
    },
    startDrawing(evt) {
      this.drawing = true;
      const pos = this.getPointerPos(evt);
      this.ctx.moveTo(pos.x, pos.y);
      this.ctx.stroke();
      evt.preventDefault();
    },
    draw(evt) {
      if (!this.drawing) return;
      const pos = this.getPointerPos(evt);
      this.ctx.lineTo(pos.x, pos.y);
      this.ctx.stroke();
      evt.preventDefault();

      this.checkIfCanvasIsEmpty()
    },
    stopDrawing() {
      this.drawing = false;
      this.ctx.beginPath();

      this.checkIfCanvasIsEmpty();
    },
    clearSignature() {
      const canvas = this.$refs.signaturePad;
      this.ctx.clearRect(0, 0, canvas.width, canvas.height);
    },
    getSignatureDataUrl() {
      const canvas = this.$refs.signaturePad;
      return canvas.toDataURL("image/png");
    },
  },
  computed: {
    ...mapState(['botones','color_label']),
  },
  
};
</script>
  
<style scope>
#signature-pad {
  display: inline-flex;
  border: 2px solid #475569;
  border-radius: 12px;
  touch-action: none;
  transition: height .3s ease;
  width: 540px;
}

</style>
  