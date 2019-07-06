$(function () {
  getNewPost();

  function getNewPost() {
    $.ajax({
      url: '/api/getNewPost.php',
      type: 'POST',
      // data : data,
      dataType: 'json',
      success: function (res) {
        // console.log(res.data);
        if (res.code == 1) {
          $(".new").html(template('newPosts', res.data));
        }
      }
    })
  }


  getHotPost();
  function getHotPost() {
    $.ajax({
      url: '/api/getHotPost.php',
      type: 'POST',
      // data: data,
      dataType: 'json',
      success: function (res) {
        console.log(res);
        if(res.code == 1){
          $('.hotPost').html(template('hottp',res.data));
        }
      }
    })
  }
});