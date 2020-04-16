<?php
  
  $title = "Войти";
  $style  = '';
  require_once('site_components/header.php');
?>

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-8">
          <h1 class="text-center">Войти</h1>
            <form action = "auth_obr.php" method = "POST">
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
              
              <p class = "d-none text-danger error-message"></p>
              
              <input type = "submit" class = "btn btn-primary btn-block mt-2" value = "Зарегистрироваться">
            </form>
        </div>
      </div>
    </div>
   
   <script>
      let form = document.querySelector('form[action = "auth_obr.php"]');
      //console.log(form);
      
      form.onsubmit = (e) => {
        e.preventDefault();
      // console.log(e.target) // e.target - елемент на котором произведено событие(цель события);
      let formData = new FormData(form);
      // console.log( [formData.get('login'), formData.get('pass')] );
      fetch('auth_obr.php', {
        method: 'POST',
        body: formData,
      })  
        .then(response => response.text())
        .then(result => {
          if (result == "ok") {
            window.location.href = "lk.php";
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
  