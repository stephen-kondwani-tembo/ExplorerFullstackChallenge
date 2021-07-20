<template>
  <Layout>
    <div>
      <div style="height: 40px"></div>

      <div class="container">
        <p class="flow-text">Select tutor to assign students</p>
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
              <th>Date</th>
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
              <td>{{ tutor.created_at }}</td>
              <td>
                <Link :href="`/AssignStudentToTutor/${tutor.id}`">
                  <button class="btn btn-floating white">
                    <i class="material-icons black-text">group_add</i>
                  </button>
                </Link>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-else>
          <h3 class="center grey-text">No Tutors Available</h3>
          <div style="height: 50px"></div>
        </div>
      </div>
      <div style="height: 20px"></div>
    </div>
  </Layout>
</template>

<script>
import axios from "axios";
import Layout from "../Shared/Layout.vue";
import { Link } from "@inertiajs/inertia-vue";

export default {
  name: "TutorToAssignStudent",

  components: {
    Layout,
    Link,
  },

  data() {
    return {
      tutors: Array,
    };
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