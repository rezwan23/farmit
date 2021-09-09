<template>
  <div>
    <Sidebar :user="user"></Sidebar>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <Header title="Farmer Posts"></Header>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <h4 class="card-header">Create Farmer Post
              <span class="float-right">
                <inertia-link :href="route('farmerposts.index')" class="btn btn-primary btn-sm">All Posts</inertia-link>
              </span>
            </h4>
            <form @submit.prevent id="farmerPostCreateForm" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Product Name</label>
                      <input type="text" class="form-control" name="product_name" :class="errors.hasOwnProperty('product_name') ? 'is-invalid' : ''">
                      <span v-if="errors.hasOwnProperty('product_name')" class="text-danger">{{errors.product_name[0]}}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Product Image</label>
                      <input type="file" class="form-control" name="product_image" :class="errors.hasOwnProperty('product_image') ? 'is-invalid' : ''">
                      <span v-if="errors.hasOwnProperty('product_image')" class="text-danger">{{errors.product_image[0]}}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Product Descrition</label>
                      <textarea name="details" class="form-control" id="" cols="30" rows="10"></textarea>
                      <span v-if="errors.hasOwnProperty('product_image')" class="text-danger">{{errors.product_image[0]}}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Sell Price</label>
                      <input type="number" class="form-control" name="sell_price" :class="errors.hasOwnProperty('sell_price') ? 'is-invalid' : ''">
                      <span v-if="errors.hasOwnProperty('sell_price')" class="text-danger">{{errors.sell_price[0]}}</span>
                    </div>
                    <div class="form-group">
                      <label for="">Weight</label>
                      <input type="number" class="form-control" name="weight" :class="errors.hasOwnProperty('weight') ? 'is-invalid' : ''">
                      <span v-if="errors.hasOwnProperty('weight')" class="text-danger">{{errors.weight[0]}}</span>
                    </div>
                    <div class="form-group">
                      <label for="">Weight</label>
                      <select name="type" class="form-control" id="">
                        <option>Food</option>
                        <option>Agriculture</option>
                        <option>Nutrition</option>
                        <option>Fruits</option>
                      </select>
                      <span v-if="errors.hasOwnProperty('weight')" class="text-danger">{{errors.weight[0]}}</span>
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">District</label>
                      <select2 :id="'district_id'" :name="'district_id'" @select="getThanaAndPostOffice" :options="formattedDistricts" :settings="{width: '100%'}"></select2>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Thana</label>
                      <select2 :id="'thana_id'" :name="'thana_id'" :options="formattedThanas" :settings="{width: '100%'}"></select2>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Post Office</label>
                      <select2 :id="'post_office_id'" :name="'post_office_id'" :options="formattedPostOffices" :settings="{width: '100%'}"></select2>
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
    getDistricts() {
      axios.get(`${this.apiUrl}/get-data?provider=Districts`).then((res) => {
        this.districts = res.data;
      });
    },
    saveData(){
      let data = new FormData(document.getElementById('farmerPostCreateForm'))
      data.append('_token', $('input[name=_token]').val())
      data.append('user_id', this.user.id)
      axios.post('save-sell-post', data)
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
