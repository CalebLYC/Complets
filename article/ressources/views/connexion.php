<section class="sectionForm">
    <div class="sec-container">
        <div class="form-wrapper">
            <div class="card">
                <div class="card-header">
                    <div id="forLogin" class="form-header active">Se connecter</div>
                    <div id="forRegister" class="form-header">S'inscrire</div>
                </div>
                <div class="card-body" id="formContainer">
                    <form action="../http/inscription.php" method="POST" id="formLogin" class="formForm">
                        <input type="text" name="email" class="form-control" placeholder="@Email" id="email">
                        <input type="password" name="password" class="form-control" placeholder="@Mot de passe" id="password">
                        <div class="error" id="loginError"></div>
                        <input type="submit" name="submitLogin" value="Connexion" class="form-button" id="login-button">
                    </form>
                    <form action="../http/inscription.php" method="POST" id="formRegister" class="formForm toggleForm">
                        <input type="text" name="email" class="form-control" placeholder="@Email" id="emailRegister">
                        <input type="text" name="username" class="form-control" placeholder="@utilisateur" id="username">
                        <input type="password" name="password" class="form-control" placeholder="@Mot de passe" id="passwordRegister">
                        <input type="passwordConfirm" name="passwordConfirm" class="form-control" placeholder="@ Confirmer votre mot de passe" class="form-button" id="passwordConfirm">
                        <div class="error" id="registerError"></div>
                        <input type="submit" name="submitRegister" value="Inscription" class="form-button" id="register-button">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    !isset($p) ? require '../../config/error_config.php' : ' ';
?>