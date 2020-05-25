<template>
  <v-app id="inspire">
    <div v-if="$store.state.usuario">
      <!-- ============== SIDEBAR ============== -->
      <v-navigation-drawer v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" app>
        <v-list dense>
          <v-list-item-group>
            <router-link to="/panel" class="no-ahref">
              <v-list-item>
                <v-list-item-icon>
                  <v-icon>mdi-home</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>Inicio</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>
            <router-link to="/usuarios" class="no-ahref">
              <v-list-item>
                <v-list-item-icon>
                  <v-icon>mdi-table</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>Usuarios</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>
            <a href="/logout" class="no-ahref">
              <v-list-item>
                <v-list-item-icon>
                  <v-icon>mdi-logout</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>Cerrar sesión</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </a>
          </v-list-item-group>
        </v-list>
      </v-navigation-drawer>

      <!-- ============== /SIDEBAR ============== -->

      <!-- ============== NAVBAR ============== -->
      <v-app-bar :clipped-left="$vuetify.breakpoint.lgAndUp" app color="blue" dark>
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
          <v-btn icon large>
            <v-avatar size="32px" item>
              <v-img src="https://cdn.vuetifyjs.com/images/logos/logo.svg" alt="Vuetify"></v-img>
            </v-avatar>
          </v-btn>
          <span class="hidden-sm-and-down">{{usuario.name}}</span>
        </v-toolbar-title>
        <v-text-field
          flat
          solo-inverted
          hide-details
          prepend-inner-icon="mdi-magnify"
          label="Search"
          class="hidden-sm-and-down"
        ></v-text-field>
        <v-spacer></v-spacer>
        <v-btn icon>
          <v-icon>mdi-apps</v-icon>
        </v-btn>
        <v-btn icon>
          <v-icon>mdi-bell</v-icon>
        </v-btn>
        <v-btn icon large>
          <v-avatar size="32px" item>
            <v-img src="https://cdn.vuetifyjs.com/images/logos/logo.svg" alt="Vuetify"></v-img>
          </v-avatar>
        </v-btn>
      </v-app-bar>
      <!-- ============== /NAVBAR ============== -->

      <!-- ============== ADITIONAL COMPONENTS ============= -->
      <v-btn bottom color="pink" dark fab fixed right @click="dialog = !dialog">
        <v-icon>mdi-plus</v-icon>
      </v-btn>
      <v-dialog v-model="dialog" width="800px">
        <v-card>
          <v-card-title class="grey darken-2">Create contact</v-card-title>
          <v-container>
            <v-row class="mx-2">
              <v-col class="align-center justify-space-between" cols="12">
                <v-row align="center" class="mr-0">
                  <v-avatar size="40px" class="mx-3">
                    <img src="//ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png" alt />
                  </v-avatar>
                  <v-text-field placeholder="Name"></v-text-field>
                </v-row>
              </v-col>
              <v-col cols="6">
                <v-text-field prepend-icon="mdi-account-card-details-outline" placeholder="Company"></v-text-field>
              </v-col>
              <v-col cols="6">
                <v-text-field placeholder="Job title"></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field prepend-icon="mdi-mail" placeholder="Email"></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field type="tel" prepend-icon="mdi-phone" placeholder="(000) 000 - 0000"></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field prepend-icon="mdi-text" placeholder="Notes"></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <v-card-actions>
            <v-btn text color="primary">More</v-btn>
            <v-spacer></v-spacer>
            <v-btn text color="primary" @click="dialog = false">Cancel</v-btn>
            <v-btn text @click="dialog = false">Save</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <!-- ============== /ADITIONAL COMPONENTS ============= -->
    </div>
    <!-- ============== CONTENT ============= -->
    <v-content>
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <router-view></router-view>
        </v-row>
      </v-container>
    </v-content>
    <!-- ============== /CONTENT ============= -->
  </v-app>
</template>

<script>
export default {
  props: ["usuario"],
  data() {
    return {
      dialog: false,
      drawer: null,
      isLogged: false
    };
  },
  created() {
    let vue = this;
    vue.$store.commit("guardarUsuario", vue.usuario);
  }
};
</script>
