function selected_article(id) {
    let articles=document.getElementsByTagName("article");

    for(let i=0; i<articles.length; i++) {
        articles[i].style.border="none";
    }

    document.getElementsByTagName("article")[id].style.border="solid white 5px";
    document.getElementById("selected_product").style.display="flex";
    document.getElementById("button").style.display="flex";
}