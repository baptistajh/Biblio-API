<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card my-5">
                    <form action="/api/login" method="POST">
                        <div class="card-header">
                            <h4 class="text-center">Login</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span><i class="fas fa-envelope"></i></span> Email</label>
                                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Insira seu email..." name="email" required>
                                <small id="emailHelp" class="form-text text-muted">Nós nunca iremos compartilhar seu email com mais ninguém.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><span><i class="fas fa-lock"></i></span> Senha</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Insira sua senha..." name="password" required>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary"><span><i class="fas fa-check"></i></span> Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>