<?php require_once __DIR__.'/../header.php'; ?>
<style>
    .login-container{
        margin-top: 5%;
        margin-bottom: 5%;
    }
    .login-form-1{
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }
    .login-form-1 h3{
        text-align: center;
        color: #333;
    }
    .login-container form{
        padding: 10%;
    }
    .btnSubmit
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }
    .login-form-1 .btnSubmit{
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
    }
    .login-form-1 .ForgetPwd{
        color: #0062cc;
        font-weight: 600;
        text-decoration: none;
    }
</style>
<div class="container login-container d-flex justify-content-center">
    <div class="col-md-6 login-form-1">
        <h3>Fazer login</h3>
        <form action="/realiza-login" method="POST">
            <div class="alert alert-warning mt-3 align-middle" role="alert" <?= ($isVisible) ? '' : 'style="display: none;"'; ?> >
                <i class="fas fa-exclamation-triangle"></i> <?= $message; ?>
            </div>
            <div class="form-group mt-1">
                <input type="text" id="email" name="email" class="form-control" placeholder="E-mail" value="<?= $email; ?>" />
            </div>
            <div class="form-group mt-1">
                <input type="password" id="password" class="form-control" placeholder="Senha" value="" />
            </div>
            <div class="form-group mt-3 d-flex justify-content-center">
                <input type="submit" class="btnSubmit" value="Login" />
            </div>
            <div class="form-group mt-1 d-flex justify-content-center">
                <a href="/resetar-senha" class="ForgetPwd">Esqueceu a senha?</a>
            </div>
        </form>
    </div>
</div>
<?php require_once __DIR__.'/../footer.php'; ?>