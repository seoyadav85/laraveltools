$('#txtArea').attr('placeholder','The quick brown fox jumps over the lazy dog');
$('#txtArea1').attr('placeholder','dog lazy the over jumps fox brown quick The');
var area = $("#txtArea");
$("#revWords").click(function() 
{
    var e = area.val();
    var n = $("#settings").val();
    1 == n ? (e = (e = (e = (e = e.replace(/\r\n|\r|\n/gm, "\n")).replace(/([^a-z 0-9])/gi, " $1 ")).replace(/\n/g, " \n ").split(" ").reverse().join(" ").replace(/ \n /g, "\n")).replace(/ ([^a-z 0-9]) /gi, "$1")) : 2 == n && (e = (e = (e = (e = (e = e.replace(/\r\n|\r|\n/gm, "\n")).replace(/([^a-z 0-9\n])/gi, " $1 ")).split("\n").reverse().join("\n")).replace(/\n/g, " \n ").split(" ").reverse().join(" ").replace(/ \n /g, "\n")).replace(/ ([^a-z 0-9\n]) /gi, "$1"));
    $('#txtArea1').val(e);
});