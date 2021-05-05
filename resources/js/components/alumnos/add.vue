<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>agregar alumnos</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
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
                                <button type="submit" class="btn btn-primary">Guardar</button>
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
    name:"add-alumnos",
    data(){
        return {
            alumnos:{
                nombre:"",
                apellido:"",
                carrera:"",
                direccion:"",
                telefono:""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/alumnos',this.alumnos).then(response=>{
                this.$router.push({name:"alumnosList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
