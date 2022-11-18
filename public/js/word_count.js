$('#txtArea').val("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere ultrices velit, eget venenatis elit aliquet vitae. Mauris pellentesque tristique odio nec maximus. Nam euismod nunc vitae porta vulputate. Vestibulum ultricies, enim sed iaculis convallis, massa enim vehicula metus, nec malesuada lacus mi ut turpis. Nulla vitae feugiat lorem, at posuere enim. Curabitur feugiat, dolor vitae imperdiet tincidunt, elit urna tempor metus, at bibendum dui erat sit amet odio. Nulla maximus lacus sem. Maecenas placerat felis cursus justo consequat, vel feugiat arcu ultricies. Morbi vulputate eget enim at faucibus. In a feugiat nisi. Phasellus a lorem sit amet libero vulputate lobortis. Morbi est metus, blandit et mollis quis, molestie sed nibh. Morbi vel turpis nec dui facilisis accumsan quis condimentum risus. Nullam tempor, nisl tincidunt tincidunt ultricies, massa nisl vulputate est, quis vulputate justo dui sed ante. Donec convallis, neque non aliquam tristique, tortor mauris mattis mi, vel venenatis urna sem eget augue. Nulla ac metus quam?\n\nSed varius lectus nec quam pharetra tristique. Nunc eleifend lobortis sem, quis fermentum risus pulvinar in. Pellentesque eu nisl quis mi tincidunt gravida. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas?!?\n\nQuisque non felis ut nisi convallis porttitor. Nam faucibus eget tellus nec dignissim. Maecenas faucibus, ipsum in venenatis malesuada, mi magna porta nibh, eget accumsan enim mauris in erat. Nam volutpat commodo justo, et luctus libero ultrices at. Morbi eu mi neque.");
$("textarea").on("keyup", function(e)
    {
        if($(this).val() != '')
        {
            var textArea = $('#txtArea');
            $('#total_words').html(textArea.val().split(/\S+/g).length-1);
            $('#total_char').html($("#txtArea").val().replace(/(<([^>]+)>)/ig,"").length);
            $('#total_charNS').html($("#txtArea").val().replace(/\s+/g, '').length);
            $('#total_sentences').html($(this).val().trim().split(/[\.\?\!]\s/).length);
            $('#total_paragraphs').html($("#txtArea").val().replace(/\n$/gm, '').split(/\n/).length);
            $('#total_lines').html($("#txtArea").val().split(/\r|\r\n|\n/).length);
        }
        else
        {
            $('#total_words').html(0);
            $('#total_char').html(0);
            $('#total_charNS').html(0);
            $('#total_sentences').html(0);
            $('#total_paragraphs').html(0);
            $('#total_lines').html(1);
        }
   
        console.log($(this).val());
    });