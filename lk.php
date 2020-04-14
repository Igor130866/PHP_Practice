<?php
  session_start();
  if(!$_SESSION['id']) {
    header('Location: auth.php');
  }
  $title = "Личный кабинет";
  $style  = '
            td {
              width:100%;
              margin-top: 50px;
              }
              .fa-pencil, .fa-check, fa-times {
                cursor: pointer;
              }
            ';
  require_once('site_components/header.php');
?>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <h1 class = "text-center mt-5">Личный кабинет</h1>
          <h4>Здравствуйте,  <span><?php echo $_SESSION['name'] ?></span></h4>
          <table>
            <tr>
              <td>Логин </td>
              <td class = "data" data = "login"><?php echo $_SESSION['login'] ?></td>
              <td>
                <span class = "edit">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </span>
                <span class = "startedit d-none">
                  <i class="fa fa-check" aria-hidden="true"></i>
                  <i class="fa fa-times" aria-hidden="true"></i>
                </span>
              </td>
            </tr>
            <tr>
              <td>Фамилия </td>
              <td><?php echo $_SESSION['lastname'] ?></td>
            </tr>
            <tr>
              <td>Имя </td>
              <td><?php echo $_SESSION['name'] ?></td>
            </tr>
            <tr>
              <td>Отчество </td>
              <td><?php echo $_SESSION['patronymic'] ?></td>
            </tr>
            <tr>
              <td>Дата рождения </td>
              <td><?php echo $_SESSION['birthdate'] ?></td>
            </tr>

          </table>   
        </div>
      </div>
    </div>
    
    <script>
      let pens = document.querySelectorAll('.fa-pencil');
      for (let i = 0; i < pens.length; i++) {
        pens[i].onclick = startEdit;
      } 
      function startEdit() {
        let buttonsTd = this.parentElement.parentElement;
        let dataTd = buttonsTd.previousElementSibling;
        
        let editSpan = buttonsTd.querySelector('.edit');
        let startEditSpan = buttonsTd.querySelector('.startedit');
        
        startEditSpan.classList.remove('d-none');
        editSpan.classList.add('d-none');
        
        let okBtn = buttonsTd.querySelector('.fa-check');
        let denyBtn = buttonsTd.querySelector('.fa-check');
        
        denyBtn.onclick = () => {
          startEditSpan.classList.add('d-none');
          editSpan.classList.remove('d-none');
        }
        
      //  console.log([buttonsTd, dataTd]);
      }
    </script>
    
  <?php require_once('site_components/footer.php'); ?>

