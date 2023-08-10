<template>
 <form @submit.prevent="submitForm" class="form-horizontal" role="form" method="post" >
    <div class="row">
    
        <show-error></show-error>
        <div class="col-sm-6">
            <!-- Horizontal Form -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Product Form</h3>
                   
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                
               
                    
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="product" class="col-sm-3 col-form-label">Category <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" v-model="form.category_id">
                                    <option :value="0" disabled>Select Category</option>
                                    <option v-for="(item, index) in categories" :key="index" :value="item.id">{{item.category_name}}</option>
                                </select>    
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="product" class="col-sm-3 col-form-label">Brand <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" v-model="form.brand_id" >
                                    <option :value="0" disabled>Select Brand</option>
                                    <option v-for="(item, index) in brands" :key="index" :value="item.id">{{item.brand_name}}</option>
                                </select>    
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sku" class="col-sm-3 col-form-label">SKU <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text"  v-model="form.sku" class="form-control" placeholder="SKU" >   
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_name" class="col-sm-3 col-form-label">Product Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" v-model="form.product_name" class="form-control" placeholder="Product Name" >   
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="cost_price" class="col-sm-3 col-form-label">Product Cost Price <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" v-model="form.cost_price" class="form-control" placeholder="Product Cost Price" >   
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="retail_price" class="col-sm-3 col-form-label">Product Retail Price <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" v-model="form.retail_price" class="form-control" placeholder="Product Retail Price" >   
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="year" class="col-sm-3 col-form-label">Product Menufacture Year <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text"  v-model="form.year" class="form-control" placeholder="Year(EX:2021)" >   
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea row="8" name="description" v-model="form.description" class="form-control" placeholder="Description" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Image <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input @change="addImage" type="file"  class="form-control">   
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" v-model="form.status" >
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>    
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
                    <div class="row mb-1" v-for="(item, index) in form.items" :key="index">
                        <div class="col-sm-4">
                            <select class="form-control" v-model="item.size_id">
                                <option value="">Select Size</option>
                                <option v-for="(size, index) in sizes" :key="index" :value="size.id">{{size.size}}</option>
                            </select>

                        </div>
                        <div class="col-sm-3">
                            <input type="text" v-model="item.location" class="form-control" placeholder="Location">

                        </div>
                        <div class="col-sm-3">
                            <input type="number" v-model="item.quantity" class="form-control" placeholder="Quantity">

                        </div>
                        <div class="col-sm-2">
                                <button @click="deleteItem(index)" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>

                        </div>

                    </div>
                    

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button @click="addItem()" type="button" class="btn btn-primary">Add Item</button>
                
                </div>
                <!-- /.card-footer -->
                
               
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
                category_id: 0,
                brand_id: 0,
                sku: '',
                product_name: '',
                image: '',
                cost_price: 0,
                retail_price: 0,
                year: '',
                description: '',
                status: 1,
                items: [
                    {
                        size_id: '',
                        location: '',
                        quantity: 0
                    }
                ] 
            }
        }
    },

    computed: {
        ...mapGetters({
            'categories' : 'getCategories',
            'brands': 'getBrands',
            'sizes': 'getSizes'
        })
    },
    
    mounted(){
        //Get categories
        store.dispatch(actions.GET_CATEGORIES)

        //Get brands
        store.dispatch(actions.GET_BRANDS)

        //Get sizes
        store.dispatch(actions.GET_SIZES)
    },

    methods: {
        addItem(){
            let item = {
                        size_id: '',
                        location: '',
                        quantity: 0
            }

            this.form.items.push(item)
        },

        deleteItem(index){
            this.form.items.splice(index, 1)
        },

        submitForm(){
            let data = new FormData();

            data.append('category_id', this.form.category_id)
            data.append('brand_id', this.form.brand_id)
            data.append('sku', this.form.sku)
            data.append('product_name', this.form.product_name)
            data.append('image', this.form.image)
            data.append('cost_price', this.form.cost_price)
            data.append('retail_price', this.form.retail_price)
            data.append('description', this.form.description)
            data.append('year', this.form.year)
            data.append('status', this.form.status)
            data.append('items', JSON.stringify(this.form.items))

            store.dispatch(actions.ADD_PRODUCTS, data)
        },

        addImage(e){
            this.form.image = e.target.files[0]

        }

    }

}
</script>

<style>

</style>