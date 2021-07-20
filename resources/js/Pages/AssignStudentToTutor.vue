<template>
  <Layout>
    <div>
      <div style="height: 40px"></div>

      <div class="container">
        <table
          v-if="students.length > 0"
          class="card centered z-depth-3 responsive"
          style="border-radius: 20px"
        >
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Date</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(student, index) in students" :key="index">
              <td>
                <b>{{ ++index }}.</b>
              </td>
              <td>{{ student.first_name }} {{ student.last_name }}</td>
              <td>{{ student.email }}</td>
              <td>{{ student.phone }}</td>
              <td>{{ student.created_at }}</td>
              <td>
                <button
                  @click="assignStudentToTutor(student.id)"
                  style="border-radius: 10px"
                  class="btn orange"
                >
                  assign
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-else>
          <h3 class="center grey-text">No Students Available</h3>
          <div style="height: 50px"></div>
        </div>
      </div>

      <div style="height: 20px"></div>
    </div>
  </Layout>
</template>

<script>
import Vue from "vue";
import axios from "axios";
import Layout from "../Shared/Layout.vue";
import { Link } from "@inertiajs/inertia-vue";
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

Vue.use(VueToast);

export default {
  name: "AllStudents",

  props: ["id"],

  components: {
    Layout,
    Link,
  },

  data() {
    return {
      students: Array,
    };
  },

  methods: {
    getStudents() {
      axios
        .get(`http://localhost:8000/api/assignableStudents/${this.id}`)
        .then((response) => {
          this.students = response.data;
        })
        .catch((err) => {
          console.log();
        });
    },

    assignStudentToTutor(student_id) {
      axios
        .post("http://localhost:8000/api/assignStudentToTutor", {
          student_id: student_id,
          tutor_id: this.id,
        })
        .then((response) => {
          this.getStudents();

          Vue.$toast.success("student assigned to tutor successfully", {
            position: "top-right",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },

  created() {
    axios
      .get(`http://localhost:8000/api/assignableStudents/${this.id}`)
      .then((response) => {
        this.students = response.data;
      })
      .catch((err) => {
        console.log();
      });
  },
};
</script>