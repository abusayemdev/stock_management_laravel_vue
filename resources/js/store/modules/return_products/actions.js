import * as actions from '../../action-types'
import * as mutations from '../../mutation-types'


import Axios from 'axios'


export default {
    [actions.SUBMIT_RETURN_PRODUCTS]({commit}, payload){

        Axios.post('/return', payload)
            .then( res =>{
              if (res.data.success == true) {
                  window.location.href = '/return-product'
                 
              }
            })
           .catch(err => {
               commit(mutations.SET_ERRORS, err.response.data.errors)
           })

    }

}