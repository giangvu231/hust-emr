<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <!-- Page Not Found -->
                        Không tìm thấy trang!
                    </div>

                    <div class="card-body">
                    <center>
                        <!-- Error! <br> -->
                        Lỗi! <br>
                        <!-- PAGE NOT FOUND -->
                        KHÔNG TÌM THẤY TRANG
                    </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
             setTimeout(function(){
                    NProgress.done()
                    }, 3000);
        }
    }
</script>
