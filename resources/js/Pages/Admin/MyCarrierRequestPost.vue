<template>
  <div>
    <Sidebar :user="user"></Sidebar>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <Header title="Carrier Request Posts"></Header>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <h4 class="card-header">
              All My Request Post
              <span v-if="user.type != 'admin'" class="float-right">
                <inertia-link
                  :href="route('carrierposts.request')"
                  class="btn btn-primary btn-sm"
                  >Create Post</inertia-link
                >
              </span>
            </h4>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>SL</th>
                    <td>Journey Date And Time</td>
                    <th>Description</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in posts" :key="'post' + index">
                    <td>{{ index + 1 }}</td>
                    <td>{{dateFormat(item.journey_date_and_time)}}</td>
                    <td>{{ item.description }}</td>
                    <td>
                      {{item.from_district.name}} - {{item.from_thana.name}} - {{item.from_post_office.name}}
                    </td>
                    <td>
                      {{item.to_district.name}} - {{item.to_thana.name}} - {{item.to_post_office.name}}
                    </td>
                    <td>
                      <button
                        class="btn btn-danger btn-sm"
                        @click="deleteItem(item)"
                      >
                        Delete
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  </div>
</template>

<script>
import Sidebar from "./Sidebar.vue";
import Header from "./Header.vue";
import Select2 from "vue3-select2-component";
import moment from 'moment';

import { showMessage } from "./helpers.js";
import Input from "@/Components/Input.vue";

export default {
  name: "AllFarmerPost",
  components: {
    Sidebar,
    Header,
    Select2,
    Input,
  },
  props: {
    user: {},
    posts: Array,
  },
  data() {
    return {
      errors: {},
      apiUrl: "api",
      districts: [],
      postOffices: [],
      thanas: [],
    };
  },

  mounted() {},
  methods: {
    deleteItem(item) {
      let flag = confirm("Are You Sure??");
      if (flag) {
        axios
          .post(`delete-carrier-request-post/` + item.id)
          .then((res) => {
            showMessage(res.data.message, "success");
            window.location.reload();
          })
          .catch((err) => {
            showMessage(err.response.data.message, "error");
          });
      }
    },
    dateFormat(date){
      return moment(date).format('LLLL')
    }
  },
};
</script>

<style scoped>
</style>
