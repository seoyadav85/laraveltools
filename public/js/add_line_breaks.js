$('#txtArea').attr('placeholder','ABCABCABC');
$('#txtArea1').attr('placeholder','A\nBCA\nBCA\nBC');
$('#settings').click(function()
{
    if(parseInt($(this).val()) == 1)
    {
        $('#text_occ').show();
        $('#char_position').hide();
    }
    else if(parseInt($(this).val()) == 2)
    {
        $('#text_occ').hide();
        $('#char_position').show();
    }
    else if(parseInt($(this).val()) == 3)
    {
        $('#text_occ').hide();
        $('#char_position').hide();
    }
});
$('#btnApply').click(function()
{
    var txtVal = $('#txtArea').val();       
    if(txtVal != '')
    {
        var setting  = $('#settings').val();
        if(parseInt(setting) == 1)
        {
            var beforeAfter = $('#before_after').val();
            var txt = $('#txt').val();
            if(parseInt(beforeAfter) == 1)
            {                   
                var regex = new RegExp("("+ txt +")", "g");
                var html = $("#txtArea").val().replace(regex, "\r\n\$1");                                            
                $("#txtArea1").val(html);
            }
            else if(parseInt(beforeAfter) == 2)
            {
                var regex = new RegExp(txt, "g");
                var html = $("#txtArea").val().replace(regex, "\n");
                $("#txtArea1").val(html);

            }
            else if(parseInt(beforeAfter) == 3)
            {   
                var regex = new RegExp("(" + txt + ")", "g");
                var html = $("#txtArea").val().replace(regex, "$1\r\n");
                $("#txtArea1").val(html);
            }
        }  
        else if(parseInt(setting) == 2)
        {
            var charLength = $('#charLength').val();
            //var html11 = $("#input_output").val().replace(/[\n\r]+/g, "");
            var regex = new RegExp("(.{" + charLength + "})", "g");
            var html = $("#txtArea").val().replace(regex, "$1\n");
            $("#txtArea1").val(html);
        }
        else if(parseInt(setting) == 3)
        {
            // var lineBreaks = ($("#input_output").val().match(/\n/g)||[]).length;
            // var regex = new RegExp(/(\r\n|\n|\r)/g, "g");
            // var html = $("#input_output").val().replace(regex, "\n\n");
            // $("#input_output").val(html);

            var e= $("#txtArea").val().replace(/\n(?=.)/gm,"\n\n");
            $("#txtArea1").val(e);

            // var html = '';
            // var arrayOfLines = $("#input_output").val().split(/\r|\r\n|\n/);
            
            // var isBlank = 1;
            // for(var i = 0;i < arrayOfLines.length;i++)
            // {                       
            //     var first = arrayOfLines[i].split(' ')[0];
            //     if(first !== '')
            //     {                        
            //         html += arrayOfLines[i];  
            //         isBlank = 1;                                           
            //     }
            //     else
            //     {
            //         var secondBlank = arrayOfLines[i+1].split(' ')[0];                      
            //         if(isBlank ==1 && secondBlank == '')
            //         {
            //             html += '\n\n';
            //             isBlank = 0;  
            //         }       
                               
            //     }
            // }       
            
            // var html = '';
            // var arrayOfLines = $("#input_output").val().split(/\r|\r\n|\n/);
            
            // var isBlank = 1;
            // for(var i = 0;i < arrayOfLines.length;i++)
            // {                       
            //     var first = arrayOfLines[i].split(' ')[0];
            //     var second = arrayOfLines[i+1].split(' ')[0];
            //     if(first !== '')
            //     {                        
            //         html += arrayOfLines[i];  
            //         isBlank = 1;                                           
            //     }
            //     else
            //     {
            //         var secondBlank = arrayOfLines[i+1].split(' ')[0];                      
            //         if(isBlank ==1 && secondBlank == '')
            //         {
            //             html += '\n\n';
            //             isBlank = 0;  
            //         }       
                               
            //     }
            // }
           

        }
    }            
});