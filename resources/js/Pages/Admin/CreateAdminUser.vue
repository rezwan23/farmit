<template>
  <div>
    <Sidebar :user="user"></Sidebar>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <Header title="Admin User"></Header>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <h4 class="card-header">
              Create Admin User
              
            </h4>
            <form
              @submit.prevent
              id="farmerPostCreateForm"
              method="post"
              enctype="multipart/form-data"
            >
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input
                        type="text"
                        class="form-control"
                        name="name"
                        :class="
                          errors.hasOwnProperty('name') ? 'is-invalid' : ''
                        "
                      />
                      <span
                        v-if="errors.hasOwnProperty('name')"
                        class="text-danger"
                        >{{ errors.name[0] }}</span
                      >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        name="email"
                        :class="
                          errors.hasOwnProperty('name') ? 'is-invalid' : ''
                        "
                      />
                      <span
                        v-if="errors.hasOwnProperty('email')"
                        class="text-danger"
                        >{{ errors.email[0] }}</span
                      >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">NID</label>
                      <input
                        type="nid"
                        class="form-control"
                        name="nid"
                        :class="
                          errors.hasOwnProperty('nid') ? 'is-invalid' : ''
                        "
                      />
                      <span
                        v-if="errors.hasOwnProperty('nid')"
                        class="text-danger"
                        >{{ errors.nid[0] }}</span
                      >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Phone Number</label>
                      <input
                        type="phone_no"
                        class="form-control"
                        name="phone_no"
                        :class="
                          errors.hasOwnProperty('phone_no') ? 'is-invalid' : ''
                        "
                      />
                      <span
                        v-if="errors.hasOwnProperty('phone_no')"
                        class="text-danger"
                        >{{ errors.phone_no[0] }}</span
                      >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Password</label>
                      <input
                        type="password"
                        class="form-control"
                        name="password"
                        :class="
                          errors.hasOwnProperty('password') ? 'is-invalid' : ''
                        "
                      />
                      <span
                        v-if="errors.hasOwnProperty('password')"
                        class="text-danger"
                        >{{ errors.password[0] }}</span
                      >
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <span class="float-right">
                  <button class="btn btn-primary btn-sm" @click="saveData">
                    Save
                  </button>
                </span>
              </div>
            </form>
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

import { showMessage } from "./helpers.js";
import Input from "@/Components/Input.vue";

export default {
  name: "FarmerPost",
  components: {
    Sidebar,
    Header,
    Input,
  },
  props: {
    user: {},
  },
  data() {
    return {
      errors: {},
      apiUrl: "api",
      districts: [],
      postOffices: [],
      thanas: [],
      toThanas: [],
      toPostOffices: [],
    };
  },
  computed: {},
  mounted() {
    
  },
  methods: {
    saveData() {
      this.errors = {};
      let data = new FormData(document.getElementById("farmerPostCreateForm"));
      data.append("_token", $("input[name=_token]").val());
      data.append("user_id", this.user.id);
      data.append("type", 'admin');
      axios
        .post("save-admin-user", data)
        .then((res) => {
          showMessage(res.data.message, "success");
          setTimeout(function(){
            window.location.reload()
          }, 500);
        })
        .catch((err) => {
          if (err.response.status == 422) {
            this.errors = err.response.data.errors;
          }
          showMessage(err.response.data.message, "error");
        });
    },
  },
};
</script>

<style scoped>
</style>
