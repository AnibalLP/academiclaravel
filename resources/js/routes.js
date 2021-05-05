const Welcome = () =>
    import ('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */ )
const alumnosList = () =>
    import ('./components/alumnos/list.vue' /* webpackChunkName: "resource/js/components/category/list" */ )
const alumnosCreate = () =>
    import ('./components/alumnos/add.vue' /* webpackChunkName: "resource/js/components/category/add" */ )
const alumnosEdit = () =>
    import ('./components/alumnos/edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */ )
const docenteList = () =>
    import ('./components/docentes/list.vue' /* webpackChunkName: "resource/js/components/category/list" */ )
const docenteCreate = () =>
    import ('./components/docentes/add.vue' /* webpackChunkName: "resource/js/components/category/add" */ )
const docenteEdit = () =>
    import ('./components/docentes/edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */ )
const materiaList = () =>
    import ('./components/materias/list.vue' /* webpackChunkName: "resource/js/components/category/list" */ )
const materiaCreate = () =>
    import ('./components/materias/add.vue' /* webpackChunkName: "resource/js/components/category/add" */ )
const materiaEdit = () =>
    import ('./components/materias/edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */ )



export const routes = [{
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'alumnosList',
        path: '/alumnos',
        component: alumnosList
    },
    {
        name: 'alumnosEdit',
        path: '/alumnos/:id/edit',
        component: alumnosEdit
    },
    {
        name: 'alumnosAdd',
        path: '/alumnos/add',
        component: alumnosCreate
    },
    {
        name: 'docenteList',
        path: '/docentes',
        component: docenteList
    },
    {
        name: 'docenteAdd',
        path: '/docentes',
        component: docenteCreate
    },
    {
        name: 'docenteEdit',
        path: '/docentes/:id/edit',
        component: docenteEdit
    },
    {
        name: 'materiaAdd',
        path: '/materias/add',
        component: materiaCreate
    },
    {
        name: 'materiaList',
        path: '/materias',
        component: materiaList
    },
    {
        name: 'materiaEdit',
        path: '/materias/:id/edit',
        component: materiaEdit
    },

]