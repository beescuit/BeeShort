// Copyright (c) 2016 BeeCoding
getHistory();

function getHistory() {
  $.get("lib/history.php", function(currhistory) {
    $("#table").html(currhistory);
  });
}

function shortUrl() {
  var url = $("#url").val();
  var custom = $("#customurl").val();
  if (url !== "") {

    var data = {
      shorturl: url,
      customurl: custom
    };

    $.post("lib/api.php", data, function(response) {
      if (response.includes("true")) {
        var split = response.split(" ");
        $("#url").val(split[1]);
      } else if (response.includes("Error")) {
        var split1 = response.split(":");
        var ErrorToast = $('<span style="color: red;">' + split1[1] + '</span>');
        // Wait for 1/2 sec and show error
        setTimeout(function() {
          Materialize.toast(ErrorToast, 5000);
        }, 500);

      }
    });
  } else {
    var ErrorToast = $('<span style="color: red;">Url is Blank</span>');
    // Wait for 1/2 sec and show error
    setTimeout(function() {
      Materialize.toast(ErrorToast, 5000);
    }, 500);
  }

  getHistory();
}

// Refresh url list every 3 seconds
setTimeout(function() {
  getHistory();
}, 3000);
