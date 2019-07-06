$(function () {

  function getUserData() {
    $.ajax({
      url: '/admin/api/_getAllUser.php',
      type: 'POST',
      // data: data,
      dataType: 'json',
      success: function (res) {
        if (res.code == 1) {
          $('tbody').html(template('mt', res.data));
        }
      }
    })
  }

  getUserData();

  $("#add").on('click', function () {
    var email = $("#email").val();
    var slug = $("#slug").val();
    var nickname = $("#nickname").val();
    if (email.trim() == "") {
      $('.alert').removeClass('hidden').children('.msg').text('邮箱不能为空');
      setTimeout(() => {
        $('.alert').addClass('hidden');
      }, 2000);
      return;
    }
    if (slug.trim() == "") {
      $('.alert').removeClass('hidden').children('.msg').text('别名不能为空');
      setTimeout(() => {
        $('.alert').addClass('hidden');
      }, 2000);
      return;
    }
    if (nickname.trim() == "") {
      $('.alert').removeClass('hidden').children('.msg').text('昵称不能为空');
      setTimeout(() => {
        $('.alert').addClass('hidden');
      }, 2000);
      return;
    }
    if (!/\w+[@]\w+[.]\w+/.test(email)) {
      $('.alert').removeClass('hidden').children('.msg').text('请填写正确的邮箱');
      setTimeout(() => {
        $('.alert').addClass('hidden');
      }, 2000);
      return;
    }

    $.ajax({
      type: "POST",
      url: "/admin/api/_addNewUser.php",
      data: $("#userform").serialize(),
      dataType: "json",
      success: function (res) {
        console.log(res);
        if (res.code == 1) {
          alert(res.msg);
          location.reload();
        }
      }
    });
  });

  $('tbody').on('click', '.edit', function () {

  });
});