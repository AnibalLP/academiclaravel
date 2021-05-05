<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"docenteAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>docente</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>nombre</th>
                                    <th>apellido</th>
                                    <th>direccion</th>
                                    <th>telefono</th>
                                    <th>catedra</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="docente.length > 0">
                                <tr v-for="(docentes,key) in docente" :key="key">
                                    <td>{{ docentes.id }}</td>
                                    <td>{{ docentes.nombre }}</td>
                                    <td>{{ docentes.apellido }}</td>
                                    <td>{{ docentes.direccion }}</td>
                                    <td>{{ docentes.telefono }}</td>
                                    <td>{{ docentes.catedra }}</td>
                                    <td>
                                        <router-link :to='{name:"docenteEdit",params:{id:docentes.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deletedocente(docentes.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">no hay registros</td>
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
    name:"docentes",
    data(){
        return {
            docentes:[]
        }
    },
    mounted(){
        this.getdocentes()
    },
    methods:{
        async getdocentes(){
            await this.axios.get('/api/docentes').then(response=>{
                this.docentes = response.data
            }).catch(error=>{
                console.log(error)
                this.docentes = []
            })
        },
        deletedocente(id){
            if(confirm("seguro de eliminar ?")){
                this.axios.delete(`/api/docentes/${id}`).then(response=>{
                    this.getdocentes()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
