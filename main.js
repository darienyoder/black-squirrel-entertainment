
function main()
{
    document.getElementById("blankslate-style-css").remove();
}

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
    let current = document.getElementById("toggled-nav");
    if (current)
    {
        current.id = "";
    }
    submenu.id = "toggled-nav";
}
