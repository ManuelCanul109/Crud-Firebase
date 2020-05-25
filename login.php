<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style type="text/css">
	body {
  margin: 0;
  padding: 0;
  background-color: #566787;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #566787;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Postres Riquezas del Mar</h3>
        <br>
        <h4 class="text-center text-white ">Plataforma realizada por Manuel Jesus Canul Witzil</h4>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post" name="loginForm">
                            <h3 class="text-center text-info" style="color:#566787">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Correo:</label><br>
                                <input type="text" name="email" id="email" class="form-control" value="admin@admin.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control" value="Administrador">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Login</span> <span>
                                	<input value="isLogin" id="radioIsLogin" name="isLoginOrSignup" type="radio"></span></label>

                                	<label for="remember-me" class="text-info"><span>Crear</span> <span>
                                	<input value="isSignup" id="radioIsSignup" name="isLoginOrSignup" type="radio"></span></label><br>

                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-auth.js"></script>

 
  <!-- Firebase Database Realtime -->
  <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-database.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyA4NuVGWUthdiBQa9D1uWdrdhrPOuNjdws",
    authDomain: "crudlenguajesdeprogramacion.firebaseapp.com",
    databaseURL: "https://crudlenguajesdeprogramacion.firebaseio.com",
    projectId: "crudlenguajesdeprogramacion",
    storageBucket: "crudlenguajesdeprogramacion.appspot.com",
    messagingSenderId: "1065993399085",
    appId: "1:1065993399085:web:738d176b385d8144fd01a4"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  const form = document.forms['loginForm'];

form.addEventListener('submit', function handleFormSubmit(event) {
  
  event.preventDefault();

  const email = form['email'].value;

  const password = form['password'].value;

  const isLoginOrSignup = form['isLoginOrSignup'].value;

  if (isLoginOrSignup === 'isLogin') {
    return loginUser(email, password);
  }

  return createUser(email, password);
});


function createUser(email, password) {
	console.log('Creando el usuario con email ' + email);

	firebase.auth().createUserWithEmailAndPassword(email, password)
	.then(function (user) {
		console.log('¡Creamos al usuario!');
	})
	.catch(function (error) {
		console.error(error)
	});
}

function loginUser(email, password) {
	console.log('Loging user ' + email);

	firebase.auth().signInWithEmailAndPassword(email, password)
	.then(function (user) {
		console.log('Credenciales correctas, ¡bienvenido!');
		location.assign('index.php');
	})
	.catch(function (error) {
		console.log(error);
	});
}

function signoutUser() {
	firebase.auth().signOut();
}

</script>
</body>
</html>