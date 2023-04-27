<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"SanphamAdd"}' class="btn btn-primary">Thêm sản phẩm</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Loại sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                            </tr>
                            </thead>
                            <tbody v-if="sanphams.length > 0">
                            <tr v-for="(sanpham,key) in sanphams" :key="key">
                                <td>{{ sanpham.id }}</td>
                                <td>{{ sanpham.title }}</td>
                                <td>{{ sanpham.description }}</td>
                                <td>
                                    <router-link :to='{name:"categoryEdit",params:{id:sanpham.id}}' class="btn btn-success">Edit</router-link>
                                    <button type="button" @click="deleteCategory(sanpham.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="4" align="center">No Categories Found.</td>
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
    name:"sanphams",
    data(){
        return {
            sanphams:[]
        }
    },
    mounted(){
        this.getSanphams()
    },
    methods:{
        async getSanphams(){
            await this.axios.get('/api/san-pham').then(response=>{
                this.sanphams = response.data
            }).catch(error=>{
                console.log(error)
                this.sanphams = []
            })
        },
        deleteCategory(id){
            if(confirm("Bạn muốn xóa sản phẩm này?")){
                this.axios.delete(`/api/san-pham/${id}`).then(response=>{
                    this.getSanphams()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
