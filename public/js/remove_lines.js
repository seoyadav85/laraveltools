$('#txtArea').attr('placeholder','The quick brown fox jumps over the lazy dog\n\nThe quick brown fox jumps over the lazy dog\n\nThe quick brown fox jumps over the lazy dog');
$('#txtArea1').attr('placeholder','The quick brown fox jumps over the lazy dog\nThe quick brown fox jumps over the lazy dog\nThe quick brown fox jumps over the lazy dog');
$('#settings').change(function()
{
    var drpVal = $(this).val();
    if(drpVal == 2)
    {
        $('.replacement').show();
    }
    else
    {
        $('.replacement').hide();
    }
});
    
var area = $("#txtArea");
var area1 = $("#txtArea1");
 $("#btnRemove").click(function() {

    var e = $("#txtArea").val().replace(/\r\n|\r|\n/gm, "\n"),
        n = $("#settings").val(),
        t = null != (t = e.match(/\n/gm)) ? t.length : 0,
        o = (1 == n ? e = e.replace(/\n(?=.)/gm, "") : 2 == n ? (o = $("#replacement").val(), e = e.replace(/\n/gm, o)) : 3 == n && (e = e.replace(/\n/gm, "")), e.match(/\n/gm)),
        n = t - (o = null != o ? o.length : 0);
        area1.val(e)
});