import Service from './Service';

export default {
    getList(params = {}) {
        return Service.get(route('admin.api.v1.crud.list', {controller: 'product'}), {params});
    },
    detail(id, params = {}) {
        return Service.get(route('admin.api.v1.crud.detail', {controller: 'product', id}), {params});
    },
    create(params) {
        return Service.post(route('admin.api.v1.crud.create', {controller: 'product'}), params);
    },
    update(id, params) {
        return Service.put(route('admin.api.v1.crud.update', {controller: 'product', id}), params);
    },
};
