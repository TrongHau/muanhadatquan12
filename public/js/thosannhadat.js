$(function () {
	fnInitFancybox();
});

function fnInitFancybox() {
	$("#fc-muatinvip").fancybox({
		maxWidth: 800,
		fitToView: false,
		autoSize: false,
		afterLoad: function () {
			this.height = $('.fancybox-iframe').contents().find('.fc-popup').outerHeight() + 130;
		}
	});

	
}

function fancyboxClose() {
	parent.$.fancybox.close();
}

function goBack() {
	window.history.back();
}



























































































 /********** ANH DUNG - Quotation plus *************/

/** ANH DUNG Apr 02, 2015
 * Quotation plus: bind event for Save as Template button and Cancel button
 */
function fnBindEventButtonQuotationPlus() {
    $('body').on('click', '.BtnCancel', function () {
        parent.$.fancybox.close();
    });

    $('body').on('click', '.BtnSaveAsTemplate', function () {
        $('.IsSaveAsTemplate').val(1);
        $(this).closest('form').submit();
    });
}


/** ANH DUNG MAR 06, 2015
 * sau khi add new hay update thì cập nhật lại box html phía dưới, box quotation plus
 * @param {string} url_ is ulr to get data html   
 */
function fnQuotationPlusPopupClose(url_) {
    $.ajax({
        url: url_,
        beforeSend: function (xhr) {
            $.blockUI({message: null});
        },
        success: function (data) {
            $('.QuotationBoxBuildLevel').html($(data).find('.QuotationBoxBuildLevel').html());
            $('.QuotationBoxWorkSchedule').html($(data).find('.QuotationBoxWorkSchedule').html());
            // run function calc Total Amount and some info
            $.unblockUI();
        }
    });
}

/** ANH DUNG MAR 06, 2015
 * sau khi add new hay update thì cập nhật lại box html phía dưới, box quotation plus
 * @param {string} url_ is ulr to get data html   
 */
function fnQuotationPlusBindDeleteItem() {
    $('body').on('click', '.QuotationDeleteItem', function () {
        if (!confirm('Are you sure you want to delete this item?'))
                return false;
        var url_ = $(this).attr('href');
        $.ajax({
            url: url_,
            dataType: 'json',
            beforeSend: function (xhr) {
                $.blockUI({message: null});
            },
            success: function (data) {
                if(data['success']){
                    fnQuotationPlusPopupClose(data['next']);
                }else{
                    window.location.href = window.location.href;
                }
                $.unblockUI();
            }
        });    
        return false;
    });
}

/** ANH DUNG MAR 06, 2015
 * bind change event for select unit at level 3
 * @param {string} other_value is value of other select, need to show or hide
 */
function fnQuotationPlusBindUnitChange(other_value) {
    $('body').on('change', '.unit_id_change', function () {
        var wrap_div = $(this).closest('.unit_div_change');
        console.log($(this).val());
        if($(this).val() == other_value){
            wrap_div.find('.unit_text_wrap').show();
        }else{
            wrap_div.find('.unit_text_wrap').hide();
            wrap_div.find('.unit_text').val('');
        }
    });
    
    // for auto calc profit_unit
    $('body').on('change', '.some_price_change', function () {
        var sell_price_unit = $('.sell_price_unit').val()*1;
        var cost_price_unit = $('.cost_price_unit').val()*1;
        console.log(sell_price_unit);
        console.log(cost_price_unit);
        var res = sell_price_unit-cost_price_unit;
        $('.profit_unit_change').val(res);
    });
    // for auto calc profit_unit
}

function validateNumber(){
    $(".number_only").each(function(){
            $(this).unbind("keydown");
            $(this).bind("keydown",function(event){
                if( !(event.keyCode == 8                                // backspace
                    || event.keyCode == 46                              // delete
                    || event.keyCode == 9							// tab
                    || (event.keyCode == 190 || event.keyCode == 110 ) // dấu chấm (point) 
                    || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end
                    || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
                    || (event.keyCode >= 96 && event.keyCode <= 105))   // number on keypad
                    ) {
                        event.preventDefault();     // Prevent character input
                    }
            });
    });    
}

/**
 * ANH DUNG Sep 18, 2014
 * todo: thêm dấu phẩy vào cho input currency
 * not use
 */
function fnFixInputCurrency() {
//    $(".ad_fix_currency").each(function(){
//        $(this).bind("keydown",function(event){
//            $(this).val(commaSeparateNumber($(this).val()));
//        });
//    });    
}

 // format number: 200,000
function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
}

/********** ANH DUNG - Quotation plus *************/