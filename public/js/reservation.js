var fullDate = new Date(); 
var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
var today = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + fullDate.getDate();

var dateShow = $("#today_date").append(today).show();
var reserve_nbPeople = $(".nb_people");
var reserve_line = $(".reserve_line");
var reserve_ids = $(".reserve_ids");
var reserve_date = document.getElementsByClassName(".reserve_date");
var today_date = $("#today_date");
var hour = $(".hour");
var today_month = today_date.text().split("-")[1];
var today_day = today_date.text().split("-")[2];

	$(function () {
    $("#btn_reload").on("click", function () {
      location.reload(true);
    });
    $(".reserve_date").each(function (index) {
      var reserve_month = $(this).text().split("-")[1];
      var reserve_day = $(this).text().split("-")[2];

      if (reserve_month <= today_month && reserve_day < today_day) {
        $(this).parent().remove();
        reserve_line.addClass("hidden");
      }
    });

    $(".lunch_slot_btn").first().remove();
    $(".dinner_slot_btn").first().remove();
    $(".btn_slot").css({ cursor: "default" });
    $("input[type=radio]").css({ cursor: "pointer" });

    $("#js-datepicker").datepicker({
      dateFormat: "D d MM",
      dayNamesShort: ["Dim.", "Lun.", "Mar.", "Mer.", "Jeu.", "Ven.", "Sam."],
      dayNamesMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
      firstDay: 1,
      minDate: 0,
      maxDate: "+2M +10D",
      autoclose: true,
      monthNames: [
        "Janvier",
        "Février",
        "Mars",
        "Avril",
        "Mai",
        "Juin",
        "Juillet",
        "Août",
        "Septembre",
        "Octobre",
        "Novembre",
        "Décembre",
      ],

      onSelect: function (date, value) {
        if (date != "") {
          $("#reservation_date").datepicker({ dateFormat: "yy-mm-dd" }).val();
          var myDate = $("#js-datepicker").datepicker("getDate");
          var newDate = $("#reservation_date").datepicker("setDate", myDate);
          var newDateVal = newDate.val();

          if (date !== value.lastVal) {
            $(this).trigger("change");
          }

          if ($("#reservation_nbPeople").val() != "") {
            $("#reservation_nbPeople").prop("disabled", true);
            $("#btn_reload").removeClass("info").removeClass("hidden");
          }

          var nbPeople_total_lunch = [];
          var nbPeople_total_dinner = [];
          var placesTotal = 44;
          var placesAvailableLunch = 0;
          var placesAvailableDinner = 0;
          var nbPeople_total_lunch_sum = 0;
          var nbPeople_total_dinner_sum = 0;
          var chosenNbPeople = $("#reservation_nbPeople").val();

          $(".reserve_date").each(function (index) {
            var $this = $(this);
            if ($this.text() == newDateVal) {
              var nbPeople = $this.prev().text();
              var res_time = $this.next().text();
              var res_time_hour = res_time.slice(0, 2);
            }

            if (res_time_hour > 12) {
              res_time_dinner_hour = res_time_hour;
              nbPeople_total_dinner.push(parseInt(nbPeople));
              nbPeople_total_dinner_sum = nbPeople_total_dinner.reduce(
                function (a, b) {
                  return a + b;
                }
              );
            }

            if (res_time_hour == 12) {
              res_time_lunch_hour = res_time_hour;
              nbPeople_total_lunch.push(parseInt(nbPeople));
              nbPeople_total_lunch_sum = nbPeople_total_lunch.reduce(function (
                a,
                b
              ) {
                return a + b;
              });
            }

            placesAvailableLunch = placesTotal - nbPeople_total_lunch_sum;

            $("#lunchAvailPlacesInfo").text(
              "Places disponibles midi: " + placesAvailableLunch.toString()
            );
            $("#lunchAvailPlacesInfo").removeClass("hidden");
            $("#lunchAvailPlacesInfo").addClass("visible");

            placesAvailableDinner = placesTotal - nbPeople_total_dinner_sum;

            $("#dinnerAvailPlacesInfo").text(
              "Places disponibles soir: " + placesAvailableDinner.toString()
            );
            $("#dinnerAvailPlacesInfo").removeClass("hidden");
            $("#dinnerAvailPlacesInfo").addClass("visible");
          });

          if ($("#reservation_nbPeople").val() == "") {
            $("#alert_nbPeople").removeClass("hidden");
            $("#nbPeople_redirection").removeClass("hidden");
            $(".all_slots").addClass("hidden");
            window.setTimeout(function () {
              location.reload();
            }, 2500);
          }

          var myDay = myDate.getDay();
          if (myDay == 3) {
            $(".all_slots").addClass("hidden");
            $(".nbPeople_date").addClass("hidden");
            $("#message_closed").removeClass("hidden");
            $("#lunchAvailPlacesInfo")
              .addClass("hidden")
              .removeClass("visible");
            $("#dinnerAvailPlacesInfo")
              .addClass("hidden")
              .removeClass("visible");
            $("#btn_reload").text("Choisir une autre date.");
            $("#other_date_choose").on("click", function () {
              location.reload(true);
              $(".all_slots").addClass("visible");
              $(".nbPeople_date").addClass("visible");
              $(".info").addClass("visible");
              $("#message_closed").addClass("hidden");
              $("#other_date_choose").addClass("hidden");
            });
          } else if (myDay == 6) {
            $(".day_slot").addClass("hidden");
            $(".lunch_slot_btn").addClass("hidden");
            $(".evening_slot").removeClass("hidden");
            $(".dinner_slot_btn").removeClass("hidden");
            $("#lunchAvailPlacesInfo").removeClass("visible");
            $("#lunchAvailPlacesInfo").addClass("hidden");
          } else if (myDay == 0) {
            $(".day_slot").removeClass("hidden");
            $(".lunch_slot_btn").removeClass("hidden");
            $(".evening_slot").addClass("hidden");
            $(".dinner_slot_btn").addClass("hidden");
            $("#dinnerAvailPlacesInfo").removeClass("visible");
            $("#dinnerAvailPlacesInfo").addClass("hidden");
          } else {
            $(".lunch_slot_btn").removeClass("hidden");
            $(".day_slot").removeClass("hidden");
            $(".dinner_slot_btn").removeClass("hidden");
            $(".evening_slot").removeClass("hidden");
            $("reservation_dinnerTime_10").addClass("hidden");
            $(".dinner_slot_btn:nth-child(10)").remove();
            $(".dinner_slot_btn:nth-child(10n)").remove();
            $(".dinner_slot_btn:nth-child(10n)").remove();
            $(".dinner_slot_btn:nth-child(10n)").remove();
          }

          function nbPlacesAvailable() {
            if (chosenNbPeople <= placesAvailableLunch) {
              console.log("Reservation possible pour midi");
            } else {
              $("#lunch_places_avail").text("Désolé, pas de places pour midi.");
              $(".nbPeople_date").prop("disabled", true);
              $(".day_slot").addClass("hidden");
              $(".lunch_slot_btn").addClass("hidden");
              $("#btn_reload").text("Choisir une autre date.");
            }
            if (chosenNbPeople <= placesAvailableDinner) {
              console.log("Reservation possible pour soir");
            } else {
              $("#dinner_places_avail").text(
                "Désolé, pas de places pour le soir"
              );
              $("#dinner_slots_block").removeClass("visible");
              $("#dinner_slots_block").addClass("info");
              $("#btn_reload").text("Choisir une autre date.");
            }
            return chosenNbPeople;
          }
          nbPlacesAvailable();
        }
      },
    });

    $(".lunch_slot_btn").on("click", function () {
      $(".alert_res_time").removeClass("hidden");
    });
    $(".dinner_slot_btn").on("click", function () {
      $(".alert_res_time").removeClass("hidden");
    });

    $(".wbtn_lu input[type=radio]").on("click", function () {
      $(".evening_slot").addClass("hidden");
      $(".dinner_slot_btn").addClass("hidden");
      $(".dinner_slots").addClass("hidden");
      $(".info").removeClass("hidden");
      $(".alert_res_time").css("opacity", 0);
      $(".wbtn_di input[type=radio]").prop("checked", false);
    });

    $(".wbtn_di input[type=radio]").on("click", function () {
      $(".day_slot").addClass("hidden");
      $(".lunch_slot_btn").addClass("hidden");
      $(".lunch_slots").addClass("hidden");
      $(".info").removeClass("hidden");
      $(".alert_res_time").css("opacity", 0);
      $(".wbtn_lu input[type=radio]").prop("checked", false);
    });

    $(".submit_btn").on("click", function () {
      $("#reservation_nbPeople").prop("disabled", false);
    });
  });
	
