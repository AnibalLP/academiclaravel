<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"alumnosAdd"}' class="btn btn-primary">Guardar</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Alumnos</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Carrera</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody v-if="alumno.length > 0">
                                <tr v-for="(alumnos,key) in alumno" :key="key">
                                    <td>{{ alumnos.id }}</td>
                                    <td>{{ alumnos.nombre }}</td>
                                    <td>{{ alumnos.apellido }}</td>
                                    <td>{{ alumnos.carrera }}</td>
                                    <td>{{ alumnos.direccion }}</td>
                                    <td>{{ alumnos.telefono }}</td>
                                    <td>
                                        <router-link :to='{name:"alumnosEdit",params:{id:alumnos.id}}' class="btn btn-success">Editar</router-link>
                                        <button type="button" @click="deleteAlumnos(alumnos.id)" class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>

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
    name:"list-alumno",
    data(){
        return {
            alumno:[]
        }
    },
    mounted(){
        this.getalumno()
    },
    methods:{
        async getalumno(){
            await this.axios.get('/api/alumnos').then(response=>{
                this.alumno = response.data
            }).catch(error=>{
                console.log(error)
                this.alumno = []
            })
        },
        deleteAlumnos(id){
            if(confirm("seguro que deseas eliminarlo?")){
                this.axios.delete(`/api/alumnos/${id}`).then(response=>{
                    this.getalumno()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
