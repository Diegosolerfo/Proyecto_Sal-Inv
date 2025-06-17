
<form action="Usuario_adm.php?accion=reg_multi" method="post">
   <h1>
       Registra a un usuario aqui
   </h1>
   <article class="izquierada">
   <!-- 1 Numero de documento -->
   <div class="Numero_documento"> Numero de documento: 
       <label for="usuario" class="input-form">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
               <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM14 14s-1-4-6-4-6 4-6 4 2.5 0 6 0 6 0 6 0z"/>
           </svg>
           <input type="number" name="num_doc" id="usuario" required min="100000000" max="999999999999">
       </label>
   </div>
   <!-- 2 Clave -->
   <div class="clave"> Contraseña: 
       <label for="password" class="input-form">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
               <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
           </svg>
           <input type="password" name="clave" id="password" required>
       </label>
   </div>
   <!-- 3 Nombre -->
   <div class="nombre"> Nombre: 
       <label for="nombre" class="input-form">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
               <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM14 14s-1-4-6-4-6 4-6 4 2.5 0 6 0 6 0 6 0z"/>
           </svg>
           <input type="text" name="nombre" id="nombre" required>
       </label>
   </div>
   <!-- 4 Apellido -->
   <div class="apellido">
       <label for="apellido" class="input-form"> Apellidos:
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
               <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM14 14s-1-4-6-4-6 4-6 4 2.5 0 6 0 6 0 6 0z"/>
           </svg>
           <input type="text" name="apellido" id="apellido" required>
       </label>
   </div>
   <!-- 5 Correo -->
   <div class="correo">
       <label for="email" class="input-form"> Correo Electronico: 
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
               <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4z"/>
               <path d="M.05 4.555L8 8.414l7.95-3.86A1 1 0 0 1 15.8 4H.2a1 1 0 0 1-.15.555zM0 5.697v6.104a1 1 0 0 0 .555.895l5.555-2.776L0 5.697zm16 0l-6.11 3.026 5.555 2.776a1 1 0 0 0 .555-.895V5.697z"/>
           </svg>
           <input type="email" name="correo" id="email" required>
       </label>
   </div>
   <!-- 6 Fecha de nacimiento -->
   <div class="fecha-nacimiento">
       <label for="fecha-nacimiento" class="input-form"> Fecha de nacimiento: 
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
               <path d="M3.5 0a.5.5 0 0 1 .5.5V1h9V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H1a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h13a1 1 0 0 0 1-1V4H1z"/>
           </svg>
           <input type="date" name="fecha_nac" id="fecha-nacimiento" required>
       </label>
   </div>
   </article>
   <!-- 7 Direccion -->
   <div class="direccion">
       <label for="direccion" class="input-form"> Direccion: 
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
               <path d="M8 0a5 5 0 0 0-5 5c0 3.5 5 11 5 11s5-7.5 5-11a5 5 0 0 0-5-5zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
           </svg>
           <input type="text" name="direccion" id="direccion" required>
       </label>
   </div>
   <article class="derecha">
   <!-- 8 Genero -->
   <div> 
       <label for="genero"> Genero: 
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
           <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21 21 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21 21 0 0 0 14 7.655V1.222z"/>
       </svg>
       <select name="genero" id="genero">
           <option selected>Prefiero no decirlo</option>
           <option value="Hombre">Hombre</option>
           <option value="Mujer">Mujer</option>
       </select>
   </label>
   </div>
   <!-- 9 Telefono -->
   <div class="telefono">
       <label for="telefono" class="input-form"> Telefono: 
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
               <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.455 1.775a17.573 17.573 0 0 0 5.065 7.491 17.573 17.573 0 0 0 7.49 5.065c.607.207 1.292.029 1.776-.454l1.034-1.034a.678.678 0 0 0-.062-1.015l-2.509-2.01a.678.678 0 0 0-.58-.1l-2.376.79a1.745 1.745 0 0 1-1.631-.454l-2.09-2.09a1.745 1.745 0 0 1-.455-1.631l.79-2.376a.678.678 0 0 0-.1-.58L3.654 1.328z"/>
           </svg>
           <input type="number" name="telefono" id="telefono" min="3000000000" max="3999999999" required>
       </label>
   </div>
   <!-- 10 Rol -->
   <div>
       <label for="rol">
           Rol: 
           <select name="rol" id="rol_de_usuario">
               <option value="Operador" selected>Operador</option>
               <option value="Administrador">Administrador</option>
               <option value="Cliente">Cliente</option>
            </select>
       </label>
   </div>
               <!-- 11 EPS -->
   <div>
       <label for="eps">
           EPS: 
           <input type="text" id="eps" name="eps" class="t1_der" required>
       </label>
   </div>

              <!--  12 RH -->
   <div>
       <label for="rh">
           RH:
           <select name="rh" id="rh_usuario">
               <option value="+">+</option>
               <option value="-">-</option>
           </select>
       </label>
   </div>

             <!--   13 Tipo de Sangre -->
   <div>
       <label for="tipo_sangre">
           Tipo de Sangre: 
           <select name="tip_san" id="tipo_sangre_usuario">
               <option value="AB">AB</option>
               <option value="O">O</option>
               <option value="A">A</option>
               <option value="B">B</option>
           </select>
       </label>
   </div>
   <div>
       <button type="submit" name="Reg_Usu" value="Usuarios">Registrar</button>
   </div>
</form>
