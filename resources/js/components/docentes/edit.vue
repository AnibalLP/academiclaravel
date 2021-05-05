<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Modificar docente</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>nombre</label>
                                    <input type="text" class="form-control" v-model="docentes.nombre">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>apellido</label>
                                    <input type="text" class="form-control" v-model="docentes.apellido">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>direccion</label>
                                    <input type="text" class="form-control" v-model="docentes.direccion">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>telefono</label>
                                    <input type="text" class="form-control" v-model="docentes.telefono">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>catedra</label>
                                    <input type="text" class="form-control" v-model="docentes.catedra">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
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
    name:"update-docente",
    data(){
        return {
            docente:{
                nombre:"",
                apellido:"",
                direccion:"",
                telefono:"",
                catedra:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showdocente()
    },
    methods:{
        async showdocente(){
            await this.axios.get(`/api/docentes/${this.$route.params.id}`).then(response=>{
                const { nombre, apellido,direccion,telefono,catedra } = response.data
                this.docente.nombre = nombre
                this.apellido.apellido=apellido
                this.docente.direccion = direccion
                this.docente.telefono=telefono
                this.docente.catedra=catedra
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/docentes/${this.$route.params.id}`,this.docente).then(response=>{
                this.$router.push({name:"docenteList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
