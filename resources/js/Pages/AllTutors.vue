<template>
  <Layout>
    <div>
      <div style="height: 40px"></div>


      <div v-if="hideTutorsTable" class="container">
        <button
          @click="toogleFormShow"
          style="border-radius: 10px"
          class="btn orange waves-effect"
        >
          add tutor
        </button>

        <div style="height: 20px"></div>

        <table
          v-if="tutors.length > 0"
          class="card centered z-depth-3 responsive"
          style="border-radius: 20px"
        >
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(tutor, index) in tutors" :key="index">
              <td>
                <b>{{ ++index }}.</b>
              </td>
              <td>{{ tutor.first_name }} {{ tutor.last_name }}</td>
              <td>{{ tutor.email }}</td>
              <td>{{ tutor.phone }}</td>
              <td>
                <Link :href="`/Tutor/${tutor.id}`">
                  <button class="btn btn-floating white">
                    <i class="material-icons black-text">remove_red_eye</i>
                  </button>
                </Link>

                <Link :href="`/EditTutor/${tutor.id}`">
                  <button class="btn btn-floating white">
                    <i class="material-icons black-text">edit</i>
                  </button>
                  </Link>
       

                <a
                  @click="deleteTutor(tutor.id)"
                  class="btn btn-floating white"
                >
                  <i class="material-icons black-text">delete</i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-else>
          <h3 class="center grey-text">No Tutors Available</h3>
          <div style="height: 50px"></div>
        </div>
      </div>

      <div v-else>
        <AddTutor @toogleFormHideEvent="toogleFormHide($event)" />
      </div>

  
      



      <div style="height: 20px"></div>
    </div>
  </Layout>
</template>

<script>
import Vue from "vue";
import axios from "axios";
import Layout from "../Shared/Layout.vue";
import AddTutor from "./AddTutor.vue";
import { Link } from "@inertiajs/inertia-vue";
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

Vue.use(VueToast);

export default {
  name: "AllTutors",

  components: {
    Layout,
    Link,
    AddTutor,
  },

  data() {
    return {
      tutors: Array,
      hideTutorsTable: true,
      showEditForm: false
    };
  },

  methods: {
    deleteTutor(id) {
      axios
        .delete(`api/tutor/${id}`)
        .then((response) => {
          this.getTutors();
          Vue.$toast.success("Tutor deleted successfully.", {
            position: "top-right",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getTutors() {
      axios
        .get("api/tutors")
        .then((response) => {
          this.tutors = response.data;
        })
        .catch((err) => {
          console.log();
        });
    },

    toogleFormShow() {
      this.hideTutorsTable = false;
    },

    toogleEditFormShow() {
      this.showEditForm = true;
    },

    toogleFormHide() {
      this.getTutors();
      this.hideTutorsTable = true;
    },

    toogleEditFormHide() {
      this.getTutors();
      this.showEditForm = false;
    },
  },

  created() {
    axios
      .get("api/tutors")
      .then((response) => {
        this.tutors = response.data;
      })
      .catch((err) => {
        console.log();
      });
  },
};
</script>