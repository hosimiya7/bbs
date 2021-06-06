
$(document).ready(function () {


  $(".good-button").on("click", function () {
    const sns = new Sns($(this))
    sns.favorite()
  })




})



class Sns {

  $pushed_button

  constructor($element) {
    this.$pushed_button = $element
  }

  favorite = function () {
    console.log(this.getId())
    $.ajax({
      type: "POST",
      url: "favorite.php",
      data: { "id": this.getId() },
      dataType: "json"
    }).done(function (data) {
      const id = data[0].id
      $(`.good-count[data-id=${id}]`).text(data[0].favorites_count)
    }).fail(function (xhr, status, e) {
      console.log(e)
    })
  }
  getId = function () {
    return this.$pushed_button.attr('data-id')
  }
}

