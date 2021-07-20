<template>
  <div>
    <div style="height: 50px"></div>

    <div class="container row">
      <form
        style="padding: 10px; border-radius: 15px"
        @submit.prevent="submit"
        class="col s8 card" 
      >
        <div class="row">
          <div class="input-field col s12">
            <input id="first_name" type="text" required v-model="form.first_name" />
            <label for="first_name">First Name</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="last_name" type="text" required v-model="form.last_name" />
            <label for="last_name">Last Name</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="phone" type="text" required v-model="form.phone" />
            <label for="phone">Phone</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" required v-model="form.email" />
            <label for="email">Email</label>
          </div>
        </div>

        <button style="border-radius: 10px" class="btn orange">add</button>
      </form>
    </div>

    <div style="height: 20px"></div>
  </div>
</template>

<script>
import Vue from "vue";
import axios from "axios";
import { Link } from "@inertiajs/inertia-vue";
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

Vue.use(VueToast);

export default {
  name: "AddStudent",

  components: {
    Link,
  },

  data() {
    return {
      form: { first_name: "", last_name: "", phone: "", email: "" },
    };
  },

  methods: {
    submit() {
      axios
        .post("api/student", this.form)
        .then(() => {
          this.form.first_name = "";
          this.form.last_name = "";
          this.form.phone = "";
          this.form.email = "";

          Vue.$toast.success("Student added successfully.", {
            position: "top-right",
          });
          this.$emit("toogleFormHideEvent");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>