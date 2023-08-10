import * as actions from '../../action-types'
import * as mutations from '../../mutation-types'


import Axios from 'axios'


export default {
    [actions.SUBMIT_STOCKS]({commit}, payload){

        Axios.post('/stock', payload)
            .then( res =>{
              if (res.data.success == true) {
                  window.location.href = '/stocks'
                 
              }
            })
           .catch(err => {
               commit(mutations.SET_ERRORS, err.response.data.errors)
           })

    }

}