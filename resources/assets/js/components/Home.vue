<template>
<div>  
<nav class="panel  column is-offset-2 is-8">
  <p class="panel-heading">
    Vuejs Phonebook
     
    <button class="button is-link is-outlined" @click="openAdd">
     Add New
    </button>
  
  </p>
  <div class="panel-block">
    <p class="control has-icons-left">
      <input class="input is-small" type="text" placeholder="search">
      <span class="icon is-small is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
    </p>
  </div>
  
 
  <a class="panel-block" v-for="item,key in lists">
   <span  class="column is-9"> 
    {{key}} {{item.name}}
    </span>
     <span class="panel-icon column is-1">
     <i class="has-text-danger fa fa-trash" @click="del(key,item.id)"></i>
    </span>

    <span class="panel-icon column is-1">
     <i class="has-text-info fa fa-edit" @click="openUpdate(key)"></i>
    </span>

    <span class="panel-icon column is-1">
     <i class="has-text-primary fa fa-eye" @click="openShow(key)"></i>
    </span>
  </a>
  
</nav>

<Add :openmodal="addActive" @closeRequest="close"></Add>

<show :openmodal="showActive" @closeRequest="close"></show>

<Update :openmodal="updateActive" @closeRequest="close"></Update>

</div>

</template>
<script>

let Add = require('./Add.vue');
let Show = require('./Show.vue');
let Update = require('./Update.vue');

export default{
  
components:{Add,Show,Update},

data(){
  return {
  addActive:'',
  showActive:'',
  updateActive:'',
  lists:{},
  errors:{}
  }
},

mounted() {
axios.post('/getBooks')
      .then( (resp) => this.lists = resp.data)
      .catch((error) => this.errors = error.resp.data.errors)
  
},

methods:{
  openAdd() {
   this.addActive ='is-active'
  },
  
  openShow(key) {
  this.$children[1].list = this.lists[key] 
  this.showActive = 'is-active'
  },

  openUpdate(key) {
  this.$children[2].list = this.lists[key] 
  this.updateActive = 'is-active'
  },

  close() {
   this.addActive = this.showActive = this.updateActive = ''
  },
  del(key,id) {
  axios.delete('/phonebook/${id}')
      .then( (resp) => console.log('Deleted'))
      .catch((error) => this.errors = error.resp.data.errors)
  }
}

}
</script>
