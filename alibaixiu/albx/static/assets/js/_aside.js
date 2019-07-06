$(function () {

  function getRandomPost() {
    $.ajax({
      url: '/api/getRandomPost.php',
      type: 'POST',
      // data : data,
      dataType: 'json',
      success: function (res) {
        if(res.code == 1){
          $(".random").html(template('tp',res.data));
        }
      }
    })

  }
  getRandomPost();
});