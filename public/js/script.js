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

  var ctx = document.getElementById("timeline-chart-noon");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: ["06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00","15:00","16:00","17:00"],
    datasets: [{
            label: "จำนวนคนลงทะเบียนช่วงเช้า",
            fill: false,
            lineTension: 0.2,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [65, 59, 80, 81, 56, 55, 40],
        }]
    },
  });

  var ctx = document.getElementById("timeline-chart-night");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: ["18:00","19:00", "20:00", "21:00", "22:00", "23:00", "00:00", "01:00", "02:00", "03:00","04:00","05:00"],
    datasets: [{
            label: "จำนวนคนลงทะเบียนช่วงเย็น",
            fill: false,
            lineTension: 0.2,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40],
        }]
    },
  });

});
