<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>editar alumno</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>nombre</label>
                                    <input type="text" class="form-control" v-model="alumnos.nombre">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>apellido</label>
                                    <input type="text" class="form-control" v-model="alumnos.apellido">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>carrera</label>
                                    <input type="text" class="form-control" v-model="alumnos.carrera">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>direccion</label>
                                    <input type="text" class="form-control" v-model="alumnos.direccion">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>telefono</label>
                                    <input type="text" class="form-control" v-model="alumnos.telefono">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Modificar</button>
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
    name:"update-alumnos",
    data(){
        return {
            alumnos:{
                nombre:"",
                apellido:"",
                carrera:"",
                direccion:"",
                telefono:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showalumnos()
    },
    methods:{
        async showalumnos(){
            await this.axios.get(`/api/alumnos/${this.$route.params.id}`).then(response=>{
                const { nombre,apellido,carrera,direccion,telefono } = response.data
                this.alumnos.nombre = nombre
                this.alumnos.apellido = apellido
                this.alumnos.carrera = carrera
                this.alumnos.direccion = direccion
                this.alumnos.telefono = telefono
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/alumnos/${this.$route.params.id}`,this.alumnos).then(response=>{
                this.$router.push({name:"alumnosList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
