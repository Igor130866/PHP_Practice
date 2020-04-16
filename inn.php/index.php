<?php
require_once('../site_components/header.php');
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="text-center">Узнать ИНН</div>
      <form action = "inn_obr.php" method = "POST">
              
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Фамилия" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "patronymic">
        </div>
        
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
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          </div>
          <input type="date" class="form-control" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "birthdate">
        </div>   
         
         <p>Номер паспорта</p>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-calendar" aria-hidden="true"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Номер паспорта" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "docno">
        </div>
        
        <p class = "d-none text-danger error-message"></p>
        
        <input type = "submit" class = "btn btn-primary btn-block mt-2 mb-5" value = "Узнать ИНН">
  
      </form>
    </div>
  </div>
</div>

<?php
require_once('../site_components/header.php');
?>
