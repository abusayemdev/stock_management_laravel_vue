import * as actions from '../../action-types'
import * as mutations from '../../mutation-types'


import Axios from 'axios'


export default {
    [actions.ADD_PRODUCTS]({commit}, payload){

        Axios.post('/product', payload)
            .then( res =>{
              if (res.data.success == true) {
                  window.location.href = '/product'
                  this.$toastr.success('Message', 'Title');
              }
            })
           .catch(err => {
               commit(mutations.SET_ERRORS, err.response.data.errors)
           })

    },

    [actions.EDIT_PRODUCTS]({commit}, payload){

        Axios.post(`/product/${payload.id}`, payload.data)
            .then( 
                  window.location.href= '/product'
                 
                  
            )
           .catch(err => {
               commit(mutations.SET_ERRORS, err.response.data.errors)
           })

    },

    [actions.GET_PRODUCTS]({commit}){

        Axios.get('/api/products')
            .then( res =>{
                if (res.data.success==true) {
                    
                   commit(mutations.SET_PRODUCTS, res.data.data) 
                }
            })
           .catch(err => {
               console.log(err.response)
           })

    }


}