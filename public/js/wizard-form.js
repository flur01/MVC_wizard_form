var tabs = $("#tabWrapper").children();
var page = 0;
var prevPage = 0;

if (getCookie('page')) {
    var page = getCookie('page');
}

showTab(tabs, page);

$(document).ready(function() {

    sendAjax('addUser', '/add-user');
    sendAjax('addInfo', '/add-info');
});


function showTab(tabs, n) {
    if (n == 2) {
        $( "#header" ).css("display", "none");
    }

    tabs[n].className =  tabs[n].className.replace('hide-tab', '');

    tabs[n].className += ' show-tab';

}


function hideTab(tabs, n) {
    tabs[n].className = tabs[n].className.replace('show-tab', '')

    tabs[n].className += ' hide-tab';


}


function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}


function sendAjax(id, url) {
    $('#'+id).submit(function(e) {
        var data = new FormData(this);
        if (page == 0) {
            cookiePage = page +1;
            document.cookie = "page=" + cookiePage + ";";
        }
        else
        {
            document.cookie = "page=";
        }

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: url,
            processData: false,
            contentType: false,
            data: data,
            success: function(response)
            {
                var jsonData = JSON.parse(response);

                if (jsonData.success == 1)
                {
                    $( "#errorWrapper" ).css("display", "none");
                    
                    if (page < tabs.length-1) {
                        hideTab(tabs, page);
                    }

                    if (page < tabs.length) {
                        page ++;
                    }
                    
                    showTab(tabs, page);

                }
                else
                {
                    $( "#errorWrapper" ).css("display", "block");
                    $( "#errorMessage" ).text(jsonData.errorMessage);
                }
            }
        });
    });
}