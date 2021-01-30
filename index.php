<?PHP

/*
 * This is demo code for the game Siccor-Rock-Paper
 * Sorry, this is spaghetty code what i really hate.
 * Written for logic demonstration only.
 * Write me id you need OOP MVC developer.
 */

  if (isset($_POST['selection']) ) {
    $selection = ['S', 'R', 'P'];
    $randIndex = array_rand($selection);
    $machineSelection = $selection[$randIndex];
	  $userSelection = $_POST['selection'];

    $winnerRules = ['S' => 'P', 'R' => 'S', 'P' => 'R'];

    $result['machine'] = $machineSelection;
	  $result['user'] = $userSelection;

	  $userRule = $winnerRules[$userSelection];
	  if ($machineSelection == $userRule) {
		  $winnerName = 'User';
    } elseif ($userSelection == $machineSelection) {
		  $winnerName = 'No winner';
    } else {
		  $winnerName = 'Machine';
    }

	  $result['winner'] = $winnerName;

    echo json_encode($result);
    exit;
  }
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>SRP game</title>

  <style type="text/css">
      .game_wrapper {
          display: block;
          font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
          font-weight: bold;
          text-align: left;
          font-size: 18px;
      }
      .game_wrapper div {
          display: inline-block;
          width: 20%;
      }
      .result_wrapper {
          display: block;
          font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
          font-weight: bold;
          text-align: left;
          font-size: 18px;
      }
      .result_wrapper div {
          display: inline-block;
          width: 20%;
          vertical-align: top;
      }
      .result_wrapper div span {
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        display: inline-block;
        text-align: left;
      }
      .result_wrapper div.result_list span {
        width: 50%;
      }
      .result_wrapper div.winner_list span {
        width: 90%;
      }
      .game_wrapper div span {
          font-style: normal;
          font-weight: normal;
          font-size: 14px;
          width: 20%;
          display: inline-block;
          padding-top: 5px;
          padding-right: 5px;
          padding-bottom: 5px;
          padding-left: 5px;
          text-align: center;
          color: #FFFFFF;
          background-color: #e4e4e4;
          margin-left: 0px;
          margin-right: 10px;
          cursor: pointer;
      }
      .game_wrapper div span img {
        height: 40px;
      }
      div.result_wrapper > div.result_list span img {
        height: 25px;
      }
      div.result_wrapper > div.result_list span {
        text-align: center;
        padding-top: 2px;
      }
      div.result_wrapper > div.winner_list span {
        height: 27px;
      }
      div.result_wrapper > div.result_list span.winner {
        background-color: #e4e4e4;
      }
  </style>

  <script src="js/Jquery/jquery-1.9.1.js" type="text/javascript"></script>

</head>

<body>

<div class="game_wrapper">
	<div>User<br>
        <span data-selection="S"><img src="S.png"></span><span data-selection="R"><img src="R.png"></span><span data-selection="P"><img src="P.png"></span>
  </div>
	<div>Machine<br>
        <span class="machine_selection">?</span>
  </div>
</div>

<hr>

<div class="result_wrapper">
	<div class="result_list">Selection<br>
        <span>User <span class="user_won">0</span> </span><span>Machine <span class="machine_won">0</span></span>
  </div>
	<div class="winner_list">Winner<br>
        <span>---</span>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      $("div.game_wrapper span").click(function () {
          $("div.game_wrapper span").css("background-color", "#e4e4e4");
          var selection = $(this).data('selection');
          $(this).css("background-color", "red");

          var user_current = parseInt($('div.result_wrapper div.result_list span.user_won').text());
          var machine_current = parseInt($('div.result_wrapper div.result_list span.machine_won').text());

          $.ajax({
              type: 'POST',
              dataType: "json",
              scriptCharset: "utf-8",
              data: {
                  selection: selection
              },
              success: function(response){
                  //$('div.game_wrapper span.machine_selection').text(response['machine']);
                  $('div.game_wrapper span.machine_selection').html('<img src="' + response['machine'] + '.png">');

                  var iconWrapperUser = '<span>';
                  var iconWrapperMachine = '<span>';
                  if (response['winner'] == 'User') {
                      $('div.result_wrapper div.result_list span.user_won').text(user_current + 1)
                      iconWrapperUser = '<span class="winner">';
                  } else if (response['winner'] == 'Machine') {
                      $('div.result_wrapper div.result_list span.machine_won').text(machine_current + 1)
                      iconWrapperMachine = '<span class="winner">';
                  }
                  //$("div.result_wrapper > div.result_list").append("<span>" + response['user'] + "</span><span>" + response['machine'] + "</span>");
                  $("div.result_wrapper > div.result_list").append(iconWrapperUser + '<img src="' + response['user'] + '.png"></span>' + iconWrapperMachine + '<img src="' + response['machine'] + '.png"></span>');

                  $("div.result_wrapper > div.winner_list").append("<span>" + response['winner'] + "</span>");
             }
          });
      });
    });
</script>

</body>
</html>
