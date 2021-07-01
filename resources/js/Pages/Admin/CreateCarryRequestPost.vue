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
            <h4 class="card-header">Create Carry Request Post
              <span class="float-right">
                <inertia-link :href="route('carrierrequestpost.all.my')" class="btn btn-primary btn-sm">All My Carrier Request Post</inertia-link>
              </span>
            </h4>
            <form @submit.prevent id="farmerPostCreateForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Journer Date And Time</label>
                      <input type="datetime-local" class="form-control" name="journey_date_and_time" :class="errors.hasOwnProperty('journer_date_and_time') ? 'is-invalid' : ''">
                      <span v-if="errors.hasOwnProperty('journey_date_and_time')" class="text-danger">{{errors.journer_date_and_time[0]}}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Descrition</label>
                      <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                      <span v-if="errors.hasOwnProperty('description')" class="text-danger">{{errors.description[0]}}</span>
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">From District</label>
                      <select2 :id="'from_district_id'" :name="'from_district_id'" @select="getThanaAndPostOffice" :options="formattedDistricts" :settings="{width: '100%'}"></select2>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Thana</label>
                      <select2 :id="'from_thana_id'" :name="'from_thana_id'" :options="formattedThanas" :settings="{width: '100%'}"></select2>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Post Office</label>
                      <select2 :id="'from_post_office_id'" :name="'from_post_office_id'" :options="formattedPostOffices" :settings="{width: '100%'}"></select2>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">To District</label>
                      <select2 :id="'to_district_id'" :name="'to_district_id'" @select="getToThanaAndPostOffice" :options="formattedDistricts" :settings="{width: '100%'}"></select2>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Thana</label>
                      <select2 :id="'to_thana_id'" :name="'to_thana_id'" :options="formattedToThanas" :settings="{width: '100%'}"></select2>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Post Office</label>
                      <select2 :id="'to_post_office_id'" :name="'to_post_office_id'" :options="formattedToPostOffices" :settings="{width: '100%'}"></select2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <span class="float-right">
                  <button class="btn btn-primary btn-sm" @click="saveData">Save</button>
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
import Select2 from "vue3-select2-component";


import {showMessage} from './helpers.js'
import Input from '@/Components/Input.vue';

export default {
  name: "FarmerPost",
  components: {
    Sidebar,
    Header,
    Select2,
    Input,
  },
  props: {
    user : {}
  },
  data() {
    return {
      errors: {},
      apiUrl: "api",
      districts: [],
      postOffices: [],
      thanas: [],
      toThanas : [],
      toPostOffices : [],
    };
  },
  computed: {
    formattedDistricts() {
      let data = [];
      for (let item of this.districts) {
        let object = {
          id: item.district_id,
          text: `${item.name}`,
        };
        data.push(object);
      }
      return data;
    },
    formattedThanas() {
      let data = [];
      for (let item of this.thanas) {
        let object = {
          id: item.id,
          text: `${item.name}`,
        };
        data.push(object);
      }
      return data;
    },
    formattedToThanas() {
      let data = [];
      for (let item of this.toThanas) {
        let object = {
          id: item.id,
          text: `${item.name}`,
        };
        data.push(object);
      }
      return data;
    },
    formattedPostOffices() {
      let data = [];
      for (let item of this.postOffices) {
        let object = {
          id: item.id,
          text: `${item.name}`,
        };
        data.push(object);
      }
      return data;
    },
    formattedToPostOffices() {
      let data = [];
      for (let item of this.toPostOffices) {
        let object = {
          id: item.id,
          text: `${item.name}`,
        };
        data.push(object);
      }
      return data;
    },
  },
  mounted() {
    this.getDistricts();
  },
  methods: {
    getThanaAndPostOffice(event, item) {
      axios
        .get(
          `${this.apiUrl}/get-data?provider=ThanaAndPostOffices&district_id=${event.id}`
        )
        .then((res) => {
          this.thanas = res.data.thanas;
          this.postOffices = res.data.postOffices;
        });
    },
    getToThanaAndPostOffice(event, item) {
      axios
        .get(
          `${this.apiUrl}/get-data?provider=ThanaAndPostOffices&district_id=${event.id}`
        )
        .then((res) => {
          this.toThanas = res.data.thanas;
          this.toPostOffices = res.data.postOffices;
        });
    },
    getDistricts() {
      axios.get(`${this.apiUrl}/get-data?provider=Districts`).then((res) => {
        this.districts = res.data;
      });
    },
    saveData(){
      let data = new FormData(document.getElementById('farmerPostCreateForm'))
      data.append('_token', $('input[name=_token]').val())
      data.append('user_id', this.user.id)
      axios.post('save-carrier-request-post', data)
      .then(res=>{
        showMessage(res.data.message, 'success')
        setTimeout(function(){
          window.location.reload()
        }, 500);
      }).catch(err=>{
        showMessage(err.response.data.message, 'error')
      })
    }
  },
};
</script>

<style scoped>


</style>
