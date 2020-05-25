  <template>
  <v-row align="center" justify="center">
    <v-col class="mt-0" cols="12" sm="8" md="4">
      <v-card class="elevation-12" color>
        <v-toolbar color="blue darken-4" align="center" justify="center" style="color:white">
          <v-icon class="mr-1" color="white">mdi-account-circle</v-icon>Iniciar Sesión
        </v-toolbar>
        <v-form ref="form" @submit.prevent="login()">
          <v-card-text>
            <v-text-field
              label="Correo electrónico"
              name="email"
              type="email"
              color="indigo darken-3"
              prepend-icon="mdi-account"
              v-model="form.email"
              :rules="reglasValidacion.emailRules"
            ></v-text-field>
            <v-text-field
              label="Contraseña"
              name="password"
              type="password"
              color="indigo darken-3"
              prepend-icon="mdi-shield-key"
              v-model="form.password"
              :rules="reglasValidacion.passwordRules"
            ></v-text-field>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-flex justify-center>
              <v-btn color="white" type="submit" :loading="isLogging">Ingresar</v-btn>
            </v-flex>
          </v-card-actions>
        </v-form>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  data() {
    return {
      isLogging: false,
      form: {
        email: "",
        password: ""
      },
      items: ["DNI", "Numero de pasaporte"],
      categorias: ["Abarrotes", "Frutas", "Verduras"],
      reglasValidacion: {
        emailRules: [
          v => !!v || "Campo requerido",
          v => /.+@.+/.test(v) || "Ingrese un correo electrónico válido"
        ],
        passwordRules: [
          v => !!v || "Campo requerido",
          v => v.length >= 8 || "La contraseña debe ser mayor a 8 caracteres"
        ]
      }
    };
  },
  methods: {
    async login() {
      let vue = this;
      vue.isLogging = true;
      axios
        .post("/app/login", vue.form)
        .then(response => {
          window.location = "/panel";
        })
        .catch(err => {
          console.log(err);
        });
      setTimeout(() => {
        vue.isLogging = false;
      }, 1500);
    }
  }
};
</script>
