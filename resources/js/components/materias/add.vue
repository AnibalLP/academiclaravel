<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Agregar materias</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>materia</label>
                                    <input type="text" class="form-control" v-model="materia.materia">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>catedra</label>
                                    <input type="text" class="form-control" v-model="materia.catedra">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"add-materia",
    data(){
        return {
            materia:{
                materia:"",
                catedra:""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/materia',this.materia).then(response=>{
                this.$router.push({name:"materiaList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>