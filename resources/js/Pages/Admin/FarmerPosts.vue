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
            <h4 class="card-header">Create Farmer Post</h4>
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
                    <label for="">Product Image</label>
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
                </div>
              </div>
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">District</label>
                    <select2 :options="formattedDistricts" :settings="{width: '100%'}"></select2>
                  </div>
                </div>
              </div>
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
import select2 from "v-select2-component";

export default {
  components: { 
    Sidebar : Sidebar, 
    Header : Header, 
    select2 : select2 
  }, 
  data(){
    return {
      errors : {},
      apiUrl : 'api',
      districts : [],
    }
  }, 
  computed: {
    formattedDistricts(){
      let data = [];
      for(let item of this.districts){
        let object = {
          id : item.id,
          text : `${item.name}`,
        }
        data.push(object);
      }
      return data;
    },
  },
  mounted(){
    this.getDistricts();
  },
  methods: {
    getDistricts(){
      axios.get(`${this.apiUrl}/get-data?provider=Districts`)
      .then(res=>{
        this.districts = res.data;
      })
    }
  }
};
</script>
