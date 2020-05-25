<template>
  <div class="container" fluid>
    <h1>Usuarios : {{contador}}</h1>
    <v-btn @click="aumentar">aumentar</v-btn>
    <v-file-input show-size chips label="Archivos" v-model="imagen" accept=".jpg, .jpeg, .png"></v-file-input>
    <v-btn small color="primary" @click="uploadImage()">Subir Imagen</v-btn>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      imagen: null
    };
  },
  created() {},
  methods: {
    ...mapActions(["changeCounterAction"]),
    uploadImage() {
      let vue = this;
      let archivo = vue.imagen;
      let extension = archivo.name.split(".");
      if (
        extension[1] != "jpg" ||
        extension[1] != "png" ||
        extension[1] != "jpeg"
      ) {
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 4000,
          timerProgressBar: false,
          customClass: {
            container: "font-Arial"
          },
          showClass: {
            popup: "animate__animated animate__fadeInRight"
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutRight"
          },
          onOpen: toast => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
          }
        });

        Toast.fire({
          icon: "error",
          title: "Signed in successfully"
        });
      } else {
        let data = new FormData();
        data.append("imagen", file);
        axios
          .post("/app/upload/", data)
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          });
      }
    },
    aumentar() {
      let vue = this;
      vue.changeCounterAction(1); // puedes mapear el action
      //   vue.$store.dispatch("changeCounterAction", 1); // o puedes hacerle un dispatch
    }
  },
  computed: {
    ...mapGetters({
      contador: "getCounter"
    })
  }
};
</script>

