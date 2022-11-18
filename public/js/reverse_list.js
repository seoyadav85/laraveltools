$('#txtArea').attr('placeholder','1\n2\n3\n4');
$('#txtArea1').attr('placeholder','4\n3\n2\n2\n1');
$('#btnReverse').click(function()
{
    var txtVal = $('#txtArea').val();
    if(txtVal != '')
    {            
        var sortTxt = txtVal.split("\n");
        var sortVal = sortTxt.reverse();           
        if(sortVal)
        {
            var finalVal = sortVal.join("\n");
            $('#txtArea1').val(finalVal); 
        }
         
    }            
});