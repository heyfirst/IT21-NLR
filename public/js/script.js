$(document).ready(function(){

  $('[data-toggle="tooltip"]').tooltip()
  $('.sections').mixItUp({
    layout: {
        display: 'block'
    },
    animation: {
        effects: 'fade'
    }
  });

  $('.free').click(function(){

    var data = {
      'section_id': $(this).closest('.booking').data('sectionId'),
      'rack': $(this).closest('.rack').data('rack'),
      'seat': $(this).data('seat'),
      '_token': Laravel.csrfToken
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
          swal("จองไม่ได้มีคนจองแล้ววว", "มึงไปจองที่อื่นเลยย ~.", "error");
        }else if(msg.isday){
          swal("จองไม่ได้ จองได้วันละครั้งจ้า", "ตามนั้นแหละ.", "error");
        }
      });
    });

  })

  $('.my-booking').click(function(){

    var data = {
      // 'user' : $(this).
      'section_id': $(this).closest('.booking').data('sectionId'),
      'rack': $(this).closest('.rack').data('rack'),
      'seat': $(this).data('seat'),
      '_token': Laravel.csrfToken
    };

    swal({
      title: "จะลบการจองช้ะ?",
      text: "คิดดีแล้วนะ ~",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "ใช่, กูจะลบบ",
      cancelButtonText: "ไม่ , กูหลอกกก",
      closeOnConfirm: false,
      closeOnCancel: true
    },
    function(){
      $.ajax({
        url: "/booking/cancelseat",
        method: "POST",
        data: data,
      }).done(function(msg){
        console.log(msg);
        if (msg.done) {
          swal("ลบการจองแล้ว!", "เรียบร้อยยยย ~ ได้สิทธ์จองกลับมาแล้วจ้าาา.", "error");
          location.reload();
        }else if(msg.error){
          swal("ลบการจองไม่ได้อะ", "มันไม่ใช่ ID มึงอะป่าววว ??.", "warning");
        }else if(msg.already){
          swal("มันจบไปแล้ว ห้ามลบบ !", "เก็บเป็นสถิติไง ห้ามลบบ ไม่อาววว.", "info");
        }

      });
    });
  });

});
