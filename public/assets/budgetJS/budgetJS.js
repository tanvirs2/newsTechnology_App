/**
 * Created by Tanvir on 11/30/2016.
 */
/*Base URL*/
var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var laravelBaseUrl = baseUrl + "/public";
/*Base URL*/
$(document).ready(function () {
    $("#shpmntTable").on('dblclick', ".shipmntSts", function () {
        var orderId = $(this).closest("tr").attr("orderId");
        var shipmntStsElm = $(this).html('<select class="shipmntStsChng"> <option>Select...</option> <option>Running</option> <option>Partial Shipment</option> <option>ShipOut</option></select>')

        $(".shipmntStsChng").change(function () {
            var shipmntSts = $(this).val();
            var url = laravelBaseUrl + "/Order/chngShpmntSts/" + shipmntSts +"/"+ orderId;
            $.ajax({
                url: url,
                cache: false,
                global: false,
                success: function(data){
                    $('.shipmntStsChng').hide();
                    $(shipmntStsElm).text(shipmntSts);
                },
                error: function(){
                    //alert('faild !');
                }
            });
        });
    });

    $("#shpmntTable").on('click', ".orderRow", function () {
        $(this).css({"background": "#27ae60", "color": "white"});
        $(this).find("table").css({"background": "#27ae60", "color": "white"});
        $(this).find("a").css({"background": "#27ae60", "color": "white", "text-decoration": "none"});
        $(".shipmntSts").css("color", "black");
        $(this).dblclick(function () {
            $(this).css({"background": "white", "color": "black"});
            $(this).find("table").css({"background": "white", "color": "black"});
            $(this).find("a").css({"background": "white", "color": "black", "text-decoration": "none"});
        })
    });

    $("#shpmntTable").on("mouseenter", ".imgPreview", function () {
        $(this).hoverpulse({
            size: 140,  // number of pixels to pulse element (in each direction)
            speed: 400 // speed of the animation
        })
    });


    $("#ShpmReloadBtn").click(function () {
        $("#shipmentS").click();
    });

    $("#shipSts").change(function () {
        var byrNmeSrch = $("#byrNmeSrch").val();

        if (byrNmeSrch.length < 2) {
            byrNmeSrch = '-';
        } else {
            $("#buyerNmShow").html('Buyer: '+byrNmeSrch);
        }
        //alert(byrNmeSrch);
        var shipSts = $(this).val();
        if (shipSts == 'Select...') {
            shipSts = '-';
        }
        var url = laravelBaseUrl + "/Order/orderStsSrc/"+ byrNmeSrch +"/"+ shipSts;
        $.ajax({
            url: url,
            cache: false,
            success: function(data){
                // alert(data);
                $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                $("#shpmntTable").append(data);
            }
        });
    });




    $("#shipStsFrmBudget").change(function () {
        var byrNmeSrch = $("#byrNmeSrch").val();

        if (byrNmeSrch.length < 2) {
            byrNmeSrch = '-';
        } else {
            $("#buyerNmShow").html('Buyer: '+byrNmeSrch);
        }
        //alert(byrNmeSrch);
        var shipSts = $(this).val();
        if (shipSts == 'Select...') {
            shipSts = '-';
        }
        var url = laravelBaseUrl + "/budget/orderStsSrc/"+ byrNmeSrch +"/"+ shipSts;
        $.ajax({
            url: url,
            cache: false,
            success: function(data){
                // alert(data);
                $("#shpmntTable > tbody, #shpmntTable > tfoot").remove();
                $("#shpmntTable").append(data);
            }
        });
    });
});
