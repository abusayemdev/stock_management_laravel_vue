<template>
    <div class="col-sm-12" v-if="isErrors">
        <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Error</h5>
                  <ul>
                      <li v-for="(item, index) in errors" :key="index">{{item[0]}}</li>
                  </ul>
                </div>
        
    </div>

</template>


<script>

import { mapGetters } from "vuex";

export default {
    name: "ShowError",
    computed: {
        ...mapGetters({
            isErrors: 'getIsErrors',
            errors: 'getErrors'
        })
    }
}


</script>
