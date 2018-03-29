<template>
    <div id="app">
        <div class="heading">
            <h1>Cruds</h1>
        </div>
        <crud-component
                v-for="crud in cruds"
                v-bind="crud"
                :key="crud.id"
                @update="update"
                @delete="del"
        ></crud-component>
        <div>
            <button @click="create()">Add</button>
        </div>
    </div>
</template>


<script>
    console.log('lsfjsdf');
  function Crud({ id, color, name}) {
    this.id = id;
    this.color = color;
    this.name = name;
  }

  import CrudComponent from './CrudComponent.vue';

  export default {
    data() {
      return window.axios.get('/api/cruds').then(({data}) => {
        data.forEach(crud => {
          this.cruds.push(new Crud(crud));
        });
      });
    },
    methods: {
      create() {
        // To do
      },
      read() {
        window.axios.get('/api/cruds').then(({data}) => {
          data.forEach(crud => {
            this.cruds.push(new Crud(crud));
          });
        });
      },
      update(id, color) {
        window.axios.put('/api/cruds/${id}', { color }).then(() => {
          this.cruds.find(crud => crud.id === id).color = color;
        })
      },
      del(id) {
        // To do
      }
    },
    components: {
      CrudComponent
    }
  }
</script>