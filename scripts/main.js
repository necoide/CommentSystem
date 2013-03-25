$(document).ready(function() {
    var url = "comments.php?code=";
    var currentCode = 1;

    var getComments = function(code) {
        $.getJSON(url + code, function(data) {
            $.each(data.comments, function() {
                var li = jQuery('<li>');
                var divComment = $('<div>', { 'class': 'comment'}).appendTo(li);
                $('<div>', { 'class': 'udetails'}).append(
                                        '<img class="uavatar" src="' + this.avatar + '"/>').appendTo(divComment);
                $('<div>', { 'class': 'ucomment' }).append(
                                        '<div class="cdetails">Comment N°: ' + this.commentid + ' on ' + this.date + ' by ' + this.name + '</div>' +
                                        '<div class="commentcontent">' + this.comment + '</div>').appendTo(divComment);
                $('.comments').append(li);
            });
        });
    };
    
    getComments(currentCode);
    
    $('.moreComments').click(function() {
        currentCode = currentCode + 3;
        getComments(currentCode);
    });
    

});