content = document.getElementById('search-box');

function showResults(str) {
    if (str.length == 0) {
        content.innerHTML = '';
    } else {
        xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                //console.log(xmlHttp.responseText);
                results = JSON.parse(xmlHttp.responseText);
                linkify_results = results.slice(0, 5).map(function (result) {
                    combinedText = result.Title + " " + result.Content;
                    return "<a class='search-display' href='fetch-news.php?id=" + result.ID + "'>" + combinedText.slice(0, 125) + ".."+ "</a>";
                });8
                
                content.innerHTML = linkify_results.join("<br>");
            }
        };
        xmlHttp.open("GET", "search.php?q=" + str, true);
        xmlHttp.send();
    }
}
