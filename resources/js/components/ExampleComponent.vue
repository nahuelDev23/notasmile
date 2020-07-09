<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
          {{inputs}}
        <div class="card">
          <form method="POST" v-on:submit.prevent="crearReceta">
            <input type="text" v-model="title"  placeholder="Titulo" name="title" required />
            <div v-for="(input, k) in inputs" :key="k">
              <input type="text" v-model="input.name"  placeholder="Ingrediente" name="ingrediente" required />
              <span>
                <button @click="remove(k)" v-show="k || (!k && inputs.length > 1)">Menos</button>
                <button @click="add(k)" v-show="k == inputs.length - 1">Mas</button>
              </span>
            </div>
            <input type="submit"> 
          </form>
          
            <div v-for="re in recetas" :key="re">
                <p>{{re.title}}</p>
                <div v-for="ing in JSON.parse(re.ingrediente)" :key="ing">
                    {{ing.name}}
                    </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      title:'',
      inputs: [
        {
          name: ""
        }
      ],
      recetas:[]
    };
  },
  mounted() {
    this.verReceta()
  },
  methods: {
    add(index) {
      this.inputs.push({ name: "" });
    },
    remove(index) {
      this.inputs.splice(index, 1);
    },
    crearReceta()
    {
         var data = new  FormData();
            data.append('title', this.title);
            data.append('ingrediente', JSON.stringify(this.inputs));
            console.log(this.inputs)
            
			axios.post("receta/store",data).then(response => {
                console.log(response)
			}).catch(error => {

                console.log(error)
			});
    },
    verReceta()
    {
       axios.get("receta")
       .then(response => {
                this.recetas = response.data
            })
        .catch(error => {

                console.log(error)
			}); 
    }
  }
};
</script>
