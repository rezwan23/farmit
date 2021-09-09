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
              All FeedBack
            </h4>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Feedback</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in feedbacks" :key="'feedback' + index">
                    <td>{{ index + 1 }}</td>
                    <td>{{dateFormat(item.created_at)}}</td>
                    <td>{{ item.name }}</td>
                    <td>
                      <span>{{item.feedback}}</span>
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
    feedbacks: Array,
  },
  data() {
    return {
      errors: {},
      apiUrl: "api",
    };
  },
  methods:{
    dateFormat(date, format = 'LLLL'){
      return moment(date).format(format)
    }
  }
};
</script>

<style scoped>
</style>
