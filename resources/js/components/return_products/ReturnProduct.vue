<template>
 <form @submit.prevent="submitForm" class="form-horizontal" role="form" method="post" >
    <div class="row">
    
        <show-error></show-error>
        <div class="col-sm-6">
            <!-- Horizontal Form -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Return Product Form</h3>
                   
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                
               
                    
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="product" class="col-sm-3 col-form-label">Product <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select @change="selectedProduct($event, $event.target.value)"  class="form-control" v-model="form.product_id">
                                    <option :value="0" disabled>Select Product</option>
                                    <option  v-for="(item, index) in products" :key="index" :value="item.id">{{item.product_name}}</option>
                                </select>    
                            </div>
                        </div>


                     

                        <div class="form-group row">
                            <label for="sku" class="col-sm-3 col-form-label">Date <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="date"  v-model="form.date" class="form-control" placeholder="Date" >   
                            </div>
                        </div>

                  




                
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    
                    </div>
                    <!-- /.card-footer -->
               
            </div>
            <!-- /.card -->

        </div>

        <div class="col-sm-6">
            <!-- Horizontal Form -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Size</h3>
                   
                </div>
                <!-- /.card-header -->
                
                
                <div class="card-body">
                    <table class="table table-bordered table-striped table-responsive">
                        <tr v-for="(item, index) in form.items" :key="index">
                         <td>{{item.size}}</td>
                         <td>
                             <input class="form-control" v-model="item.quantity" placeholder="Quantity">
                         </td>
                        </tr>
                    </table>

                    

                </div>
                <!-- /.card-body -->
               
            </div>
            <!-- /.card -->
        </div>
    </div>
    
</form>
</template>

<script>
import store from '../../store'
import * as actions from '../../store/action-types'
import { mapGetters } from 'vuex'
import ShowError from "../utils/ShowError";

export default {
    components: {
       ShowError
    },
    data(){
        return {
            form: {
                date: '',
                product_id: 0,
                items: [
                   
                ] 
            }
        } 
    },

    computed: {
        ...mapGetters({
            'products' : 'getProducts',
  
        })
    },
    
    mounted(){
        //Get products
        store.dispatch(actions.GET_PRODUCTS)

    },

    methods: {
        selectedProduct(event, value) {
            this.form.items = []
            let product = this.products.filter(product => product.id == value)
            
            product[0].stocks.map(stock=>{
                let item = {
                    size: stock.size.size,
                    size_id: stock.size_id,
                    quantity: ''
                }

                this.form.items.push(item)
            })
        },

        submitForm(){
            store.dispatch(actions.SUBMIT_RETURN_PRODUCTS, this.form)
        }


    }

}
</script>

<style>

</style>