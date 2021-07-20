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
                  ><b>{{ student.first_name }} {{ student.last_name }}</b></a
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
                  {{ student.phone }} <br />
                  {{ student.email }}
                </p>
              </div>
            </div>
          </div>
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
  name: "Student",

  props: ["id"],

  components: {
    Layout,
    Link,
  },

  data() {
    return {
      student: Array,
    };
  },

  methods: {},

  created() {
    const student_id = this.id;
    axios
      .get(`http://localhost:8000/api/student/${student_id}`)
      .then((response) => {
        this.student = response.data;
      })
      .catch((err) => {
        console.log();
      });
  },
};
</script>