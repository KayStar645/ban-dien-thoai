<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#">Laravel Vue Crud App - TechvBlogs</router-link>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link exact-active-class="active" to="/" class="nav-item nav-link">Trang chủ</router-link>
                        <router-link exact-active-class="active" to="/san-pham" class="nav-item nav-link">Sản phẩm</router-link>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
export default {}
</script>
