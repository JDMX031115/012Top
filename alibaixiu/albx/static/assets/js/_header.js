$(function () {
  getNavData();

  function getNavData() {
    $.ajax({
      url: '/api/getNavData.php',
      type: 'POST',
      // data: data,
      dataType: 'json',
      success: function (res) {
        if(res.code == 1){
          $(".header .nav").html(template('mt',res.data));
        }
      }
    })
  }
});