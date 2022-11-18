$('#txtArea').attr('placeholder','Tomato\nNutmegNutmeg\nZucchini');
$('#txtArea1').attr('placeholder','NutmegNutmeg\nTomato\nZucchini');
$('#settings').change(function()
{
    if(parseInt($(this).val()) >= 5)
    {
        $('#caseSenDiv').hide();
    }
    else
    {
        $('#caseSenDiv').show();
    }
});
$('#btnSort').click(function()
{
    var txtVal = $('#txtArea').val();
    if(txtVal != '')
    {
        var setting = $('#settings').val();
        var sortTxt = txtVal.split("\n");
        if(parseInt(setting) == 1)
        {
            if(document.getElementById('caseSen').checked)
            {
                var sortVal = sortTxt.sort();
            }
            else
            {
                var sortVal = sortTxt.sort(function (a, b) {
                                return a.toLowerCase().localeCompare(b.toLowerCase());
                            });           
            }
            
        }        
        else if(parseInt(setting) == 2)
        {
            if(document.getElementById('caseSen').checked)
            {
                var sortVal = sortTxt.sort();
                sortVal = sortVal.reverse();
            }
            else
            {   
                var sortVal = sortTxt.sort(function (a, b) {
                                return a.toLowerCase().localeCompare(b.toLowerCase());
                            });  
                sortVal = sortVal.reverse();
            }
        
        }
        else if(parseInt(setting) == 3)
        {
            // if(document.getElementById('caseSen').checked)
            // {
            //     var sortVal = sortTxt.sort(function (a, b) {
            //         a = ('' + a).replace(/(\d+)/g, function (n) { return ('0000' + n).slice(-5) });
            //         b = ('' + b).replace(/(\d+)/g, function (n) { return ('0000' + n).slice(-5) });
            //         return a.localeCompare(b);
            //     });
            // }
            // else
            // {
            //     var sortVal =  sortTxt.sort(function (a, b) 
            //     {
            //         return ('' + a).localeCompare(('' + b), 'en', { numeric: true });
            //     });
            // }

            var sortVal =  sortTxt.sort(function (a, b) 
            {
                return ('' + a).localeCompare(('' + b), 'en', { numeric: true });
            });
            
        }
        else if(parseInt(setting) == 4)
        {
            var sortVal =  sortTxt.sort(function (a, b) 
            {
                return ('' + a).localeCompare(('' + b), 'en', { numeric: true });
            });
            sortVal = sortVal.reverse();
        }
        else if(parseInt(setting) == 5)
        {                
            var sortVal = sortTxt.sort(function(a, b) {
                return b.length - a.length;
            });

            sortVal = sortVal.reverse();               
        }
        else if(parseInt(setting) == 6)
        {
            var sortVal = sortTxt.reverse();
        }
        else if(parseInt(setting) == 7)
        {
            var sortVal = shuffle(sortTxt);
        }
       
        if(sortVal)
        {
            var finalVal = sortVal.join("\n");
            $('#txtArea1').val(finalVal); 
        }
         
    }           
});

function naturalCompare(a, b) 
{
    var ax = [], bx = [];
    a.replace(/(\d+)|(\D+)/g, function(_, $1, $2) { ax.push([$1 || Infinity, $2 || ""]) });
    b.replace(/(\d+)|(\D+)/g, function(_, $1, $2) { bx.push([$1 || Infinity, $2 || ""]) });

    while(ax.length && bx.length) {
        var an = ax.shift();
        var bn = bx.shift();
        var nn = (an[0] - bn[0]) || an[1].localeCompare(bn[1]);
        if(nn) return nn;
    }
    return ax.length - bx.length;
}

var reA = /[^a-zA-Z]/g;
var reN = /[^0-9]/g;

function sortAlphaNum(a, b) 
{
    var aA = a.replace(reA, "");
    var bA = b.replace(reA, "");
    if (aA === bA) {
        var aN = parseInt(a.replace(reN, ""), 10);
        var bN = parseInt(b.replace(reN, ""), 10);
        return aN === bN ? 0 : aN > bN ? 1 : -1;
    } else {
        return aA > bA ? 1 : -1;
    }
}

function shuffle(array) {
    let currentIndex = array.length,  randomIndex;
    while (currentIndex != 0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;
        [array[currentIndex], array[randomIndex]] = [
        array[randomIndex], array[currentIndex]];
    }

    return array;
}