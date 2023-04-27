const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const SanphamList = () => import('./components/san-pham/SanphamList')
const SanphamCreate = () => import('./components/san-pham/SanphamAdd')
const SanphamEdit = () => import('./components/san-pham/SanphamEdit')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'SanphamList',
        path: '/san-pham',
        component: SanphamList
    },
    {
        name: 'SanphamEdit',
        path: '/san-pham/:id/edit',
        component: SanphamEdit
    },
    {
        name: 'SanphamAdd',
        path: '/san-pham/add',
        component: SanphamCreate
    }
]
