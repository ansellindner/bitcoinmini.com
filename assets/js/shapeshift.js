$('document').ready(function(){

  $.getJSON( getBaseUrl() + '/getcoins', function( data ) {
    $('#result').html( data.BLK.status );
  });

  $.getJSON( getBaseUrl() + '/marketinfo', function( data ) {
    $( "#result2" ).html( data[0].pair +' : '+ data[0].rate );
  });
  // url:  shapeshift.io/shift
  // method: POST
  // data type: JSON
  // data required:
  // withdrawal     = the address for resulting coin to be sent to
  // pair       = what coins are being exchanged in the form [input coin]_[output coin]  ie btc_ltc
  // returnAddress  = (Optional) address to return deposit to if anything goes wrong with exchange
  // destTag    = (Optional) Destination tag that you want appended to a Ripple payment to you
  // rsAddress  = (Optional) For new NXT accounts to be funded, you supply this on NXT payment to you
  // apiKey     = (Optional) Your affiliate PUBLIC KEY, for volume tracking, affiliate payments, split-shifts, etc...
  //
  // example data: {"withdrawal":"AAAAAAAAAAAAA", "pair":"btc_ltc", returnAddress:"BBBBBBBBBBB"}
  //
  // Success Output:
  //     {
  //         deposit: [Deposit Address (or memo field if input coin is BTS / BITUSD)],
  //         depositType: [Deposit Type (input coin symbol)],
  //         withdrawal: [Withdrawal Address], //-- will match address submitted in post
  //         withdrawalType: [Withdrawal Type (output coin symbol)],
  //         public: [NXT RS-Address pubkey (if input coin is NXT)],
  //         xrpDestTag : [xrpDestTag (if input coin is XRP)],
  //         apiPubKey: [public API attached to this shift, if one was given]
  //     }

  $("#submit").click(function(e) {
    var type = $("select#from-type").val();
    var pair = type +'_btc';
    e.preventDefault();

    $('#spinner').removeClass('none');
    $('#shifty-test').addClass('none');

    $.post( getBaseUrl () + '/shift', { "withdrawal":"17mm8CSbP9Sbwp8NV6E2mh8S39wUfq9iHv", "pair":pair }, function( result ) {
          $( "#result3" ).html( 'Send' + type + ' to this address: ' + result.deposit );
    });
    setTimeout(function(){
        $('#spinner').addClass('none');
        $('#shifty-test').removeClass('none');

      }, 3000);
  });

  function getBaseUrl () {
    var endpoint = 'shapeshift.io'
    return 'https://' + endpoint
  }
});
