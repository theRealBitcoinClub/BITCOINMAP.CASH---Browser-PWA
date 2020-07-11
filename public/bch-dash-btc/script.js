function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location
        .search
        .substr(1)
        .split("&")
        .forEach(function (item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName)
                result = decodeURIComponent(tmp[1]);
            }
        );
    return result;
}

function loadMore() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            if (xmlhttp.status == 200) {
                document
                    .getElementById("list")
                    .innerHTML += xmlhttp.responseText;

                document
                    .getElementById("startupHint")
                    .innerHTML = '';

                new LazyLoad({elements_selector: ".lazy"});
            } else if (xmlhttp.status == 400) {
                alert('There was an error 400');
            } else {
                alert('something else other than 200 was returned');
            }
        }
    };
    //var param = findGetParameter("filter");
    xmlhttp.open("GET", "listcontent.php" + location.search, true);
    xmlhttp.send();
}

function supportsWebPImages() {
    if ((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1) {
        return false;
    } else if (navigator.userAgent.indexOf("Chrome") != -1) {
        return true;
    } else if (navigator.userAgent.indexOf("Safari") != -1) {
        return false;
    } else if (navigator.userAgent.indexOf("Firefox") != -1) {
        return false;
    } else if ((navigator.userAgent.indexOf("MSIE") != -1) || (!!document.documentMode == true)) { //IF IE > 10
        return
        false;
    } else
    { return
        false;
    }
}
