<template>
  <div>
    <Sidebar :user="user"></Sidebar>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <Header title="All Users"></Header>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <h4 class="card-header">
              All Users
              <span v-if="user.type == 'admin'" class="float-right">
                <inertia-link
                  :href="route('create.admin.user')"
                  class="btn btn-primary btn-sm"
                  >Create User</inertia-link
                >
              </span>
            </h4>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>type</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in users" :key="'post' + index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.name }}</td>
                    <td>
                      <span class="text-capitalize">{{item.type}}</span>
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
    users: Array,
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
          .post(`delete-user/` + item.id)
          .then((res) => {
            showMessage(res.data.message, "success");
            window.location.reload();
          })
          .catch((err) => {
            showMessage(err.response.data.message, "error");
          });
      }
    },
  },
};
</script>

<style scoped>
</style>
