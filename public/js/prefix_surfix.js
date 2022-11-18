$('#txtArea').attr("placeholder","1\n2\n3");
$('#txtArea1').attr("placeholder","A1B\nA2B\nA3B");
    $('#btnApply').click(function()
    {
        var txtVal = $('#txtArea').val();       
        if(txtVal != '')
        {
            // if(document.getElementById('caseSen').checked && document.getElementById('wholeWords').checked)
            // {
            //     var convertVal = txtVal.replace(new RegExp("\\b"+findVal+"\\b","g"), replaceVal);
            //     $('#input_output').val(convertVal);
            // }
            if(document.getElementById('exculed').checked)
            {
                var prefix = $('#prefix').val();
                var surfix = $('#surfix').val();
                var lines = $('#txtArea').val().split("\n");
                for (var i = 0; i < lines.length; ++i) {
                    if(lines[i] != '')
                    {
                        lines[i] =  prefix + lines[i] + surfix;                   
                    }                    
                }
                $('#txtArea1').val(lines.join("\n"));
            }
            else
            {
                var prefix = $('#prefix').val();
                var surfix = $('#surfix').val();
                var lines = $('#txtArea').val().split("\n");
                for (var i = 0; i < lines.length; ++i) {
                    lines[i] =  prefix + lines[i] + surfix;
                }
                $('#txtArea1').val(lines.join("\n"));
            }       
        }
    });