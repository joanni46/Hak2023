// Обработчик события отправки формы
document.querySelector('#login-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы
  
    // Получаем значения логина и пароля из полей формы
    var login = document.querySelector('#login').value;
    var password = document.querySelector('#password').value;
  
    // Отправляем данные на сервер с помощью AJAX-запроса
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://example.com/login.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // В случае успешной авторизации перенаправляем пользователя на защищенную страницу
          window.location.href = 'http://example.com/secure-page.html';
        } else {
          // Выводим сообщение об ошибке
          alert('Неверный логин или пароль');
        }
      }
    };
    xhr.send(JSON.stringify({ login: login, password: password }));
  });
