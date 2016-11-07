'use strict'

$(document).ready(function(){

  $('.free').click(function(){

    var data = {
      'section_id': $(this).closest('.booking').data('sectionId'),
      'rack': $(this).closest('.rack').data('rack'),
      'seat': $(this).data('seat'),
      '_token': $('input[name=_token]').val()
    };

    swal({
      title: "มึงจะจองแน่นะ",
      text: "มึงแน่ใจนะ ได้ครั้งเดียวนะสัส ยกเลิกไม่ได้นะ กูยังไม่ได้ทำ",
      type: "info",
      showCancelButton: true,
      closeOnConfirm: false,
      showLoaderOnConfirm: true,
    },
    function(){
      $.ajax({
        url: "/booking/bookingseat",
        method: "POST",
        data: data,
      }).done(function(msg){
        console.log(msg);
        if (msg.done) {
          swal("จองและ!", "เรียบร้อยยยย ~.", "success");
          location.reload();
        }else if(msg.reserved){
          swal("จองไม่ได้มีคนจองแล้ววว", "มึงไปจองที่อื่นเลยย ~.", "warning");
        }else if(msg.isday){
          swal("จองไม่ได้ จองได้วันละครั้งจ้า", "ตามนั้นแหละ.", "warning");
        }
      });

    });


  })

})
