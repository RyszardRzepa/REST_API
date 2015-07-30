$(document).ready(function()
{
    var $url = "Books.php";
    var $context = $("#books");

    $.ajax
    ({
        url : $url,
        method: "GET",
        context: $context
    })
        .done(function(data)
        {
            $.each(data, function(key,book)
            {
                $('#books')
                    .append('<tr>' +
                    '<td>'+book.id+'</td>' +
                    '<td><span class="title noedit">'+book.title+'</span><input class ="title edit" style="display: none; float: right "></input></td>' +
                    '<td><span class="desc noedit" >'+book.description+'</span><input class ="desc edit" style="display: none; float: right"></input></td>' +
                    '<td><span class="author noedit" >'+book.author+'</span><input class="author edit" style="display: none; float: right"></input></td>' +
                    '<td><button class="remove" id='+book.id+'>Delete</button></td>' +
                    '<td><button class="saveEdit edit ">Save</button></td>' + //  saveEDit button saves just on the page, not in DB
                    '<td><button class="editBook ">Edit</button></td></tr>');
            })

        });

    var $send = $('#addBook');
    $send.on('click',function(event)
    {
        event.preventDefault();
        $.ajax
        ({
            url: $url,
            method: "POST",
            data:
            {
                author: $('#author').val(),
                title: $('#title').val(),
                desc: $('#description').val()
            },
            dataType: "html"
        })
            .done(function(newIndex){
                    $('#books')
                        .append('<tr><td>'+newIndex+'</td>' +
                        '<td id="newIndexId">'+ $('#title').val()+'</td>' +
                        '<td>'+ $('#author').val()+'</td>' +
                        '<td>'+ $('#description')+'</td><tr>');
                })
    });

    $('#books').delegate('.remove', 'click', function (event) {
        event.preventDefault();

        var $tr = $(this).closest('tr');

        $.ajax({
            url: $url + "?id=" + $(this).attr('id'),
            method: 'DELETE',
            dataType: 'html',
            success: function () {
                alert('table dropped');

                $tr.fadeOut(300, function () {
                    $(this).remove();
                });
            }
        });

    });

    $('#books').delegate('.editBook','click', function(){
        var $tr = $(this).closest('tr');
        $tr.find('input.title').val($tr.find('span.title').html() );
        $tr.find('input.desc').val($tr.find('span.desc').html() );
        $tr.find('input.author').val($tr.find('span.author').html() );
        $tr.addClass('edit');

        $('#books').on('click','.editBook',function(){
            $('.edit').css('display','initial');    // showing hidden <input>
            //$('.noedit').css('display','none');   // hiding db value after click on edit
        });
        $('#books').delegate('.saveEdit', 'click', function(){


            var $tr = $(this).closest('tr');
            var book = {
                title: $tr.find('input.title').val(),
                desc: $tr.find('input.desc').val(),
                author: $tr.find('input.author').val()
            };

        $.ajax({
            url: $url + "?id=" + $(this).attr('id'),
            method:'PUT',
            data: book,
            dataType:'html',
            success: function(){
                $tr.find('span.title').html(book.title);
                $tr.find('span.desc').html(book.desc);
                $tr.find('span.author').html(book.author);
                $tr.removeClass('edit');
            }
        });
        });
    });

});
/* // Showing <di> on click
$('tr').on('click', function (){
    var div = $('<div id="bookInfo" style=" background: #8971c6; width: 200px; height: 200px; float: right">Information about book</div>');
    $('#books').append(div);
});

*/
