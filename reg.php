<?php
  $title = "Регистрация";
  $style  = '';
  require_once('site_components/header.php');
?>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-8">
          <h1 class="text-center">Регистрация</h1>
            <form action = "reg_obr.php" method = "POST">
              <p class = "d-none text-danger error-message"></p>
              <div class="input-group mb-3">
                
                
                
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-info" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Введите login" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "login">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-info" aria-hidden="true"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Введите пароль" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "pass">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-info" aria-hidden="true"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Повторите пароль" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "passrepeat">
              </div>
              <h2 <div class="text-center">Личная информация</h2>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Имя" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "name">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Отчество" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "lastname">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Фамилия" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "patronymic">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                </div>
                <input type="date" class="form-control" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "birthdate">
              </div>
              <input type = "submit" class = "btn btn-primary btn-block mt-2" value = "Зарегистрироваться">
            </form>
        </div>
      </div>
    </div>
   
   <script>
     let form = document.querySelector('form[action = "reg_obr.php"]');
     form.onsubmit = (e) => {
        e.preventDefault();
       
       let formData = new FormData(form);
       // console.log( formData.get('patronymic') );
       fetch('reg_obr.php', {
         method: "POST",
         body: formData,
       })
       .then(response => response.text())
       .then(result => {
         if (result =="ok") {
           alert("Пользователь однозначно зарегистрирован");
           window.location.href = "auth.php";
         } else {
           showErrorMessage(result);
         }
       });
     }
     
     function showErrorMessage(message) {
        let messageParagraph = form.querySelector('.error-message');
        messageParagraph.classList.remove("d-none");
        messageParagraph.innerHTML = message;
      }
   </script>
   
   
<?php require_once('site_components/footer.php'); ?>