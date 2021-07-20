<template>
<Layout>
  <div>
    <div style="height: 50px"></div>
    
    <div class="container">
       <Link href="/AllStudents"><button class="btn btn-floating red"><i class="material-icons">arrow_back</i></button></Link>
    </div>
    
     <div style="height: 10px"></div>

    <div class="container row">

      
      <form
        style="padding: 10px; border-radius: 15px"
        @submit.prevent="submit"
        class="col s8 card"
      >
        <div class="row">
          <div class="input-field col s12">
            <input id="first_name" type="text" placeholder="first name" required v-model="form.first_name" />
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="last_name" type="text" placeholder="last name" required v-model="form.last_name" />
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="phone" type="text" placeholder="phone" required v-model="form.phone" />
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" placeholder="email" required v-model="form.email" />
          </div>
        </div>

        <button style="border-radius: 10px" class="btn orange">update</button>
      </form>
    </div>

    <div style="height: 20px"></div>
  </div>
  </Layout>
</template>

<script>
import Vue from "vue";
import axios from "axios";
import { Link } from "@inertiajs/inertia-vue";
import VueToast from "vue-toast-notification";
import Layout from '../Shared/Layout.vue'
import "vue-toast-notification/dist/theme-sugar.css";

Vue.use(VueToast);

export default {
  name: "EditStudent",
  props:['student'],

  components: {
    Link,
    Layout,
  },

  data() {
    return {
      form: { first_name: this.student.first_name, last_name: this.student.last_name, phone: this.student.phone, email: this.student.email },
    };
  },

  methods: {
    submit() {
      axios
        .put(`http://localhost:8000/api/student/${this.student.id}`, this.form)
        .then(() => {
          this.form.first_name = "";
          this.form.last_name = "";
          this.form.phone = "";
          this.form.email = "";

          Vue.$toast.success("Student updated successfully.", {
            position: "top-right",
          });
          this.$emit("toogleEditFormHideEvent");
        })
        .catch((error) => {
          Vue.$toast.success(error.message);
        });
    },

  },
};
</script>