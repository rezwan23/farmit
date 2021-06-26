<template>
  <div>
    <Sidebar></Sidebar>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <Header title="Farmer Posts"></Header>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <h4 class="card-header">
              All My Farmer Post
              <span class="float-right">
                <inertia-link
                  :href="route('farmerposts.create')"
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
                    <th>Name</th>
                    <th>Image</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in posts" :key="'post' + index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.product_name }}</td>
                    <td>
                      <img
                        style="width: 150px"
                        :src="`/uploads/${item.product_image}`"
                        alt=""
                      />
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
          .post(`delete-sell-post/` + item.id)
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
