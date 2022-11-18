$('#txtArea').attr('placeholder','The quick brown fox jumps over the lazy dog.\nThe quick brown fox jumps over the lazy dog.\nThe quick brown fox jumps over the lazy dog.');
$('#txtArea1').attr('placeholder','The quick brown fox jumps over the lazy cat.\nThe quick brown fox jumps over the lazy cat.\nThe quick brown fox jumps over the lazy cat.');
$('#btnReplace').click(function()
{
    var txtVal = $('#txtArea').val();
    var findVal = $('#find').val();
    var replaceVal = $('#replace').val();
    console.log(' findVal '+$('#find').val());
    if(txtVal != '')
    {
        if(document.getElementById('caseSen').checked && document.getElementById('wholeWords').checked)
        {
            var convertVal = txtVal.replace(new RegExp("\\b"+findVal+"\\b","g"), replaceVal);
            $('#txtArea1').val(convertVal);
        }
        else if(document.getElementById('caseSen').checked && !document.getElementById('wholeWords').checked)
        {
            var convertVal = txtVal.replaceAllWithCase(findVal, replaceVal);
            $('#txtArea1').val(convertVal);
        }
        else if(!document.getElementById('caseSen').checked && document.getElementById('wholeWords').checked)
        {               
            var convertVal = txtVal.replace(new RegExp("\\b"+findVal+"\\b","ig"), replaceVal);
            $('#txtArea1').val(convertVal);
        }
        else if(!document.getElementById('caseSen').checked && !document.getElementById('wholeWords').checked)
        {
            var convertVal = txtVal.replaceAll(findVal, replaceVal);
            $('#txtArea1').val(convertVal);
        }
        
    }            
});

String.prototype.replaceAll = function(strReplace, strWith) {
    var esc = strReplace.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
    var reg = new RegExp(esc, 'ig');
    return this.replace(reg, strWith);
};

String.prototype.replaceAllWithCase = function(strReplace, strWith) {
    var esc = strReplace.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
    var reg = new RegExp(esc, 'g');
    return this.replace(reg, strWith);
};