<template>
  <Layout>
    <div>
      <div style="height: 60px"></div>

      <div class="container">
        <div class="row">
          <div class="col s12 m7">
            <div class="card">
              <div class="card-action orange">
                <a class="black-text"
                  ><b>{{ tutor.first_name }} {{ tutor.last_name }}</b></a
                >
              </div>
              <div class="card-content">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque
                  exercitationem fugit iste quaerat sapiente ratione impedit aut
                  repellat quis asperiores aliquam, iure odio mollitia.
                </p>
                <br />
                <p>
                  <b>Contacts</b>
                  <i class="material-icons orange-text">done_all</i>
                </p>
                <br />
                <p>
                  {{ tutor.phone }} <br />
                  {{ tutor.email }}
                </p>
              </div>
            </div>
          </div>

          <div style="margin-top: 15px" class="col s0 m5">
            <div>
              <h1 class="center">{{ studentCount }}</h1>
              <p class="center">STUDENTS</p>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div style="height: 20px"></div>

        <p class="flow-text">
          <i class="material-icons orange-text medium">people</i>
        </p>

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
            </tr>
          </tbody>
        </table>
        <div v-else>
          <h3 class="center grey-text">No Students Available </h3>
           <div style="height: 50px"></div>
        </div>
      </div>
      <div style="height: 20px"></div>
    </div>
  </Layout>
</template>

<script>
import Layout from "../Shared/Layout.vue";
import { Link } from "@inertiajs/inertia-vue";
import axios from "axios";

export default {
  name: "Tutor",

  props: ["id"],

  components: {
    Layout,
    Link,
  },

  data() {
    return {
      tutor: Object,
      students: Array,
      studentCount: "",
    };
  },

  methods: {},

  created() {
    const tutor_id = this.id;
    axios
      .get(`http://localhost:8000/api/tutor/${tutor_id}`)
      .then((response) => {
        this.tutor = response.data.data.tutor;
        this.students = response.data.data.students;
        this.studentCount = response.data.data.students.length;
      })
      .catch((err) => {
        console.log();
      });
  },
};
</script>