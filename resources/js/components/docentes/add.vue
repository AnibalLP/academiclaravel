<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>agregar docente</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>nombre</label>
                                    <input type="text" class="form-control" v-model="docente.nombre">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>apellido</label>
                                    <input type="text" class="form-control" v-model="docente.apellido">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>direccion</label>
                                    <input type="text" class="form-control" v-model="docente.direccion">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>telefono</label>
                                    <input type="text" class="form-control" v-model="docente.telefono">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>catedra</label>
                                    <input type="text" class="form-control" v-model="docente.catedra">
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
    name:"add-docente",
    data(){
        return {
            docente:{
                nombre:"",
                apellido:"",
                direccion:"",
                telefono:"",
                catedra:""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('/api/docente',this.docente).then(response=>{
                this.$router.push({name:"docenteList"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>
