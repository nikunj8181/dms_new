//Bootstrap msg auto close
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);

//Country City State
$(document).ready(function(){
  var maxCardNo = 16;
  var maxMonth = 2;
  var maxYear = 4;
  var maxCvv = 4;
  /*$('#confsDate').datepicker({
      format: 'mm-dd-yyyy',
      autoclose: true
  });*/
  $('#CardNo').keyup(function (e){
      if (e.which < 0x20) {
          return;     // Do nothing
      }
      if (this.value.length == maxCardNo) {
          e.preventDefault();
      }else if (this.value.length > maxCardNo) {
        // Maximum exceeded
        this.value = this.value.substring(0, maxCardNo);
      }
  });

  $('#ExpiryMonth').keyup(function (e){
      if (e.which < 0x20) {
          return;     // Do nothing
      }
      if (this.value.length == maxMonth) {
          e.preventDefault();
      }else if (this.value.length > maxMonth) {
        // Maximum exceeded
        this.value = this.value.substring(0, maxMonth);
      }
  });

  $('#ExpiryYear').keyup(function (e){
      if (e.which < 0x20) {
          return;     // Do nothing
      }
      if (this.value.length == maxYear) {
          e.preventDefault();
      }else if (this.value.length > maxYear) {
        // Maximum exceeded
        this.value = this.value.substring(0, maxYear);
      }
  });

  $('#CVV').keyup(function (e){
      if (e.which < 0x20) {
          return;     // Do nothing
      }
      if (this.value.length == maxCvv) {
          e.preventDefault();
      }else if (this.value.length > maxCvv) {
        // Maximum exceeded
        this.value = this.value.substring(0, maxCvv);
      }
  });

//Numeric Validation - INT
  $('#ChequeNo, #CardNo, #ExpiryMonth, #ExpiryYear, #CVV, #Phone').keypress(function (event){
      return isNumber(event, this)
  });

//Numeric Validation - Float
  $('#ConvRate, #Price, #itemRate, #itemQty, #ExchangeRate, #VoucherAmount').keypress(function (event) {
      return floatNumber(event, this)
  });


}); //EOF Document.Ready

function isNumber(evt, element) {
      var charCode = (evt.which) ? evt.which : evt.keyCode
      if (charCode != 8){

          if (
                (charCode != 9) &&      // Allow Tab Key
                (charCode < 48 || charCode > 57))
              return false;
          return true;
      }
}

function floatNumber(evt, element) {
  var charCode = (evt.which) ? evt.which : evt.keyCode
  if (charCode != 8){
      if (
          (charCode != 9) &&      // Allow Tab Key
          (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
          (charCode < 48 || charCode > 57))
          return false;
      return true;
  }
}

//JsTree Category View For School
$('#tree_1').on('ready.jstree', function () {
  $('#tree_1').off("click.jstree", ".jstree-anchor");
});

//Cursor Position insert text in textarea
function insertAtCaret(areaId, text){
  var txtarea = document.getElementById(areaId);
  if (!txtarea) { return; }

  var scrollPos = txtarea.scrollTop;
  var strPos = 0;
  var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
      "ff" : (document.selection ? "ie" : false ) );
  if (br == "ie") {
      txtarea.focus();
      var range = document.selection.createRange();
      range.moveStart ('character', -txtarea.value.length);
      strPos = range.text.length;
  } else if (br == "ff") {
      strPos = txtarea.selectionStart;
  }

  var front = (txtarea.value).substring(0, strPos);
  var back = (txtarea.value).substring(strPos, txtarea.value.length);
  txtarea.value = front + text + back;
  strPos = strPos + text.length;
  if (br == "ie") {
      txtarea.focus();
      var ieRange = document.selection.createRange();
      ieRange.moveStart ('character', -txtarea.value.length);
      ieRange.moveStart ('character', strPos);
      ieRange.moveEnd ('character', 0);
      ieRange.select();
  } else if (br == "ff") {
      txtarea.selectionStart = strPos;
      txtarea.selectionEnd = strPos;
      txtarea.focus();
  }
  txtarea.scrollTop = scrollPos;
}