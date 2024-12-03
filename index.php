<?php
session_start();
if(isset($_SESSION['Email'])){
    header("location:inicio.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register - MagtimusPro</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>
                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="login.php" method="POST"
                    class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <label for="" class="form-label">Email</label>
                        <input type="Email" name="Email" placeholder="Email" required />
                        <label for="" class="form-label">Password</label>
                        <input type="Password" name="Password" placeholder="Password" required />
                        <p><a href="resta.password.php" class="link-olvide">Olvidé mi contraseña</a></p>
                       
                        <button >Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="Registro.php" method="POST" class="formulario__register">
                        <h2>Regístrarse</h2>
                        
                        <div class="row mb-3">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombres</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="Nombres"
                                        id="Nombres"
                                        aria-describedby="helpId"
                                        placeholder=""
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Apellidos</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="Apellidos"
                                        id="Apellidos"
                                        aria-describedby="helpId"
                                        placeholder=""
                                        required
                                    />
                                </div>
                            </div>

                        </div>

                    <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input
                                type="Email"
                                class="form-control"
                                name="Email"
                                id="Email"
                                aria-describedby="emailhelpId"
                                placeholder="abc@gmail.com"
                                required
                            />

                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="mb-3">
                                <label for="" class="form-label">Contraseña</label>
                                <input
                                    type="Password"
                                    class="form-control"
                                    name="Password"
                                    id="Password"
                                    placeholder=""
                                    required
                            />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">

                                <label for="" class="form-label">Repetir contraseña</label>
                                <input
                                    type="Password"
                                    class="form-control"
                                    name="ConfirmarPassword"
                                    id="Nombres"
                                    placeholder=""
                                    required
                                />

                                </div>
                            </div>
                        </div>
<br/>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="genero" class="form-label">
                                    Genero:
                                </label>
                                    <select class="form-select" name="Genero" id="Genero" required>
                                        <option value="">Seleccione su genero</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenimo">Femenino</option>
                                    </select>
                            </div>
                        </div>

                        <button>Regístrarse</button>
                        
                    </form>
                </div>
            </div>

        </main>

        <script src="./js/script.js"></script>

</body>
</html>