/*          Textarea 1            */
var area = $('#txtArea');
$('#open_file').click(function()
{
    $('#file_upload').trigger('click');
});

function saveFile(e, n) {
    var t = navigator.userAgent.match(/MSIE\s([\d.]+)/),
        o = navigator.userAgent.match(/Trident\/7.0/) && navigator.userAgent.match(/rv:11/),
        a = navigator.userAgent.match(/Edge/g),
        o = t ? t[1] : o ? 11 : a ? 12 : -1;
    t && o < 10 ? console.log("No blobs on IE ver<10") : (n = (n = document.getElementById("txtArea").value).replace(/\r?\n/g, "\r\n"), a = new Blob([n], {
        type: "text/plain"
    }), "null.txt" != (e = prompt("File name:", "New Document") + ".txt") && (-1 < o ? window.navigator.msSaveBlob(a, e) : ((t = document.createElement("a")).download = e, t.href = window.URL.createObjectURL(a), t.onclick = function(e) {
        document.body.removeChild(e.target)
    }, t.style.display = "none", document.body.appendChild(t), t.click())))
}

function printTextArea() {
    (childWindow = window.open("", "childWindow", "location=yes, menubar=yes, toolbar=yes")).document.open(), childWindow.document.write('<html><head></head><body style="word-wrap:break-word;"><style>.ap_container,.google-auto-placed,.adsbygoogle{display:none}</style>'), childWindow.document.write(document.getElementById("txtArea").value.replace(/\n/gi, "<br>")), childWindow.document.write("</body></html>"), childWindow.print(), childWindow.document.close(), childWindow.close()
}

$(".copy-btn").click(function() {
    $("textarea").select();
    document.execCommand('copy');
});

$("#clearAll, #edit_delete").click(function() {
    area.val("");
});

$("#file_new").click(function() {
    area.val("");
});

$("#file_upload").on("change", function() {
    var e = $("#file_upload").get(0).files[0],
        newfile = new FileReader;
    newfile.onload = function(e) {
        e = e.target.result;
        area.val(e)
    }, newfile.readAsText(e, "UTF-8")
});

$("#file_download").click(function() {
    saveFile()
});

$("#file_print").click(function() {
    printTextArea()
});


$("#edit_copy").click(function() {
    Clipboard(area)
});

$("#edit_select").click(function() {
    area.select().focus()
});

var isBold = 0;
var isItalic = 0;
var isUnderLine = 0;
var isStrike = 0;
var isNumber = 0;
var isBullet = 0;
var isLeft = 0;
var isRight = 0;
var isCenter = 0;
$('#fontsize').change(function()
{
    var fontsize = $(this).val();
   var fontStyle = 'font-size:'+parseInt(fontsize)+'px;line-height:'+parseInt(fontsize)+'px';
    if(isBold == 1)
    {
        fontStyle += 'font-weight:bolder;';
    }
    if(isItalic == 1)
    {
        fontStyle += 'font-style:italic;';
    }
    if(isUnderLine == 1)
    {
        fontStyle += 'text-decoration:underline;';
    }
    if(isStrike == 1)
    {
        fontStyle += 'text-decoration:line-through;';
    }
    if(isLeft == 1)
    {
        fontStyle += 'text-align:left;';
    }
    if(isRight == 1)
    {
        fontStyle += 'text-align:right;';
    }
    if(isCenter == 1)
    {
        fontStyle += 'text-align:center;';
    }
    $('#txtArea').attr('style', fontStyle);

});

$('#btnBold').click(function()
{    
    if(isBold == 1)
    {
        area.css('fontWeight' ,'normal');
        $(this).attr('style', 'background: #ffffff !important');
        isBold = 0;
    }
    else
    {
        area.css('fontWeight' ,'bolder');
        $(this).attr('style', 'background: #E1F0FE !important');
        isBold = 1;
    }
});


$('#btnItalic').click(function()
{    
    if(isItalic == 1)
    {
        area.css('fontStyle' ,'normal');
        $(this).attr('style', 'background: #ffffff !important');
        isItalic = 0;
    }
    else
    {
        area.css('fontStyle' ,'italic');
        $(this).attr('style', 'background: #E1F0FE !important');
        isItalic = 1;
    }
});


$('#btnUnderLine').click(function()
{    
    if(isUnderLine == 1)
    {
        area.css('text-decoration' ,'none');
        $(this).attr('style', 'background: #ffffff !important');
        isUnderLine = 0;
    }
    else
    {
        area.css('text-decoration' ,'underline');
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnStrike').attr('style', 'background: #ffffff !important');
        isUnderLine = 1;
        isStrike = 0;
    }
    
});

$('#btnStrike').click(function()
{    
    if(isStrike == 1)
    {
        area.css('text-decoration' ,'none');
        $(this).attr('style', 'background: #ffffff !important');
        isStrike = 0;
    }
    else
    {
        // var fontStyle = 'text-decoration:line-through;';
        // if(isBold == 1)
        // {
        //     fontStyle += 'font-weight:bolder;';
        // }
        // if(isItalic == 1)
        // {
        //     fontStyle += 'font-style:italic;';
        // }
        //$('#txtArea').attr('style',fontStyle);
        area.css('text-decoration' ,'line-through');
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnUnderLine').attr('style', 'background: #ffffff !important');
        isStrike = 1;
        isUnderLine = 0;
    }
});


$('#btnLeft').click(function()
{
    if(isLeft == 1)
    {
        area.css('text-align' ,'none');
        $(this).attr('style', 'background: #ffffff !important');
        isLeft = 0;
    }
    else
    {
        area.css('text-align' ,'left');
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnCenter').attr('style', 'background: #ffffff !important');
        $('#btnRight').attr('style', 'background: #ffffff !important');
        isLeft = 1;
        isCenter = 0;
        isRight = 0;
    }
});

$('#btnRight').click(function()
{
    if(isRight == 1)
    {
        area.css('text-align' ,'left');
        $(this).attr('style', 'background: #ffffff !important');
        isRight = 0;
    }
    else
    {
        area.css('text-align' ,'right');
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnLeft').attr('style', 'background: #ffffff !important');
        $('#btnCenter').attr('style', 'background: #ffffff !important');
        isRight = 1;
        isCenter = 0;
        isRight = 0;
    }
});

$('#btnCenter').click(function()
{
    if(isCenter == 1)
    {
        area.css('text-align' ,'left');
        $(this).attr('style', 'background: #ffffff !important');
        isCenter = 0;
    }
    else
    {
        area.css('text-align' ,'center');
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnLeft').attr('style', 'background: #ffffff !important');
        $('#btnRight').attr('style', 'background: #ffffff !important');
        isCenter = 1;
        isLeft = 0;
        isRight = 0;
    }
});

$('#btnNumber').click(function()
{
    if(isNumber == 1)
    {
        removeNumber();
        $(this).attr('style', 'background: #ffffff !important');        
        isNumber = 0;
    }
    else
    {
        if(isBullet == 1)
        {
            removeBullet();
        }
        var lines = $('#txtArea').val().split("\n");
        for (var i = 0; i <= lines.length; ++i) 
        {
            if(lines[i] != '' && typeof lines[i] !== 'undefined')
            {
                lines[i] = i+1 +'. '+lines[i];
                console.log(lines[i]);
            }                  
        }
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnBullet').attr('style', 'background: #ffffff !important');
        area.val(lines.join("\n"));
        isNumber = 1;
        isBullet = 0;
    }

});



$('#btnBullet').click(function()
{
    const bullet = "\u2022";
    if(isBullet == 1)
    {
        removeBullet();
        $(this).attr('style', 'background: #ffffff !important');
        isBullet = 0;
    }
    else
    {
        if(isNumber == 1)
        {
            removeNumber();
        }
        var lines = $('#txtArea').val().split("\n");
        for (var i = 0; i <= lines.length; ++i) 
        {
            if(lines[i] != '' && typeof lines[i] !== 'undefined')
            {
                lines[i] = bullet+' '+lines[i];
                console.log(lines[i]);
            }                  
        }
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnNumber').attr('style', 'background: #ffffff !important');
        area.val(lines.join("\n"));
        isBullet = 1;
        isNumber = 0;
    }

});

function removeNumber()
{
    var lines = $('#txtArea').val().split("\n");
    for (var i = 0; i <= lines.length; ++i) 
    {
        if(lines[i] != '' && typeof lines[i] !== 'undefined')
        {
            if(i <= 8)
            {
                lines[i] = lines[i].slice(3);
            }
            else if(i <= 98)
            {
                lines[i] = lines[i].slice(4);
            }
            else if(i <= 998)
            {
                lines[i] = lines[i].slice(5);
            }
            else if(i <= 9998)
            {
                lines[i] = lines[i].slice(6);
            }
            else if(i <= 99998)
            {
                lines[i] = lines[i].slice(7);
            }
        }                  
    }
    area.val(lines.join("\n"));
}

function removeBullet()
{
    var lines = $('#txtArea').val().split("\n");
    for (var i = 0; i <= lines.length; ++i) 
    {
        if(lines[i] != '' && typeof lines[i] !== 'undefined')
        {
            lines[i] = lines[i].slice(2);
        }                  
    }
    area.val(lines.join("\n"));
}







/*  Textarea output */



var area1 = $('#txtArea1');
$('#open_file1').click(function()
{
    $('#file_upload1').trigger('click');
});

function saveFile1(e, n) {
    var t = navigator.userAgent.match(/MSIE\s([\d.]+)/),
        o = navigator.userAgent.match(/Trident\/7.0/) && navigator.userAgent.match(/rv:11/),
        a = navigator.userAgent.match(/Edge/g),
        o = t ? t[1] : o ? 11 : a ? 12 : -1;
    t && o < 10 ? console.log("No blobs on IE ver<10") : (n = (n = document.getElementById("txtArea1").value).replace(/\r?\n/g, "\r\n"), a = new Blob([n], {
        type: "text/plain"
    }), "null.txt" != (e = prompt("File name:", "New Document") + ".txt") && (-1 < o ? window.navigator.msSaveBlob(a, e) : ((t = document.createElement("a")).download = e, t.href = window.URL.createObjectURL(a), t.onclick = function(e) {
        document.body.removeChild(e.target)
    }, t.style.display = "none", document.body.appendChild(t), t.click())))
}

function printTextArea1() {
    (childWindow = window.open("", "childWindow", "location=yes, menubar=yes, toolbar=yes")).document.open(), childWindow.document.write('<html><head></head><body style="word-wrap:break-word;"><style>.ap_container,.google-auto-placed,.adsbygoogle{display:none}</style>'), childWindow.document.write(document.getElementById("txtArea1").value.replace(/\n/gi, "<br>")), childWindow.document.write("</body></html>"), childWindow.print(), childWindow.document.close(), childWindow.close()
}


$("#clearAll, #edit_delete").click(function() {
    area.val(""), area1.val("");
});

$("#file_new1").click(function() {
    area1.val("");
});

$("#file_upload1").on("change", function() {
    var e = $("#file_upload1").get(0).files[0],
        newfile1 = new FileReader;
    newfile1.onload = function(e) {
        e = e.target.result;
        area1.val(e)
    }, newfile1.readAsText(e, "UTF-8")
});

$("#file_download1").click(function() {
    saveFile1()
});

$("#file_print1").click(function() {
    printTextArea1()
});


$("#edit_copy").click(function() {
    Clipboard(area1)
});

$("#edit_select").click(function() {
    area1.select().focus()
});



var isBold1 = 0;
var isItalic1 = 0;
var isUnderLine1 = 0;
var isStrike1 = 0;
var isNumber1 = 0;
var isBullet1 = 0;
var isLeft1 = 0;
var isRight1 = 0;
var isCenter1 = 0;

$('#fontsize1').change(function()
{
    var fontsize = $(this).val();
    var fontStyle = 'font-size:'+parseInt(fontsize)+'px;line-height:'+parseInt(fontsize)+'px';
    if(isBold1 == 1)
    {
        fontStyle += 'font-weight:bolder;';
    }
    if(isItalic1 == 1)
    {
        fontStyle += 'font-style:italic;';
    }
    if(isUnderLine1 == 1)
    {
        fontStyle += 'text-decoration:underline;';
    }
    if(isStrike1 == 1)
    {
        fontStyle += 'text-decoration:line-through;';
    }
    if(isLeft1 == 1)
    {
        fontStyle += 'text-align:left;';
    }
    if(isRight1 == 1)
    {
        fontStyle += 'text-align:right;';
    }
    if(isCenter1 == 1)
    {
        fontStyle += 'text-align:center;';
    }
    $('#txtArea1').attr('style', fontStyle);

});

$('#btnBold1').click(function()
{    
    if(isBold1 == 1)
    {
        area1.css('fontWeight' ,'normal');
        $(this).attr('style', 'background: #ffffff !important');
        isBold1 = 0;
    }
    else
    {
        area1.css('fontWeight' ,'bolder');
        $(this).attr('style', 'background: #E1F0FE !important');
        isBold1 = 1;
    }
});


$('#btnItalic1').click(function()
{    
    if(isItalic1 == 1)
    {
        area1.css('fontStyle' ,'normal');
        $(this).attr('style', 'background: #ffffff !important');
        isItalic1 = 0;
    }
    else
    {
        area1.css('fontStyle' ,'italic');
        $(this).attr('style', 'background: #E1F0FE !important');
        isItalic1 = 1;
    }
});


$('#btnUnderLine1').click(function()
{    
    if(isUnderLine1 == 1)
    {
        area1.css('text-decoration' ,'none');
        $(this).attr('style', 'background: #ffffff !important');
        isUnderLine1 = 0;
    }
    else
    {
        area1.css('text-decoration' ,'underline');
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnStrike1').attr('style', 'background: #ffffff !important');
        isUnderLine1 = 1;
        isStrike1 = 0;
    }
    
});

$('#btnStrike1').click(function()
{    
    if(isStrike1 == 1)
    {
        area1.css('text-decoration' ,'none');
        $(this).attr('style', 'background: #ffffff !important');
        isStrike1 = 0;
    }
    else
    {
        area1.css('text-decoration' ,'line-through');
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnUnderLine1').attr('style', 'background: #ffffff !important');
        isStrike1 = 1;
        isUnderLine1 = 0;
    }
});


$('#btnLeft1').click(function()
{
    if(isLeft1 == 1)
    {
        area1.css('text-align' ,'none');
        $(this).attr('style', 'background: #ffffff !important');
        isLeft1 = 0;
    }
    else
    {
        area1.css('text-align' ,'left');
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnCenter1').attr('style', 'background: #ffffff !important');
        $('#btnRight1').attr('style', 'background: #ffffff !important');
        isLeft1 = 1;
        isCenter1 = 0;
        isRight1 = 0;
    }
});

$('#btnRight1').click(function()
{
    if(isRight1 == 1)
    {
        area1.css('text-align' ,'left');
        $(this).attr('style', 'background: #ffffff !important');
        isRight1 = 0;
    }
    else
    {
        area1.css('text-align' ,'right');
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnLeft1').attr('style', 'background: #ffffff !important');
        $('#btnCenter1').attr('style', 'background: #ffffff !important');
        isRight1 = 1;
        isCenter1 = 0;
        isRight1 = 0;
    }
});

$('#btnCenter1').click(function()
{
    if(isCenter1 == 1)
    {
        area1.css('text-align' ,'left');
        $(this).attr('style', 'background: #ffffff !important');
        isCenter1 = 0;
    }
    else
    {
        area1.css('text-align' ,'center');
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnLeft1').attr('style', 'background: #ffffff !important');
        $('#btnRight1').attr('style', 'background: #ffffff !important');
        isCenter1 = 1;
        isLeft1 = 0;
        isRight1 = 0;
    }
});

$('#btnNumber1').click(function()
{
    if(isNumber1 == 1)
    {
        removeNumber1();
        $(this).attr('style', 'background: #ffffff !important');        
        isNumber1 = 0;
    }
    else
    {
        if(isBullet1 == 1)
        {
            removeBullet1();
        }
        var lines = $('#txtArea1').val().split("\n");
        for (var i = 0; i <= lines.length; ++i) 
        {
            if(lines[i] != '' && typeof lines[i] !== 'undefined')
            {
                lines[i] = i+1 +'. '+lines[i];
            }                  
        }
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnBullet1').attr('style', 'background: #ffffff !important');
        area1.val(lines.join("\n"));
        isNumber1 = 1;
        isBullet1 = 0;
    }

});



$('#btnBullet1').click(function()
{
    const bullet = "\u2022";
    if(isBullet1 == 1)
    {
        removeBullet1();
        $(this).attr('style', 'background: #ffffff !important');
        isBullet1 = 0;
    }
    else
    {
        if(isNumber1 == 1)
        {
            removeNumber1();
        }
        var lines = $('#txtArea1').val().split("\n");
        for (var i = 0; i <= lines.length; ++i) 
        {
            if(lines[i] != '' && typeof lines[i] !== 'undefined')
            {
                lines[i] = bullet+' '+lines[i];
            }                  
        }
        $(this).attr('style', 'background: #E1F0FE !important');
        $('#btnNumber1').attr('style', 'background: #ffffff !important');
        area1.val(lines.join("\n"));
        isBullet1 = 1;
        isNumber1 = 0;
    }

});

function removeNumber1()
{
    var lines = $('#txtArea1').val().split("\n");
    for (var i = 0; i <= lines.length; ++i) 
    {
        //console.log(lines[i].slice(0,1));
        if(lines[i] != '' && typeof lines[i] !== 'undefined')
        {
            if(i <= 8)
            {
                lines[i] = lines[i].slice(3);
            }
            else if(i <= 98)
            {
                lines[i] = lines[i].slice(4);
            }
            else if(i <= 998)
            {
                lines[i] = lines[i].slice(5);
            }
            else if(i <= 9998)
            {
                lines[i] = lines[i].slice(6);
            }
            else if(i <= 99998)
            {
                lines[i] = lines[i].slice(7);
            }
        }                  
    }
    area1.val(lines.join("\n"));
}

function removeBullet1()
{
    var lines = $('#txtArea1').val().split("\n");
    for (var i = 0; i <= lines.length; ++i) 
    {
        if(lines[i] != '' && typeof lines[i] !== 'undefined')
        {
            lines[i] = lines[i].slice(2);
        }                  
    }
    area1.val(lines.join("\n"));
}