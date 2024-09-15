function toggleNav()
{
    let nav = document.getElementById("nav-links");
    if (nav.style.display == "block")
    {
        nav.style.display = "none";
    }
    else
    {
        nav.style.display = "block";
    }
}

function openNavSubmenu(submenu)
{
    return;
    if (window.innerHeight / window.innerWidth > 1.0)
    {
        if (submenu.id == "toggled-nav")
        {
            setTimeout(10, closeNavSubmenu(submenu));
            return;
        }
        let current = document.getElementById("toggled-nav");
        if (current)
        {
            current.id = "";
        }
        submenu.id = "toggled-nav";
    }
}

function closeNavSubmenu(submenu)
{
    submenu.id = "";
}

function getStylesheetElement(path)
{
    return '<link rel="stylesheet" href="/wp-content/themes/BlackSquirrelEntertainment/style/' + path + '?ver=' + String(Date.now() / 1000) + '">';
}

var url = "";
const submenuKeys = {
    "/tv" : ["/tv"],
    "/radio" : ["/radio", "/podcasts"],
    "/articles" : ["/article"],
}

function updateStyle()
{
    if (url != window.location.pathname)
    {
        url = window.location.pathname;
        let style = document.getElementById("nav-style");
        let newStyle = "";

        if (
            url == "/tv"
            || url == "/radio"
            || url == "/article"
            || (
                url.startsWith("/tv")
                && url != "/tv/shows"
                && url != "/tv/schedule"
            )
        ) newStyle += getStylesheetElement("fullscreen-content.css");

        if (
            !url.startsWith("/tv")
            && !url.startsWith("/radio")
            && !url.startsWith("/podcasts")
            && !url.startsWith("/article")
        ) newStyle += getStylesheetElement("collapsed-nav.css");

        if (style.innerHTML != newStyle)
            style.innerHTML = newStyle;



        for (var item of document.getElementsByClassName("bse-submenu"))
        {
            let link = item.children[0].href.replace("https://blacksquirrelradio.com", "");
            let found = false;
            for (var prefix of submenuKeys[link])
            {
                if (url.startsWith(prefix))
                {
                    item.parentElement.id = "toggled-nav";
                    found = true;
                    break;
                }
            }
            if (!found)
            {
                item.parentElement.id = "";
            }
        }
    }
}
