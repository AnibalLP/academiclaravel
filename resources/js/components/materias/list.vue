<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"materiaAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>materias</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>materia</th>
                                    <th>catedra</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="materias.length > 0">
                                <tr v-for="(materia,key) in materias" :key="key">
                                    <td>{{ materia.id }}</td>
                                    <td>{{ materia.materia }}</td>
                                    <td>{{ materia.catedra }}</td>
                                    <td>
                                        <router-link :to='{name:"materiaEdit",params:{id:materia.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deletemateria(materia.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No materias Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"materias",
    data(){
        return {
            materias:[]
        }
    },
    mounted(){
        this.getmaterias()
    },
    methods:{
        async getmaterias(){
            await this.axios.get('/api/materias').then(response=>{
                this.materias = response.data
            }).catch(error=>{
                console.log(error)
                this.materias = []
            })
        },
        deletematerias(id){
            if(confirm("seguro de eliminar ?")){
                this.axios.delete(`/api/materias/${id}`).then(response=>{
                    this.getmaterias()
                }).catch(error=>{
       console.log(error)
                })
        }
       }
    }
}
</script>
