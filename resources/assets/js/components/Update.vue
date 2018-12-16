<template>
<div class="modal" :class="openmodal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Update {{list.name}}'s detail</p>
      <button class="delete" aria-label="close" @click="close"></button>
    </header>
    <section class="modal-card-body">

      <div class="field">
        <div class="control">
        <label>Name</label>
          <input class="input is-primary" type="text" placeholder="name" v-model="list.name">
       </div>
<small v-if="errors.name" class="has-text-danger">{{errors.name[0]}}</small>

    </div>

    <div class="field">
        <div class="control">
        <label>Phone</label>
          <input class="input is-primary" type="number" placeholder="Phone" v-model="list.phone">
       </div>
<small v-if="errors.phone" class="has-text-danger">{{errors.phone[0]}}</small>

    </div>

    <div class="field">
        <div class="control">
        <label>Email</label>
          <input class="input is-primary" type="email" placeholder="email" v-model="list.email">
       </div>
<small v-if="errors.email" class="has-text-danger">{{errors.email[0]}}</small>
    </div>


    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click="update">Update</button>
      <button class="button" @click="close">Cancel</button>
    </footer>
  </div>
</div>
</template>
<script>
export default {
  props:['openmodal'],

data() {
  return {

  list:{},

  errors:{}

  }
},
  methods:{
  close() {
    this.$emit('closeRequest');
    },
    update() {
      axios.patch('/phonebook/${this.list.id}',this.$data.list)
      .then( (resp) => this.close())
      .catch((error) => this.errors = error.resp.data.errors)
    }
  }

}
</script>