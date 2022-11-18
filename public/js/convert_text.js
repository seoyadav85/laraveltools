$('#txtArea').attr('placeholder','tHE quIck BroWN FOx jUmpS oveR ThE lazY Dog');
$('#txtArea1').attr('placeholder','The quick brown fox jumps over the lazy dog');
 $('#convertBtn').click(function()
    {
        var txtVal = $('#txtArea').val();
        if(txtVal != '')
        {
            var setting = $('#settings').val();            
            var sortTxt = txtVal.split("\n");
            if(parseInt(setting) == 1)
            {                  
                $('#txtArea1').val(txtVal.toUpperCase()); 
            }        
            else if(parseInt(setting) == 2)
            {
                $('#txtArea1').val(txtVal.toLowerCase()); 
            }
            else if(parseInt(setting) == 3)
            {
                var i, j, str, lowers, uppers;
                var str = txtVal.replace(/([^\W_]+[^\s-]*) */g, function(txt) {
                    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                });
                lowers = ['A', 'An', 'The', 'And', 'But', 'Or', 'For', 'Nor', 'As', 'At', 
                        'By', 'For', 'From', 'In', 'Into', 'Near', 'Of', 'On', 'Onto', 'To', 'With'];
                        for (i = 0, j = lowers.length; i < j; i++)
                str = str.replace(new RegExp('\\s' + lowers[i] + '\\s', 'g'), 
                function(txt) {
                    return txt.toLowerCase();
                });
                uppers = ['Id', 'Tv'];
                for (i = 0, j = uppers.length; i < j; i++)
                    str = str.replace(new RegExp('\\b' + uppers[i] + '\\b', 'g'), 
                    uppers[i].toUpperCase());

                $('#txtArea1').val(str);
            }
            else if(parseInt(setting) == 4)
            {
                var str = txtVal.replace(/([^\W_]+[^\s-]*) */g, function(txt) {
                    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                });
                $('#txtArea1').val(str);
            }
            else if(parseInt(setting) == 5)
            {            
                var str = txtVal.toLowerCase()
                    .replace(/(^\s*\w|[\.\!\?]\s*\w)/g, function(c) {
                        return c.toUpperCase();
                    });
                $('#txtArea1').val(str);
            }
            else if(parseInt(setting) == 6)
            {
                var str = txtVal.split('').map((v) =>
                            Math.round(Math.random()) ? v.toUpperCase() : v.toLowerCase()
                            ).join('');
                $('#txtArea1').val(str);
            }
           
           
            // if(sortVal)
            // {
            //     var finalVal = sortVal.join("\n");
            //     $('#txtArea').val(finalVal); 
            // }
             
        }            
    });